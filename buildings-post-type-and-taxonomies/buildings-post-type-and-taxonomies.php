<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Buildings_Post_Type_And_Taxonomies
 *
 * @wordpress-plugin
 * Plugin Name:       Buildings post type and taxonomies
 * Plugin URI:        shaldaeva.kseniya@gmail.com
 * Description:       This plugin has added a new post types “Real Estate”, "Cities" and taxonomies for it.
 * Version:           1.0.0
 * Author:            Shalkse
 * Author URI:        shaldaeva.kseniya@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       buildings-post-type-and-taxonomies
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Update it as you release new versions.
 */
define( 'BUILDINGS_POST_TYPE_AND_TAXONOMIES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-buildings-post-type-and-taxonomies-activator.php
 */
function activate_buildings_post_type_and_taxonomies() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-buildings-post-type-and-taxonomies-activator.php';
	Buildings_Post_Type_And_Taxonomies_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-buildings-post-type-and-taxonomies-deactivator.php
 */
function deactivate_buildings_post_type_and_taxonomies() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-buildings-post-type-and-taxonomies-deactivator.php';
	Buildings_Post_Type_And_Taxonomies_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_buildings_post_type_and_taxonomies' );
register_deactivation_hook( __FILE__, 'deactivate_buildings_post_type_and_taxonomies' );


require_once plugin_dir_path( __FILE__ ) . 'includes/class-buildings-post-type-and-taxonomies-add-post-type-cities.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-buildings-post-type-and-taxonomies-add-post-type-real_estate.php';

//Create a new post type cities
add_action( 'init', array( 'Add_City', 'create_post_type_city') );

//Create a new taxonomies for a real_estate
add_action( 'init', array( 'Add_Real_Estate', 'create_taxonomy_real_estate') );
//Create a new post type real_estate
add_action( 'init', array( 'Add_Real_Estate', 'create_post_type_real_estate') );
//Adding metaboxes for a real_estate
add_action( 'add_meta_boxes', array( 'Add_Real_Estate', 'true_add_metaboxes') );

//Enable metabox checking when saving a post real_estate
add_action( 'save_post', array( 'Add_Real_Estate','true_save_meta'), 10, 2 );

add_action( 'wp_insert_post', array( 'Add_Real_Estate','thumbnail_insert_postdata') );

//Connecting a script for a real estate image gallery
add_action( 'admin_enqueue_scripts', 'estate_gallery_scripts_method' );
function estate_gallery_scripts_method(){
	wp_enqueue_script( 'estate_gallery', '/wp-content/plugins/buildings-post-type-and-taxonomies/admin/js/estate_gallery.js', '', array('in_footer' => true,'strategy' => 'defer'));
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-buildings-post-type-and-taxonomies.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_buildings_post_type_and_taxonomies() {

	$plugin = new Buildings_Post_Type_And_Taxonomies();
	$plugin->run();

}
run_buildings_post_type_and_taxonomies();

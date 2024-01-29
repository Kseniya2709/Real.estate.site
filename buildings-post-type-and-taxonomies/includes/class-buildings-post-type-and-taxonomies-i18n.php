<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 *
 * @package    Buildings_Post_Type_And_Taxonomies
 * @subpackage Buildings_Post_Type_And_Taxonomies/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Buildings_Post_Type_And_Taxonomies
 * @subpackage Buildings_Post_Type_And_Taxonomies/includes
 * @author     Shalkse
 */
class Buildings_Post_Type_And_Taxonomies_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'buildings-post-type-and-taxonomies',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

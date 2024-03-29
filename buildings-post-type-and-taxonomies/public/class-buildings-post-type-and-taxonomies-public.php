<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Buildings_Post_Type_And_Taxonomies
 * @subpackage Buildings_Post_Type_And_Taxonomies/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Buildings_Post_Type_And_Taxonomies
 * @subpackage Buildings_Post_Type_And_Taxonomies/public
 * @author     Shalkse
 */
class Buildings_Post_Type_And_Taxonomies_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $buildings_post_type_and_taxonomies    The ID of this plugin.
	 */
	private $buildings_post_type_and_taxonomies;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $buildings_post_type_and_taxonomies       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $buildings_post_type_and_taxonomies, $version ) {

		$this->buildings_post_type_and_taxonomies = $buildings_post_type_and_taxonomies;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Buildings_Post_Type_And_Taxonomies_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Buildings_Post_Type_And_Taxonomies_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->buildings_post_type_and_taxonomies, plugin_dir_url( __FILE__ ) . 'css/buildings-post-type-and-taxonomies-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Buildings_Post_Type_And_Taxonomies_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Buildings_Post_Type_And_Taxonomies_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->buildings_post_type_and_taxonomies, plugin_dir_url( __FILE__ ) . 'js/buildings-post-type-and-taxonomies-public.js', array( 'jquery' ), $this->version, false );

	}

}

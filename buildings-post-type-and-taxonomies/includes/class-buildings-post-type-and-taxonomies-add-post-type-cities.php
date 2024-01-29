<?php
/**
* Class for creating a post type City
 *
 * @since      1.0.0
 * @package    Buildings_Post_Type_And_Taxonomies
 * @subpackage Buildings_Post_Type_And_Taxonomies/includes
 * @author     Shalkse
 */

class Add_City {

	// Adding a new post type in the form of real estate
	static  function create_post_type_city(){
		$labels = array(
			'name' => __( 'City', 'buildings-post-type-and-taxonomies' ),
			'singular_name' => __( 'City', 'buildings-post-type-and-taxonomies' ),
			'add_new' =>  __( 'Add city', 'buildings-post-type-and-taxonomies' ),
			'add_new_item' => __( 'Add city', 'buildings-post-type-and-taxonomies' ),
			'edit_item' =>  __( 'Edit city', 'buildings-post-type-and-taxonomies' ),
			'new_item' => __( 'New city', 'buildings-post-type-and-taxonomies' ),
			'all_items' => __( 'All city', 'buildings-post-type-and-taxonomies' ),
			'search_items' =>  __( 'Find city', 'buildings-post-type-and-taxonomies' ),
			'not_found' =>  __( 'No cities found for the specified criteria.', 'buildings-post-type-and-taxonomies' ),
			'not_found_in_trash' => __( 'There are no cities in the cart', 'buildings-post-type-and-taxonomies' ),
			'menu_name' => __( 'City', 'buildings-post-type-and-taxonomies' )
		);
	   
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-admin-multisite',
			'rewrite' => array( 'slug' => 'city' ),
			'cptp_permalink_structure' => '%post_id%', 
			'menu_position' => 23,
			'supports' => array( 'title', 'editor', 'thumbnail' )
		);
	   
		register_post_type( 'city', $args );
	}
}


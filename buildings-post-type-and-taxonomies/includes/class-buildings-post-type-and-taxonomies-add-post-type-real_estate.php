<?php
/**
* Class for creating a post type Real Estate
 *
 * @since      1.0.0
 * @package    Buildings_Post_Type_And_Taxonomies
 * @subpackage Buildings_Post_Type_And_Taxonomies/includes
 * @author     Shalkse
 */

class Add_Real_Estate {

	// Adding a new taxonomies
	static  function create_taxonomy_real_estate () {
		register_taxonomy( 'type_real_estate', [ 'real_estate' ], [
			'label'                 => '',
			'labels'                => [
				'name'              => __( 'Types', 'buildings-post-type-and-taxonomies' ),
				'singular_name'     => __( 'Type Real Estate' , 'buildings-post-type-and-taxonomies' ),
				'search_items'      => __( 'Search Types', 'buildings-post-type-and-taxonomies' ),
				'all_items'         => __( 'All Types', 'buildings-post-type-and-taxonomies' ),
				'view_item '        => __( 'View Type' , 'buildings-post-type-and-taxonomies' ),
				'parent_item'       => __( 'Parent Type', 'buildings-post-type-and-taxonomies' ),
				'parent_item_colon' => __( 'Parent Type:', 'buildings-post-type-and-taxonomies' ),
				'edit_item'         => __( 'Edit Type' , 'buildings-post-type-and-taxonomies' ),
				'update_item'       => __( 'Update Type', 'buildings-post-type-and-taxonomies' ),
				'add_new_item'      => __( 'Add New Type' , 'buildings-post-type-and-taxonomies' ),
				'new_item_name'     => __( 'New Type Name', 'buildings-post-type-and-taxonomies' ),
				'menu_name'         => __( 'Types Real Estate', 'buildings-post-type-and-taxonomies' ),
				'back_to_items'     => __( '← Back to Type' , 'buildings-post-type-and-taxonomies' ),
			],
			'description'           => __( 'Types Real Estate', 'buildings-post-type-and-taxonomies' ), // описание таксономии
			'public'                => true,
			'hierarchical'          => false,

			'rewrite'               => true,
			'capabilities'          => array(),
			'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
			'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
			'show_in_rest'          => null, 
			'rest_base'             => null, 
		] );
	}

	// Adding a new post type in the form of real estate
	static  function create_post_type_real_estate(){
		$labels = array(
			'name' => __( 'Real Estate', 'buildings-post-type-and-taxonomies' ),
			'singular_name' => __( 'Real Estate', 'buildings-post-type-and-taxonomies' ),
			'add_new' =>  __( 'Add real estate', 'buildings-post-type-and-taxonomies' ),
			'add_new_item' => __( 'Add real estate', 'buildings-post-type-and-taxonomies' ),
			'edit_item' =>  __( 'Edit real estate', 'buildings-post-type-and-taxonomies' ),
			'new_item' => __( 'New real estate', 'buildings-post-type-and-taxonomies' ),
			'all_items' => __( 'All real estates', 'buildings-post-type-and-taxonomies' ),
			'search_items' =>  __( 'Find real estate', 'buildings-post-type-and-taxonomies' ),
			'not_found' =>  __( 'No real estates found for the specified criteria.', 'buildings-post-type-and-taxonomies' ),
			'not_found_in_trash' => __( 'There are no real estates in the cart', 'buildings-post-type-and-taxonomies' ),
			'menu_name' => __( 'Real Estate', 'buildings-post-type-and-taxonomies' )
		);
	   
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-building',
			'rewrite' => array( 'slug' => 'real_estate' ),
			'cptp_permalink_structure' => '%post_id%', 
			'menu_position' => 23,
			'supports' => array( 'title', 'editor', 'thumbnail' )
		);
	   
		register_post_type( 'real_estate', $args );
	}
	
	//Adding metaboxes for a new post type
	static function true_add_metaboxes() {
	 
		//metabox for Total area
		add_meta_box(
			'total_area', 
			__('Total area', 'buildings-post-type-and-taxonomies' ), 
			array( 'Add_Real_Estate', 'total_area_callback'), 
			'real_estate', 
			'normal', 
			'default' 
		);
		//metabox for Living area
		add_meta_box(
			'living_area', 
			__('Living area', 'buildings-post-type-and-taxonomies' ), 
			array( 'Add_Real_Estate', 'living_area_callback'), 
			'real_estate', 
			'normal', 
			'default' 
		);
		//metabox for Price
		add_meta_box(
			'price', 
			__('Price', 'buildings-post-type-and-taxonomies' ), 
			array( 'Add_Real_Estate','price_callback'), 
			'real_estate', 
			'normal', 
			'default' 
		);
		//metabox for Adress
		add_meta_box(
			'adress', 
			__('Adress', 'buildings-post-type-and-taxonomies' ), 
			array( 'Add_Real_Estate','adress_callback'), 
			'real_estate', 
			'normal', 
			'default' 
		);
		//metabox for Floor
		add_meta_box(
			'floor', 
			__('Floor', 'buildings-post-type-and-taxonomies' ), 
			array( 'Add_Real_Estate','floor_callback'), 
			'real_estate', 
			'normal', 
			'default' 
		);
		//metabox for a real estate image gallery
		add_meta_box(
			'thumbnail_sidebar',
			__('Other images', 'buildings-post-type-and-taxonomies' ),
			array( 'Add_Real_Estate','thumbnail_render_images'), 
			'real_estate', 
			'side',
			'default'
		);
		//metabox for a real estate city
		add_meta_box( 
			'city',
			__('City', 'buildings-post-type-and-taxonomies' ),
			array( 'Add_Real_Estate','city_callback'), 
			'real_estate', 
			'side', 
			'low'  );
	}

	//Callback function for metabox total_area
	static function total_area_callback( $post ) {
		$total_area = get_post_meta( $post->ID, 'total_area', true );
		$metabox = '<input type="text" id="total_area" name="total_area" value="%s" style="%s" />';
		echo sprintf($metabox, esc_attr( $total_area ),'width:100%;');
	}

	//Callback function for metabox living_area
	static function living_area_callback( $post ) {
		$living_area = get_post_meta( $post->ID, 'living_area', true );
		$metabox = '<input type="text" id="living_area" name="living_area" value="%s" style="%s" />';
		echo sprintf($metabox, esc_attr( $living_area ),'width:100%;');
	}

	//Callback function for metabox price
	static function price_callback( $post ) {
		$price = get_post_meta( $post->ID, 'price', true );
		$metabox = '<input type="number" step="0.1" min="0" id="price" name="price" value="%s" style="%s">';
		echo sprintf($metabox, esc_attr( $price ),'');
	}	

	//Callback function for metabox adress
	static function adress_callback( $post ) {
		$adress = get_post_meta( $post->ID, 'adress', true );
		$metabox = '<input type="text" id="adress" name="adress" value="%s" style="%s" />';
		echo sprintf($metabox, esc_attr( $adress ),'width:100%;');
	}

	//Callback function for metabox floor
	static function floor_callback( $post ) {
		$floor = get_post_meta( $post->ID, 'floor', true );
		$metabox = '<input type="number" step="1"  id="floor" name="floor" value="%s" style="%s">';
		echo sprintf($metabox, esc_attr( $floor ),'');
	}

	//checking metaboxes when saving a post
	static  function true_save_meta( $post_id, $post ) {
	
		// check type post
		if( 'real_estate' !== $post->post_type ) {
			return $post_id;
		}

		//need to check for the correctness of the link
		if( isset( $_POST[ 'total_area' ]) ) {
			update_post_meta( $post_id, 'total_area', sanitize_text_field( $_POST[ 'total_area' ] ) );
		}
		if( isset( $_POST[ 'living_area' ]) ) {
			update_post_meta( $post_id, 'living_area', sanitize_text_field( $_POST[ 'living_area' ] ) );
		}
		if( isset( $_POST[ 'price' ]) && is_numeric($_POST[ 'price']) ) {
			update_post_meta( $post_id, 'price', sanitize_text_field( $_POST[ 'price' ] ) );
		}
		if( isset( $_POST[ 'adress' ]) ) {
			update_post_meta( $post_id, 'adress', sanitize_text_field( $_POST[ 'adress' ] ) );
		}
		if( isset( $_POST[ 'floor' ]) && is_numeric($_POST[ 'floor']) ) {
			update_post_meta( $post_id, 'floor', sanitize_text_field( $_POST[ 'floor' ] ) );
		}

		return $post_id;
	
	}

	// Displaying the contents of the block with miniatures in the created field
	static function thumbnail_render_images() {
		global $wpdb;
		global $post;
			// We use nonce for verification
			wp_nonce_field( plugin_basename( __FILE__ ), 'thumbnail_noncename' );
		
			// Data entry field
			// Use get_post_meta to get an existing value from the database and use the value for the form
			$value = get_post_meta($post->ID, '_multi_img_array', true);
			$temp = explode(",", $value);
		
			if ($temp) {
				foreach ( $temp as $t_val ) {
				
				$image_attributes = wp_get_attachment_image_src( $t_val , array(66,66) );
				echo '<img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'" data-id="'.$t_val.'">';
				}
			}
			else
			{
				$image_attributes = wp_get_attachment_image_src( $value , array(66,66) );
				echo '<img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'" data-id="'.$value.'">';
			}
			echo "<style type='text/css'>
				#thumbnail_sidebar {padding: 10px;} #thumbnail_sidebar .inside{padding: 5px; border: 2px dashed #e5e5e5;} #thumbnail_sidebar .inside img{margin:5px; border: 2px solid #e5e5e5;} #thumbnail_sidebar .inside img:hover{cursor: pointer; border: 2px solid #ff0000;} #thumbnail_image_upload{width: 100%;}
			</style>";
			echo "<input type='hidden' name='image_upload_val' id='image_upload_val' value='".$value."' />";
			echo "<button class='button button-primary' id='thumbnail_image_upload'>Upload Images</button>";
	}
	
	static function thumbnail_insert_postdata( $post_id ) {
		global $wpdb;

		// Secondly we need to check if the user intended to change this value.
		if ( ! isset( $_POST['thumbnail_noncename'] ) || ! wp_verify_nonce( $_POST['thumbnail_noncename'], plugin_basename( __FILE__ ) ) )
				return;

		// Now we can save the field value in the database

		$post_ID = $_POST['post_ID'];

		global $mydata;
		$mydata = $_POST['image_upload_val'];
		// Do something with $mydata 
		// either using 
		
		// if the value is empty, then delete the contents from the database
		if($mydata == '') {
			delete_post_meta($post_ID, '_multi_img_array', $mydata);
		}
		
		if($mydata) {
			$cur_data = get_post_meta($post_ID, '_multi_img_array', true);
			if(!(empty($cur_data)))
			{
				update_post_meta($post_ID, '_multi_img_array', $mydata);
			}
			else
			{
				add_post_meta($post_id, '_multi_img_array', $mydata, true);
			}
		}
		
	}

	static function city_callback (){
		$cities = get_posts(array( 'post_type'=>'city', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

			if( $cities ){
				global $post;
				echo '
				<div style="max-height:200px; overflow-y:auto;">
					<ul>
				';
				foreach( $cities as $city ){
					echo '
					<li><label>
						<input type="radio" name="post_parent" value="'. $city->ID .'" '. checked($city->ID, $post->post_parent, 0) .'> '. esc_html($city->post_title) .'
					</label></li>
					';
				}
				echo '
					</ul>
				</div>';
			}
			else
				echo  __('No cities', 'buildings-post-type-and-taxonomies' );
	}

}


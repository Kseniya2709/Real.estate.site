<?php
/**
 * Citiest list setup
 *
 * @package Understrap-child-1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'city',
        'post_status'  => 'publish',);
        
    query_posts($args);

    while (have_posts()) : the_post();
    ?>
        <div class="city-btn">
            <a href="<?php the_permalink(); ?>">
                <div class="img" style="background-image: url('<?php the_post_thumbnail_url('medium') ?>'); ">
                    <span class="title"><?php the_title(); ?></span>
                </div>
            </a>
        </div>

    <?php
    endwhile;
    wp_reset_query();
	wp_reset_postdata();  

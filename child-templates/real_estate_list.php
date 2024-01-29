<?php
/**
 * Citiest list setup
 *
 * @package Understrap-child-1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
        <div class=" card">
            <img src="<?php the_post_thumbnail_url('medium') ?>" class="card-img-top" alt="<?php trim( strip_tags( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) ) ?>">
            <div class="card-body">
                <h5 class="card-title"><?php the_title();?></h5>
            </div>
                <div class="card-footer">
                <div class="paramets-objects">
                        <?php if(get_post_meta( get_the_ID(), 'total_area', true )): ?>
                        <span class="total_area">
                            <?php _e('Total: '); echo get_post_meta( get_the_ID(), 'total_area', true ); _e('m²') ?>
                        </span>
                        <?php endif; ?>
                        <?php if(get_post_meta( get_the_ID(), 'living_area', true )): ?>
                        <span class="living_area">
                            <?php _e('Living: '); echo get_post_meta( get_the_ID(), 'living_area', true ); _e('m²') ?>
                        </span>
                        <?php endif; ?>
                        <?php if(get_post_meta( get_the_ID(), 'floor', true )): ?>
                        <span class="floor">
                            <?php _e('Floor: '); echo get_post_meta( get_the_ID(), 'floor', true ); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e('Read more'); ?></a>
                    </div>
                </div>
        </div>

 <?php
  

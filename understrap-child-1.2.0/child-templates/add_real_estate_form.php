<?php
/*
Template Name: Submission page
*/
?>

            <form id ="add-real-estate" enctype="multipart/form-data">
                <div class="row ">
                <div class="col-12 col-sm-6 columns-form1">
                    <label for="real-estate" class="form-label"><?php _e('Title:'); ?> <span class="required-field"></span></label>
                    <input type="text" class="form-control" id="real-estate" name="real-estate" placeholder="<?php _e('Title of your proposal'); ?>" required>
                    
                    <label for="description" class="form-label"><?php _e('Description:'); ?><span class="required-field"></span></label>
                    <textarea id="description" name="description-text"  class="form-control" placeholder="Input your description"  required></textarea>

                    <label for="adress" class="form-label"><?php _e('Adress:'); ?> <span class="required-field"></span></label>
                    <input type="text" class="form-control" id="adress" name="adress" placeholder="<?php _e('Enter adress'); ?>" required>
                    
                    <label for="type_real_estate" class="form-label"><?php _e('Type:'); ?><span class="required-field"></span></label>
                    <div id="type_real_estate-selected"> 
                        <select id="type_real_estate" class="form-select" name="type_real_estate[]" multiple="multiple" required>
                            <?php $terms = get_terms( [
                                                'taxonomy' => 'type_real_estate',
                                                'hide_empty' => false,
                                        ]);
                                 foreach ($terms as $term) {
                                    echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
                                }
                            ?>
                        </select>


                        <div id="city-selector-block">
                        <div><label for="city" class="form-label"><?php _e('City:'); ?></label></div>
                        <select id="city" class="form-select" name="city">
                            <?php   $args = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'city',
                                        'post_status'  => 'publish',);
                                    $query = new WP_Query($args);
                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) : $query->the_post();
                                            echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';
                                        endwhile;
                                    } else {
                                        echo '<option value="null">'. __('Not found').'</option>';
                                    }
                            ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 columns-form2">
                    <div class="row" style="height: 100%;">
                        <div class="col-12">

                            <div>
                                <label for="_multi_img_array" class="form-label"><?php _e('Add all files here: '); ?></label>
                                <input type="file" id="_multi_img_array" name="_multi_img_array[]" multiple="multiple" > 
                            </div>

                            <label for="total_area" class="form-label"><?php _e('Total area: '); ?></label>
                            <input type="text" class="form-control" id="total_area" name ="total_area" placeholder="<?php _e('0 - 1000 m²'); ?>">

                            <label for="living_area" class="form-label"><?php _e('Living area: '); ?></label>
                            <input type="text" class="form-control" id="living_area" name ="living_area" placeholder="<?php _e('0 - 1000 m²'); ?>">

                            <label for="price" class="form-label"><?php _e('Price: '); ?></label>
                            <input type="text" class="form-control" id="price" name ="price" placeholder="<?php _e('$$$'); ?>">

                            <label for="floor" class="form-label"><?php _e('Floor: '); ?></label>
                            <input type="text" class="form-control" id="floor" name ="floor" placeholder="<?php _e('-100 - +100'); ?>">

                            <label for="email" class="form-label"><?php _e('Email address: '); ?><span class="required-field"></span></label>
                            <input type="email" class="form-control" id="email" name ="email" placeholder="johnsmith@gmail.com" required>
                            <div class="invalid-feedback"><?php _e('Email address is incorrect '); ?></div>

                        </div>
                        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end send-button">
                            <button type="submit" class="btn btn-primary" id="add-real-estate-form" ><?php _e('Submit real estate'); ?></button>
                            <div class="invalid-feedback"><?php _e('Error, please check the correctness of the entered data in the form'); ?></div>
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
<div class="modal fade" id="resultSendForm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="h2 title-modal"><?php _e('Success'); ?></p>
        <div class="modal-message"><?php _e('Your real estate has been successfully added'); ?><br>
                <?php _e('Your real estate will be added after moderation'); ?></div>
      </div>
      <div class="modal-footer">
        <a href="<?php echo get_home_url(); ?>"><button type="button" class="btn btn-blue" data-bs-dismiss="modal"><?php _e('Home'); ?></button></a>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?= get_stylesheet_directory_uri()?>/js/send-form.js"></script>

<?php 

/*Template Name: Location List */

get_header('projects'); 

?>
<div class="pagewrapper2">
<section class="modelhouses-list">

  <?php

  $location_page_id = 347;

  $args = array( 
        'child_of' => $location_page_id, 
        'parent' => $location_page_id,
        'depth' => 1 ,
        'sort_column' => 'post_title', 
        'sort_order' => 'asc',
        'posts_per_page' => '-1'
  );

  $location_loc = get_pages( $args );

  ?>

  <!-- METRO MANILA -->
  <section class="whatsnew margtop20">
        <h3>Metro Manila</h3>
        <div style="clear: both;"></div>
        <div class="carousel"
          data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2 }'>

          <?php

          foreach($location_loc as $l_loc)
          {
            $post_ID = $l_loc->ID;
            $location_name = $l_loc->post_title;

            $post_term = wp_get_post_terms($post_ID, 'location');
            foreach ($post_term as $term)
            {
              //echo $term->name;
              if($term->name == 'Metro Manila'){ ?>

                <div class="carousel-cell">
                  <a href="<?php echo get_permalink($post_ID); ?>">
                    <div class="propertythb">
                      <?php

                      $child_id = get_child_ID($post_ID);

                      $featured_image = get_field('location_image', $child_id);
                      
                      ?>
                    <?php //$featured_image = get_field('location_image', $post_ID);
                    if($featured_image == ''): ?>
                      <img src="<?php echo bloginfo('template_directory'); ?>/images/thumb.jpg">
                    <?php else: ?>
                      <img src="<?php echo $featured_image; ?>">
                    <?php endif; ?>
                    </div>
                    <h4><?php echo $location_name; ?></h4>
                  </a>
                </div>

              <?php }
                //echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
            }


          }

          ?>

        </div>
      </section>

      <!-- LUZON -->
      <section class="whatsnew">
        <h3>Luzon</h3>
        <div style="clear: both;"></div>
        <div class="carousel"
          data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2 }'>

          <?php

          foreach($location_loc as $l_loc)
          {
            $post_ID = $l_loc->ID;
            $location_name = $l_loc->post_title;

            $post_term = wp_get_post_terms($post_ID, 'location');
            foreach ($post_term as $term)
            {
              //echo $term->name;
              if($term->name == 'Luzon'){ ?>

                <div class="carousel-cell">
                  <a href="<?php echo get_permalink($post_ID); ?>">
                    <div class="propertythb">
                      <?php

                      $child_id = get_child_ID($post_ID);

                      $featured_image = get_field('location_image', $child_id);
                      
                      ?>

                    <?php //$featured_image = get_field('location_image', $post_ID);
                    if($featured_image == ''): ?>
                      <img src="<?php echo bloginfo('template_directory'); ?>/images/thumb.jpg">
                    <?php else: ?>
                      <img src="<?php echo $featured_image; ?>">
                    <?php endif; ?>
                    </div>
                    <h4><?php echo $location_name; ?></h4>
                  </a>
                </div>

              <?php }
                //echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
            }


          }

          ?>

        </div>
      </section>

      <!-- VISAYAS -->
      <section class="whatsnew">
        <h3>Visayas</h3>
        <div style="clear: both;"></div>
        <div class="carousel"
          data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2 }'>

          <?php

          foreach($location_loc as $l_loc)
          {
            $post_ID = $l_loc->ID;
            $location_name = $l_loc->post_title;

            $post_term = wp_get_post_terms($post_ID, 'location');
            foreach ($post_term as $term)
            {
              //echo $term->name;
              if($term->name == 'Visayas'){ ?>

                <div class="carousel-cell">
                  <a href="<?php echo get_permalink($post_ID); ?>">
                    <div class="propertythb">
                      <?php

                      $child_id = get_child_ID($post_ID);

                      $featured_image = get_field('location_image', $child_id);
                      
                      ?>

                    <?php //$featured_image = get_field('location_image', $post_ID);
                    if($featured_image == ''): ?>
                      <img src="<?php echo bloginfo('template_directory'); ?>/images/thumb.jpg">
                    <?php else: ?>
                      <img src="<?php echo $featured_image; ?>">
                    <?php endif; ?>
                    </div>
                    <h4><?php echo $location_name; ?></h4>
                  </a>
                </div>

              <?php }
                //echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
            }


          }

          ?>

        </div>
      </section>

      <!-- MINDANAO -->
      <section class="whatsnew">
        <h3>Mindanao</h3>
        <div style="clear: both;"></div>
        <div class="carousel"
          data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2 }'>

          <?php

          foreach($location_loc as $l_loc)
          {
            $post_ID = $l_loc->ID;
            $location_name = $l_loc->post_title;

            $post_term = wp_get_post_terms($post_ID, 'location');
            foreach ($post_term as $term)
            {
              //echo $term->name;
              if($term->name == 'Mindanao'){ ?>

                <div class="carousel-cell">
                  <a href="<?php echo get_permalink($post_ID); ?>">
                    <div class="propertythb">
                      <?php

                      $child_id = get_child_ID($post_ID);
                      
                      $featured_image = get_field('location_image', $child_id);
                      ?>

                    <?php //$featured_image = get_field('location_image', $post_ID);
                    if($featured_image == ''): ?>
                      <img src="<?php echo bloginfo('template_directory'); ?>/images/thumb.jpg">
                    <?php else: ?>
                      <img src="<?php echo $featured_image; ?>">
                    <?php endif; ?>
                    </div>
                    <h4><?php echo $location_name; ?></h4>
                  </a>
                </div>

              <?php }
                //echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
            }


          }

          ?>

        </div>
      </section>

      
      </section>
      </div>

<?php get_footer('projects'); ?>
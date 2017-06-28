<?php 

/*Template Name: Model Houses */

get_header('projects'); 

?>

<section class="modelhouses-list">

  <?php 
  // $house_lot_type = $_GET['house_lot_type'];
  // if(isset($house_lot_type) && $house_lot_type != '')
  //   $term = $house_lot_type;
  // else
  //   $term = 'house-and-lot';

  $args = array('post_type' => 'model_houses', 'posts_per_page' => '-1', 'tax_query' => array(
            // array(
            //     'taxonomy' => 'project_type',
            //     'field' => 'slug',
            //     'terms' =>  $term,
            // ),
        ),
     );

  $loop = new WP_Query($args);

  while($loop->have_posts()) : $loop->the_post();
        
            $page_id = get_the_ID();

            //$unit_types = get_field('unit_types', $page_id);
            //print_r($unit_types);
            //foreach ($unit_types as $type) {  ?>

              <div class="modelhouse">
          <div class="pagewrapper3">
            <article>
              <div class="model-overview">
                <h3><?php the_title(); ?></h3>

                <hr>

                <?php the_content(); ?>

                <p class="btnfull"><a href="<?php echo get_field('floor_plan_image'); ?>" class="image-link">Floor Plan</a></p>
              </div>
              <aside>
                <?php $featured_image = get_field('model_house_image');
                if($featured_image == ''): ?>
                  <img src="<?php echo bloginfo('template_directory'); ?>/images/featured-default.jpg">
                <?php else: ?>
                  <a href="<?php echo  $featured_image; ?>" class="image-link">
                  <img src="<?php echo $featured_image; ?>">
                </a>
                <?php endif; ?>
              </aside>
            </article>
          </div>
        </div>

            <?php
            //}
        endwhile;

     ?>

      </section>

<?php get_footer('projects'); ?>
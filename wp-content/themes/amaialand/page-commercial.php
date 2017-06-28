<?php 

/*Template Name: Commercial */

get_header('projects'); 

?>

<section class="modelhouses-list">

<div class="pagewrapper3 pagetitle">
<!-- <h1>Affordable Commercial Spaces for lease in the Philippines</h1> -->
<h1>Affordable Commercial Spaces for lease in the Philippines</h1> 
<h2>Rate starts from <?php the_field('lowest_price');?></h2>
<p><?php the_field('intro'); ?></p>
</div>

  <?php $args = array('post_type' => 'page', 'posts_per_page' => '-1', 'tax_query' => array(
            array(
                'taxonomy' => 'project_type',
                'field' => 'slug',
                'terms' =>  'shophouse-development',
            ),
        ),
     );

  $loop = new WP_Query($args);

  while($loop->have_posts()) : $loop->the_post();
        
            $page_id = get_the_ID();

            ?>

            <div class="modelhouse">
          <div class="pagewrapper3">
            <article>
              <div class="model-overview">
                <h3><a href="<?php echo get_permalink($page_id); ?>" ><?php the_title(); ?></a></h3>
                <hr>
                <h4><?php the_field('tagline',$page_id); ?></h4>
                <p><?php the_field('short_description',$page_id); ?></p>
                <ul>
                  <li><label>Price Range:</label><?php the_field('price_range',$page_id); ?></li>
                  <li><label>Unit Sizes:</label><?php the_field('unit_sizes',$page_id); ?></li>
                </ul>
                <p class="btnfull"><a href="<?php echo get_permalink($page_id); ?>" >View Details</a></p>
              </div>
              <aside>
                <?php $featured_image = get_field('list_image', $page_id);
                if($featured_image == ''): ?>
                  <img src="<?php echo bloginfo('template_directory'); ?>/images/image3-01.jpg">
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
            
        endwhile;

     ?>
      </section>

<?php get_footer('projects'); ?>
<?php 

/*Template Name: Condo */

get_header('projects'); 

?>

<section class="modelhouses-list">

<div class="pagewrapper3 pagetitle">
<h1>Affordable Condominiums in the Philippines</h1>
<p><?php the_field('intro'); ?></p>
</div>
  <?php

  $condo_page_id = 4;

  $args = array( 
        'child_of' => $condo_page_id, 
        'parent' => $condo_page_id,
        'depth' => 1 ,
        'sort_column' => 'post_title', 
        'sort_order' => 'asc',
        'posts_per_page' => '-1'
  );

  $mypages = get_pages( $args );

  ?>
  
  <!--<select name="location">
  
  <?php
  foreach( $mypages as $page_loc )
  {
    echo '<option value="'.$page_loc->post_title.'">'.$page_loc->post_title.'</option>';
  }

  ?>
  </select>-->

  <?php $args = array('post_type' => 'page', 'posts_per_page' => '-1', 'orderby' => 'post_title', 'order' => 'ASC','tax_query' => array(
            array(
                'taxonomy' => 'project_type',
                'field' => 'slug',
                'terms' =>  'condo',
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
                <p class="btnfull"><?php the_field('short_description',$page_id); ?></p>
                <ul>
                  <li><label>Price Range:</label><?php the_field('price_range',$page_id); ?></li>
                  <li><label>Unit Sizes:</label><?php the_field('unit_sizes',$page_id); ?></li>
                </ul>
                <p class="btnfull"><a href="<?php echo get_permalink($page_id); ?>" >View Details</a></p>
              </div>
              <aside>
                <a href="<?php echo get_field('list_image', $page_id); ?>" class="image-link"><img src="<?php echo get_field('list_image', $page_id); ?>"></a>
              </aside>
            </article>
          </div>
        </div>
              

            <?php
            
        endwhile;

     ?>
      </section>

<?php get_footer(); ?>
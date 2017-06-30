<?php

/*Template Name: Condo Location */

get_header('projects');

?>

<section class="modelhouses-list">

  <div class="pagewrapper3 pagetitle">
    <?php  $location = get_the_title(get_the_ID());
    $get_var = return_condo_type(get_the_ID()); # This function can be found in nav.php
     ?>
    <h1>Affordable
      <?php if($get_var == '?type=m')
      echo "Mid-Rise";
      elseif($get_var == '?type=h')
      echo "High-Rise";
      elseif ($get_var == '')
      echo "Mid-Rise and High-Rise";
      ?>
      Condominiums in <?php echo $location; ?></h1>
      <h2>Rate starts from <?php the_field('lowest_price');?></h2>
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

<?php $args = array('post_type' => 'page', 'posts_per_page' => '-1', 'orderby' => 'post_title', 'order' => 'ASC', 'post_parent' => get_the_ID()
);

$loop = new WP_Query($args);

while($loop->have_posts()) : $loop->the_post();

$page_id = get_the_ID();

$args = array('hide_empty'=>false);

$terms = wp_get_post_terms( $page_id, 'project_type' ,$args );
foreach($terms as $term){
  /**
   * Skip condo slug because it's a parent slug, it's redundant and makes our items duplicate!
   */
  if($term->slug == 'condo')
  continue;
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

} # end foreach

?>

<?php

endwhile;

?>
</section>

<?php get_footer('projects'); ?>

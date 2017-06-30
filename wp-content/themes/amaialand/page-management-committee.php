<?php get_header(); ?>

<section class="financing-header" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) no-repeat center center; background-size: cover">
  <div class="header-title">
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section class="content">
  <div class="pagewrapper2">
    <h3>Management Committee</h3>
    <div class="content2col">
      <article>
        <p><?php the_content(); ?></p>
      </article>

      <article>
        <ul>
          <?php if( have_rows('management') ): while ( have_rows('management') ) : the_row(); ?>
            <li>
              <p><?php echo get_sub_field('name'); ?></p>
              <p><?php echo get_sub_field('position'); ?></p>
              <p><img src="<?php echo get_sub_field('image'); ?>"></p>
            </li>
          <?php endwhile; else : endif; ?>
          </ul>
        </article>

        <aside>
          <img src="<?php //echo get_the_post_thumbnail_url(22); ?>">
          <h4>Company Profile</h4>
          <p><a href="<?php the_permalink(22); ?>">Read More</a></p>
          <br>
          <img src="<?php //echo get_the_post_thumbnail_url(2); ?>">
          <h4>Vision Mission</h4>
          <p><a href="<?php the_permalink(2); ?>">Read More</a></p>
        </aside>
      </div>
    </div>
  </section>

  <!-- Latest Articles -->
  <section class="whatsnew projectsnearby">
    <h3 style="float:left;">Latest Articles <a href="<?php the_permalink(2000); ?>">See All</a></h3>

    <div style="clear: both;"></div>

    <aside class="coverleft"></aside>
    <aside class="coverright"></aside>
    <div class="carousel"
    data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2 }'>

    <?php

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


    $args = array( 'post_type' => 'news_and_events', 'posts_per_page' => '-1', 'paged' => $paged,  'orderby' => 'post_date', 'order' => 'DESC' ,
    'tax_query' => array(
      array(
        'taxonomy' => 'news_events_cat',
        'field' => 'slug',
        'terms' =>  'blog',
      )
    ) );

    $loopb = new WP_Query( $args );

    if($loopb->have_posts()){

      while ( $loopb->have_posts() ) : $loopb->the_post();

      ?>

      <div class="carousel-cell">
        <a href="<?php the_permalink(); ?>">
          <div class="propertythb">
            <?php $featured_image = get_the_post_thumbnail_url();
            if($featured_image == ''): ?>
            <img src="<?php echo bloginfo('template_directory'); ?>/images/image1-01.jpg">
          <?php else: ?>
            <img src="<?php echo $featured_image; ?>">
          <?php endif; ?>
        </div>
        <h4><?php the_title(); ?></h4>
        <!--<p>Read More ></p>-->
      </a>
    </div>

  <?php endwhile;
}
?>
</div>
</section>
<!-- Latest Articles -->

<?php get_footer(); ?>

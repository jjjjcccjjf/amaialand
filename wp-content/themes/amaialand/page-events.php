<?php get_header(); ?>

 <!-- Updates -->
      <section class="updates-events newslist">
        <div class="pagewrapper2">
          <article>
            <h3>Events</h3>
            <ul>

              <?php
          
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    
          $args = array( 'post_type' => 'news_and_events', 'posts_per_page' => '9', 'paged' => $paged,  'orderby' => 'post_date', 'order' => 'DESC' ,
          'tax_query' => array(
                  array(
                      'taxonomy' => 'news_events_cat',
                      'field' => 'slug',
                      'terms' =>  'events',
                  )
                  ) );
          
          $loopb = new WP_Query( $args );
        
          if($loopb->have_posts()){ 

          while ( $loopb->have_posts() ) : $loopb->the_post(); 

          ?>
                
                <li>    
                  <a href="<?php echo get_permalink();?>">
                    <div class="propertythb">
                      <?php $featured_image = get_the_post_thumbnail_url();
                      if($featured_image == ''): ?>
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/news-default.jpg">
                      <?php else: ?>
                        <img src="<?php echo $featured_image; ?>">
                      <?php endif; ?>
                    </div>
                    <p><?php the_title(); ?></p>
                  </a>
                </li>

              <?php endwhile;

          } ?>

            </ul>

            <div class="pagenumber">
            <?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
               'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
               'format' => '?paged=%#%',
               'current' => max( 1, get_query_var('paged') ),
               'total' => $loopb->max_num_pages
            ) );
            ?>
            </div>

          </article>
        </div>
      </section>
      <!-- Updates -->

<?php get_footer(); ?>
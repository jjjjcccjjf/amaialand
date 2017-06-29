<?php

/* Template Name: Home */

get_header(); ?>

    <?php if(get_field('change_background_to_slider') != 1): ?>
      <section class="homefeat" style="background: url(<?php the_field('featured_photo');?>) no-repeat center top fixed; background-size: cover;">
        <div class="wrapper">
          <div class="propertysearch-home">
            <h2>PROPERTY FINDER<span>Find exactly what you are looking for</span></h2>
            <ul>
              <form method="get" action="<?php the_permalink(484); ?>">
              <li>
                <select name="ptype">
                  <option disabled selected value="">Project Type</option>
                  <?php $proj_type = get_terms(array('taxonomy'=>'project_type','hide_empty'=>false));
                  foreach ($proj_type as $type) {
                    echo '<option value="'.$type->term_id.'">'.$type->name.'</option>';
                  }?>
                </select>
              </li>
              <li>
                <select name="pprice">
                  <option disabled selected value="">Price Range</option>
                  <?php /*$price_range = get_terms(array('taxonomy'=>'price_range','hide_empty'=>false));
                  foreach ($price_range as $price) {
                    echo '<option value="'.$price->term_id.'">'.$price->name.'</option>';
                  }*/
                  home_searchTaxonomyOptions('price_range');?>
                </select>
              </li>
              <li>


                <select name="ploc" id="ploc">
                  <option disabled selected value="">Location</option>
                  <?php $location = get_terms(array('taxonomy'=>'location','hide_empty'=>false));
                  foreach ($location as $loc) {
                    if($loc->parent != 0)
                      echo '<option value="'.$loc->term_id.'">'.$loc->name.'</option>';
                  }?>
                </select>

              </li>
              <li>
                <input type="checkbox" name="rfo" id= "rfo" value="1" onclick="check_loc_with_rfo(this.value);"> <label>Ready for Occupancy</label>
              </li>
              <li><input type="submit" name="find" value=""></li>
            </form>
            </ul>
          </div>
        </div>
      </section>
    <?php elseif(get_field('change_background_to_slider') == 1): ?>
    <section class="homefeatslider">

      <!-- <div class="rslides_container"> -->
          <ul class="rslides" id="rslides">
              <?php

              $sliders = get_field('slider_photos');

              foreach($sliders as $slider) {

              ?>
              <li>
                  <a href="<?php echo $slider['page_link']; ?>">
                    <img src="<?php echo $slider['photo']; ?>">
                  </a>
              </li>

              <?php } ?>
          </ul>
      <!-- </div> -->
      <div class="absdiv">
          <div class="wrapper">
            <div class="propertysearch-home">
              <h2>PROPERTY FINDER<span>Find exactly what you are looking for</span></h2>
              <ul>
                <form method="get" action="<?php the_permalink(484); ?>">
                <li>
                  <select name="ptype">
                    <option disabled selected value="">Project Type</option>
                    <?php $proj_type = get_terms(array('taxonomy'=>'project_type','hide_empty'=>false));
                    foreach ($proj_type as $type) {
                      echo '<option value="'.$type->term_id.'">'.$type->name.'</option>';
                    }?>
                  </select>
                </li>
                <li>
                  <select name="pprice">
                    <option disabled selected value="">Price Range</option>
                    <?php /*$price_range = get_terms(array('taxonomy'=>'price_range','hide_empty'=>false));
                    foreach ($price_range as $price) {
                      echo '<option value="'.$price->term_id.'">'.$price->name.'</option>';
                    }*/
                    home_searchTaxonomyOptions('price_range'); ?>
                  </select>
                </li>
                <li>


                  <select name="ploc" id="ploc">
                    <option disabled selected value="">Location</option>
                    <?php $location = get_terms(array('taxonomy'=>'location','hide_empty'=>false));
                    foreach ($location as $loc) {
                      if($loc->parent != 0)
                        echo '<option value="'.$loc->term_id.'">'.$loc->name.'</option>';
                    }?>
                  </select>

                </li>
                <li>
                  <input type="checkbox" name="rfo" id= "rfo" value="1" onclick="check_loc_with_rfo(this.value);"> <label>Ready for Occupancy</label>
                </li>
                <li><input type="submit" name="find" value=""></li>
              </form>
              </ul>
            </div>
          </div>
        </div>
    </section>
    <?php endif; ?>


      <section class="whatsnew">
        <h3 style="float:left;"><span>Don't Miss</span> What's New on Amaia<a href="<?php the_permalink(1930); ?>">View All</a></h3>
         <!-- <aside class="coverleft"></aside>
          <aside class="coverright"></aside>-->

          <div style="clear: both;"></div>
        <div class="carousel"
          data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2 }'>

          <?php

          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


          $args = array( 'post_type' => 'news_and_events', 'posts_per_page' => '8', 'paged' => $paged,  'orderby' => 'post_date', 'order' => 'DESC' );

          $loopb = new WP_Query( $args );

          if($loopb->have_posts()){

          while ( $loopb->have_posts() ) : $loopb->the_post();

          ?>

          <div class="carousel-cell">
            <a href="<?php the_permalink(); ?>">
              <div class="propertythb">
                <?php $featured_image = get_the_post_thumbnail_url();
                if($featured_image == ''): ?>
                  <img src="<?php echo bloginfo('template_directory'); ?>/images/news-default.jpg">
                <?php else: ?>
                  <img src="<?php echo $featured_image; ?>">
                <?php endif; ?>
              </div>
              <h4><?php the_title(); ?></h4>
            </a>
          </div>

        <?php endwhile;

      }

      wp_reset_query(); ?>

        </div>
      </section>

      <section class="explore">
        <h2><span>Explore</span> Our Neighborhoods</h2>
        <h4>NEIGHBORHOODS</h4>
          <div id="tabs">
            <ul id="tabs_ul">

              <?php

              $location_page_id = 347;
              $cnt = 1 ;

              $args = array(
                    'child_of' => $location_page_id,
                    'parent' => $location_page_id,
                    'depth' => 1 ,
                    'sort_column' => 'post_title',
                    'sort_order' => 'asc',
                    'posts_per_page' => '-1',

              );

              // 'tax_query' => array(
              //         array('taxonomy' => 'location',
              //           'field' => 'slug',
              //           'terms'=> array('luzon','metro-manila'),
              //           )
              //         )

              $location_loc = get_pages( $args );
              $show_guide = array();
                foreach($location_loc as $l_loc)
                {

                  if(get_field('disable_in_homepage',$l_loc->ID) != 1 )
                    array_push($show_guide,$l_loc->ID);
                }

                ?>
                <?php foreach ($show_guide as $guide_id) { ?>
                    <li id="li_fragment_<?php echo $cnt; ?>"><a href="#fragment-<?php echo $cnt; ?>"><?php echo get_the_title($guide_id); ?></a></li>
                <?php $cnt++; } ?>

            </ul>
            <section class="content">

              <?php

              $cnt = 1 ;

              foreach ($show_guide as $guide_id) { ?>
                  <div id="fragment-<?php echo $cnt; ?>" class="ui-tabs-panel">
                    <article>
                      <h4><?php echo get_the_title($guide_id); ?></h4>
                      <p><?php echo get_field('short_description', $guide_id); ?></p>
                      <p><a href="<?php echo get_permalink($guide_id); ?>">More info >></a></p>
                    </article>
                    <aside>
                      <?php $location_img = get_field('location_image', $guide_id);
                      if($location_img == ''): ?>
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/image2-01.jpg">
                      <?php else: ?>
                        <img src="<?php echo $location_img; ?>">
                      <?php endif; ?>
                    </aside>
                    <section>
                      <h4>Projects in <?php echo get_the_title($guide_id); ?></h4>
                      <ul>
                      <?php $projects_nearby = get_field('nearby_projects',$guide_id);

                       foreach ($projects_nearby as $proj) {
                      ?>

                        <li>
                          <a href="<?php echo get_permalink($proj->ID);?>">
                            <!-- <img src="<?php echo get_the_post_thumbnail_url($proj->ID); ?>"> -->
                            <?php $featured_image = get_the_post_thumbnail_url($proj->ID);
                            if($featured_image == ''): ?>
                              <img src="<?php echo bloginfo('template_directory'); ?>/images/image2-01.jpg">
                            <?php else: ?>
                              <img src="<?php echo $featured_image; ?>">
                            <?php endif; ?>
                            <h5><?php echo get_the_title($proj->ID); ?></h5>
                          </a>
                        </li>
                      <?php
                      }?>

                      </ul>
                    </section>
                  </div>
                  <?php $cnt++;
                }
              ?>

            </section>
        </div>
      </section>

      <?php get_footer(); ?>

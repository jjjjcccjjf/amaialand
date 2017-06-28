<?php

/*Template Name: Guide */

get_header('projects');

$loc_page_id = get_the_ID();

global $post;
$parent_title = get_the_title($post->post_parent);

?>

<section class="locationfeat" style="background: url(
<?php $bg = get_field('background_image');
if($bg == ''): 
  echo bloginfo('template_directory').'/images/image2-01.jpg';
else:
  echo $bg;
endif;
?>
) no-repeat center center; background-size: cover">
        <h1><?php the_title(); ?></h1>
        <h2><?php the_field('short_description'); ?></h2>
        <ul>
        	<?php $specialties = get_field('specialties');
            	foreach ($specialties as $specialty) {  ?>
	          		<li><?php echo $specialty['specialty']; ?></li>
	            <?php } ?>
        </ul>
      </section>

       <div class="credits"><?php echo get_field('hero_image_credits'); ?></div>

      <!-- Location Overview -->
      <?php if(get_field('show_overview') == 1): ?>
        <section class="location-overview">
          <div class="pagewrapper2">
            <article>
              
              <?php the_content(); ?>

              <!-- <p><a href="#">Explore <?php the_title(); ?></a></p> -->
            </article>

            <aside>
              <h4>Projects in <?php echo $parent_title; ?></h4>
              <div class="projects-gallery" data-flickity='{ "wrapAround": true }'>
              <?php  
              $projects_nearby = get_field('nearby_projects',$loc_page_id); 
                       //print_r($projects_nearby); 
                       foreach ($projects_nearby as $proj) {

              ?>

              <div class="carousel-cell">
                <a href="<?php echo get_permalink($proj->ID); ?>">
                  <div class="project-logo">
                    <?php if(get_field('project_logo',$proj->ID) != ''): ?>
                      <img src="<?php echo get_field('project_logo',$proj->ID); ?>">
                    <?php endif; ?>
                  </div>
                  <div class="propertythb">                  
                  <?php $featured_image = get_field('list_image',$proj->ID);
                  if($featured_image == ''): ?>
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/image1-01.jpg">
                  <?php else: ?>
                    <img src="<?php echo $featured_image; ?>">
                  <?php endif; ?>
                  </div>
                </a>
              </div>

              <?php } 

              wp_reset_query();

              ?>

            </div>
            </aside>
          </div>
        </section>
      <?php endif; ?>
        <!-- Location Overview -->

      <!-- Location Map -->
      <?php if(get_field('show_map') == 1): ?>
      <section class="location-map">
        <div class="pagewrapper2">
          
          <div class="landmarks">
            <h2>On the Map</h2>
            <p><?php the_field('map_intro_text'); ?></p>
            <div id="landmark-list">  
               <iframe src="<?php the_field('full_map'); ?>" frameborder="0" style="width: 100%; height: 450px;"></iframe> 
                <!--<div class="resp-tabs-container hor_1">    
                    <div>
                      <div class="google-maps">
                        <iframe src="http://betaprojex.com/amaia_new/wp-content/themes/amaialand/mapbox.php/?amaia_branch=<?php echo $parent_title; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                      </div>
                </div>-->
            </div>    
          </div>
        </div>
      </section>
    <?php endif; ?>
      <!-- Project Location -->

      <!-- About Location -->
      <?php if(get_field('show_photos') == 1): ?>
      <section class="about-location">
        <div class="pagewrapper2">
          <h2><?php the_field('intro'); ?></h2>
          <?php $photos = get_field('photos');
            	foreach ($photos as $photo) {  ?>

            		<p><img src="<?php echo $photo['photo']; ?>"></p>
          			<p><?php echo $photo['caption']; ?></p>

          <?php } ?>
          
        </div>
      </section>
    <?php endif; ?>
      <!-- About Location -->

      <!-- Testimonials -->
      <?php if(get_field('show_testimonials') == 1): ?>
      <section class="testimonials">
        <div class="pagewrapper2">
        	<?php
              
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
              $args = array( 'post_type' => 'testimonials', 'posts_per_page' => '1', 'paged' => $paged,  'orderby' => 'rand', 'order' => 'DESC');
    
              $loopb = new WP_Query( $args );

              if($loopb->have_posts()){ 

                while ( $loopb->have_posts() ) : $loopb->the_post(); 

                $locations = get_field('location_guide');
                
                foreach ($locations as $loc) {
                  
                  //echo '<br/>';
                  //echo $loc->ID;
                	if($loc->ID == $loc_page_id){

                ?>

		          <aside>
		            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
		          </aside>
		          <article>
		            <p><?php the_content(); ?></p>
		            <h4><span><?php the_title(); ?></span></h4>
		            <h6>Amaia Resident</h6>
		          </article>

		      <?php }
		  }
		  endwhile; 
		  } 
		  wp_reset_query();

		  ?>

        </div>
      </section>
    <?php endif; ?>
      <!-- Testimonials -->

      <!-- Things to do -->
      <?php if(get_field('show_discover_things') == 1): ?>
      <section class="things-to-do">
        <h3><span>Discover</span> Things to Do</h3>
       
        <div class="discover"
          data-flickity='{ "contain": true, "adaptiveHeight": true }'>

          <?php
              
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
              $args = array( 'post_type' => 'discover_things', 'posts_per_page' => '-1', 'paged' => $paged,  'orderby' => 'post_title', 'order' => 'DESC');
    
              $loopb = new WP_Query( $args );

              if($loopb->have_posts()){ 

                while ( $loopb->have_posts() ) : $loopb->the_post(); 

                if(get_field('location_guide') != '')
                  $locations = get_field('location_guide');
                
                foreach ($locations as $loc) {

                	if($loc->ID == $loc_page_id){

                ?>

		          <div class="carousel-cell">
		            
		              <div class="propertythb">
		              <?php $featured_image = get_the_post_thumbnail_url();
                  if($featured_image == ''): ?>
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/thumb.jpg">
                  <?php else: ?>
                    <img src="<?php echo $featured_image; ?>">
                  <?php endif; ?>
		              </div>
		              <h4><?php the_title(); ?></h4>
		              <p><?php the_excerpt(); ?></p>
		              <h6><?php echo get_field('photo_credit'); ?></h6>
		          </div>

      			<?php }
      		}
      		endwhile;
  			} 

  			wp_reset_query();?>

        </div>
      </section>
    <?php endif; ?>
      <!-- Things to do -->

      <!-- Properties -->
      <?php //if(get_field('show_discover_things') == 1): ?>
      <section class="whatsnew projectsnearby">
        <h3 style="color:white;">Amaia Properties in <?php echo $parent_title; ?></h3>
        <div style="clear: both;"></div>
        <aside class="coverleft"></aside>
        <aside class="coverright"></aside>
        <div class="carousel"
          data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2}'>

          <?php $amaia_properties = get_field('amaia_properties'); 
                        
                       foreach ($amaia_properties as $proj) {
                      ?>
                      
                <div class="carousel-cell">
                    <a href="<?php echo get_permalink($proj->ID); ?>">
                    <div class="propertythb">
                      
                    <?php $featured_image = get_the_post_thumbnail_url($proj->ID);
                    if($featured_image == ''): ?>
                      <img src="<?php echo bloginfo('template_directory'); ?>/images/thumb.jpg">
                    <?php else: ?>
                      <img src="<?php echo $featured_image; ?>">
                    <?php endif; ?>
                    </div>
                    <h4><?php echo get_the_title($proj->ID); ?></h4>

                    <!-- <p><?php the_excerpt(); ?></p> -->
                    </a>
                </div>
              
            <?php }

        wp_reset_query();?>

        </div>
      </section>
    <?php //endif; ?>
      <!-- Properties -->
      
<?php get_footer('projects'); ?>
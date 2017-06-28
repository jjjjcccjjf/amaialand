<?php 

/* Template Name: Old Projects Template */

get_header('projects'); 

?>

<section class="projectfeat" style="background: url(<?php the_field('background_image'); ?>) no-repeat center center fixed; background-size: cover">
        <h1><?php the_title(); ?></h1>
        <!-- P1.4 - 2.9 M -->
        <h2><?php the_field('price_range'); ?>

          <?php //$price = wp_get_post_terms( get_the_ID(), 'price_range', array("fields" => "names") ); echo $price[0];  ?><br>
            
            <?php $ptype = wp_get_post_terms( get_the_ID(), 'project_type', array("fields" => "names") ); 

            //print_r($ptype);

             echo $ptype[1];
            ?>

            in

            <?php 

            $parent_loc_id = wp_get_post_parent_id(get_the_ID()); print_r($loc); 

            $parent_post = get_post($parent_loc_id);
            
            $parent_loc_title =   $parent_post->post_title;

            echo $parent_loc_title;

            ?>

            
        </h2>
        <p><a href="http://askamie.amaialand.com/" target="_blank">Inquire about this property</a></p>
      </section>

      <div class="pagewrapper2">
      <!-- Project Overview -->
        <section class="overview" id="overview">
          <article>
            <h3>Master Plan &amp; Concept 
              <?php if(get_field('pag-ibig_accredited') == 1){ ?>
              <span class="pagibig">Pag-ibig Accredited</span>
              <?php } if(get_field('ready_for_occupation') == 1){ ?> 
              <span class="rfo">Ready for Occupancy</span>
              <?php } ?>
            </h3>
            <?php the_field('overview_description'); ?>
            <ul>
            <?php $project_details = get_field('project_details');
            	foreach ($project_details as $proj_details) {   
            		if($proj_details['enable'] == 1): ?>
            		
              			<li><label><?php echo $proj_details['name']; ?></label> <?php echo $proj_details['content']; ?></li>
              
            <?php endif; } ?> 
            </ul> 
          </article>

          <aside>
            <div class="project-logo"><img src="<?php the_field('project_logo'); ?>"></div>
            <div class="project-img">
              <img src="<?php the_field('project_image'); ?>">
              <ul>
              <?php $project_launch = get_field('project_launch');
            	foreach ($project_launch as $proj_launch) { ?>
            		
              		<li><label><?php echo $proj_launch['title']; ?></label> <span><?php echo $proj_launch['content']; ?></span></li>
              
              <?php } ?> 
                
                
              </ul>
            </div>
          </aside>
        </section>
        <!-- Project Overview -->

        <!-- Payment Terms -->
        <?php if(get_field('enable_payment_terms_div') == 1 ): ?>
        <section class="payment-terms" id="payment">
          <h3>Payment Terms Available</h3>
          <ul>
          <?php $payment_terms = get_field('payment_terms');
            	foreach ($payment_terms as $pay_terms) { ?>
            <li>
              <h5><?php echo $pay_terms['payment_term']; ?></h5>
              <p><?php echo $pay_terms['description']; ?></p>
            </li>
            <?php } ?>
          </ul>
        </section>
      <?php endif; ?>
        <!-- Payment Terms -->

        <!-- Site Development Plan -->
        <?php if(get_field('enable_site_development_plan_div') == 1 ): ?>
          <section class="sitedev">
            <h3>Site Development Plan</h3>
            <a href="<?php echo get_field('site_development_plan'); ?>"><img src="<?php the_field('site_development_plan'); ?>"></a>
            <p><a href="<?php echo get_field('site_development_plan'); ?>" target="_blank">Download</a></p>
          </section>
        <?php endif; ?>
        <!-- Site Development Plan -->
      </div>

      <!-- Project Location -->
      <section class="project-location" id="location">
        <div class="pagewrapper2">
          <div class="location-details">
            <article>
              <h3>Location</h3>
              <?php the_field('location_description');?>
              <p class="margtop20"><a href="#">Discover <?php echo $parent_loc_title; ?></a></p>
            </article>
            <aside>
              <a href="<?php echo get_field('location_image'); ?>" class="image-link"><img src="<?php the_field('location_image'); ?>"></a>
              <p>Location &amp; Vicinity Map</p>
            </aside>
          </div>
          
          <div class="landmarks">
            <!--<div id="landmark-list"> 
                <div class="resp-tabs-container hor_1">    
                    <div>
                      <div class="google-maps">
                        <iframe src="http://betaprojex.com/amaia_new/wp-content/themes/amaialand/mapbox.php/?amaia_branch=<?php echo $parent_loc_title; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                      </div>
                    </div>
                </div>
            </div> -->
            <iframe src="<?php the_field('location_mapbox'); ?>" frameborder="0" style="width: 100%; height: 450px;"></iframe>   
          </div> 
        </div>
      </section>
      <!-- Project Location -->

      <!-- Amenities -->
      <section class="amenities" id="facilities">
        <div class="pagewrapper2">
          <article>
            <h3>Amenities</h3>
            <p><?php the_field('facilities_&_amenities_description'); ?></p>
            <!--<h5>Amenities</h5>-->
            <?php the_field('amenities'); ?>
          </article>
          <aside>
            <div class="amenities-gallery"
          data-flickity='{ "wrapAround": true }'>

          		<?php $slider_images = get_field('slider_images'); 
          		foreach ($slider_images as $image) { ?>
          			
              <div class="carousel-cell">
                <a href="<?php echo $image['photos']; ?>" class="image-link">
                  <div class="propertythb">
                  <!-- <img src="<?php echo $image['photos']; ?>"> -->
                  <?php $featured_image = $image['photos'];
                  if($featured_image == ''): ?>
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/image1-01.jpg">
                  <?php else: ?>
                    <img src="<?php echo $featured_image; ?>">
                  <?php endif; ?>
                  </div>
                  <h4><?php echo $image['caption']; ?></h4>
                </a>
              </div>
              <?php } ?>

            </div>
          </aside>
        </div>
      </section>
      <!-- Amenities -->

      <!-- Unit & Floor Plans -->
      <section class="floorplans" id="unit">
        <div class="pagewrapper2">
          <h3>Units &amp; Floor Plans</h3>
          <div id="unitplans">  
            <div class="margauto">
              <ul class="resp-tabs-list plans">
                <?php $unit_types = get_field('unit_types');
                foreach ($unit_types as $types) { ?>
                
                <li><?php echo $types['utype'];?></li>
                
                <?php } ?>
              </ul>
            </div>

            <div class="resp-tabs-container plans">
            <?php $unit_types = get_field('unit_types');
                foreach ($unit_types as $types) { ?>    
              <div>
                <aside>
                  <h4><?php echo $types['floor_plan_title']; ?></h4>
                  <?php echo $types['details']; ?>
                </aside>
                <article>
                  <img src="<?php echo $types['floor_plan_image']; ?>">
                </article>
              </div>

              <?php } ?>
            </div>

          </div>
        </div>
      </section>
      <!-- Unit & Floor Plans -->

      <!-- Gallery -->
      <section class="project-gallery">
        <div class="pagewrapper2">
          <h3>Gallery</h3>
          <div id="gallery"> 
            <ul class="resp-tabs-list gall">
              <li>Photos</li>
              <li>360&deg; Tour</li>
              <li>Videos</li>
            </ul>
            <div class="resp-tabs-container gall">    
              <div>
                <div class="project-photos" data-flickity='{ "wrapAround": true }'>
                  <?php $photos = get_field('photos'); 
                  foreach ($photos as $photo) { ?>
                  
                  <div class="carousel-cell">
                    <a href="<?php echo $photo['photos']; ?>" class="image-link">
                      <div class="propertythb">
                      <!-- <img src="<?php echo $photo['photos']; ?>"> -->
                      <?php $featured_image = $photo['photos'];
                      if($featured_image == ''): ?>
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/image1-01.jpg">
                      <?php else: ?>
                        <img src="<?php echo $featured_image; ?>">
                      <?php endif; ?>
                      </div>
                      <h4><?php echo $photo['caption']; ?></h4>
                    </a>
                  </div>
                  
                  <?php } ?>
                </div>
              </div>

              <div>
                <?php echo get_field('360_tour'); ?>
              </div>

              <div>
                <div class="projectvid">
                  <ul>
                    <?php $videos = get_field('videos'); 
                    foreach ($videos as $video) { ?>
                    <li>
                      <div class="video-container">
                        <iframe width="560" height="315" src="<?php echo $video['video']; ?>" frameborder="0" allowfullscreen></iframe>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>

                </div>
              </div>

            </div>

          </div>
        </div>
      </section>
      <!-- Gallery -->

      <!-- Updates -->
      <section class="updates-events" id="construction">
        <div class="pagewrapper2">
          <aside>
            <h3>Construction Updates</h3>
            <ul>
              <?php $construction_updates = get_field('construction_updates'); 
              foreach ($construction_updates as $updates) { ?>
                <li><a href="<?php echo $updates['image']; ?>" class="image-link"><?php echo $updates['title']; ?></a></li>

              <?php } ?>
            </ul>
            <p><a href="#">More</a></p>
          </aside>
          <article>
            <h3>News &amp; Events</h3>
            <ul>

              <?php $news_events = get_field('news_&_events'); 
              foreach ($news_events as $news) { ?>
                
                <li>    
                  <a href="<?php echo get_permalink($news->ID);?>">
                    <div class="propertythb">
                      <?php $featured_image = get_the_post_thumbnail_url($news->ID);
                      if($featured_image == ''): ?>
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/image1-01.jpg">
                      <?php else: ?>
                        <img src="<?php echo $featured_image; ?>">
                      <?php endif; ?>

                    </div>
                    <p><?php echo get_the_title($news->ID); ?></p>
                  </a>
                </li>

              <?php } ?>

            </ul>
          </article>
        </div>
      </section>
      <!-- Updates -->

      <!-- Next Steps -->
      <section class="next-steps">
        <div class="pagewrapper2">
          <h3>Next Steps...</h3>
          <ul class="flex-container">
            
            <?php 
            $next_steps_page_id = 325;
            $next_steps = get_field('next_steps',$next_steps_page_id); 
              foreach ($next_steps as $steps) { ?>
                <li class="flex-item">
                  <a href="<?php echo $steps['link']; ?>">
                    <h4><?php echo $steps['title'];?></h4>
                    <p><img src="<?php echo $steps['icon'];?>"></p>
                    <p><?php echo $steps['description'];?></p>
                  </a>
                </li>
            <?php } ?>
          </ul>
        </div>
      </section>
      <!-- Next Steps -->

      <!-- Agents -->
      <!--<section class="agents">
        <div class="pagewrapper2">
          <h3>Meet our agents for <?php the_title(); ?></h3>
          <ul class="flex-container">
            <?php $assigned_agents = get_field('assigned_agents'); 
              foreach ($assigned_agents as $agent) { ?>
            <li class="flex-item">
              <div class="agent-pic">
                <img src="<?php echo get_the_post_thumbnail_url($agent->ID); ?>">
              </div>
              <div class="agent-details">
                <h4><?php echo $agent->post_title; ?></h4>
                <h6><?php the_field('position',$agent->ID);?></h6>
                <p><a href="tel:<?php the_field('contact_no',$agent->ID);?>"><i class="fa fa-phone" aria-hidden="true"></i><?php the_field('contact_no',$agent->ID);?></a></p>
                <p class="btn"><a href="#">Contact</a></p>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </section>-->
      <!-- Agents -->

      <!-- Projects Nearby -->
      <section class="whatsnew projectsnearby">
        <h3>Other Projects Nearby</h3>
        <aside class="coverleft"></aside>
        <aside class="coverright"></aside>
        <div class="carousel"
          data-flickity='{ "wrapAround": true }'>

          <?php $projects_nearby = get_field('projects_nearby'); 
              foreach ($projects_nearby as $proj_nearby) { ?>
          <div class="carousel-cell">
            <a href="<?php echo get_permalink($proj_nearby->ID); ?>">
              <div class="propertythb">
              <!-- <img src="<?php echo get_the_post_thumbnail_url($proj_nearby->ID); ?>"> -->
              <?php $featured_image = get_the_post_thumbnail_url($proj_nearby->ID);
                if($featured_image == ''): ?>
                  <img src="<?php echo bloginfo('template_directory'); ?>/images/image1-01.jpg">
                <?php else: ?>
                  <img src="<?php echo $featured_image; ?>">
                <?php endif; ?>
              </div>
              <h4><?php echo $proj_nearby->post_title; ?></h4>
              <p>Price Range: <?php the_field('price_range'); ?>
                <?php  //$price = wp_get_post_terms( $proj_nearby->ID, 'price_range', array("fields" => "names") ); echo $price[0];  ?></p>
            </a>
          </div>
          <?php } ?>

        </div>
      </section>
      <!-- Projects Nearby -->

<?php get_footer('projects'); ?>


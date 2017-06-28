<?php

/* Template Name: Projects Template */

get_header('projects');

?>

<section class="projectfeat" style="background: url(<?php the_field('background_image'); ?>) no-repeat center center fixed; background-size: cover">
        <h1><?php the_title(); ?></h1>
        <!-- P1.4 - 2.9 M -->
        <h2><?php the_field('price_range'); ?>
          <br/>
          <?php if(get_field('display_lowest_monthly_amortization') == 1): ?>
            <?php echo 'Lowest Monthly Amortization '.get_field('lowest_monthly_amortization');?><br>
          <?php endif; ?>
          <?php //$price = wp_get_post_terms( get_the_ID(), 'price_range', array("fields" => "names") ); echo $price[0];  ?>

            <?php $ptype = wp_get_post_terms( get_the_ID(), 'project_type', array("fields" => "names") );

            //print_r($ptype);
            if($ptype[1] == 'House Models')
              echo "House and Lot";
            else
             echo $ptype[1];
            ?>

            in&nbsp;

            <?php

            $parent_loc_id = wp_get_post_parent_id(get_the_ID()); print_r($loc);

            $parent_post = get_post($parent_loc_id);

            $parent_loc_title =   $parent_post->post_title;

            echo $parent_loc_title;



            ?>


        </h2>
        <p><a href="<?php echo get_permalink(18); ?>?t=<?php the_title(); ?>" target="_blank">Inquire about this property</a></p>
      </section>

      <div class="pagewrapper2">
      <!-- Project Overview -->
      <?php if(get_field('display_overview') == 1 ): ?>
        <section class="overview" id="overview">
          <article>
            <h3>Master Plan &amp; Concept
              <?php if(get_field('pag-ibig_accredited') == 1){ ?>
              <!-- <span class="pagibig">Pag-ibig Accredited</span> -->
              <?php } if(get_field('ready_for_occupation') == 1){ ?>
              <!-- <span class="rfo">Ready for Occupancy</span> -->
              <?php } ?>
            </h3>
            <?php the_field('overview_description'); ?>
            <ul>
            <?php $project_details = get_field('project_details');
            	foreach ($project_details as $proj_details) {
            		if($proj_details['enable'] == 1): ?>

              			<li><label><?php echo $proj_details['name']; ?></label> <?php echo $proj_details['content']; ?></li>

            <?php endif; } ?>
            <li><label>Turn-over Date:</label><?php echo get_field('turnover_dates'); ?></li>
            </ul>
          </article>

          <aside>
            <div class="badges">
              <h3>
            <?php if(get_field('pag-ibig_accredited') == 1){ ?>
              <span class="pagibig"><img src="<?php echo bloginfo('template_directory'); ?>/images/pagibig.jpg"></span>
              <?php } if(get_field('ready_for_occupation') == 1){ ?>
              <span class="rfo"><img src="<?php echo bloginfo('template_directory'); ?>/images/move-in-ready.jpg"></span>
              <?php } ?>
            </h3>
            </div>
            <div class="project-logo"><img src="<?php the_field('project_logo'); ?>"></div>
            <div class="project-img">
              <a href="<?php echo get_field('project_image_large'); ?>" class="image-link">
                <img src="<?php the_field('project_image'); ?>">
              </a>
              <ul>
              <?php $project_launch = get_field('project_launch');
            	foreach ($project_launch as $proj_launch) { ?>

              		<li><label><?php echo $proj_launch['title']; ?> <?php echo $proj_launch['content']; ?></label> </li>

              <?php } ?>


              </ul>
            </div>
          </aside>
        </section>
      <?php endif; ?>
        <!-- Project Overview -->

        <!-- Payment Terms -->
        <?php if(get_field('display_payment_terms') == 1 ): ?>
        <section class="payment-terms" id="payment">
          <h3>Payment Terms Available</h3>
          <ul>
            <?php if(get_field('get_main_payment_terms') == 1):

              $payment_terms = get_field('payment_terms',12);

                foreach ($payment_terms as $pay_terms) { ?>
                  <?php if($pay_terms['payment_term'] == 'Pag ibig Financing'):
                    if(get_field('pag-ibig_accredited') == 1): ?>
                    <li>
                      <h5>
                        <?php echo $pay_terms['payment_term']; ?></h5>
                      <?php echo $pay_terms['description']; ?>
                    </li>
                  <?php endif; ?>
                <?php else: ?>
                <li>
                  <h5>
                    <?php echo $pay_terms['payment_term']; ?></h5>
                  <?php echo $pay_terms['description']; ?>
                </li>
              <?php endif; ?>
                <?php }

            else: ?>

              <?php $payment_terms = get_field('payment_terms');
                	foreach ($payment_terms as $pay_terms) { ?>
                  <?php if($pay_terms['payment_term'] == 'Pag ibig Financing'):
                    if(get_field('pag-ibig_accredited') == 1): ?>
                    <li>
                      <h5>
                        <?php echo $pay_terms['payment_term']; ?></h5>
                      <?php echo $pay_terms['description']; ?>
                    </li>
                  <?php endif; ?>
                <?php else: ?>
                <li>
                  <h5>
                    <?php echo $pay_terms['payment_term']; ?></h5>
                  <?php echo $pay_terms['description']; ?>
                </li>
              <?php endif; ?>
                <?php } ?>

          <?php endif; ?>

          </ul>
        </section>
      <?php endif; ?>
        <!-- Payment Terms -->

        <!-- Site Development Plan -->
        <?php if(get_field('display_site_development_plan') == 1 ): ?>
          <section class="sitedev">
            <h3>Site Development Plan</h3>
            <a href="<?php echo get_field('site_development_plan_large'); ?>"><img src="<?php the_field('site_development_plan'); ?>"></a>
            <p><a href="#dlSiteMap">Download Site Development Plan</a></p>
            <!-- "<?php echo get_field('site_development_plan'); ?>" target="_blank" -->

           <!-- Modal -->
           <div id="dlSiteMap" class="modalDialog">
              <div> <a href="#close" title="Close" class="close">X</a>
                <form method="post">
                  <ul>
                    <li><label>Name</label>
                      <input type="text" name="fullname" id="fullname">
                    </li>
                    <li><label>Email</label>
                      <input type="email" name="email" id="email">
                    </li>
                    <li>
                      <input type="hidden" name="sitemap" id="sitemap" value="<?php echo get_field('site_development_plan'); ?>">
                      <input type="button" name="dl_sitemap" id="dl_sitemap" value="Submit" >
                    </li>
                  </ul>
                </form>
              </div>
          </div>


          </section>
        <?php endif; ?>
        <!-- Site Development Plan -->
      </div>

      <!-- Project Location -->
      <?php if(get_field('display_location') == 1 ): ?>
      <section class="project-location" id="location">
        <div class="pagewrapper2">
          <div class="location-details">
            <article>
              <h3>Location</h3>
              <?php the_field('location_description');?>
              <p class="margtop20">
                <?php
                if(get_field('link_discover_button') == 0): ?>
                    <a href="#">
                <?php
                elseif(get_field('link_discover_button') == 1): ?>
                  <!--<a href="<?php echo get_permalink(347); ?>/<?php echo strtolower($parent_loc_title); ?>">-->
                  <a href="<?php the_field('location_link');?>">
                <?php endif; ?>
                  Explore <?php echo $parent_loc_title; ?></a></p>
            </article>
            <aside>
              <?php if(get_field('location_image') != ''): ?>
                <a href="<?php echo get_field('location_image'); ?>" class="image-link"><img src="<?php the_field('location_image'); ?>"></a>
                <p>Location &amp; Vicinity Map</p>
              <?php endif; ?>
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
    <?php endif; ?>
      <!-- Project Location -->

      <!-- Amenities -->
      <?php if(get_field('display_amenities') == 1 ): ?>
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
          data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2}'>

          		<?php $slider_images = get_field('slider_images');
              $i = 1; # @jjjjcccjjf
          		foreach ($slider_images as $image) { ?>

              <div class="carousel-cell">
                <a href="<?php echo $image['photos']; ?>" class="image-link">
                  <div class="propertythb">
                  <!-- <img src="<?php echo $image['photos']; ?>"> -->
                  <?php $featured_image = $image['photos'];
                  if($featured_image == ''): ?>
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/thumb.jpg">
                  <?php else: ?>
                    <img id='<?= "image" . $i++ # @jjjjcccjjf ?>' src="<?php echo $featured_image; ?>">
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
    <?php endif; ?>
      <!-- Amenities -->

      <!-- Unit & Floor Plans -->
      <?php if(get_field('display_unit_types') == 1 ): ?>
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
    <?php endif; ?>
      <!-- Unit & Floor Plans -->

      <!-- Gallery -->
      <?php if(get_field('display_gallery') == 1 ): ?>
      <section class="project-gallery" id="gallery">
        <div class="pagewrapper2">
          <h3>Gallery</h3>
          <div id="gallery">
            <ul class="resp-tabs-list gall">
              <?php if(get_field('display_photos') == 1 ): ?>
              <li>Photos</li>
            <?php endif;

            if(get_field('display_360_tour') == 1 ): ?>
              <li>360&deg; Tour</li>
            <?php endif;

            if(get_field('display_videos') == 1 ): ?>
              <li>Videos</li>
            <?php endif;?>

            </ul>
            <div class="resp-tabs-container gall">
            <?php if(get_field('display_photos') == 1 ): ?>
              <div>
                <div class="project-photos" data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2 }'>
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
              <?php endif;

              if(get_field('display_360_tour') == 1 ): ?>

              <div>
                <?php echo get_field('360_tour'); ?>
              </div>

              <?php endif;

              if(get_field('display_videos') == 1 ): ?>

              <div>
                <div class="projectvid">
                  <ul>
                    <?php $videos = get_field('videos');
                    foreach ($videos as $video) { ?>
                    <li>
                      <div class="video-container">
                        <?php echo $video['video']; ?>
                        <!--<iframe width="560" height="315" src="<?php echo $video['video']; ?>" frameborder="0" allowfullscreen></iframe>-->
                      </div>
                    </li>
                    <?php } ?>
                  </ul>

                </div>
              </div>
            <?php endif; ?>
            </div>

          </div>
        </div>
      </section>
    <?php endif; ?>
      <!-- Gallery -->

      <!-- Updates -->
    <?php if(get_field('display_construction_updates') == 1 ): ?>
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
            <!--<p><a href="#">More</a></p>-->
          </aside>
          <?php if(get_field('display_news_&_events') == 1 ): ?>
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
        <?php endif; ?>
        </div>
      </section>
    <?php endif; ?>
      <!-- Updates -->

      <!-- Why Buy from Amaia -->
      <section class="why-buy">
        <div class="pagewrapper2">
          <h3>Why buy from Amaia?</h3>
          <img src="<?php echo bloginfo('template_directory'); ?>/images/why-buy-from-amaia-gray.jpg" width="1196" height="1354">
        </div>
      </section>
      <!-- Why Buy from Amaia -->

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
                  <a href="<?php echo $steps['link']; ?>" target="_blank">
                    <h4><?php echo $steps['title'];?></h4>
                    <p><img src="<?php echo $steps['icon'];?>"></p>
                    <p><?php echo $steps['description'];?></p>
                  </a>
                </li>
            <?php } ?>
          </ul>
          <div class="other-links"><?php echo get_field('other_links'); ?></div>
        </div>
      </section>
      <!-- Next Steps -->



      <!-- Agents -->
      <?php if(get_field('display_agents') == 1 ): ?>
      <section class="agents">
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
      </section>
    <?php endif; ?>
      <!-- Agents -->

      <!-- Projects Nearby -->
      <?php if(get_field('display_projects_nearby') == 1 ): ?>
      <section class="whatsnew projectsnearby">
        <h3>Other Projects Nearby</h3>
        <div style="clear: both;"></div>
        <aside class="coverleft"></aside>
        <aside class="coverright"></aside>
        <div class="carousel"
          data-flickity='{ "contain": true, "adaptiveHeight": true, "imagesLoaded": true, "cellAlign": "center", "initialIndex": 2}'>

          <?php $projects_nearby = get_field('projects_nearby');
              foreach ($projects_nearby as $proj_nearby) { ?>
          <div class="carousel-cell">
            <a href="<?php echo get_permalink($proj_nearby->ID); ?>">
              <div class="propertythb">
              <!-- <img src="<?php echo get_the_post_thumbnail_url($proj_nearby->ID); ?>"> -->
              <?php $featured_image = get_the_post_thumbnail_url($proj_nearby->ID);
                if($featured_image == ''): ?>
                  <img src="<?php echo bloginfo('template_directory'); ?>/images/thumb.jpg">
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
    <?php endif; ?>
      <!-- Projects Nearby -->

<?php get_footer('projects'); ?>

<script>
  $("#dl_sitemap").click(function(){

    var sitemap = $("#sitemap").val();

    var form_data = {
    fullname:$("#fullname").val(),
    email:$("#email").val(),
    dl_sitemap:'1'
  };

  $.ajax({
      url:"<?php echo get_template_directory_uri(); ?>/php-functions/dl_sitemap.php",
      type:'POST',
      data:form_data,
      success:function(msg)
      {
        //alert(msg)
        if(msg == "success")
        {
          //$(".modalDialog").modal('hide');
          $("#close").trigger('click');
          window.open(sitemap,'_blank');
        }
      }
    });


  });


</script>

<?php get_header(); ?>

<section class="financing-header" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) no-repeat center center; background-size: cover">
        <div class="header-title">
          <h1><?php the_title(); ?></h1>
        </div>
      </section>

      <section class="content">
        <div class="pagewrapper2">
          <h3>Company Profile</h3>
          <div class="content2col">
            <article class="about-cont">
              <p><?php the_content(); ?></p>
            </article>
            <aside>
              <img src="<?php //echo get_the_post_thumbnail_url(2); ?>">
              <h4>Vision Mission</h4>
              <p><a href="<?php the_permalink(2); ?>">Read More</a></p>
              <br>
              <img src="<?php //echo get_the_post_thumbnail_url(2); ?>">
              <h4>Management Team</h4>
              <p><a href="<?php the_permalink(4161); ?>">Read More</a></p>
            </aside>
          </div>
        </div>
      </section>

      <!-- Our Team -->
      <section class="agents">
        <div class="pagewrapper2">
          <h3>Meet our Online Property Specialists</h3>
          <ul class="flex-container">
            <?php $our_team = get_field('our_team');
              $cnt = 1;
              foreach ($our_team as $team) { ?>
            <li class="flex-item">
              <div class="agent-pic">
                <img src="<?php echo $team['photo']; ?>">
              </div>
              <div class="agent-details">
                <h4><?php echo $team['name']; ?></h4>
                <h6><?php echo $team['position'];?></h6>
                <p><a href="tel:<?php echo $team['contact_no'];?>">

                  <span><?php echo $team['contact_no'];?></span></a>
                </p>

                <p class="btn"><a href="#contactAgent<?php echo $cnt; ?>"><span>Contact</span></a></p>
                <!-- mailto:<?php echo $team['email'];?> -->
              </div>
            </li>

            <!-- Modal -->
           <div id="contactAgent<?php echo $cnt; ?>" class="modalDialog">
              <div style="margin-top:10%;"> <a href="#close" title="Close" class="close">X</a>
                <form method="post">
                  <ul>
                    <li><p class="inquiry_res"></p></li>
                    <li><label>Name</label>
                      <input type="text" name="fullname" id="fullname<?php echo $cnt; ?>">
                    </li>
                    <li><label>Email</label>
                      <input type="email" name="email_from" id="email_from<?php echo $cnt; ?>">
                    </li>
                    <li><label>Subject</label>
                      <input type="text" name="subject" id="subject<?php echo $cnt; ?>">
                    </li>
                    <li><label>Message</label>
                      <textarea name="message" id="message<?php echo $cnt; ?>" style="width:100%;" rows=10></textarea>
                    </li>
                    <li>
                      <!-- <input type="hidden" name="email_to" id="email_to" class="email_to" value=""> -->
                      <input type="button" name="contactAgent" id="contactAgent" value="Submit" onClick="contact_agent('<?php echo $team['email']; ?>','<?php echo $cnt; ?>');">
                    </li>
                  </ul>
                </form>
              </div>
          </div>

            <?php $cnt++; } ?>
          </ul>
        </div>
      </section>
      <!-- Our Team -->

      <!-- Vismin -->
      <section class="agents">
        <div class="pagewrapper2">
          <h3>Meet our VisMin specialists</h3>
          <ul class="flex-container">
            <?php $vismin = get_field('vismin');
              $cnt = 1;
              foreach ($vismin as $team) { ?>
            <li class="flex-item">
              <div class="agent-pic">
                <img src="<?php echo $team['photo']; ?>">
              </div>
              <div class="agent-details">
                <h4><?php echo $team['name']; ?></h4>
                <h6><?php echo $team['position'];?></h6>
                <p><a href="tel:<?php echo $team['contact_no'];?>">

                  <span><?php echo $team['contact_no'];?></span></a>
                </p>

                <p class="btn"><a href="#contactVismin<?php echo $cnt; ?>"><span>Contact</span></a></p>
                <!-- mailto:<?php echo $team['email'];?> -->
              </div>
            </li>

            <!-- Modal -->
           <div id="contactVismin<?php echo $cnt; ?>" class="modalDialog">
              <div style="margin-top:10%;"> <a href="#close" title="Close" class="close">X</a>
                <form method="post">
                  <ul>
                    <li><p class="inquiry_res"></p></li>
                    <li><label>Name</label>
                      <input type="text" name="fullname" id="vfullname<?php echo $cnt; ?>">
                    </li>
                    <li><label>Email</label>
                      <input type="email" name="email_from" id="vemail_from<?php echo $cnt; ?>">
                    </li>
                    <li><label>Subject</label>
                      <input type="text" name="subject" id="vsubject<?php echo $cnt; ?>">
                    </li>
                    <li><label>Message</label>
                      <textarea name="message" id="vmessage<?php echo $cnt; ?>" style="width:100%;" rows=10></textarea>
                    </li>
                    <li>
                      <!-- <input type="hidden" name="email_to" id="email_to" class="email_to" value=""> -->
                      <input type="button" name="contactAgent" id="contactAgent" value="Submit" onClick="contact_vismin('<?php echo $team['email']; ?>','<?php echo $cnt; ?>');">
                    </li>
                  </ul>
                </form>
              </div>
          </div>

            <?php $cnt++; } ?>
          </ul>
        </div>
      </section>
      <!-- Vismin -->

      <!-- Latest Articles -->
      <section class="whatsnew projectsnearby">
        <h3 style="float:left;">Latest Articles <a href="<?php the_permalink(2000); ?>">See All</a></h3>

        <div style="clear: both;"></div>

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

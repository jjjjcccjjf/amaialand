<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="smartbanner:title" content="My Amaia">
            <meta name="smartbanner:author" content="Amaia Land Inc.">
            <meta name="smartbanner:price" content="FREE">
            <meta name="smartbanner:price-suffix-apple" content=" - On the App Store">
            <meta name="smartbanner:price-suffix-google" content=" - In Google Play">
            <meta name="smartbanner:icon-apple" content="http://is4.mzstatic.com/image/thumb/Purple49/v4/58/4e/7a/584e7adb-dcc9-2742-70cd-8477acee6121/source/175x175bb.jpg">
            <meta name="smartbanner:icon-google" content="https://lh6.ggpht.com/aNt1S8gXB_wi4FdGxVe068xR-OmLUxB2PAkNKXiw6t4NmIyip2WI_74LfhPM9PNHRoA=w300-rw">
            <meta name="smartbanner:button" content="OPEN">
            <meta name="smartbanner:button-url-apple" content="https://itunes.apple.com/ph/app/my-amaia/id1079361971?mt=8">
            <meta name="smartbanner:button-url-google" content="https://play.google.com/store/apps/details?id=com.amaiamobile.amaia">
            <meta name="smartbanner:enabled-platforms" content="android,ios">
            <!--<meta name="smartbanner:disable-positioning" content="true">-->
            <!-- Enable for all platforms -->
            <!-- <meta name="smartbanner:include-user-agent-regex" content=".*"> -->
            <?php if(is_page_template( 'template-location.php' )): ?>
              <META NAME="ROBOTS" CONTENT="NOINDEX">
             <?php endif; ?>
             
            <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/styles.css?v=1.3">
            <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/responsive.css">
            <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/jPushMenu.css">
            <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/flickity.css">
            <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/magnific-popup.css">
            <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/easy-responsive-tabs.css">
            <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome.min.css">
           

            <!--[if lt IE 9]>
                <script src="js/html5.js"></script>
                <![endif]-->
            <!-- css3-mediaqueries.js for IE less than 9 -->
                <!--[if lt IE 9]>
                <script src="js/css3-mediaqueries.js"></script>
                <![endif]--> 
        <?php wp_head(); ?>  
            <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/smartbanner.min.css">
            <script src="<?php echo bloginfo('template_directory'); ?>/js/smartbanner.min.js"></script>  
    </head>


  <body>
      <header>
        <div class="sticky">
          <aside class="whitebg"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/amaia-logo.jpg"></a>            
            <?php if(!empty(get_field('project_logo'))): ?>
              <div class="logo2"><img src="<?php the_field('project_logo'); ?>" class="project-logo"></div>
            <?php endif; ?>
          </aside>
          <div>
            <section>
              <h5 id="greeting"></h5>
              <!-- <div class="project-actions">
                <a href="#"><img src="images/computationIcon.jpg"></a>
                <a href="#"><img src="images/reserveIcon.jpg"></a>
                <a href="#"><img src="images/availabilityIcon.jpg"></a>
                <a href="#"><img src="images/connectIcon.jpg"></a>
              </div> -->
              <ul>
                <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                <li><a href="<?php echo get_permalink(22); ?>">About Us</a></li>
                <li><a href="http://askamie.amaialand.com/" target="_blank">Customer Service</a></li>
                <li><a href="<?php echo get_permalink(1930); ?>">News &amp; Events</a></li>
                <li><a href="#" rel="nofollow">Our Brand Sites</a><img src="<?php echo bloginfo('template_directory'); ?>/images/ayalaicon.png" class="icon">
                    <ul>
                      <?php $homeID = 20; 

                      $brand_sites = get_field('our_brand_sites', $homeID); 
                      
                      foreach($brand_sites as $brand_site){

                      ?>
                      
                      <li><a href="<?php echo $brand_site['brand_link']; ?>" target="_blank" rel="nofollow"><?php echo $brand_site['brand_name']; ?></a></li>

                      <?php } ?>

                    </ul>
                </li>
              </ul>
            </section>

            <?php include('nav.php'); ?>

            <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left">
              <a class="toggle-menu menu-left push-body"></a>
              <ul>
                <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                <li><a href="<?php echo get_permalink(22); ?>">About Us</a></li>
                <li><a href="<?php echo get_permalink(4); ?>">Condo</a></li>
                <li><a href="<?php echo get_permalink(6); ?>">House &amp; Lot</a></li>
                <li><a href="<?php echo get_permalink(8); ?>">Commercial</a></li>
                <li><a href="<?php echo get_permalink(347); ?>">Locations</a></li>
                <li><a href="<?php echo get_permalink(12); ?>">Home Financing</a></li>

                <li><a href="<?php echo get_permalink(1930); ?>">News and Events</a></li>
                <!-- <li><a href="#">Investor Guide</a></li>
                <li><a href="#">OFW Guide</a></li> -->
                <li><a href="<?php echo get_permalink(18); ?>">Contact Us</a></li>
                <li><a href="http://askamie.amaialand.com/" target="_blank">Customer Service</a></li>
              </ul>
              <div class="brandssite">
                <a href="#">Our Brands Site</a>
                  <select onchange="window.location.href=this.value;">
                    <?php $homeID = 20; 

                    $brand_sites = get_field('our_brand_sites', $homeID); 
                    
                    foreach($brand_sites as $brand_site){

                    ?>
                    
                    <option value="<?php echo $brand_site['brand_link']; ?>"><?php echo $brand_site['brand_name']; ?></option>

                    <?php } ?>
                  </select>
                
              </div>
          </div>
          <div class="breadcrumbs">
            <?php custom_breadcrumbs(); ?>
          <!-- <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Condo</a></li>
            <li><a href="#">High-Rise Condominium</a></li>
            <li><a href="#">Quezon City</a></li>
            <li>Home</li>
          </ul> -->
        </div>

        
        <?php if ( is_page_template( 'template-projects.php' )){ ?>
        <div class="project-menu">
          <ul>
            <li><a href="#overview">Overview</a></li>
            <li><a href="#location">Location</a></li>
            <li><a href="#unit">Units &amp; Floor Plans</a></li>
            <li><a href="#facilities">Facilities &amp; Amenities</a></li>
            <li><a href="#construction">Construction Updates</a></li>
            <li><a href="#payment">Payment Terms</a></li>
            <li><a href="#gallery">Gallery</a></li>
          </ul>
        </div>
        <?php } ?>

          </div>
        </div>
        
      </header>
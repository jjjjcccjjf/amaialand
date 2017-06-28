<?php 

/* Template Name: Property Finder */

get_header('projects'); ?>

<section class="modelhouses-list">
	<!-- <h1>Search Results</h1> -->
	<ul class="search_res">
<?php 

$ptype = $_GET['ptype'];
$pprice = $_GET['pprice'];
$ploc = $_GET['ploc'];
$rfo = $_GET['rfo'];

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if($ptype != '' && $pprice != '' && $ploc != ''){
	$args = array(			
	'post_type' => 'page',
	'posts_per_page' => '9',
	'paged' => $paged,			
	'tax_query' => array(				
	'relation' => 'AND',				
		array(					
		'taxonomy' => 'project_type',					
		'field'    => 'tag_ID',					
		'terms'    => $ptype				),				
		array(					
		'taxonomy' => 'price_range',					
		'field'    => 'tag_ID',					
		'terms'    => $pprice				),
		array(					
		'taxonomy' => 'location',					
		'field'    => 'tag_ID',					
		'terms'    => $ploc				),			
		)
	);
}
elseif($ptype != '' && $pprice != '')
{
	$args = array(			
	'post_type' => 'page',
	'posts_per_page' => '9',
	'paged' => $paged,			
	'tax_query' => array(				
	'relation' => 'AND',				
		array(					
		'taxonomy' => 'project_type',					
		'field'    => 'tag_ID',					
		'terms'    => $ptype				),				
		array(					
		'taxonomy' => 'price_range',					
		'field'    => 'tag_ID',					
		'terms'    => $pprice				)		
		)
	);

}
elseif($pprice != '' && $ploc != '')
{
	$args = array(			
	'post_type' => 'page',
	'posts_per_page' => '9',
	'paged' => $paged,			
	'tax_query' => array(				
	'relation' => 'AND',							
		array(					
		'taxonomy' => 'price_range',					
		'field'    => 'tag_ID',					
		'terms'    => $pprice				),
		array(					
		'taxonomy' => 'location',					
		'field'    => 'tag_ID',					
		'terms'    => $ploc				),			
		)
	);

}
elseif($ptype != '' && $ploc != '')
{
	$args = array(			
	'post_type' => 'page',
	'posts_per_page' => '9',
	'paged' => $paged,			
	'tax_query' => array(				
	'relation' => 'AND',				
		array(					
		'taxonomy' => 'project_type',					
		'field'    => 'tag_ID',					
		'terms'    => $ptype				),				
		array(					
		'taxonomy' => 'location',					
		'field'    => 'tag_ID',					
		'terms'    => $ploc				),			
		)
	);

}
elseif($ptype != '')
{
	$args = array(			
	'post_type' => 'page',
	'posts_per_page' => '9',
	'paged' => $paged,			
	'tax_query' => array(				
					
		array(					
		'taxonomy' => 'project_type',					
		'field'    => 'tag_ID',					
		'terms'    => $ptype				)			
		)
	);

}
elseif($pprice != '')
{
	$args = array(			
	'post_type' => 'page',
	'posts_per_page' => '9',	
	'paged' => $paged,		
	'tax_query' => array(							
		array(					
		'taxonomy' => 'price_range',					
		'field'    => 'tag_ID',					
		'terms'    => $pprice				)		
		)
	);

}
elseif($ploc != '')
{
	$args = array(			
	'post_type' => 'page',
	'posts_per_page' => '9',
	'paged' => $paged,			
	'tax_query' => array(			
						
		array(					
		'taxonomy' => 'location',					
		'field'    => 'tag_ID',					
		'terms'    => $ploc				)			
		)
	);

}
else{
	$args = array(			
	'post_type' => 'page',
	'posts_per_page' => '9',
	'paged' => $paged,			
	'tax_query' => array(			
						
		array(					
		'taxonomy' => 'project_type',					
		'field'    => 'slug',					
		'terms'    =>  array('condo','shophouse-development','house-and-lot','mid-rise-condominiums',
			'high-rise-condominiums','house-models','town-homes')				)			
		)
	);
}				
// $query = new WP_Query( $args );
// $posts = $query->posts;



$loopb = new WP_Query( $args );

$no_rows = $loopb->post_count; //sizeof($loopb);


if($no_rows == 0)
{
	echo "<li><p>No Results Found.</p></li>";
}

              if($loopb->have_posts()){ 

              while ( $loopb->have_posts() ) : $loopb->the_post();

				if($no_rows > 0)
				{
					//foreach ($posts as $res) { ?>

					<li>
						<?php //$page_id = $res->ID;
						$page_id = get_the_ID(); ?>
						<a href="<?php echo get_permalink($page_id); ?>" >
						<?php $featured_image = get_the_post_thumbnail_url($page_id);
					    if($featured_image == ''): ?>
					      <img src="<?php echo bloginfo('template_directory'); ?>/images/image3-01.jpg">
					    <?php else: ?>
					      <img src="<?php echo $featured_image; ?>">
					    <?php endif; ?>
						<?php the_title(); //echo $res->post_title; ?>
						</a>
					</li>
						<?php

					//}
				}


			endwhile;

          }


?>

	
</ul>

<div class="pagenumber">
<?php

pagination($loopb->max_num_pages);

?>
</div>

</section>

<section class="whatsnew dbluebg">
        <h3 style="float:left;">You might also be interested in <a href="<?php the_permalink(1930); ?>">See All</a></h3>
        
        <div style="clear: both;"></div>

        <div class="carousel"
          data-flickity='{ "wrapAround": true }'>

          <?php
          
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    
          $args = array( 'post_type' => 'news_and_events', 'posts_per_page' => '10', 'paged' => $paged,  'orderby' => 'post_date', 'order' => 'DESC' );
          
          $loopb = new WP_Query( $args );
        
          if($loopb->have_posts()){ 

          while ( $loopb->have_posts() ) : $loopb->the_post(); 

          ?>

          <div class="carousel-cell">
            <a href="<?php the_permalink(); ?>">
              <div class="propertythb">
              <?php $featured_image = get_the_post_thumbnail_url();
                if($featured_image == ''): ?>
                  <img src="<?php echo bloginfo('template_directory'); ?>/images/news-thumb.jpg" >
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
      
<?php get_footer(); ?>
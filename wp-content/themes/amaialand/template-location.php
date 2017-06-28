<?php

/*Template Name: Location */

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
        <aside>
        <h1><?php the_title(); ?></h1>
        <h2><?php the_field('short_description'); ?></h2>
        <?php if(get_field('show_available_guide') == 1): ?>
        <ul>
          <?php
              

                $locations = get_field('location_guide_tag');
                
                foreach ($locations as $loc) {
                  

                ?>

          <li><a href="<?php echo get_permalink($loc->ID);?>" style="text-decoration:none; color:white;"><?php echo get_the_title($loc->ID); ?></a></li>
          <?php
          
          }
                  ?>
        </ul>
      <?php endif; ?>
      <p class="view_listings" style="display: inline-table;padding: 15px 25px;border: solid 3px white;margin: 0 10px 10px;font: 18px/24px 'avenirblack';"><a href="#viewListings" style="text-decoration:none;">View Project Listings</a></p>
        </aside>
      </section>

      <div class="credits"><?php echo get_field('hero_image_credit'); ?></div>
      
      <section class="modelhouses-list" id="viewListings">

      <?php
      
      $projects_nearby = get_field('nearby_projects',get_the_ID()); 
      
      foreach ($projects_nearby as $proj) :

        $page_id = $proj->ID; ?>

            <div class="modelhouse">
          <div class="pagewrapper3">
            <article>
              <div class="model-overview">
                <h3><a href="<?php echo get_permalink($page_id); ?>" ><?php echo $proj->post_title; ?></a></h3>
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
            
        endforeach;

     ?>
      </section>


<?php get_footer('projects'); ?>
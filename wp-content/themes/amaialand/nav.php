<?php

/**
 * We need this to determine what get var to append
 * @author: @jjjjcccjjf | lsalamante@myoptimind.com
 * @param  int    $p_id   parent id that we need
 * @return string         either '?type=m', '?type=h', or ''
 */
function return_condo_type($p_id)
{
  $proj_terms = get_children($p_id);

  $p_children = [];

  foreach($proj_terms as $proj){
    $terms_arr = wp_get_post_terms($proj->ID, 'project_type');
    foreach($terms_arr as $term){
      $p_children[] = $term->slug;
    }
  }

  $p_children = array_unique($p_children);

  if(in_array('mid-rise-condominiums', $p_children) && in_array('high-rise-condominiums', $p_children)) {
    return '';
  } elseif (in_array('mid-rise-condominiums', $p_children)) {
    return '?type=m';
  } elseif (in_array('high-rise-condominiums', $p_children)) {
    return '?type=h';
  }

}

?>

<nav class="main">
              <a class="toggle-menu menu-left push-body fleft">MENU</a>
              <ul>
                <li>
                  <a href="<?php echo get_permalink(4); ?>" class="active">Condo</a>
                    <div>
                      <div class="pagewrapper">
                        <ul class="condonav">
                          <li>
                            <h4>Mid-Rise</h4>
                            <picture><img src="<?php the_field('mid_rise_condo_featured_image', 4 ); ?>"></picture>
                            <aside class="submenu">
                              <?php
                              $args = array('post_type' => 'page', 'posts_per_page' => '-1', 'orderby' => 'post_title', 'order' => 'ASC','tax_query' => array(
                                array(
                                    'taxonomy' => 'project_type',
                                    'field' => 'slug',
                                    'terms' =>  'mid-rise-condominiums',
                                        ),
                                    ),
                                 );

                              $loop = new WP_Query($args);
                              $parent_ids = array();
                              $withrfo = array();
                              while($loop->have_posts()) : $loop->the_post();
                                $page_id = get_the_ID();

                                $parent_post_id = wp_get_post_parent_id( $page_id );


                                if(!in_array($parent_post_id,$parent_ids))
                                {
                                  array_push($parent_ids, $parent_post_id);
                                }

                                if(get_field('ready_for_occupation',$parent_post_id) == 1)
                                {
                                  if(!in_array($parent_post_id,$withrfo))
                                  {
                                    array_push($withrfo, $parent_post_id);
                                  }

                                }
                              endwhile;

                              //print_r($withrfo);
                              ?>
                              <ul class="col3">
                                <li>
                                  <h4>Metro Manila</h4>
                                  <?php

                                  foreach ($parent_ids as $p_id) {
                                    $post_term = wp_get_post_terms($p_id, 'location');

                                  $condo_var = return_condo_type($p_id);

                                    foreach ($post_term as $term)
                                    {
                                      if($term->name == 'Metro Manila')
                                      {

                                        echo '<p><a href="'.get_permalink($p_id). $condo_var .'">'.get_the_title($p_id);

                                        if(in_array($p_id, $withrfo))
                                          echo ' <span>(RFO)</span> ';

                                        echo '</a></p>';
                                      }

                                    }
                                  }

                                  ?>
                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Luzon</h4>
                                  <?php

                                  foreach ($parent_ids as $p_id) {
                                    $post_term = wp_get_post_terms($p_id, 'location');

                                    $condo_var = return_condo_type($p_id);

                                    foreach ($post_term as $term)
                                    {
                                      if($term->name == 'Luzon')
                                      {
                                        echo '<p><a href="'.get_permalink($p_id). $condo_var . '">'.get_the_title($p_id);

                                        if(in_array($p_id, $withrfo))
                                          echo ' <span>(RFO)</span> ';

                                        echo '</a></p>';
                                      }
                                    }
                                  }

                                  ?>

                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Visayas</h4>
                                  <?php

                                  foreach ($parent_ids as $p_id) {
                                    $post_term = wp_get_post_terms($p_id, 'location');

                                    $condo_var = return_condo_type($p_id);

                                    foreach ($post_term as $term)
                                    {
                                      if($term->name == 'Visayas')
                                      {
                                        echo '<p><a href="'.get_permalink($p_id). $condo_var .'">'.get_the_title($p_id);

                                        if(in_array($p_id, $withrfo))
                                          echo ' <span>(RFO)</span> ';

                                        echo '</a></p>';
                                      }
                                    }
                                  }

                                  ?>
                                </li>
                              </ul>
                            </aside>
                          </li>

                           <?php wp_reset_query(); ?>

                          <li>
                            <h4>High-Rise</h4>
                            <picture><img src="<?php the_field('high_rise_condo_featured_image', 4 ); ?>"></picture>
                            <aside class="submenu">
                              <ul class="col2">

                                <?php
                              $args = array('post_type' => 'page', 'posts_per_page' => '-1', 'orderby' => 'post_title', 'order' => 'ASC','tax_query' => array(
                                array(
                                    'taxonomy' => 'project_type',
                                    'field' => 'slug',
                                    'terms' =>  'high-rise-condominiums',
                                        ),
                                    ),
                                 );

                              $loop = new WP_Query($args);
                              $parent_ids = array();
                              while($loop->have_posts()) : $loop->the_post();
                                $page_id = get_the_ID();

                                $parent_post_id = wp_get_post_parent_id( $page_id );


                                if(!in_array($parent_post_id,$parent_ids))
                                {
                                  array_push($parent_ids, $parent_post_id);
                                }

                                if(get_field('ready_for_occupation',$parent_post_id) == 1)
                                {
                                  if(!in_array($parent_post_id,$withrfo))
                                  {
                                    array_push($withrfo, $parent_post_id);
                                  }

                                }

                              endwhile;
                              ?>

                                <li>
                                  <h4>Metro Manila</h4>
                                  <?php

                                  foreach ($parent_ids as $p_id) {
                                    $post_term = wp_get_post_terms($p_id, 'location');

                                    $condo_var = return_condo_type($p_id);

                                    foreach ($post_term as $term)
                                    {
                                      if($term->name == 'Metro Manila')
                                      {
                                        echo '<p><a href="'.get_permalink($p_id). $condo_var .'">'.get_the_title($p_id);

                                        if(in_array($p_id, $withrfo))
                                          echo ' <span>(RFO)</span> ';

                                        echo '</a></p>';
                                      }
                                    }
                                  }

                                  ?>
                                </li>

                                <?php wp_reset_query(); ?>

                              </ul>
                              <ul class="col2"></ul>
                            </aside>
                          </li>
                        </ul>
                      </div>
                    </div>
                </li>
                <li>
                  <a href="<?php echo get_permalink(6); ?>">House and Lot</a>
                    <div>
                      <div class="pagewrapper">
                        <ul class="hlotnav">
                          <li>
                            <h4>House Models</h4>
                            <picture><img src="<?php the_field('house_models_featured_image', 6 ); ?>">
                            <p><a href="<?php the_permalink(228);?>">View model houses</a></p>
                            </picture>
                            <aside class="submenu">
                              <ul class="col3">
                                <li>
                                  <h4>Luzon</h4>

                                  <?php

                                  $house_lot_page_id = 6;

                                  $args = array(
                                        'child_of' => $house_lot_page_id,
                                        'parent' => $house_lot_page_id,
                                        'depth' => 1 ,
                                        'sort_column' => 'post_title',
                                        'sort_order' => 'asc',
                                        'posts_per_page' => '-1'
                                  );

                                  $house_lot_loc = get_pages( $args );
                                  $parent_ids = array();
                                  $withrfo = array();


                                   foreach($house_lot_loc as $hl_loc)
                                   {
                                    $post_ID = $hl_loc->ID;
                                    $location_name = $hl_loc->post_title;

                                    $parent_post_id = $post_ID ;


                                if(!in_array($parent_post_id,$parent_ids))
                                {
                                  array_push($parent_ids, $parent_post_id);
                                }

                                if(get_field('ready_for_occupation',$parent_post_id) == 1)
                                {
                                  if(!in_array($parent_post_id,$withrfo))
                                  {
                                    array_push($withrfo, $parent_post_id);
                                  }

                                }

                                    // $post_term = wp_get_post_terms($post_ID, 'location');
                                    // foreach ($post_term as $term)
                                    // {
                                    //   //echo $term->name;
                                    //   if($term->name == 'Luzon')
                                    //     echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    // }


                                   }

                                   foreach ($parent_ids as $p_id) {
                                    $post_term = wp_get_post_terms($p_id, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      if($term->name == 'Luzon')
                                      {
                                        echo '<p><a href="'.get_permalink($p_id).'">'.get_the_title($p_id);

                                        if(in_array($p_id, $withrfo))
                                          echo ' <span>(RFO)</span> ';

                                        echo '</a></p>';
                                      }
                                    }
                                  }


                                  ?>

                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Visayas</h4>

                                  <?php

                                  // foreach($house_lot_loc as $hl_loc)
                                  // {
                                  //   $post_ID = $hl_loc->ID;
                                  //   $location_name = $hl_loc->post_title;

                                  //   $post_term = wp_get_post_terms($post_ID, 'location');
                                  //   foreach ($post_term as $term)
                                  //   {
                                  //     //echo $term->name;
                                  //     if($term->name == 'Visayas')
                                  //       echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                  //   }


                                  // }

                                  foreach ($parent_ids as $p_id) {
                                    $post_term = wp_get_post_terms($p_id, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      if($term->name == 'Visayas')
                                      {
                                        echo '<p><a href="'.get_permalink($p_id).'">'.get_the_title($p_id);

                                        if(in_array($p_id, $withrfo))
                                          echo ' <span>(RFO)</span> ';

                                        echo '</a></p>';
                                      }
                                    }
                                  }

                                  ?>

                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Mindanao</h4>
                                  <?php

                                  // foreach($house_lot_loc as $hl_loc)
                                  // {
                                  //   $post_ID = $hl_loc->ID;
                                  //   $location_name = $hl_loc->post_title;

                                  //   $post_term = wp_get_post_terms($post_ID, 'location');
                                  //   foreach ($post_term as $term)
                                  //   {
                                  //     //echo $term->name;
                                  //     if($term->name == 'Mindanao')
                                  //       echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                  //   }


                                  // }

                                  foreach ($parent_ids as $p_id) {
                                    $post_term = wp_get_post_terms($p_id, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      if($term->name == 'Mindanao')
                                      {
                                        echo '<p><a href="'.get_permalink($p_id).'">'.get_the_title($p_id);

                                        if(in_array($p_id, $withrfo))
                                          echo ' <span>(RFO)</span> ';

                                        echo '</a></p>';
                                      }
                                    }
                                  }
                                  ?>

                                </li>
                              </ul>
                            </aside>
                          </li>
                          <li>
                            <h4>Town Homes</h4>
                            <picture><img src="<?php the_field('town_homes_featured_image', 6 ); ?>">
                            </picture>
                            <aside class="submenu">
                              <ul class="col2">
                                <li>
                                  <h4>Metro Manila</h4>
                                  <?php

                                  $townhome_page_id = 110;

                                  $args = array(
                                        'child_of' => $townhome_page_id,
                                        'parent' => $townhome_page_id,
                                        'depth' => 1 ,
                                        'sort_column' => 'post_title',
                                        'sort_order' => 'asc',
                                        'posts_per_page' => '-1'
                                  );

                                  $townhome_loc = get_pages( $args );


                                   foreach($townhome_loc as $th_loc)
                                   {
                                    $post_ID = $th_loc->ID;
                                    $location_name = $th_loc->post_title;

                                    $post_term = wp_get_post_terms($post_ID, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      //echo $term->name;
                                      if($term->name == 'Metro Manila')
                                        echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    }


                                   }

                                  ?>

                                </li>
                              </ul>
                              <!-- <ul class="col3">
                                <li>
                                  <h4>Luzon</h4>

                                  <?php

                                  foreach($townhome_loc as $th_loc)
                                   {
                                    $post_ID = $th_loc->ID;
                                    $location_name = $th_loc->post_title;

                                    $post_term = wp_get_post_terms($post_ID, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      //echo $term->name;
                                      if($term->name == 'Luzon')
                                        echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    }


                                   }

                                  ?>

                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Visayas</h4>

                                  <?php

                                  foreach($townhome_loc as $th_loc)
                                   {
                                    $post_ID = $th_loc->ID;
                                    $location_name = $th_loc->post_title;

                                    $post_term = wp_get_post_terms($post_ID, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      //echo $term->name;
                                      if($term->name == 'Visayas')
                                        echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    }


                                   }

                                  ?>

                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Mindanao</h4>

                                  <?php

                                  foreach($townhome_loc as $th_loc)
                                   {
                                    $post_ID = $th_loc->ID;
                                    $location_name = $th_loc->post_title;

                                    $post_term = wp_get_post_terms($post_ID, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      //echo $term->name;
                                      if($term->name == 'Mindanao')
                                        echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    }


                                   }

                                  ?>

                                </li>
                              </ul> -->
                            </aside>
                          </li>
                        </ul>
                      </div>
                    </div>
                </li>
                <li>
                  <a href="<?php the_permalink(8); ?>">Commercial</a>
                </li>
                <li>
                  <a href="<?php echo get_permalink(347); ?>">Locations</a>
                  <div class="locationsub">
                    <ul class="col3">
                                <li>
                                  <h4>Metro Manila</h4>
                                  <?php

                                  $location_page_id = 347;

                                  $args = array(
                                        'child_of' => $location_page_id,
                                        'parent' => $location_page_id,
                                        'depth' => 1 ,
                                        'sort_column' => 'post_title',
                                        'sort_order' => 'asc',
                                        'posts_per_page' => '-1'
                                  );

                                  $location_loc = get_pages( $args );


                                   foreach($location_loc as $l_loc)
                                   {
                                    $post_ID = $l_loc->ID;
                                    $location_name = $l_loc->post_title;

                                    /* Get Child Page */
                                    // $child_args = array(
                                    //   'post_parent' => $post_ID,
                                    //   'post_type'   => 'page',
                                    //   'posts_per_page' => '1',
                                    //   'post_status' => 'publish'
                                    // );
                                    // $children = mysql_fetch_array(get_children( $child_args ));
                                    // //print_r($children);
                                    // foreach($children as $child)
                                    // {
                                    //   echo $child->post_title();
                                    // }


                                    $post_term = wp_get_post_terms($post_ID, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      //echo $term->name;
                                      if($term->name == 'Metro Manila')
                                        echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    }


                                   }

                                  ?>

                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Luzon</h4>
                                  <?php

                                  foreach($location_loc as $l_loc)
                                   {
                                    $post_ID = $l_loc->ID;
                                    $location_name = $l_loc->post_title;

                                    $post_term = wp_get_post_terms($post_ID, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      //echo $term->name;
                                      if($term->name == 'Luzon')
                                        echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    }


                                   }

                                  ?>

                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Visayas</h4>
                                  <?php

                                  foreach($location_loc as $l_loc)
                                   {
                                    $post_ID = $l_loc->ID;
                                    $location_name = $l_loc->post_title;

                                    $post_term = wp_get_post_terms($post_ID, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      //echo $term->name;
                                      if($term->name == 'Visayas')
                                        echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    }


                                   }

                                  ?>

                                </li>
                              </ul>
                              <ul class="col3">
                                <li>
                                  <h4>Mindanao</h4>
                                  <?php

                                  foreach($location_loc as $l_loc)
                                   {
                                    $post_ID = $l_loc->ID;
                                    $location_name = $l_loc->post_title;

                                    $post_term = wp_get_post_terms($post_ID, 'location');
                                    foreach ($post_term as $term)
                                    {
                                      //echo $term->name;
                                      if($term->name == 'Mindanao')
                                        echo '<p><a href="'.get_permalink($post_ID).'">'.$location_name.'</a></p>';
                                    }


                                   }

                                  ?>

                                </li>
                              </ul>
                  </div>
                </li>
                <li>
                  <a href="<?php echo get_permalink(12); ?>">Home Financing</a>
                </li>
                <!-- <li>
                  <a href="#">Investor Guide</a>
                </li>
                <li>
                  <a href="#">OFW Guide</a>
                </li> -->
                <li>
                  <a href="<?php echo get_permalink(18); ?>">Contact Us</a>
                </li>
              </ul>
              <?php if(!is_home() && !is_front_page()): ?>
              <div class="search">
                <a id="open-popup" href="#my-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
              </div>

              <!-- Search Pop-up -->
              <div id="my-popup" class="white-popup mfp-hide">
                <div class="propertysearch-home">
                    <h2>PROPERTY FINDER  | <span>Find exactly what you are looking for</span></h2>
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
                    if($loc->parent != 0 && $loc->slug != 'batangas' /* remove batangas because it's #!@(#) */)
                      echo '<option value="'.$loc->term_id.'">'.$loc->name.'</option>';
                  }?>
                </select>

              </li>
              <li>
                <label class="pointer"><input class="pointer" type="checkbox" name="rfo" id= "rfo" value="1" onclick="check_loc_with_rfo(this.value);"> Ready for Occupancy</label>
              </li>
              <li><input type="submit" name="find" value=""></li>
            </form>
                    </ul>
                  </div>
                </div>

                <?php endif; ?>

            </nav>

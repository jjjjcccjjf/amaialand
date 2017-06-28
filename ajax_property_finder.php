<?php

/**
* Ajax file for property finder dropdown
* @author: @jjjjcccjjf | lsalamante@myoptimind.com
*/

require_once("wp-load.php");

$slug = get_term( $_POST['ptype'], 'project_type' )->slug; # Get the slug of the project from its ID

$args = array('post_type' => 'page', 'posts_per_page' => '-1',
'tax_query' => array(
  'relation' => 'AND',
  array(
    'taxonomy' => 'project_type',
    'field'    => 'slug',
    'terms'    => array($slug) # Pinpoint the pages using its slug
  )
)
);

$query = new WP_Query( $args );
$projects = $query->posts;

# Initialize arrays
$price_range_arr = array();
$location_arr = array();

/**
* Iterates all of our projects here
*/
foreach ($projects as $post) {

  # Skip the post if it is not ready for occupation and if rfo filter is enabled
  if(get_field('ready_for_occupation', $post->ID) != 1 && $_GET['rfo'] == 1)
  continue;

  $terms = wp_get_post_terms( $post->ID, 'price_range');  # Gets all price range available for that post
  foreach($terms as $term){
    $price_range_arr[] = $term->term_id;
  }

  $terms = wp_get_post_terms( $post->ID, 'location'); # Same with above, but with location
  foreach($terms as $term){
    if($term->parent != 0) # Skips parent taxonomy because we don't want to see "Luzon", etc there
    $location_arr[] = $term->term_id;
  }

}

# Identify what to return. If price range options or location options
if(@$_GET['type'] == 'price_range'){
  $options = array_unique($price_range_arr); # We filter the array because it contains duplicate values
  $html_options = '<option disabled selected>Price Range</option>'; # Placeholder
}
elseif(@$_GET['type'] == 'location'){
  $options = array_unique($location_arr); # We filter the array because it contains duplicate values
  $html_options = '<option disabled selected>Location</option>'; # Placeholder
}

# We create our html dropdown options here
foreach($options as $option){
  $term = get_term($option);
  $title = $term->name;
  $html_options .= "<option value='$option'>$title</option>";
}

# Finally, return the elements and it will be appended to corresponding dropdown
echo $html_options;

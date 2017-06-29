<?php

/**
* Ajax file for property finder dropdown
* @author: @jjjjcccjjf | lsalamante@myoptimind.com
*/

require_once("wp-load.php");

$args = array('post_type' => 'page', 'posts_per_page' => '-1',
'tax_query' => array(
  'relation' => 'AND',
  array(
    'taxonomy' => 'project_type',
    'field'    => 'slug',
    'terms'    => array('high-rise-condominiums', 'mid-rise-condominiums',
    'house-and-lot',' shophouse-development')
  )
)
);


$query = new WP_Query( $args );
$projects = $query->posts;

# Initialize arrays
$property_arr = array();

/**
* Iterates all of our projects here
*/
foreach ($projects as $post) {

  # Skip the post if it is not ready for occupation and if rfo filter is enabled
  if(get_field('ready_for_occupation', $post->ID) != 1 && $_GET['rfo'] == 1)
  continue;

  $terms = wp_get_post_terms( $post->ID, 'project_type');

  foreach($terms as $term){
    #if($term->parent != 0) # Skips parent taxonomy because we don't want to see "Luzon", etc there
    $property_arr[] = $term->term_id;
  }

}

$options = array_unique($property_arr); # We filter the array because it contains duplicate values
$html_options = '<option disabled selected>Property Type</option>'; # Placeholder

$options = array_diff( $options, [3,7,6] ); # Remove Condo from the choices

# We transfer our array so an associative one
foreach($options as $option){
  $term = get_term($option);
  $title = $term->name;

  $ordered_options[$title] = $option;
}

ksort($ordered_options); # Alphabetically sort our array because hail D3str0y3r 🙏🙏

# We create our html dropdown options here
foreach($ordered_options as $key => $val){
  $html_options .= "<option value='$val'>$key</option>";
}

# Finally, return the elements and it will be appended to corresponding dropdown
echo $html_options;

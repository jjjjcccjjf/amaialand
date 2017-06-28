<?php
require_once("wp-load.php");

$slug = get_term( $_POST['ptype'], 'project_type' )->slug;

$args = array('post_type' => 'page', 'posts_per_page' => '-1',
'tax_query' => array(
  'relation' => 'AND',
  array(
    'taxonomy' => 'project_type',
    'field'    => 'slug',
    'terms'    => array($slug)
  )
)
);


$query = new WP_Query( $args );
$projects = $query->posts;

$price_range_arr = array();
$location_arr = array();

/**
* TODO: documentation
*/
foreach ($projects as $post) {
  $terms = wp_get_post_terms( $post->ID, 'price_range');

  foreach($terms as $term){
    $price_range_arr[] = $term->term_id;
  }

  $terms = wp_get_post_terms( $post->ID, 'location');

  foreach($terms as $term){
    $location_arr[] = $term->term_id;
  }

}

if(@$_GET['type'] == 'price_range'){
  $options = array_unique($price_range_arr);
  $html_options = '<option disabled selected>Price Range</option>';
}
elseif(@$_GET['type'] == 'location'){
  $html_options = '<option disabled selected>Location</option>';
  $options = array_unique($location_arr);
}


foreach($options as $option){
  $term = get_term($option);
  $title = $term->name;
  $html_options .= "<option value='$option'>$title</option>";
}

echo $html_options;

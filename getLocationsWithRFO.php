<?php


require_once("wp-load.php");

if(isset($_POST['getLocationsWithRFO']) && $_POST['rfo'] == 1)
{
	
                $args = array('post_type' => 'page', 'posts_per_page' => '-1',
                'tax_query' => array(
                  'relation' => 'AND',        
                  array(          
                  'taxonomy' => 'project_type',         
                  'field'    => 'slug',         
                  'terms'    => array('condo','house-and-lot',' shophouse-development') )
                  
                  )
                  ); 
               
               

              $query = new WP_Query( $args );
              $projects = $query->posts;
              $options_with_rfo = array();
              $options_wout_rfo = array();
              foreach ($projects as $proj) {

                $proj_id = $proj->ID;

                if(get_field('ready_for_occupation',$proj->ID) == 1)
                {                  
                  
                   $term_list = wp_get_post_terms($proj->ID, 'location', array("fields" => "all"));
                   
                   
                  foreach ($term_list as $terms) {

                    if($terms->parent != 0)
                     {
                      
                      
                      if(!in_array($terms->term_id,$options_with_rfo))
                        array_push($options_with_rfo,$terms->term_id);
                        

                    }
                    
                  }
                }
                // else
                // {
                    // if(!in_array($terms->term_id,$options_wout_rfo))
                    //   array_push($options_wout_rfo,$terms->term_id);
                // }
              }



              wp_reset_query();

              
                  $new_arr = array();
                  for($i=0;$i <= sizeof($options_with_rfo); $i++){
                    $term =get_term($options_with_rfo[$i],'location');
                    $arr = array('id'=>$options_with_rfo[$i],'location_name'=>$term->name);
                    array_push($new_arr,$arr);
                  }

                  $sorted_terms = array_orderby($new_arr, 'location_name', SORT_ASC);

                  echo '<option disabled selected>Location</option>';

                  foreach ($sorted_terms as $terms) {
                    if($terms['id'] != '')
                      echo '<option value="'.$terms['id'].'">'.$terms['location_name'].'</option>';
                  }        
}  
else
{
  $location = get_terms(array('taxonomy'=>'location','hide_empty'=>false)); 
                  foreach ($location as $loc) {
                    if($loc->parent != 0)
                      echo '<option value="'.$loc->term_id.'">'.$loc->name.'</option>';
                  }
}
?>
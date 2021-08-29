<?php
function segbol_get_terms($terms){
    $terms_list= array( );
    
    foreach ($terms as  $term) {
        if($term!==''){
          $term_cat= get_term_by('slug', $term, 'project_category');
           
            array_push($terms_list,$term_cat->term_id);
        }
    }

    return array('terms'=>$terms_list,'error'=>$error);
}
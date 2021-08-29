<?php

function segbol_create_post($user_id,$post_title,$terms,$metas){
    $new_post='';
    $tax=array('project_category'=>$terms);
    $post = array( 
        'post_title' => $post_title, 
        
        'tax_input' => $tax, 
        'post_status' => 'publish',
        'post_type'=> 'segbol_proyectos',
        'post_author'=>$user_id,
        
    );
    $user =get_user_by('ID', $user_id);
    if( $user ){

        wp_set_current_user( $user_id, $user->user_login );

   }
   $new_post=wp_insert_post($post);
   if($new_post!==''){
       //field_606c5b38c3184
       foreach($metas as $key=>$value){
           update_field($key,$value,$new_post);
       }
   }
  


   return array('new-post'=>$new_post,'error'=>$errors);
}
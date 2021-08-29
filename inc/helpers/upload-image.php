<?php


function segbol_upload_image($file){
    //require load
   if (file_exists( ABSPATH . '/wp-load.php')) {
       require_once( ABSPATH . '/wp-load.php'); 
      
    }
    $errors=array();
    if (isset($file['name'])) {
        if(!$file['error']) {
            if (! function_exists( 'wp_handle_upload' )) {
                require_once( ABSPATH . '/wp-admin/includes/file.php'); 
              
             }
               if (file_exists( ABSPATH . '/wp-admin/includes/image.php')) {
                   require_once(ABSPATH  . '/wp-admin/includes/image.php');
                  
               }
               if (file_exists( ABSPATH . '/wp-admin/includes/media.php')) {
                  require_once(ABSPATH  . '/wp-admin/includes/media.php');
                  
              }
             $target_url_array=wp_upload_dir( );
            // $target_dir=$target_url_array['path']. basename($file['name']);
            $file['name']=sanitize_file_name( $file['name'] );
           //option one
          /*   $upload_overrides = array( 'test_form' => false );
            $upload_image = wp_handle_upload( $file, $upload_overrides );
            
            if(!$upload_image['error'] ){
                print_r($upload_image);
            }  */
            //option two
           if (wp_check_filetype($file['name'])['type']!='image/png' || wp_check_filetype($file['name'])['type']!='image/jpeg' ) {
            $upload_overrides = array( 'test_form' => false );
            $upload = wp_handle_upload( $file, $upload_overrides );
            $attachment = array('post_title' => basename($upload['file']), 'post_content' => '', 'post_type' => 'attachment', 'post_mime_type' =>wp_check_filetype( $file['name'])['type'], 'guid' => $upload['url']);
            $id = wp_insert_attachment($attachment, $upload['file']);
            
           }else{
               $errors['error_tipo']='El tipo de la imagen no es correcta';
           }
       
            
        }else{
            $errors['error_load']='La imagen no cargo correctamente';
        }
    }
  
   
    return array('image'=>$id,'errors'=>$errors);
}
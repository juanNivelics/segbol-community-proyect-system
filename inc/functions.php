<?php

/**
 * Segbol community proyect system
 *
 * @package           Functions
 * @author            Juan Carlos Avila (Nivelics Colombia)
 * @copyright         2021 Nivelics Colombia
 * @license           GPL-2.0-or-later
 * 
 *
 */
function segbol_register_user_post(){
    $errors=array();
    status_header(200);
       //arrays
       $metas=[];
       $errors=[];
       //userdata
       $username=sanitize_text_field( $_POST['nombre']);
       $email=sanitize_text_field( $_POST['email']);
       $pass=sanitize_text_field( $_POST['userpass']);
       $metas['profesion']=sanitize_text_field( $_POST['profesion'] );
       $metas['edad']=sanitize_text_field( $_POST['edad'] );
       //custom post types data
       $post_title=sanitize_text_field($_POST['post-title']);
       $cat_proyect_saludBienestar= (isset($_POST['cat_proyect_saludBienestar']))? 'saludybienestar':'';
$cat_proyect_educacionCalidad=   (isset($_POST['cat_proyect_educacionCalidad']))? 'educacion-de-calidad':'';
$cat_proyect_inclusionPobreza= (isset($_POST['cat_proyect_inclusionPobreza']))? 'inclusion-reduccion-de-desigualdades-y-pobreza':'';
$cat_proyect_transparenciaJ= (isset($_POST['cat_proyect_transparenciaJ']))? 'transparencia-justicia-y-cero-corrupcion':'';
       $terms=segbol_get_terms(array( $cat_proyect_saludBienestar,$cat_proyect_educacionCalidad,$cat_proyect_inclusionPobreza,$cat_proyect_transparenciaJ));
       $userpostcontent=sanitize_textarea_field( $_POST['userpostcontent'] );
       $image_post=segbol_upload_image( $_FILES['image-post']);
       
      
       
 
      
   $user_register=   segbol_register_user($username, $email,$pass,$metas);
 

   print_r($user_register);
    print_r($image_post);
 
  if ( $user_register['user']!==''  ) {

      if($image_post['image']!==''){
        $metas_fields=array(
            'field_6073bd403f6e8'=> $image_post['image'],
            'field_606c5b38c3184'=>'https://www.youtube.com/watch?v=RsqXLbnoDBY',
            'field_60956683d24d9'=> $userpostcontent,
            'field_609564c0d42b1'=>$userpostcontent
        );
      }
     
       $new_proyect= segbol_create_post( $user_register['user'], $post_title,$terms['terms'],$metas_fields);
     } 
     if($new_proyect['new-post']!=''){
         echo 'nuevo proyecto cargado';
     } 
    
    
     
   /*  if(count($errors)>0){
        wp_redirect( add_query_arg( array( 'errormsg' => "Campos incompletos" ),getenv('HTTP_REFERER') ) );
        //request handlers should exit() when they complete their task
        exit;

    }else{
        wp_redirect( getenv('HTTP_REFERER')  );
        //request handlers should exit() when they complete their task
        exit;
    }*/
};
add_action( 'admin_post_nopriv_register_user_post', 'segbol_register_user_post' );
 add_action( 'admin_post_register_user_post','segbol_register_user_post' );

 if(file_exists(dirname(__FILE__).'/register-user.php')){
    require_once(dirname(__FILE__).'/register-user.php');
};
if(file_exists(dirname(__FILE__).'/create-post.php')){
    require_once(dirname(__FILE__).'/create-post.php');

}
//uploads
if(file_exists(dirname(__FILE__).'/helpers/upload-image.php')){
    require_once(dirname(__FILE__).'/helpers/upload-image.php');
};
//terms
if(file_exists(dirname(__FILE__).'/helpers/terms.php')){
    require_once(dirname(__FILE__).'/helpers/terms.php');
};

/* if(file_exists(dirname(__FILE__).'/add-meta-project.php')){
    require_once(dirname(__FILE__).'/add-meta-project.php');
} */
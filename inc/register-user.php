<?php
/**
 *  Segbol community proyect system
 *
 * @package           Register user
 * @author            Juan Carlos Avila (Nivelics Colombia)
 * @copyright         2021 Nivelics Colombia
 * @license           GPL-2.0-or-later
 */
function  segbol_register_user($username="", $email,$pass,$metas){
 
 $getEmail= get_user_by( 'email',  $email );
 $getUsername= get_user_by( 'login',  $username );
 $errors = [];
 $user_id='';

    if($getEmail){
      $errors['email']=  new WP_Error('emailError','El correo ya existe');
    };
    if($getUsername ){
        $errors['nombre']=  new WP_Error('nombreError','El nombre del usuario ya existe');
   };
   if (!$getUsername && !$getEmail) {
    $userdata = array(
        'user_login' => $username,
        'user_pass' =>  $pass,
        'user_email' =>  $email
    );
        $user_id=wp_insert_user(wp_slash( $userdata ));
    };
     if($user_id!==''){
      foreach ($metas as $key=>$value ) {
        add_user_meta($user_id,$key,$value);
      } 
     }
  
 return array(
     'user'=>$user_id,
     'errors'=>$errors
 );
 
}


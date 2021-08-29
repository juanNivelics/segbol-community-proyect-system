<?php
/**
 *  Segbol community proyect system
 *
 * @package           Form template
 * @author            Juan Carlos Avila (Nivelics Colombia)
 * @copyright         2021 Nivelics Colombia
 * @license           GPL-2.0-or-later
 */
// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function register_form(){
    
    ?>
  
   <form id="regForm" name="regForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data">
   <label for="" > <br> Nombre <br>
       <input type="text" name="nombre" id="">
   </label>
   <label> <br> Correo <br>
       <input type="email" name="email" id="">

   </label>
   <label> <br> Contraseña <br>
       <input type="password" name="userpass" id="">
       
    </label>
    <label> <br> Profesión <br>
       <input type="text" name="profesion" id="">
       
    </label>
    <label> <br> Edad <br>
       <input type="text" name="edad" id="">
       
    </label>
    <label for=""><br>Titulo post <br>
        <input type="text"  name="post-title">
        
    </label>
    <label><br>Imagen post <br>
        <input type="file" name="image-post" id="">
 
    </label>
    <fieldset>
        <label for="categoria-1"><input type="checkbox" name="cat_proyect_saludBienestar" value="cat_proyect_saludBienestar" id="categoria-1">cat_proyect_saludBienestar</label>
        <label for="categoria-2"><input type="checkbox" name="cat_proyect_educacionCalidad" value="cat_proyect_educacionCalidad" id="categoria-2">cat_proyect_educacionCalidad</label>
        <label for="categoria-3"><input type="checkbox" name="cat_proyect_inclusionPobreza" value="cat_proyect_inclusionPobreza" id="categoria-3">cat_proyect_inclusionPobreza</label>
        <label for="categoria-4"><input type="checkbox" name="cat_proyect_transparenciaJ" name="cat_proyect_transparenciaJ" id="categoria-4">cat_proyect_transparenciaJ</label>
    </fieldset>
   <label for="">
   <br>  Contenido del post <br>
    <?php $form.=wp_editor( $post_obj->post_content, 'userpostcontent', array(
        'textarea'=>'contenido',

    ) );?>

   </label>
   
   <input type="hidden" name="action" value="register_user_post">
    <input type="submit"  name = "submit" value="Enviar">
  <?php   wp_nonce_field('regForm'); ?>
    </form>
    <?php
    
  
}
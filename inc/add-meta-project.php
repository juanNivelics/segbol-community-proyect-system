<?php
add_action( 'add_meta_boxes', 'segbol_register_add_meta_project');

function segbol_register_add_meta_project(){
    add_meta_box( 'segbol_area_de_ingenieria','Area de ingenieria','segbol_register_add_meta_display_callback','segbol_proyectos' );
}
function segbol_register_add_meta_display_callback(){
    $web1 = get_post_meta( $post->ID, 'web1', true );
	$web2 = get_post_meta( $post->ID, 'web2', true );
	
	// Usaremos este nonce field más adelante cuando guardemos en twp_save_meta_box()
	wp_nonce_field( 'segbol_box_nonce', 'meta_box_nonce' );
	
	
	echo '<p><label for="web1_label">Web de referencia 1</label> <input type="text" name="web1" id="web1" value="'. $web1 .'" /></p>';
	echo '<p><label for="web2_label">Web de referencia 2</label> <input type="text" name="web2" id="web2" value="'. $web2 .'" /></p>';
}
function segbol_register_save_meta_project( $post_id ) {
	// Comprobamos si es auto guardado
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Comprobamos el valor nonce creado en twp_mi_display_callback()
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'segbol_box_nonce' ) ) return;
	// Comprobamos si el usuario actual no puede editar el post
	if( !current_user_can( 'edit_post' ) ) return;
	
	
	// Guardamos...
	if( isset( $_POST['web1'] ) )
	update_post_meta( $post_id, 'web1', $_POST['web1'] );
	if( isset( $_POST['web2'] ) )
	update_post_meta( $post_id, 'web2', $_POST['web2'] );
}
add_action( 'save_post', 'segbol_register_save_meta_project' );
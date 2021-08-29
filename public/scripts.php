<?php
/**
 * Segbol community proyect system
 *
 * @package           Segbol Scripts and styles - frontend
 * @author            Juan Carlos Avila (Nivelics Colombia)
 * @copyright         2021 Nivelics Colombia
 * @license           GPL-2.0-or-later
 * 
 */
function enqueue_scripts() {
    wp_enqueue_script( 'jquery-ui', plugin_dir_url( __FILE__ ) . 'assets/lib/jquery-ui/jquery-ui.min.js', array( 'jquery' ), SEGBOL_VERSION, true );
    wp_enqueue_script( 'segbol-proyect-script', plugin_dir_url( __FILE__ ) . 'assets/js/segbol-proyect-script.js', array( 'jquery','jquery-ui' ), SEGBOL_VERSION, true );
    wp_enqueue_style( 'jquery-ui',plugin_dir_url( __FILE__ ) . 'assets/lib/jquery-ui/jquery-ui.min.css',array(), SEGBOL_VERSION );
    wp_enqueue_style( 'segbol-proyect-style',plugin_dir_url( __FILE__ ) . 'assets/css/segbol-proyect-style.css',array(), SEGBOL_VERSION );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts');


/* Add module filter */
add_filter( 'script_loader_tag', 'segbol_proyect_script', 10, 3 );
 
function segbol_proyect_script( $tag, $handle, $src ) {
    if ( 'segbol-proyect-script' === $handle ) {
        $tag = '<script  type="module" src="' . esc_url( $src ) . '" id="segbol-proyect-script" ></script>';
    }
 
    return $tag;
}


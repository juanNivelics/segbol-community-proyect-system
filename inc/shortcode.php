<?php
/**
 * Segbol community proyect system
 *
 * @package           Shortcodes
 * @author            Juan Carlos Avila (Nivelics Colombia)
 * @copyright         2021 Nivelics Colombia
 * @license           GPL-2.0-or-later
 * 
 *
 */
// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (file_exists(__DIR__.'/../template/register-post.php')) {
    require_once(__DIR__.'/../template/register-post.php');
 }
 // Register a new shortcode: [cr_custom_registration]
add_shortcode('form_registration', 'custom_registration_shortcode_reg');

// The callback function that will replace [book]
function custom_registration_shortcode_reg()
{
    ob_start();
   // sendemnail();
   register_form();
 
    return ob_get_clean();
}
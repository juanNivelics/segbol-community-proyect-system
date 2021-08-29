<?php
/**
 * Segbol community proyect system
 *
 * @package           segbol-community-proyect-system
 * @author            Juan Carlos Avila (Nivelics Colombia)
 * @copyright         2021 Nivelics Colombia
 * @license           GPL-2.0-or-later
 * 
 * @wordpress-plugin
 * Plugin Name:       Segbol community proyect system
 * Plugin URI:        https://github.com/juanNivelics/segbol-community-proyect-system
 * Description:       sistema de creación de proyectos.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Juan Carlos Avila (Nivelics Colombia)
 * Author URI:        https://example.com
 * Text Domain:       segbol-community-proyect-system
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */
//Constantes
define('SEGBOL_VERSION','1.0.0');
define('PLUGINDIR', plugin_dir_path( __FILE__ ).'/proyect-system' );

 /**
 * Register the "proyect" custom post type
 */


if(file_exists(dirname( __FILE__ ).'/public/scripts.php')){
    require_once(dirname( __FILE__ ).'/public/scripts.php');
}

 if (file_exists(dirname( __FILE__ ).'/inc/post-type.php')) {
    require_once(dirname( __FILE__ ).'/inc/post-type.php');
 }

 /* if (file_exists(dirname( __FILE__ ).'./template/form.php')) {
    require_once(dirname( __FILE__ ).'./template/form.php');
 } */

//shortcodes
if (file_exists(dirname( __FILE__ ).'/inc/shortcode.php')) {
    require_once(dirname( __FILE__ ).'/inc/shortcode.php');
 }
 if (file_exists(dirname( __FILE__ ).'/inc/functions.php')) {
    require_once(dirname( __FILE__ ).'/inc/functions.php');
 }

/**
 * Activate the plugin.
 */
function segbol_pluginprefix_activate() { 
    // Trigger our function that registers the custom post type plugin.
    segbol_proyects_post_type(); 
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules(); 
}
register_activation_hook( dirname( __FILE__ ), 'segbol_pluginprefix_activate' );

/**
 * Deactivation hook.
 */
function segbol_pluginprefix_deactivate() {
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type( 'segbol_proyectos' );
    unregister_taxonomy('project_category');
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook( dirname( __FILE__ ), 'segbol_pluginprefix_deactivate' );
<?php
/**
 * Segbol community proyect system
 *
 * @package           Segbol Register post type and taxonomy
 * @author            Juan Carlos Avila (Nivelics Colombia)
 * @copyright         2021 Nivelics Colombia
 * @license           GPL-2.0-or-later
 * 
 */
if ( ! function_exists('segbol_proyects_post_type') ) {

    // Register Custom Post Type
    function segbol_proyects_post_type() {
    
        $labels = array(
            'name'                  => _x( 'Proyectos', 'Post Type General Name', 'segbol-community-proyects-system' ),
            'singular_name'         => _x( 'Proyecto', 'Post Type Singular Name', 'segbol-community-proyects-system' ),
            'menu_name'             => __( 'Proyectos segbol', 'segbol-community-proyects-system' ),
            'name_admin_bar'        => __( 'Proyecto segbol', 'segbol-community-proyects-system' ),
            'archives'              => __( 'Proyectos', 'segbol-community-proyects-system' ),
            'attributes'            => __( 'Atributos del proyecto', 'segbol-community-proyects-system' ),
            'parent_item_colon'     => __( 'Proyecto principal', 'segbol-community-proyects-system' ),
            'all_items'             => __( 'Todos los proyectos', 'segbol-community-proyects-system' ),
            'add_new_item'          => __( 'Añadir nuevo proyecto', 'segbol-community-proyects-system' ),
            'add_new'               => __( 'Añadir nuevo', 'segbol-community-proyects-system' ),
            'new_item'              => __( 'nuevo proyecto', 'segbol-community-proyects-system' ),
            'edit_item'             => __( 'Editar proyecto', 'segbol-community-proyects-system' ),
            'update_item'           => __( 'Actualizar proyecto', 'segbol-community-proyects-system' ),
            'view_item'             => __( 'Ver proyecto', 'segbol-community-proyects-system' ),
            'view_items'            => __( 'Ver proyectos', 'segbol-community-proyects-system' ),
            'search_items'          => __( 'Buscar proyectos', 'segbol-community-proyects-system' ),
            'not_found'             => __( 'No encontrado', 'segbol-community-proyects-system' ),
            'not_found_in_trash'    => __( 'No encontrado en la basura', 'segbol-community-proyects-system' ),
            'featured_image'        => __( 'Imagen destacada', 'segbol-community-proyects-system' ),
            'set_featured_image'    => __( 'Conf. imagen destacada', 'segbol-community-proyects-system' ),
            'remove_featured_image' => __( 'Remover imagen destacada', 'segbol-community-proyects-system' ),
            'use_featured_image'    => __( 'Usar como imagen destacada', 'segbol-community-proyects-system' ),
            'insert_into_item'      => __( 'Insertar en el proyecto', 'segbol-community-proyects-system' ),
            'uploaded_to_this_item' => __( 'Subido a este proyecto', 'segbol-community-proyects-system' ),
            'items_list'            => __( 'Lista de proyectos', 'segbol-community-proyects-system' ),
            'items_list_navigation' => __( 'Lista de navegación de proyectos', 'segbol-community-proyects-system' ),
            'filter_items_list'     => __( 'Filtrar lista de proyectos', 'segbol-community-proyects-system' ),
        );
        $rewrite = array(
            'slug'                  => 'proyecto',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Proyecto', 'segbol-community-proyects-system' ),
            'description'           => __( 'Registro de preoyecto para social skin', 'segbol-community-proyects-system' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields' ),
            'taxonomies'            => array( 'project_category' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-portfolio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'proyectos',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
            'rest_base'             => 'segbol_proyect',
        );
        register_post_type( 'segbol_proyectos', $args );
    
    }
    add_action( 'init', 'segbol_proyects_post_type', 0 );
    
    }
    if ( ! function_exists( 'project_category_taxonomy' ) ) {

        // Register Custom Taxonomy
        function project_category_taxonomy() {
        
            $labels = array(
                'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'segbol-community-proyects-system' ),
                'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', 'segbol-community-proyects-system' ),
                'menu_name'                  => __( 'Categorías de proyectos', 'segbol-community-proyects-system' ),
                'all_items'                  => __( 'Todas las categorías', 'segbol-community-proyects-system' ),
                'parent_item'                => __( 'Categoria principal', 'segbol-community-proyects-system' ),
                'parent_item_colon'          => __( 'Categoria principal:', 'segbol-community-proyects-system' ),
                'new_item_name'              => __( 'Nueva categoría de proyecto', 'segbol-community-proyects-system' ),
                'add_new_item'               => __( 'Añadir nueva categoría', 'segbol-community-proyects-system' ),
                'edit_item'                  => __( 'Editar categoría', 'segbol-community-proyects-system' ),
                'update_item'                => __( 'Act. categoría', 'segbol-community-proyects-system' ),
                'view_item'                  => __( 'Ver categoría', 'segbol-community-proyects-system' ),
                'separate_items_with_commas' => __( 'categorías separadas con comas', 'segbol-community-proyects-system' ),
                'add_or_remove_items'        => __( 'Añadir o remover categoría', 'segbol-community-proyects-system' ),
                'choose_from_most_used'      => __( 'Elija entre los más usados', 'segbol-community-proyects-system' ),
                'popular_items'              => __( 'Categorías populares', 'segbol-community-proyects-system' ),
                'search_items'               => __( 'Buscar categoría', 'segbol-community-proyects-system' ),
                'not_found'                  => __( 'No encontrado', 'segbol-community-proyects-system' ),
                'no_terms'                   => __( 'No hay categoría', 'segbol-community-proyects-system' ),
                'items_list'                 => __( 'lista de categoría', 'segbol-community-proyects-system' ),
                'items_list_navigation'      => __( 'Navegación por la lista de categorías', 'segbol-community-proyects-system' ),
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'show_in_rest'               => true,
            );
            register_taxonomy( 'project_category', array( 'segbol_proyectos' ), $args );
        
        }
        add_action( 'init', 'project_category_taxonomy', 0 );
        
        }
?>
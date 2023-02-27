<?php
// Register Custom Post Type
function register_custom_post_types() {
	// /**
    //  * Post Type: Eventos
    //  */
    // $labels = array(
    //     'name'                => __( 'Eventos', 'acrefi-theme' ),
    //     'singular_name'       => __( 'Evento', 'acrefi-theme' ),
    //     'all_items'           => __( 'Todos os Eventos', 'acrefi-theme' ),
    //     'add_new'             => __( 'Adicionar Novo Evento', 'acrefi-theme' ),
    //     'add_new_item'        => __( 'Adicionar Novo Evento', 'acrefi-theme' ),
    // );
    // $rewrite = array(
    //     'slug'                => 'evento',
    //     'with_front'          => true
    // );
    // $args = array(
    //     'label'               => __( 'Evento', 'acrefi-theme' ),
    //     'labels'              => $labels,
    //     'description'         => '',
    //     'public'              => true,
    //     'publicly_queryable'  => true,
    //     'show_ui'             => true,
    //     'show_in_rest'        => false,
    //     'rest_base'           => '',
    //     'show_in_menu'        => true,
    //     'exclude_from_search' => false,
    //     'capability_type'     => 'post',
    //     'menu_position'       => 5,
    //     'map_meta_cap'        => true,
    //     'hierarchical'        => false,
    //     'rewrite'             => $rewrite,
    //     'query_var'           => true,
    //     'menu_icon'           => 'dashicons-calendar-alt',
    //     'supports'            => array( 'title', 'editor','thumbnail' ),
    // );
    // register_post_type( 'events', $args );

    // flush_rewrite_rules();
}
add_action( 'init', 'register_custom_post_types' );
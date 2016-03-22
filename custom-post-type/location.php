<?php

/**
 * MediPlus function to register Location post type.
 *
 * @package mediplus
 * @since 	MediPlus 1.0
 */

if ( ! function_exists( 'mediplus_register_location_post' ) ) {
    function mediplus_register_location_post() {
        $labels = array(
            'name'                => esc_html_x( 'Locations', 'Post Type General Name', 'mediplus' ),
            'singular_name'       => esc_html_x( 'Location', 'Post Type Singular Name', 'mediplus' ),
            'menu_name'           => esc_html__( 'Locations', 'mediplus' ),
            'parent_item_colon'   => esc_html__( 'Parent Location:', 'mediplus' ),
            'all_items'           => esc_html__( 'All Locations', 'mediplus' ),
            'view_item'           => esc_html__( 'View Location', 'mediplus' ),
            'add_new_item'        => esc_html__( 'Add New Location', 'mediplus' ),
            'add_new'             => esc_html__( 'Add Location', 'mediplus' ),
            'edit_item'           => esc_html__( 'Edit Location', 'mediplus' ),
            'update_item'         => esc_html__( 'Update Location', 'mediplus' ),
            'search_items'        => esc_html__( 'Search Location', 'mediplus' ),
            'not_found'           => esc_html__( 'Location Not found', 'mediplus' ),
            'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'mediplus' ),
        );
        $args = array(
            'label'               => esc_html__( 'location', 'mediplus' ),
            'description'         => esc_html__( 'Location listing.', 'mediplus' ),
            'labels'              => $labels,
            'supports'            => array( 'title' ),
            'taxonomies'          => array(),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 21,
            'menu_icon'           => 'dashicons-location-alt',
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );
        register_post_type( 'location', $args );
    }
    add_action( 'init', 'mediplus_register_location_post', 0 );
}
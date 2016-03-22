<?php

/**
 * MediPlus function to register Testimonial post type.
 *
 * @package mediplus
 * @since   MediPlus 1.0
 */

if ( ! function_exists( 'mediplus_register_testimonial_post' ) ) {
    function mediplus_register_testimonial_post() {
        $labels = array(
            'name'                => esc_html_x( 'Testimonials', 'Post Type General Name', 'mediplus' ),
            'singular_name'       => esc_html_x( 'Testimonial', 'Post Type Singular Name', 'mediplus' ),
            'menu_name'           => esc_html__( 'Testimonials', 'mediplus' ),
            'parent_item_colon'   => esc_html__( 'Parent Testimonial:', 'mediplus' ),
            'all_items'           => esc_html__( 'All Testimonials', 'mediplus' ),
            'view_item'           => esc_html__( 'View Testimonial', 'mediplus' ),
            'add_new_item'        => esc_html__( 'Add New Testimonial', 'mediplus' ),
            'add_new'             => esc_html__( 'Add Testimonial', 'mediplus' ),
            'edit_item'           => esc_html__( 'Edit Testimonial', 'mediplus' ),
            'update_item'         => esc_html__( 'Update Testimonial', 'mediplus' ),
            'search_items'        => esc_html__( 'Search Testimonial', 'mediplus' ),
            'not_found'           => esc_html__( 'Testimonial Not found', 'mediplus' ),
            'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'mediplus' ),
        );
        $args = array(
            'label'               => esc_html__( 'testimonial', 'mediplus' ),
            'description'         => esc_html__( 'Testimonial from Others', 'mediplus' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'          => array(),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => true,
            'menu_position'       => 22,
            'menu_icon'           => 'dashicons-testimonial',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );
        register_post_type( 'testimonial', $args );
    }
    add_action( 'init', 'mediplus_register_testimonial_post', 0 );
}
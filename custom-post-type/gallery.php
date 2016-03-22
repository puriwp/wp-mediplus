<?php

/**
 * MediPlus function to register Gallery post type.
 *
 * @package mediplus
 * @since 	MediPlus 1.0
 */

if ( ! function_exists( 'mediplus_register_gallery_post' ) ) {
	function mediplus_register_gallery_post() {
        $labels = array(
            'name'					=> esc_html_x( 'Galleries', 'Post Type General Name', 'mediplus' ),
            'singular_name'			=> esc_html_x( 'Gallery', 'Post Type Singular Name', 'mediplus' ),
            'menu_name'				=> esc_html__( 'Galleries', 'mediplus' ),
            'parent_item_colon'		=> esc_html__( 'Parent Gallery:', 'mediplus' ),
            'all_items'				=> esc_html__( 'All Galleries', 'mediplus' ),
            'view_item'				=> esc_html__( 'View Gallery', 'mediplus' ),
            'add_new_item'			=> esc_html__( 'Add New Gallery', 'mediplus' ),
            'add_new'				=> esc_html__( 'Add Gallery', 'mediplus' ),
            'edit_item'				=> esc_html__( 'Edit Gallery', 'mediplus' ),
            'update_item'			=> esc_html__( 'Update Gallery', 'mediplus' ),
            'search_items'			=> esc_html__( 'Search Gallery', 'mediplus' ),
            'not_found'				=> esc_html__( 'Gallery Not found', 'mediplus' ),
            'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'mediplus' ),
        );
        $args = array(
            'label'					=> esc_html__( 'gallery', 'mediplus' ),
            'description'			=> esc_html__( 'Gallery Photos & Videos', 'mediplus' ),
            'labels'				=> $labels,
            'supports'				=> array( 'title', 'excerpt', 'post-formats' ),
            'hierarchical'			=> false,
            'public'				=> true,
            'show_ui'				=> true,
            'show_in_menu'			=> true,
            'show_in_nav_menus'		=> false,
            'show_in_admin_bar'		=> true,
            'menu_position'			=> 11,
            'menu_icon'				=> 'dashicons-format-gallery',
            'can_export'			=> true,
            'has_archive'			=> true,
            'exclude_from_search'	=> true,
            'publicly_queryable'	=> true,
            'capability_type'		=> 'post',
        );
        register_post_type( 'gallery', $args );
	}
	add_action( 'init', 'mediplus_register_gallery_post', 0 );
}
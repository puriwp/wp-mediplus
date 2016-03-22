<?php

/**
 * MediPlus function to register FAQ post type.
 *
 * @package mediplus
 * @since 	MediPlus 1.0
 */

if ( ! function_exists( 'mediplus_register_faq_post' ) ) {
	function mediplus_register_faq_post() {
		$labels = array(
			'name'					=> esc_html_x( 'FAQs', 'Post Type General Name', 'mediplus' ),
			'singular_name'			=> esc_html_x( 'FAQ', 'Post Type Singular Name', 'mediplus' ),
			'menu_name'				=> esc_html__( 'FAQs', 'mediplus' ),
			'parent_item_colon'		=> esc_html__( 'Parent FAQ:', 'mediplus' ),
			'all_items'				=> esc_html__( 'All FAQs', 'mediplus' ),
			'view_item'				=> esc_html__( 'View FAQ', 'mediplus' ),
			'add_new_item'			=> esc_html__( 'Add New FAQ', 'mediplus' ),
			'add_new'				=> esc_html__( 'Add FAQ', 'mediplus' ),
			'edit_item'				=> esc_html__( 'Edit FAQ', 'mediplus' ),
			'update_item'			=> esc_html__( 'Update FAQ', 'mediplus' ),
			'search_items'			=> esc_html__( 'Search FAQ', 'mediplus' ),
			'not_found'				=> esc_html__( 'FAQ Not found', 'mediplus' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'mediplus' ),
		);
		$args = array(
			'label'					=> esc_html__( 'faq', 'mediplus' ),
			'description'			=> esc_html__( 'Frequently Asked Questions', 'mediplus' ),
			'labels'				=> $labels,
			'supports'				=> array( 'title', 'editor', 'excerpt' ),
			'taxonomies'			=> array( 'category' ),
			'hierarchical'			=> false,
			'public'				=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'show_in_nav_menus'		=> false,
			'show_in_admin_bar'		=> true,
			'menu_position'			=> 8,
			'menu_icon'				=> 'dashicons-lightbulb',
			'can_export'			=> true,
			'has_archive'			=> true,
			'exclude_from_search'	=> false,
			'publicly_queryable'	=> true,
			'capability_type'		=> 'post',
		);
		register_post_type( 'faq', $args );
	}
	add_action( 'init', 'mediplus_register_faq_post', 0 );
}
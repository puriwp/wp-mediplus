<?php

/**
 * MediPlus function to register Career post type.
 *
 * @package mediplus
 * @since 	MediPlus 1.0
 */

if ( ! function_exists( 'mediplus_register_career_post' ) ) {
	function mediplus_register_career_post() {
		$labels = array(
			'name'					=> esc_html_x( 'Careers', 'Post Type General Name', 'mediplus' ),
			'singular_name'			=> esc_html_x( 'Career', 'Post Type Singular Name', 'mediplus' ),
			'menu_name'				=> esc_html__( 'Career', 'mediplus' ),
			'parent_item_colon'		=> esc_html__( 'Parent Career:', 'mediplus' ),
			'all_items'				=> esc_html__( 'All Jobs', 'mediplus' ),
			'view_item'				=> esc_html__( 'View Job', 'mediplus' ),
			'add_new_item'			=> esc_html__( 'Add New Job', 'mediplus' ),
			'add_new'				=> esc_html__( 'Add Job', 'mediplus' ),
			'edit_item'				=> esc_html__( 'Edit Job', 'mediplus' ),
			'update_item'			=> esc_html__( 'Update Job', 'mediplus' ),
			'search_items'			=> esc_html__( 'Search Jobs', 'mediplus' ),
			'not_found'				=> esc_html__( 'Job Not found', 'mediplus' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'mediplus' ),
		);
		$args = array(
			'label'					=> esc_html__( 'career', 'mediplus' ),
			'description'			=> esc_html__( 'Career Job Opening', 'mediplus' ),
			'labels'				=> $labels,
			'supports'				=> array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'			=> array(),
			'hierarchical'			=> false,
			'public'				=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'show_in_nav_menus'		=> false,
			'show_in_admin_bar'		=> true,
			'menu_position'			=> 9,
			'menu_icon'				=> 'dashicons-archive',
			'can_export'			=> true,
			'has_archive'			=> true,
			'exclude_from_search'	=> false,
			'publicly_queryable'	=> true,
			'capability_type'		=> 'post',
		);
		register_post_type( 'career', $args );
	}
	add_action( 'init', 'mediplus_register_career_post', 0 );
}
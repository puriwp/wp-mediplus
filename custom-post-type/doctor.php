<?php

/**
 * MediPlus function to register Doctor post type.
 *
 * @package mediplus
 * @since 	MediPlus 1.0
 */

if ( ! function_exists( 'mediplus_register_doctor_post' ) ) {
	function mediplus_register_doctor_post() {
		$labels = array(
			'name'					=> esc_html_x( 'Doctors', 'Post Type General Name', 'mediplus' ),
			'singular_name'			=> esc_html_x( 'Doctor', 'Post Type Singular Name', 'mediplus' ),
			'menu_name'				=> esc_html__( 'Doctors', 'mediplus' ),
			'parent_item_colon'		=> esc_html__( 'Parent Doctor:', 'mediplus' ),
			'all_items'				=> esc_html__( 'All Doctors', 'mediplus' ),
			'view_item'				=> esc_html__( 'View Doctor', 'mediplus' ),
			'add_new_item'			=> esc_html__( 'Add New Doctor', 'mediplus' ),
			'add_new'				=> esc_html__( 'Add Doctor', 'mediplus' ),
			'edit_item'				=> esc_html__( 'Edit Doctor', 'mediplus' ),
			'update_item'			=> esc_html__( 'Update Doctor', 'mediplus' ),
			'search_items'			=> esc_html__( 'Search Doctor', 'mediplus' ),
			'not_found'				=> esc_html__( 'Not found', 'mediplus' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'mediplus' ),
		);
		$args = array(
			'label'					=> esc_html__( 'doctor', 'mediplus' ),
			'description'			=> esc_html__( 'Medical Doctors & Staffs', 'mediplus' ),
			'labels'				=> $labels,
			'supports'				=> array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'			=> array( 'department' ),
			'hierarchical'			=> false,
			'public'				=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'show_in_nav_menus'		=> false,
			'show_in_admin_bar'		=> true,
			'menu_position'			=> 6,
			'menu_icon'				=> 'dashicons-businessman',
			'can_export'			=> true,
			'has_archive'			=> true,
			'exclude_from_search'	=> false,
			'publicly_queryable'	=> true,
			'capability_type'		=> 'post',
			'rewrite'				=> array( 'slug' => 'doctor', 'with_front' => true ),
		);
		register_post_type( 'doctor', $args );
	}
	add_action( 'init', 'mediplus_register_doctor_post', 0 );
}
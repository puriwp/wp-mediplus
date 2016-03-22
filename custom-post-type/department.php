<?php

/**
 * MediPlus function to register Testimonial post type.
 *
 * @package mediplus
 * @since   MediPlus 1.0
 */

if ( ! function_exists( 'mediplus_register_department' ) ) {
    function mediplus_register_department() {
        $labels = array(
            'name'                       => esc_html_x( 'Departments', 'Taxonomy General Name', 'mediplus' ),
            'singular_name'              => esc_html_x( 'Department', 'Taxonomy Singular Name', 'mediplus' ),
            'menu_name'                  => esc_html__( 'Departments', 'mediplus' ),
            'all_items'                  => esc_html__( 'All Departments', 'mediplus' ),
            'parent_item'                => esc_html__( 'Parent Department', 'mediplus' ),
            'parent_item_colon'          => esc_html__( 'Parent Department:', 'mediplus' ),
            'new_item_name'              => esc_html__( 'New Department Name', 'mediplus' ),
            'add_new_item'               => esc_html__( 'Add New Department', 'mediplus' ),
            'edit_item'                  => esc_html__( 'Edit Department', 'mediplus' ),
            'update_item'                => esc_html__( 'Update Department', 'mediplus' ),
            'separate_items_with_commas' => esc_html__( 'Separate department with commas', 'mediplus' ),
            'search_items'               => esc_html__( 'Search Department', 'mediplus' ),
            'add_or_remove_items'        => esc_html__( 'Add or remove departments', 'mediplus' ),
            'choose_from_most_used'      => esc_html__( 'Choose from the most used department', 'mediplus' ),
            'not_found'                  => esc_html__( 'Department Not Found', 'mediplus' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
            'update_count_callback'      => '_update_post_term_count',
            'query_var'                  => false,
            'rewrite'                    => array( 'slug' => 'department' ),
        );
        register_taxonomy( 'department', 'doctor', $args );
    }
    add_action( 'init', 'mediplus_register_department', 0 );
}
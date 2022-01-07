<?php

/**
 * This is an example file showcasing how you can add custom post types to your Joi theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Joi\CustomPostTypes;

function registerEducationPostType()
{
    $labels = [
        'name'                  => _x('Educations', 'Post Type General Name', 'joi'),
        'singular_name'         => _x('Education', 'Post Type Singular Name', 'joi'),
        'menu_name'             => __('Educations', 'joi'),
        'name_admin_bar'        => __('Education', 'joi'),
        'archives'              => __('Education Archives', 'joi'),
        'attributes'            => __('Education Attributes', 'joi'),
        'parent_item_colon'     => __('Parent Education:', 'joi'),
        'all_items'             => __('All Educations', 'joi'),
        'add_new_item'          => __('Add New Education', 'joi'),
        'add_new'               => __('Add New', 'joi'),
        'new_item'              => __('New Education', 'joi'),
        'edit_item'             => __('Edit Education', 'joi'),
        'update_item'           => __('Update Education', 'joi'),
        'view_item'             => __('View Education', 'joi'),
        'view_items'            => __('View Educations', 'joi'),
        'search_items'          => __('Search Education', 'joi'),
        'not_found'             => __('Not found', 'joi'),
        'not_found_in_trash'    => __('Not found in Trash', 'joi'),
        'featured_image'        => __('Featured Image', 'joi'),
        'set_featured_image'    => __('Set featured image', 'joi'),
        'remove_featured_image' => __('Remove featured image', 'joi'),
        'use_featured_image'    => __('Use as featured image', 'joi'),
        'insert_into_item'      => __('Insert into item', 'joi'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'joi'),
        'items_list'            => __('Educations list', 'joi'),
        'items_list_navigation' => __('Educations list navigation', 'joi'),
        'filter_items_list'     => __('Filter items list', 'joi'),
    ];
    $args = [
        'label'                 => __('Educations', 'joi'),
        'description'           => __('Educations', 'joi'),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'            => ['category'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 2,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'educations',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rest_base'             => 'educations',
    ];
    register_post_type('education', $args);
}

add_action('init', '\Joi\CustomPostTypes\registerEducationPostType');

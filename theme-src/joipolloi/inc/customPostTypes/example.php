<?php

/**
 * This is an example file showcasing how you can add custom post types to your Joi theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Joi\CustomPostTypes;

// function registerExamplePostType()
// {
//     $labels = [
//         'name'                  => _x('Post Types', 'Post Type General Name', 'joi'),
//         'singular_name'         => _x('Post Type', 'Post Type Singular Name', 'joi'),
//         'menu_name'             => __('Post Types', 'joi'),
//         'name_admin_bar'        => __('Post Type', 'joi'),
//         'archives'              => __('Item Archives', 'joi'),
//         'attributes'            => __('Item Attributes', 'joi'),
//         'parent_item_colon'     => __('Parent Item:', 'joi'),
//         'all_items'             => __('All Items', 'joi'),
//         'add_new_item'          => __('Add New Item', 'joi'),
//         'add_new'               => __('Add New', 'joi'),
//         'new_item'              => __('New Item', 'joi'),
//         'edit_item'             => __('Edit Item', 'joi'),
//         'update_item'           => __('Update Item', 'joi'),
//         'view_item'             => __('View Item', 'joi'),
//         'view_items'            => __('View Items', 'joi'),
//         'search_items'          => __('Search Item', 'joi'),
//         'not_found'             => __('Not found', 'joi'),
//         'not_found_in_trash'    => __('Not found in Trash', 'joi'),
//         'featured_image'        => __('Featured Image', 'joi'),
//         'set_featured_image'    => __('Set featured image', 'joi'),
//         'remove_featured_image' => __('Remove featured image', 'joi'),
//         'use_featured_image'    => __('Use as featured image', 'joi'),
//         'insert_into_item'      => __('Insert into item', 'joi'),
//         'uploaded_to_this_item' => __('Uploaded to this item', 'joi'),
//         'items_list'            => __('Items list', 'joi'),
//         'items_list_navigation' => __('Items list navigation', 'joi'),
//         'filter_items_list'     => __('Filter items list', 'joi'),
//     ];
//     $args = [
//         'label'                 => __('Post Type', 'joi'),
//         'description'           => __('Post Type Description', 'joi'),
//         'labels'                => $labels,
//         'supports'              => ['title', 'editor', 'revisions'],
//         'taxonomies'            => ['category', 'post_tag'],
//         'hierarchical'          => false,
//         'public'                => true,
//         'show_ui'               => true,
//         'show_in_menu'          => true,
//         'menu_position'         => 5,
//         'show_in_admin_bar'     => true,
//         'show_in_nav_menus'     => true,
//         'can_export'            => true,
//         'has_archive'           => true,
//         'exclude_from_search'   => false,
//         'publicly_queryable'    => true,
//         'capability_type'       => 'page',
//         'show_in_rest'          => true,
//     ];
//     register_post_type('example', $args);
// }

// add_action('init', '\\Joi\\CustomPostTypes\\registerExamplePostType');

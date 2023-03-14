<?php

/**
 * This is an example file showcasing how you can add custom post types to your Joi theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Joi\CustomPostTypes;

function registerEventPostType()
{
    $labels = [
        'name'                  => _x('What\'s On', 'Post Type General Name', 'joi'),
        'singular_name'         => _x('Event', 'Post Type Singular Name', 'joi'),
        'menu_name'             => __('Events', 'joi'),
        'name_admin_bar'        => __('Event', 'joi'),
        'archives'              => __('Event Archives', 'joi'),
        'attributes'            => __('Event Attributes', 'joi'),
        'parent_item_colon'     => __('Parent Event:', 'joi'),
        'all_items'             => __('All Events', 'joi'),
        'add_new_item'          => __('Add New Event', 'joi'),
        'add_new'               => __('Add New', 'joi'),
        'new_item'              => __('New Event', 'joi'),
        'edit_item'             => __('Edit Event', 'joi'),
        'update_item'           => __('Update Event', 'joi'),
        'view_item'             => __('View Event', 'joi'),
        'view_items'            => __('View Events', 'joi'),
        'search_items'          => __('Search Event', 'joi'),
        'not_found'             => __('Not found', 'joi'),
        'not_found_in_trash'    => __('Not found in Trash', 'joi'),
        'featured_image'        => __('Featured Image', 'joi'),
        'set_featured_image'    => __('Set featured image', 'joi'),
        'remove_featured_image' => __('Remove featured image', 'joi'),
        'use_featured_image'    => __('Use as featured image', 'joi'),
        'insert_into_item'      => __('Insert into item', 'joi'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'joi'),
        'items_list'            => __('Events list', 'joi'),
        'items_list_navigation' => __('Events list navigation', 'joi'),
        'filter_items_list'     => __('Filter items list', 'joi'),
    ];
    $args = [
        'label'                 => __('Events', 'joi'),
        'description'           => __('Events', 'joi'),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'            => ['category'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'           => 'dashicons-calendar',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'whats-on',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rest_base'             => 'events',
    ];
    register_post_type('event', $args);
}

add_action('init', '\Joi\CustomPostTypes\registerEventPostType');

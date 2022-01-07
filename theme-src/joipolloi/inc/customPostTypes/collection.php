<?php

/**
 * This is an example file showcasing how you can add custom post types to your Joi theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Joi\CustomPostTypes;

function registerCollectionPostType()
{
    $labels = [
        'name'                  => _x('Collections', 'Post Type General Name', 'joi'),
        'singular_name'         => _x('Collection', 'Post Type Singular Name', 'joi'),
        'menu_name'             => __('Collections', 'joi'),
        'name_admin_bar'        => __('Collection', 'joi'),
        'archives'              => __('Collection Archives', 'joi'),
        'attributes'            => __('Collection Attributes', 'joi'),
        'parent_item_colon'     => __('Parent Collection:', 'joi'),
        'all_items'             => __('All Collections', 'joi'),
        'add_new_item'          => __('Add New Collection', 'joi'),
        'add_new'               => __('Add New', 'joi'),
        'new_item'              => __('New Collection', 'joi'),
        'edit_item'             => __('Edit Collection', 'joi'),
        'update_item'           => __('Update Collection', 'joi'),
        'view_item'             => __('View Collection', 'joi'),
        'view_items'            => __('View Collections', 'joi'),
        'search_items'          => __('Search Collection', 'joi'),
        'not_found'             => __('Not found', 'joi'),
        'not_found_in_trash'    => __('Not found in Trash', 'joi'),
        'featured_image'        => __('Featured Image', 'joi'),
        'set_featured_image'    => __('Set featured image', 'joi'),
        'remove_featured_image' => __('Remove featured image', 'joi'),
        'use_featured_image'    => __('Use as featured image', 'joi'),
        'insert_into_item'      => __('Insert into item', 'joi'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'joi'),
        'items_list'            => __('Collections list', 'joi'),
        'items_list_navigation' => __('Collections list navigation', 'joi'),
        'filter_items_list'     => __('Filter items list', 'joi'),
    ];
    $args = [
        'label'                 => __('Collections', 'joi'),
        'description'           => __('Collections', 'joi'),
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
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rest_base'             => 'collections',
    ];
    register_post_type('collection', $args);
}

add_action('init', '\Joi\CustomPostTypes\registerCollectionPostType');

<?php

/**
 * This is an example file showcasing how you can add custom post types to your Joi theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Joi\CustomPostTypes;

function registerAdvertPostType()
{
    $labels = [
        'name'                  => _x('Adverts', 'Post Type General Name', 'joi'),
        'singular_name'         => _x('Advert', 'Post Type Singular Name', 'joi'),
        'menu_name'             => __('Adverts', 'joi'),
        'name_admin_bar'        => __('Advert', 'joi'),
        'archives'              => __('Advert Archives', 'joi'),
        'attributes'            => __('Advert Attributes', 'joi'),
        'parent_item_colon'     => __('Parent Advert:', 'joi'),
        'all_items'             => __('All Adverts', 'joi'),
        'add_new_item'          => __('Add New Advert', 'joi'),
        'add_new'               => __('Add New', 'joi'),
        'new_item'              => __('New Advert', 'joi'),
        'edit_item'             => __('Edit Advert', 'joi'),
        'update_item'           => __('Update Advert', 'joi'),
        'view_item'             => __('View Advert', 'joi'),
        'view_items'            => __('View Adverts', 'joi'),
        'search_items'          => __('Search Advert', 'joi'),
        'not_found'             => __('Not found', 'joi'),
        'not_found_in_trash'    => __('Not found in Trash', 'joi'),
        'featured_image'        => __('Featured Image', 'joi'),
        'set_featured_image'    => __('Set featured image', 'joi'),
        'remove_featured_image' => __('Remove featured image', 'joi'),
        'use_featured_image'    => __('Use as featured image', 'joi'),
        'insert_into_item'      => __('Insert into item', 'joi'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'joi'),
        'items_list'            => __('Adverts list', 'joi'),
        'items_list_navigation' => __('Adverts list navigation', 'joi'),
        'filter_items_list'     => __('Filter items list', 'joi'),
    ];
    $args = [
        'label'                 => __('Adverts', 'joi'),
        'description'           => __('Adverts', 'joi'),
        'labels'                => $labels,
        'supports'              => array( 'title'),
        'taxonomies'            => [],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 2,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rest_base'             => 'adverts',
    ];
    register_post_type('advert', $args);
}

add_action('init', '\Joi\CustomPostTypes\registerAdvertPostType');

<?php

/**
 * This is an example file showcasing how you can add custom taxonomies to your Joi theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_taxonomy/ or use https://generatewp.com/taxonomy/ to generate the code for you.
 */

namespace Joi\CustomTaxonomies;

function registerEventTaxonomy()
{
    $labels = [
        'name'                       => _x('Event Categories', 'Taxonomy General Name', 'joi'),
        'singular_name'              => _x('Event Category', 'Taxonomy Singular Name', 'joi'),
        'menu_name'                  => __('Event Categories', 'joi'),
        'all_items'                  => __('All Categories', 'joi'),
        'parent_item'                => __('Parent Category', 'joi'),
        'parent_item_colon'          => __('Parent Category:', 'joi'),
        'new_item_name'              => __('New Category Name', 'joi'),
        'add_new_item'               => __('Add New Item', 'joi'),
        'edit_item'                  => __('Edit Category', 'joi'),
        'update_item'                => __('Update Category', 'joi'),
        'view_item'                  => __('View Category', 'joi'),
        'separate_items_with_commas' => __('Separate categories with commas', 'joi'),
        'add_or_remove_items'        => __('Add or remove categories', 'joi'),
        'choose_from_most_used'      => __('Choose from the most used', 'joi'),
        'popular_items'              => __('Popular Categories', 'joi'),
        'search_items'               => __('Search Categories', 'joi'),
        'not_found'                  => __('Not Found', 'joi'),
        'no_terms'                   => __('No categories', 'joi'),
        'items_list'                 => __('Categories list', 'joi'),
        'items_list_navigation'      => __('Categories list navigation', 'joi'),
    ];
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => array('slug' => 'event-category'),
    ];

    register_taxonomy('event-category', ['event'], $args);
}

add_action('init', 'Joi\\CustomTaxonomies\\registerEventTaxonomy');

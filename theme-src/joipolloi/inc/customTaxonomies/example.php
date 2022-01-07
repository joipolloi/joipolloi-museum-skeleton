<?php

/**
 * This is an example file showcasing how you can add custom taxonomies to your Joi theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_taxonomy/ or use https://generatewp.com/taxonomy/ to generate the code for you.
 */

namespace Joi\CustomTaxonomies;

// function registerExampleTaxonomy()
// {
//     $labels = [
//         'name'                       => _x('Taxonomies', 'Taxonomy General Name', 'joi'),
//         'singular_name'              => _x('Taxonomy', 'Taxonomy Singular Name', 'joi'),
//         'menu_name'                  => __('Taxonomy', 'joi'),
//         'all_items'                  => __('All Items', 'joi'),
//         'parent_item'                => __('Parent Item', 'joi'),
//         'parent_item_colon'          => __('Parent Item:', 'joi'),
//         'new_item_name'              => __('New Item Name', 'joi'),
//         'add_new_item'               => __('Add New Item', 'joi'),
//         'edit_item'                  => __('Edit Item', 'joi'),
//         'update_item'                => __('Update Item', 'joi'),
//         'view_item'                  => __('View Item', 'joi'),
//         'separate_items_with_commas' => __('Separate items with commas', 'joi'),
//         'add_or_remove_items'        => __('Add or remove items', 'joi'),
//         'choose_from_most_used'      => __('Choose from the most used', 'joi'),
//         'popular_items'              => __('Popular Items', 'joi'),
//         'search_items'               => __('Search Items', 'joi'),
//         'not_found'                  => __('Not Found', 'joi'),
//         'no_terms'                   => __('No items', 'joi'),
//         'items_list'                 => __('Items list', 'joi'),
//         'items_list_navigation'      => __('Items list navigation', 'joi'),
//     ];
//     $args = [
//         'labels'                     => $labels,
//         'hierarchical'               => false,
//         'public'                     => true,
//         'show_ui'                    => true,
//         'show_admin_column'          => true,
//         'show_in_nav_menus'          => true,
//         'show_tagcloud'              => true,
//     ];

//     register_taxonomy('example', ['post'], $args);
// }

// add_action('init', 'Joi\\CustomTaxonomies\\registerExampleTaxonomy');

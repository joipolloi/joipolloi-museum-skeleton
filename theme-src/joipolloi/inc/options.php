<?php

/**
 * Joi Options
 */

namespace Joi\Options;

function addSiteOptions()
{
    if (function_exists('acf_add_options_page')) :
        $parent = acf_add_options_page(array(
            'page_title'  => __('Site Settings'),
            'menu_title'  => __('Site Settings'),
            'capability'    => 'edit_posts',
            'redirect'        => true
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'General Site Settings',
            'menu_title'    => 'General Site Settings',
            'menu_slug'     => 'site-settings',
            'parent_slug'    => $parent['menu_slug']
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'About',
            'menu_title'    => 'About',
            'menu_slug'     => 'about',
            'parent_slug'    => $parent['menu_slug'],
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Page Settings',
            'menu_title'    => 'Page Settings',
            'menu_slug'     => 'page-setting',
            'parent_slug'    => $parent['menu_slug'],
        ));
    endif;
}

add_action('acf/init', 'Joi\Options\addSiteOptions');

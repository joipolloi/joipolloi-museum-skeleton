<?php

namespace Joi\Components\NavigationQuickLinks;

use Timber\Menu;

add_action('init', function () {
    register_nav_menus([
        'navigation_quick_links' => __('Quick Links', 'joi')
    ]);
});

add_filter('Joi/addComponentData?name=NavigationQuickLinks', function ($data) {
    $data['menu'] = new Menu('navigation_quick_links');

    return $data;
});

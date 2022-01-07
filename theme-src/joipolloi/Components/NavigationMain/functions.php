<?php

namespace Joi\Components\NavigationMain;

use Timber\Menu;

add_action('init', function () {
    register_nav_menus([
        'navigation_main' => __('Navigation Main', 'joi')
    ]);
});

add_filter('Joi/addComponentData?name=NavigationMain', function ($data) {
    $data['menu'] = new Menu('navigation_main');

    return $data;
});

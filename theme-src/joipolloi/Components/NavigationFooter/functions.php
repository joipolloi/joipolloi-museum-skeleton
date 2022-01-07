<?php

namespace Joi\Components\NavigationFooter;

use Timber\Menu;

add_action('init', function () {
    register_nav_menus([
        'navigation_footer' => __('Navigation Footer', 'joi')
    ]);
});

add_filter('Joi/addComponentData?name=NavigationFooter', function ($data) {
    $data['menu'] = new Menu('navigation_footer');

    return $data;
});

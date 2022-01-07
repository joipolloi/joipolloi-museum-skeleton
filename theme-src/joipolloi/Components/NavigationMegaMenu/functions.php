<?php

namespace Joi\Components\NavigationMegaMenu;

use Timber\Menu;

add_action('init', function () {
    register_nav_menus([
        'navigation_mega_menu_first_col' => __('Navigation Mega Menu First Column', 'joi'),
        'navigation_mega_menu_second_col' => __('Navigation Mega Menu Second Column', 'joi')
    ]);
});


add_filter('Joi/addComponentData?name=NavigationMegaMenu', function ($data) {
    $data['maxLevel'] = 1;
    $data['menuMain'] = new Menu('navigation_main');
    $data['menuFirst'] = new Menu('navigation_mega_menu_first_col');
    $data['menuSecond'] = new Menu('navigation_mega_menu_second_col');

    return $data;
});

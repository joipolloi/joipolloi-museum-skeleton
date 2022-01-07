<?php

namespace Joi\Sidebar;

add_action('widgets_init', function () {
    register_sidebar(array(
        'name'          => __('Shop Sidebar', 'joi'),
        'id'            => 'shop-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
});

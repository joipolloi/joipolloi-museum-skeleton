<?php

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    /**
     * Remove type attribute from link and script tags.
     */
    add_theme_support('html5', ['script', 'style']);

    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_attr__('black', 'joi'),
            'slug'  => 'black',
            'color' => '#000000',
        ),
        array(
            'name'  => esc_attr__('white', 'joi'),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ),
        array(
            'name'  => esc_attr__('red', 'joi'),
            'slug'  => 'red',
            'color' => '#D3401B',
        ),
        array(
            'name'  => esc_attr__('orange', 'joi'),
            'slug'  => 'orange',
            'color' => '#FF7527',
        ),
        array(
            'name'  => esc_attr__('yellow', 'joi'),
            'slug'  => 'yellow',
            'color' => '#FAAD0B',
        ),
        array(
            'name'  => esc_attr__('green', 'joi'),
            'slug'  => 'green',
            'color' => '#00828C',
        ),
        array(
            'name'  => esc_attr__('blue', 'joi'),
            'slug'  => 'blue',
            'color' => '#46BCF6',
        ),
    ));
});

add_filter('big_image_size_threshold', function () {
    return 4000;
});

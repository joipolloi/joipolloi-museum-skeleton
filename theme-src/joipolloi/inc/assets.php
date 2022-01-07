<?php

use Joi\Utils\Asset;
use Joi\Utils\ScriptLoader;

call_user_func(function () {
    $loader = new ScriptLoader();
    add_filter('script_loader_tag', [$loader, 'filterScriptLoaderTag'], 10, 2);
});

add_action('wp_enqueue_scripts', function () {
    Asset::enqueue([
        'name' => 'Joi/assets',
        'path' => 'assets/main.js',
        'type' => 'script',
        'inFooter' => true,
    ]);
    wp_script_add_data('Joi/assets', 'defer', true);
    $data = [
        'templateDirectoryUri' => get_template_directory_uri(),
        'ajaxUrl' => admin_url('admin-ajax.php'),
        //getting global settings fields for Trip advisor and google business ratings/review numbers//
        'tripAdvisor' => get_field('trip_advisor', 'option'),
        'googleBusiness' => get_field('google_business', 'option')
    ];

    wp_localize_script('Joi/assets', 'JoiData', $data);
    Asset::enqueue([
        'name' => 'Joi/assets',
        'path' => 'assets/main.css',
        'type' => 'style'
    ]);
});

add_action('admin_enqueue_scripts', function () {
    Asset::enqueue([
        'name' => 'Joi/assets/admin',
        'path' => 'assets/admin.js',
        'type' => 'script',
        'inFooter' => false,
    ]);
    wp_script_add_data('Joi/assets/admin', 'defer', true);
    $data = [
        'templateDirectoryUri' => get_template_directory_uri(),
    ];
    wp_localize_script('Joi/assets/admin', 'JoiData', $data);
    Asset::enqueue([
        'name' => 'Joi/assets/admin',
        'path' => 'assets/admin.css',
        'type' => 'style'
    ]);
});

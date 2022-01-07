<?php

namespace Joi\TimberDynamicResize;

use Joi\Utils\TimberDynamicResize;
use acf_field_message;

add_action('acf/init', function () {
    global $timberDynamicResize;
    $timberDynamicResize = new TimberDynamicResize();
});

add_filter(
    'acf/load_field/key=field_global_TimberDynamicResize_relativeUploadPath',
    function ($field) {
        $field['placeholder'] = TimberDynamicResize::getDefaultRelativeUploadDir();
        return $field;
    }
);

add_filter(
    'acf/load_field/key=field_global_TimberDynamicResize_webpSupport',
    function ($field) {
        if (!function_exists('imagewebp')) {
            $messageField = new acf_field_message();
            $field = array_merge($messageField->defaults, $field);
            $field['type'] = 'message';
            $field['instructions'] = 'Your PHP Version does not support WebP generation. The function `imagewebp` does not exist.';
        }
        return $field;
    }
);

add_filter(
    'acf/load_value/key=field_global_TimberDynamicResize_webpSupport',
    function ($value) {
        return function_exists('imagewebp') ? $value : '0';
    }
);

add_action(
    'update_option_options_global_TimberDynamicResize_dynamicImageGeneration',
    function ($oldValue, $value) {
        global $timberDynamicResize;
        $timberDynamicResize->toggleDynamic($value === '1');
    },
    10,
    2
);

add_action(
    'update_option_options_global_TimberDynamicResize_webpSupport',
    function ($oldValue, $value) {
        global $timberDynamicResize;
        $timberDynamicResize->toggleWebp($value === '1');
    },
    10,
    2
);

add_action(
    'update_option_options_global_TimberDynamicResize_relativeUploadPath',
    function ($oldValue, $value) {
        global $timberDynamicResize;
        $timberDynamicResize->changeRelativeUploadPath($value);
    },
    10,
    2
);

# WPML REWRITE FIX
add_filter('mod_rewrite_rules', function ($rules) {
    $homeRoot = parse_url(home_url());
    if (isset($homeRoot['path'])) {
        $homeRoot = trailingslashit($homeRoot['path']);
    } else {
        $homeRoot = '/';
    }

    $wpmlRoot = parse_url(get_option('home'));
    if (isset($wpmlRoot['path'])) {
        $wpmlRoot = trailingslashit($wpmlRoot['path']);
    } else {
        $wpmlRoot = '/';
    }

    $rules = str_replace("RewriteBase $homeRoot", "RewriteBase $wpmlRoot", $rules);
    $rules = str_replace("RewriteRule . $homeRoot", "RewriteRule . $wpmlRoot", $rules);

    return $rules;
});

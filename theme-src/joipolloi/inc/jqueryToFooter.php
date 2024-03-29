<?php

namespace Joi\JqueryToFooter;

function moveJqueryToFooter($wp_scripts)
{

    if (is_admin()) {
        return;
    }

    $wp_scripts->add_data('jquery', 'group', 1);
    $wp_scripts->add_data('jquery-core', 'group', 1);
    $wp_scripts->add_data('jquery-migrate', 'group', 1);
}

add_action('wp_default_scripts', 'Joi\JqueryToFooter\moveJqueryToFooter');

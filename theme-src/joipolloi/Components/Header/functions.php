<?php

namespace Joi\Components\Header;

use Joi\Utils\Asset;

use function Joi\OpeningHours\openingTime;

add_filter('Joi/addComponentData?name=Header', function ($data) {
    $data['openingTime'] = openingTime();
    $data['logo'] = [
        'src' => get_theme_mod('custom_header_logo') ? get_theme_mod('custom_header_logo') : Asset::requireUrl('Components/Header/Assets/logo.svg'),
        'alt' => get_bloginfo('name')
    ];

    return $data;
});

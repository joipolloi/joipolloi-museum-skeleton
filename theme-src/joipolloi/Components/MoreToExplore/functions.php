<?php

namespace Joi\Components\MoreToExplore;

add_filter('Joi/addComponentData?name=MoreToExplore', function ($data) {

    if (array_key_exists('post', $data)) {
        $moreToExplore = get_field('MoreToExplore', $data['post']->ID);

        if ($moreToExplore && $moreToExplore['items']) {
            $items = $moreToExplore['items'];
            $hasItems = count($items) > 0 ? true : false;
            $data['hasItems'] = $hasItems;
            $data['items'] = $items;
        }

        return $data;
    }

    $moreToExplore = get_field('MoreToExplore', 'option');

    if ($moreToExplore) {
        $items = $moreToExplore['items'];
        $hasItems = count($items) > 0 ? true : false;
        $data['hasItems'] = $hasItems;
        $data['items'] = $items;
    }

    return $data;
});

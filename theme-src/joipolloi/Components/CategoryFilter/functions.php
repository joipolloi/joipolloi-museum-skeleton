<?php

namespace Joi\Components\CategoryFilter;

use Timber\Timber;

add_filter('Joi/addComponentData?name=CategoryFilter', function ($data) {

    $args = array(
      'post_type' => $data['postType'],
      'taxonomy' =>  $data['taxonomy'],
      'hide_empty' => true
    );

    $data['terms'] = Timber::get_terms($args);

    return $data;
});

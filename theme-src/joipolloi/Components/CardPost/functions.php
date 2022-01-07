<?php

namespace Joi\Components\CardPost;

add_filter('Joi/addComponentData?name=CardPost', function ($data) {
    $data['defaultLinkTitle'] = 'Read the story';
    $type = $data['post']->post_type;

    if ($type == 'collection') {
         $data['defaultLinkTitle'] = 'Discover collection';
    }

    if ($type == 'service') {
         $data['defaultLinkTitle'] = 'Continue reading';
    }

    return $data;
});

<?php

namespace Joi\Components\SocialLinks;

add_filter('Joi/addComponentData?name=SocialLinks', function ($data) {
    $socialMediaLinks = get_field('social_media_links', 'option');
    $data['links'] =  $socialMediaLinks;
    return $data;
});

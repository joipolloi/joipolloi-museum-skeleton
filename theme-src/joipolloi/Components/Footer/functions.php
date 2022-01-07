<?php

namespace Joi\Components\Footer;

add_filter('Joi/addComponentData?name=Footer', function ($data) {
    $data['location'] =  get_field('location', 'option');
    $data['openingHours'] =  get_field('opening_hours', 'option');
    $data['mailingList'] =  get_field('mailing_list', 'option');
    return $data;
});

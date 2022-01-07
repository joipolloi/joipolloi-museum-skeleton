<?php

namespace Joi\Components\GoogleBusiness;

add_filter('Joi/addComponentData?name=GoogleBusiness', function ($data) {
  $data['google_business'] = get_field('google_business', 'option');
  return $data;
});

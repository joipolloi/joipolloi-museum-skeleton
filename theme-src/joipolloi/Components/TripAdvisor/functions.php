<?php

namespace Joi\Components\TripAdvisor;


add_filter('Joi/addComponentData?name=TripAdvisor', function ($data) {
  $data['trip_advisor'] = get_field('trip_advisor', 'option');
  return $data;
});


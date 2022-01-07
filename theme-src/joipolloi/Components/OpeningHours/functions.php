<?php

namespace Joi\Components\OpeningHours;

use Timber\Post;

use function Joi\EventsHelpers\onToday;
use function Joi\OpeningHours\openingTime;

add_filter('Joi/addComponentData?name=OpeningHours', function ($data) {
    $data['openingTime'] = openingTime();
    $data['event'] = onToday() ? new Post(onToday()) : null;

    return $data;
});

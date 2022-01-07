<?php

namespace Joi\Components\EventSidebar;

use Timber\URLHelper;

add_filter('Joi/addComponentData?name=EventSidebar', function ($data) {
    $data['url'] = URLHelper::get_current_url();

    return $data;
});

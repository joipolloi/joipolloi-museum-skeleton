<?php

namespace Joi\EventsHelpers;

use DateTime;

function onToday()
{
    $now = new DateTime('NOW');
    $date = $now->format('Y-m-d H:i:s');
    $stop_date = $now->setTime(23, 59, 59)->format('Y-m-d H:i:s');
    $args = array(
        'post_type' => 'event',
        'numberposts' => 1,
        'meta_query' => array(
            'relation'      => 'AND',
            array(
                'key'     => 'start_date',
                'value'   => $date,
                'compare' => '>=',
            ),
            array(
                'key'     => 'start_date',
                'value'   => $stop_date,
                'compare' => '<',
            )
        )
    );
    $events = get_posts($args);
    return reset($events);
}

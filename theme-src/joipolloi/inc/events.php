<?php

namespace Joi\Events;

use Carbon\Carbon;
use WP_Query;

add_filter('pre_get_posts', function ($query) {
    if ($query->is_main_query() && !is_admin() && is_post_type_archive('event')) {
        // $query->set('post_type', array('event', 'advert'));
    }
});

function getEventQueryArgs($postsPerPage = 6, $pageNumber = 1)
{

    $now =  Carbon::now('Europe/London');

    $eventsGlobal = get_posts(
        array(
        'post_type' => ['event'],
        'posts_per_page' => '-1',
        'meta_query' => array(
        'relation' => 'AND',
         array(
            'key' => 'event_type',
            'value' => array('museum'),
            'compare' => 'IN'
            ),
         ),
        'fields' => 'ids'
        )
    );

    $eventsTemp1 = get_posts(
        array(
        'post_type' => ['event'],
        'posts_per_page' => '-1',
        'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'start_date',
                    'compare' => 'EXISTS'
                ),
                array(
                    'key' => 'start_date',
                    'value' => '',
                    'compare' => '!='
                ),
                array(
                    'key'     => 'start_date',
                    'value'   => $now,
                    'compare' => '>='
                ),
                array(
                    'key' => 'event_type',
                    'value' => 'one-off',
                    'compare' => '='
                ),
            ),
        'orderby' => 'meta_value',
        'meta_key' => 'start_date',
        'order' => 'ASC',
        'fields' => 'ids'
        )
    );

    $eventsTemp2 = get_posts(
        array(
        'post_type' => ['event'],
        'posts_per_page' => '-1',
        'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'start_date',
                    'compare' => 'EXISTS'
                ),
                array(
                    'key' => 'start_date',
                    'value' => '',
                    'compare' => '!='
                ),
                array(
                    'key'     => 'start_date',
                    'value'   => $now,
                    'compare' => '>='
                ),
                array(
                    'key' => 'event_type',
                    'value' => array('limited-recurring', 'exhibition'),
                    'compare' => 'IN'
                ),
            ),
        'orderby' => 'meta_value',
        'meta_key' => 'start_date',
        'order' => 'ASC',
        'fields' => 'ids'
        )
    );

    $eventsTemp3 = get_posts(
        array(
        'post_type' => ['event'],
        'posts_per_page' => '-1',
        'meta_query' =>  array(
                'relation' => 'AND',
                array(
                    'key' => 'end_date',
                    'compare' => 'EXISTS'
                ),
                array(
                    'key' => 'end_date',
                    'value' => '',
                    'compare' => '!='
                ),
                array(
                    'key'     => 'end_date',
                    'value'   => $now,
                    'compare' => '>='
                ),
                array(
                    'key' => 'event_type',
                    'value' => array('limited-recurring', 'exhibition'),
                    'compare' => 'IN'
                ),
            ),
        'orderby' => 'meta_value',
        'meta_key' => 'start_date',
        'order' => 'ASC',
        'fields' => 'ids'
        )
    );

    // $eventsTemp = get_posts(
    //     array(
    //     'post_type' => ['event'],
    //     'posts_per_page' => '10',
    //     'meta_query' => array(
    //         'relation' => 'OR',
    //         array(
    //             'relation' => 'AND',
    //             array(
    //                 'key' => 'start_date',
    //                 'value' => '',
    //                 'compare' => '!='
    //             ),
    //             array(
    //                 'key'     => 'start_date',
    //                 'value'   => $now,
    //                 'compare' => '>='
    //             ),
    //             array(
    //                 'key' => 'event_type',
    //                 'value' => 'one-off',
    //                 'compare' => '='
    //             ),
    //         ),
    //         array(
    //             'relation' => 'AND',
    //             array(
    //                 'key' => 'start_date',
    //                 'value' => '',
    //                 'compare' => '!='
    //             ),
    //             array(
    //                 'key'     => 'start_date',
    //                 'value'   => $now,
    //                 'compare' => '>='
    //             ),
    //             array(
    //                 'key' => 'event_type',
    //                 'value' => array('limited-recurring', 'exhibition'),
    //                 'compare' => 'IN'
    //             ),
    //         ),
    //         array(
    //             'relation' => 'AND',
    //             array(
    //                 'key' => 'end_date',
    //                 'value' => '',
    //                 'compare' => '!='
    //             ),
    //             array(
    //                 'key'     => 'end_date',
    //                 'value'   => $now,
    //                 'compare' => '>='
    //             ),
    //             array(
    //                 'key' => 'event_type',
    //                 'value' => array('limited-recurring', 'exhibition'),
    //                 'compare' => 'IN'
    //             ),
    //         )
    //     ),
    //     'orderby' => 'meta_value',
    //     'meta_key' => 'start_date',
    //     'order' => 'ASC',
    //     'fields' => 'ids'
    //     )
    // );

    $eventsTemp = array_merge($eventsTemp1, $eventsTemp2, $eventsTemp3);

    $eventsPermNoPriority = get_posts(
        array(
        'post_type' => ['event', 'advert'],
        'posts_per_page' => '-1',
        'meta_query' => array(
            'relation' => 'AND',
            array(
            'relation' => 'OR',
            array(
                'key' => 'event_type',
                'value' => array('recurring', 'gallery'),
                'compare' => 'IN'
            ),
            array(
                'key' => 'event_type',
                'compare' => 'NOT EXISTS'
            ),
         ),
        array(
            'key' => 'priority',
            'compare' => 'NOT EXISTS'
        ),
        ),
        'fields' => 'ids'
        )
    );

    $eventsPermPriority = get_posts(
        array(
        'post_type' => ['event', 'advert'],
        'posts_per_page' => '-1',
        'meta_query' => array(
            'relation' => 'AND',
            array(
            'relation' => 'OR',
            array(
                'key' => 'event_type',
                'value' => array('recurring', 'gallery'),
                'compare' => 'IN'
            ),
            array(
                'key' => 'event_type',
                'compare' => 'NOT EXISTS'
            ),
         ),
        array(
            'key' => 'priority',
            'compare' => 'EXISTS'
        ),
        ),
        'fields' => 'ids',
        'orderby' => 'meta_value_num',
        'meta_key' => 'priority',
        'order' => 'ASC',
        )
    );

    $eventsPerm = array_merge($eventsPermPriority, $eventsPermNoPriority);

    $order = ['G', 'T', 'T', 'P', 'P', 'T', 'T', 'P', 'T', 'P', 'T', 'T', 'P', 'P', 'T', 'P'];
    $count = count($eventsGlobal) + count($eventsTemp) + count($eventsPerm);

    $newArray = array();
    $countGlobal = 0;
    $countTemp = 0;
    $countPerm = 0;
    $countOrder = 0;

    for ($i = 0; $i < $count; $i++) {
        $orderType = array_key_exists($countOrder, $order) ? $order[$countOrder] : 0;

        if ($countOrder < count($order)) {
            $countOrder++;
        } else {
            $countOrder = 0;
        }

        if ($orderType == 'T' && array_key_exists($countTemp, $eventsTemp)) {
            $newArray[] = $eventsTemp[$countTemp];
            $countTemp++;
        } else if ($orderType == 'G' && array_key_exists($countGlobal, $eventsGlobal)) {
            $newArray[] = $eventsGlobal[$countGlobal];
            $countGlobal++;
        } else {
            $newArray[] = $eventsPerm[$countPerm];
            $countPerm++;
        }
    }

    $args = array(
    'post_type' => ['event', 'advert'],
    'post__in' => $newArray,
    'orderby' => 'post__in',
    'posts_per_page' => $postsPerPage,
    'paged' => $pageNumber
    );

    return $args;
}

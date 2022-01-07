<?php

namespace Joi\Search;

add_filter('pre_get_posts', function ($query) {
    if ($query->is_main_query() && !is_admin() && $query->is_search) {
        $query->set('post_type', array('event', 'collection', 'service', 'discover'));
    }
    return $query;
});

<?php

/**
 * Moves the Yoast SEO plugin box to the bottom of the backend interface.
 */

namespace Joi\YoastToBottom;

function init()
{
    return 'low';
}

add_filter('wpseo_metabox_prio', 'Joi\YoastToBottom\init');

<?php

/**
 * Adds SVG to the mime types supported.
 */

namespace Joi\MimeTypes;

add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

<?php

namespace Joi\ImagesSizes;

add_action('after_setup_theme', function () {

    add_image_size('card-0', 300, 169, true);
    add_image_size('card-1', 450, 253.5, true);
    add_image_size('card', 600, 338, true);
    add_image_size('card-3', 900, 507, true);
    add_image_size('card-4', 1200, 676, true);
    add_image_size('post-header', 2732, 1000, true);
    add_image_size('shop', 600, 1200);
});

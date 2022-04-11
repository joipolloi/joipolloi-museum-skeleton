<?php

namespace Joi\AllowedBlocks;

add_action('allowed_block_types_all', function ($allowed_block_types, $block_editor_context) {

    // EXAMPLE - LIMIT FOR SPECIFIC POST TPYE
    // if ($block_editor_context->post->post_type == 'event') {
    //      return array(
    //     'core/image',
    //     'core/html',
    //     'core/quote',
    //     'core/embed',
    //     'core/youtube',
    //     'core/paragraph',
    //     'core/heading',
    //     'core/list',
    //     'core/group',
    //     'core/buttons',
    //     'core/shortcode',
    //     'core-embed/youtube',
    //     'core/columns',
    //     'acf/accordion',
    //     'acf/image-carousel',
    //     'acf/image-colour',
    //     'acf/pullout',
    //     'acf/virtual-tour',
    //     'acf/download'
    //     );
    // }

    return array(
        'core/image',
        'core/quote',
        'core/embed',
        'core/youtube',
        'core/paragraph',
        'core/heading',
        'core/list',
        'core/group',
        'core/buttons',
        'core/shortcode',
        'core-embed/youtube',
        'core/columns',
        'acf/accordion',
        'acf/card-carousel',
        'acf/card-grid',
        'acf/card-post-grid',
        'acf/explore-carousel',
        'acf/feature',
        'acf/feature-carousel',
        'acf/image-carousel',
        'acf/image-colour',
        'acf/pullout',
        'acf/virtual-tour',
        'acf/download'
    );
}, 10, 2);

<?php

namespace Joi\Components\BlockFeature;

use Timber\Timber;

add_action('acf/init', function () {
    if (! function_exists('acf_register_block')) {
        return;
    }

    acf_register_block(array(
        'name'            => 'Feature',
        'title'           => __('Feature', 'joi'),
        'description'     => __('Displays a single video/image with text.', 'joi'),
        'render_callback' => 'Joi\Components\BlockFeature\featureRenderCallback',
        'category'        => 'layout',
        'icon'            => 'format-image',
        'keywords'        => array( 'carousel' ),
    ));
});

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function featureRenderCallback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render('Components/BlockFeature/index.twig', $context);
}

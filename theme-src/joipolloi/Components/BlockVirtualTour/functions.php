<?php

namespace Joi\Components\BlockVirtualTour;

use Timber\Timber;

add_action('acf/init', function () {
    if (! function_exists('acf_register_block')) {
        return;
    }

    acf_register_block(array(
        'name'            => 'virtual-tour',
        'title'           => __('Virtual Tour', 'joi'),
        'description'     => __('Displays the virtual tour ifram on desktop and link to tour on mobile', 'joi'),
        'render_callback' => 'Joi\Components\BlockVirtualTour\virtualTourCallback',
        'category'        => 'layout',
        'icon'            => 'format-quote',
        'keywords'        => array( 'embed' ),
        'supports'          => array(
          'align' => false,
          'jsx' => true
        ),
    ));
});

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function virtualTourCallback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render('Components/BlockVirtualTour/index.twig', $context);
}

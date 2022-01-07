<?php

namespace Joi\Components\BlockImageColour;

use Timber\Timber;

add_action('acf/init', function () {
    if (! function_exists('acf_register_block')) {
        return;
    }

    acf_register_block(array(
        'name'            => 'image_colour',
        'title'           => __('Image Colour', 'joi'),
        'description'     => __('Displays a single image with title and background colour.', 'joi'),
        'render_callback' => 'Joi\Components\BlockImageColour\imageColourRenderCallback',
        'category'        => 'media',
        'icon'            => 'format-image',
        'keywords'        => array( 'image' ),
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
function imageColourRenderCallback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;
    $template = array(
    array( 'core/heading', array(
        'placeholder' => 'Add a heading',
        'level' => 4
    ) ),
    array( 'core/image', array() ),
    );
    $context['template'] = esc_attr(wp_json_encode($template));

    // Render the block.
    Timber::render('Components/BlockImageColour/index.twig', $context);
}

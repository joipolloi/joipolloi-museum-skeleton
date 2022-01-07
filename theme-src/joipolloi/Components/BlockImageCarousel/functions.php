<?php

namespace Joi\Components\BlockImageCarousel;

use Timber\Timber;

add_action('acf/init', function () {
    if (! function_exists('acf_register_block')) {
        return;
    }

    acf_register_block(array(
        'name'            => 'image_carousel',
        'title'           => __('Image Carousel', 'joi'),
        'description'     => __('Displays multiple images in a carousel.', 'joi'),
        'render_callback' => 'Joi\Components\BlockImageCarousel\imageCarouselRenderCallback',
        'category'        => 'media',
        'icon'            => 'format-gallery',
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
function imageCarouselRenderCallback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render('Components/BlockImageCarousel/index.twig', $context);
}

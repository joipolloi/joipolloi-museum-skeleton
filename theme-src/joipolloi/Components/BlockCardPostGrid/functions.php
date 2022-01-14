<?php

namespace Joi\Components\BlockCardPostGrid;

use Timber\Timber;

add_action('acf/init', function () {
    if (! function_exists('acf_register_block')) {
        return;
    }

    acf_register_block(array(
        'name'            => 'card_post_grid',
        'title'           => __('Card Grid by individual posts', 'joi'),
        'description'     => __('Displays multiple text cards in a grid.', 'joi'),
        'render_callback' => 'Joi\Components\BlockCardPostGrid\cardGridRenderCallback',
        'category'        => 'layout',
        'icon'            => 'format-gallery',
        'keywords'        => array( 'grid' ),
    ));
});

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function cardGridRenderCallback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $fields = get_fields();
    $context['fields'] = $fields;

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $posts = [];

    foreach( $fields['posts'] as $post ) {
        $posts[] = $post['content'];
    }

    $context['posts'] = $posts;

    // Render the block.
    Timber::render('Components/BlockCardPostGrid/index.twig', $context);
}

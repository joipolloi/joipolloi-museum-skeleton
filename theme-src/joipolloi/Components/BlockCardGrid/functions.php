<?php

namespace Joi\Components\BlockCardGrid;

use Timber\Timber;

add_action('acf/init', function () {
    if (! function_exists('acf_register_block')) {
        return;
    }

    acf_register_block(array(
        'name'            => 'card_grid',
        'title'           => __('Card Grid', 'joi'),
        'description'     => __('Displays multiple text cards in a grid.', 'joi'),
        'render_callback' => 'Joi\Components\BlockCardGrid\cardGridRenderCallback',
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

    $posts = Timber::get_posts(array('post_type' => $fields['post_type'], 'posts_per_page' => $fields['number_of_posts']));
    $context['posts'] = $posts;
    // Render the block.
    Timber::render('Components/BlockCardGrid/index.twig', $context);
}

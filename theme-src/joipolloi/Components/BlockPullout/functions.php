<?php

namespace Joi\Components\BlockPullout;

use Timber\Timber;

add_action('acf/init', function () {
    if (! function_exists('acf_register_block')) {
        return;
    }

    acf_register_block(array(
        'name'            => 'Pullout',
        'title'           => __('Pullout', 'joi'),
        'description'     => __('Displays a full width coloured block with text', 'joi'),
        'render_callback' => 'Joi\Components\BlockPullout\pulloutCallback',
        'category'        => 'layout',
        'icon'            => 'format-quote',
        'keywords'        => array( 'quote' ),
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
function pulloutCallback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/quote' );
    $context['allowed_blocks'] = esc_attr(wp_json_encode($allowed_blocks));

    // Render the block.
    Timber::render('Components/BlockPullout/index.twig', $context);
}

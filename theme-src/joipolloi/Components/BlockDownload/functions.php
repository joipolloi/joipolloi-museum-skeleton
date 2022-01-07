<?php

namespace Joi\Components\BlockDownload;

use Timber\Timber;

add_action('acf/init', function () {
    if (! function_exists('acf_register_block')) {
        return;
    }

    acf_register_block(array(
        'name'            => 'Download',
        'title'           => __('Download', 'joi'),
        'description'     => __('Displays a download block.', 'joi'),
        'render_callback' => 'Joi\Components\BlockDownload\downloadRenderCallback',
        'category'        => 'media',
        'icon'            => 'download',
        'keywords'        => array( 'carousel' ),
        'mode'    => 'edit',
        'supports' => array('mode' => false)
    ));
});

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function downloadRenderCallback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render('Components/BlockDownload/index.twig', $context);
}

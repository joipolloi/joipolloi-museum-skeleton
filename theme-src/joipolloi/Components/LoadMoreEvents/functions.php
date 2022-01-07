<?php

namespace Joi\Components\LoadMoreEvents;

use Timber\Timber;

add_action('wp_ajax_load_more_events', 'Joi\Components\LoadMoreEvents\loadMoreEvents');
add_action('wp_ajax_nopriv_load_more_events', 'Joi\Components\LoadMoreEvents\loadMoreEvents');

function loadMoreEvents()
{
    $pageNumber = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;

    $args = \Joi\Events\getEventQueryArgs(6, $pageNumber);

    $posts = Timber::get_posts($args);

    foreach ($posts as $post) {
        $context = Timber::get_context();
        $context['post'] = $post;
        Timber::render_string('{{ renderComponent("CardTypeSwitcher") }}', $context);
    }

    wp_die();
}

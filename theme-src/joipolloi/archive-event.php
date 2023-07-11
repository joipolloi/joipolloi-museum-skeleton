<?php

use Timber\Timber;
use Timber\PostQuery;

$query = $GLOBALS['wp_query']->query_vars;
$context = Timber::get_context();

$args = Joi\Events\getEventQueryArgs();

$context['title'] = post_type_archive_title('', false);
$context['posts'] = new PostQuery($args);

Timber::render('templates/archive-event.twig', $context);

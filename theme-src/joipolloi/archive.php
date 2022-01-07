<?php

use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;

$templates = array( 'templates/archive.twig', 'templates/index.twig' );
$query = $GLOBALS['wp_query']->query_vars;
$context = Timber::get_context();

$context['title'] = 'Archive';
if (is_day()) {
    $context['title'] = 'Archive: ' . get_the_date('D M Y');
} elseif (is_month()) {
    $context['title'] = 'Archive: ' . get_the_date('M Y');
} elseif (is_year()) {
    $context['title'] = 'Archive: ' . get_the_date('Y');
} elseif (is_tag()) {
    $context['title'] = single_tag_title('', false);
} elseif (is_category()) {
    $context['title'] = single_cat_title('', false);
    array_unshift($templates, 'templates/archive-' . get_query_var('cat') . '.twig');
} elseif (is_post_type_archive()) {
    $query['posts_per_page'] = 7;
    $context['title'] = post_type_archive_title('', false);
    array_unshift($templates, 'templates/archive-' . get_post_type() . '.twig');
}

$context['posts'] = new PostQuery($query);

Timber::render($templates, $context);

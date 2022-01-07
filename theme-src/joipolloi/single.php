<?php

use Timber\Timber;
use Timber\Post;

$templates = array( 'templates/single.twig');

$context = Timber::get_context();
$context['post'] = new Post();

array_unshift($templates, 'templates/single-' . get_post_type() . '.twig');

Timber::render($templates, $context);

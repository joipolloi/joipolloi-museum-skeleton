<?php

use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;

$context = Timber::get_context();
$context['post'] = new Post();
$context['posts'] = new PostQuery();

if (isset($_GET['contentOnly'])) {
    $context['contentOnly'] = true;
}

Timber::render('templates/index.twig', $context);

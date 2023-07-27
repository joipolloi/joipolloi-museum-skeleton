<?php

namespace Joi\Components\LoadMore;

use Timber\Timber;

add_action('wp_ajax_load_more_posts', 'Joi\Components\LoadMore\loadMorePosts');
add_action('wp_ajax_nopriv_load_more_posts', 'Joi\Components\LoadMore\loadMorePosts');

function loadMorePosts()
{
    $pageNumber = (is_int($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;
    $postType = (isset($_POST['postType'])) ? $_POST['postType'] : 'post';

    $posts = Timber::get_posts(array(
      'post_type' => $postType,
      'posts_per_page' => $pageNumber == 1 ? 7 : 6,
      'paged' => $pageNumber,
      'post_status' => array( 'publish' )
    ));

    foreach ($posts as $post) {
        $context = Timber::get_context();
        $context['post'] = $post;
        Timber::render_string('{{ renderComponent("CardPost") }}', $context);
    }

    wp_die();
}

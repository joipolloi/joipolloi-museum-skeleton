<?php

use Timber\Timber;

if (! class_exists('Timber')) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';

    return;
}

global $woocommerce;

$context            = Timber::context();
$context['sidebar'] = Timber::get_widgets('shop-sidebar');
$context['woo'] = $woocommerce;
if (is_singular('product')) {
    $context['post']    = Timber::get_post();
    $product            = wc_get_product($context['post']->ID);
    $context['product'] = $product;

    // Get related products
    $related_limit               = wc_get_loop_prop('columns');
    $related_ids                 = wc_get_related_products($context['post']->id, $related_limit);
    $context['related_products'] =  Timber::get_posts($related_ids);

    // Restore the context and loop back to the main query loop.
    wp_reset_postdata();

    Timber::render('templates/woo/single-product.twig', $context);
} else {
    $tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN', // or 'NOT IN' to exclude feature products
    );
    $featuredProducts = Timber::get_posts(array('tax_query' => $tax_query));
    $featured =  reset($featuredProducts);

    $product_terms = Timber::get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => true));
    foreach (
        $product_terms as $product_term
    ) {
        $posts = Timber::get_posts(
            array(
            'tax_query' => array(
            array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array( $product_term->slug ),
            'operator' => 'IN'
            )
            ))
        );
        $product_term->products = $posts;
    }


    $context['productTerms'] = $product_terms;
    $context['featured'] = $featured;
    $context['title'] = 'Shop';

    if (is_product_category()) {
        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;
        $context['category'] = get_term($term_id, 'product_cat');
        $context['title'] = single_term_title('', false);
    }

    Timber::render('templates/woo/archive.twig', $context);
}

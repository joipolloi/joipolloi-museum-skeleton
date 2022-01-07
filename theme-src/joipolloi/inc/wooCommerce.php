<?php

namespace Joi\WooCommerce;

use Timber\Timber;
use Twig\TwigFunction;

add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_widget_shopping_cart_total', 'woocommerce_widget_shopping_cart_subtotal', 10);
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
});

function customWidgetCartSubtotal()
{
    $count = WC()->cart->get_cart_contents_count();
    $countString = $count > 1 ? ' items' : ' item';

    echo '<span class="cart-count">' . $count  . $countString . '</span><span class="cart-count">' . WC()->cart->get_cart_subtotal() . '</span>';
}

add_action('woocommerce_widget_shopping_cart_total', 'Joi\WooCommerce\customWidgetCartSubtotal', 11);

add_filter('woocommerce_enqueue_styles', '__return_empty_array');
add_filter('wc_add_to_cart_message_html', '__return_null');

function timberSetProduct($post)
{
    global $product;
    if (is_woocommerce() || is_search()) {
        $product = wc_get_product($post->ID);
    }
}

add_filter('timber/twig', 'Joi\WooCommerce\addToTwig');


/**
 * My custom Twig functionality.
 *
 * @param \Twig\Environment $twig
 * @return \Twig\Environment
 */
function addToTwig(\Twig\Environment $twig)
{

    $twig->addFunction(new TwigFunction('timberSetProduct', 'Joi\WooCommerce\timberSetProduct'));

    return $twig;
}

add_filter(
    'gettext',
    function ($translated_text, $text, $domain) {
        if ($domain == 'woocommerce') {
            switch ($translated_text) {
                case 'Cart totals':
                      $translated_text = __('Summary', 'woocommerce');
                    break;
                case 'Update cart':
                     $translated_text = __('Update basket', 'woocommerce');
                    break;
                case 'Add to cart':
                    $translated_text = __('Add to basket', 'woocommerce');
                    break;
                case 'View cart':
                    $translated_text = __('View basket', 'woocommerce');
                    break;
            }
        }
        return $translated_text;
    },
    20,
    3
);

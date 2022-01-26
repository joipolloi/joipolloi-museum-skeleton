<?php

namespace Joi\Components\GoogleAnalytics;

use Timber\Timber;

function isTrackingEnabled($gaId)
{
    if ($gaId) {
        $user = wp_get_current_user();
        $trackingEnabled = !in_array('administrator', $user->roles);
        return $trackingEnabled;
    }
    return false;
}

add_filter('Joi/addComponentData?name=GoogleAnalytics', function ($data) {
    $googleAnalyticsOptions = get_field('GoogleAnalytics', 'option');
    if ($googleAnalyticsOptions) {
        $isTrackingEnabled = isTrackingEnabled($googleAnalyticsOptions['ga_id']);
        $data['gaId'] = $googleAnalyticsOptions['ga_id'];
        $data['isTrackingEnabled'] = $isTrackingEnabled;
    }
    return $data;
});

add_action('wp_footer', function () {
    $context = Timber::get_context();
    Timber::render_string('{{ renderComponent("GoogleAnalytics") }}', $context);
});

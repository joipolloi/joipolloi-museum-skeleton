<?php

namespace Joi\Components\CookieNotice;

add_filter('Joi/addComponentData?name=CookieNotice', function ($data) {
    $cookieNoticeOptions = get_field('CookieNotice', 'option');
    if ($cookieNoticeOptions) {
        $data['enableBanner'] = $cookieNoticeOptions['enable_banner'];
        $data['message'] = $cookieNoticeOptions['message'];
        $data['privacyLink'] = $cookieNoticeOptions['privacy_link'];
        $data['continueLabel'] = $cookieNoticeOptions['continue_label'];
        $data['declineLabel'] = $cookieNoticeOptions['decline_label'];
    }
    return $data;
});

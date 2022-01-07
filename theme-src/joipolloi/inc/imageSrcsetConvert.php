<?php

namespace Joi\ImageSrcsetConvert;

use Timber\ImageHelper;
use Timber\Image;
use Timber\Timber;
use Twig\TwigFilter;

add_action('timber/twig/filters', function ($twig) {
    $twig->addFilter(
        new TwigFilter('towebpSrcset', function ($img) {
            $dir = dirname($img->guid);
            $arr = [];
            foreach ($img->sizes as $size) {
                array_push($arr, ImageHelper::img_to_webp($dir . '/' . $size['file']) . ' ' . $size['width']);
            }
            return join(', ', $arr);
        })
    );
    $twig->addFilter(
        new TwigFilter('tojpgSrcset', function ($srcset) {

            if (!$srcset) {
                return;
            }

            $arr = [];
            $sizes = explode(', ', $srcset);

            foreach ($sizes as $size) {
                $sizeParts = explode(' ', $size);
                array_push($arr, ImageHelper::img_to_jpg($sizeParts[0]) . ' ' . $sizeParts[1]);
            }
            return join(', ', $arr);
        })
    );
    return $twig;
});

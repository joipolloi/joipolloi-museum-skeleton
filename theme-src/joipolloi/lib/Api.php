<?php

namespace Joi;

use Joi\ComponentManager;

class Api
{
    public static function registerComponent($componentName, $componentPath = null)
    {
        $componentManager = ComponentManager::getInstance();
        $componentManager->registerComponent($componentName, $componentPath);
    }

    public static function registerComponentsFromPath($componentBasePath)
    {
        foreach (glob("{$componentBasePath}/*", GLOB_ONLYDIR) as $componentPath) {
            $componentName = basename($componentPath);
            self::registerComponent($componentName, $componentPath);
        }
    }

    public static function renderComponent($componentName, $data)
    {
        $data = apply_filters(
            'Joi/addComponentData',
            $data,
            $componentName
        );
        $output = apply_filters(
            'Joi/renderComponent',
            null,
            $componentName,
            $data
        );

        return is_null($output) ? '' : $output;
    }

    public static function registerHooks()
    {
        add_filter('Joi/renderComponent', function ($output, $componentName, $data) {
            return apply_filters(
                "Joi/renderComponent?name={$componentName}",
                $output,
                $componentName,
                $data
            );
        }, 10, 3);

        add_filter('Joi/addComponentData', function ($data, $componentName) {
            return apply_filters(
                "Joi/addComponentData?name={$componentName}",
                $data,
                $componentName
            );
        }, 10, 2);
    }
}

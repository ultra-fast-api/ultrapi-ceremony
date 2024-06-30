<?php

declare(strict_types=1);

namespace UpiCore\Ceremony\Utils\App;

use UpiCore\Ceremony\Utils\Destination\PathResolver;

class Preparation
{
    public static function app(string $bootstrap)
    {
        require_once $bootstrap . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . 'app' . '.php';
    }

    public static function init(array $modules): void
    {
        foreach ($modules as $module) {
            $init = static::resolver($module);

            if (\is_file($init)) {
                require_once $init;
            }
        }
    }

    public static function resolver(string $related)
    {
        return PathResolver::path() . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . $related . '.php';
    }
}

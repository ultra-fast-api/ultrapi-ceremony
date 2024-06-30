<?php

declare(strict_types=1);

namespace UpiCore\Ceremony\Utils\Destination;

use UpiCore\Exception\UpiException;

class PathResolver
{
    protected static $path = null;

    public static function setApplicationPath(string $path)
    {
        self::$path = $path;
    }

    public static function path()
    {
        if (null === self::$path) {
            throw new \Exception('Destination path not defined! Please define the application path.');
        }

        return self::$path;
    }

    public static function __callStatic($name, $arguments): null|string
    {
        return null === self::path() ?: self::path() . DIRECTORY_SEPARATOR . substr($name, 0, -4);
    }
}

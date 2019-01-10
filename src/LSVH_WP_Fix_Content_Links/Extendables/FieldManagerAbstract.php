<?php

namespace LSVH_WP_Fix_Content_Links\Extendables;

defined('ABSPATH') or die();

use LSVH_WP_Fix_Content_Links\Contracts\FieldManagerInterface;

abstract class FieldManagerAbstract implements FieldManagerInterface
{
    private static $_instances = [];

    final private function __construct()
    {
    }

    final private function __clone()
    {
    }

    final private function __wakeup()
    {
    }

    final public static function getInstance(): FieldManagerInterface
    {

        self::$_instances[static::class] = self::$_instances[static::class] ?? new static();

        return self::$_instances[static::class];
    }
}
<?php

namespace LSVH_WP_Fix_Content_Links\Contracts;

defined('ABSPATH') or die();

interface CoreSettingsInterface
{
    const FIELD_TYPE = 'type';
    const FIELD_PATH = 'path';
    const FIELD_EXCLUDE = 'exclude';
}
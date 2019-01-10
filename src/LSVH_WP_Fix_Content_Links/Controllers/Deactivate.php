<?php

namespace LSVH_WP_Fix_Content_Links\Controllers;

defined('ABSPATH') or die();

use LSVH_WP_Fix_Content_Links\Extendables\CoreAbstract;

class Deactivate extends CoreAbstract
{
    public function __construct(array $plugin_data = [])
    {
        parent::__construct($plugin_data);

        delete_option($this->get_domain());
        unregister_setting($this->get_plugin_parent_page(), $this->get_domain());
    }
}
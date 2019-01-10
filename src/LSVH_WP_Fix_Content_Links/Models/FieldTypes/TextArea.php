<?php

namespace LSVH_WP_Fix_Content_Links\Models\FieldTypes;

defined('ABSPATH') or die();

use LSVH_WP_Fix_Content_Links\Extendables\FieldAbstract;

class TextArea extends FieldAbstract
{
    public static $types = ['textarea'];

    /**
     * FieldAbstract constructor.
     *
     * @param $order
     * @param $id
     * @param $name
     * @param $type
     * @param $label
     * @param $value
     */
    public function __construct($order, $id, $name, $label, $value)
    {
        $this->order = $order;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    public function render(): void
    {
        print '<p>'.$this->widget($this->name, $this->value).'</p>';
    }

    private static function widget($name, $value)
    {
        return sprintf('<textarea rows="10" cols="50" name="%s">%s</textarea>', $name, $value);
    }

    public function sanitize($value)
    {
        return sanitize_textarea_field($value);
    }
}
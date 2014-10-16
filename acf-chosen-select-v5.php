<?php
class acf_field_chosen_select extends acf_field_select
{
    public function __construct()
    {
        add_action('admin_head', array( $this, 'add_custom_js' ) );
        add_action('wp_head', array( $this, 'add_custom_js' ) );
    }

    public function render_field( $field )
    {
        if( isset($field['class']) && strlen($field['class']) > 0 )
        {
            $field['class'] .= ' acf-chosen-select';
        }
        else
        {
            $field['class'] = 'acf-chosen-select';
        }

        return parent::render_field( $field );
    }

    public function add_js()
    {
        echo "<script type='text/javascript'>jQuery('.acf-chosen-select').chosen();</script>";
    }
}
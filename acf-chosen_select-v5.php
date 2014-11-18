<?php
class acf_field_chosen_select extends acf_field_select
{
    public function __construct()
    {
        add_action('admin_head', array( $this, 'add_custom_js' ) );
        add_action('wp_head', array( $this, 'add_custom_js' ) );

        $this->name = 'chosen_select';
        $this->label = 'Chosen Select';
        $this->category = 'choice';
        $this->defaults = array(
            'multiple' 		=> 0,
            'allow_null' 	=> 0,
            'choices'		=> array(),
            'default_value'	=> '',
            'ui'			=> 0,
            'ajax'			=> 0,
            'placeholder'	=> '',
            'disabled'		=> 0,
            'readonly'		=> 0,
        );

        // ajax
        add_action('wp_ajax_acf/fields/select/query',				array($this, 'ajax_query'));
        add_action('wp_ajax_nopriv_acf/fields/select/query',		array($this, 'ajax_query'));

        acf_field::__construct();
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

    public function add_custom_js()
    {
        if( is_admin() )
        {
            echo "<script type='text/javascript'>jQuery(document).ready(function($){ if( $.isFunction($.fn.chosen) ) { $('.acf-chosen-select').chosen(); } });</script>";
        }
    }
}

new acf_field_chosen_select();
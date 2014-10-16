<?php
/*
Plugin Name: Advanced Custom Fields: Chosen_Select
Plugin URI: http://www.aardvarklondon.com/
Description: 'Chosen' enabled select
Version: 1.0.0
Author: Mike Hughes
Author URI: http://www.aardvarklondon.com/
*/

load_plugin_textdomain( 'acf-FIELD_NAME', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );

add_action('acf/include_field_types', 'include_chosen_select');
function include_chosen_select( $version )
{
    include_once('acf-chosen-select-v5.php');
}
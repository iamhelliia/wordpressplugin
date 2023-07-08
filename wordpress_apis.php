<?php
/*
Plugin Name: Wordpress Apis
Plugin URI: localhost:8888/hello/
Discription: a wordpress plugin to work with apis
Author: Helia Hajgozar
Author URI:
Text Domin: wordpress_apis
Domin Path: /Languages/
Version: 1.0.0
*/
define('WP_APIS_DIR',plugin_dir_path(__FILE__));
define('WP_APIS_URL',plugin_dir_url(__FILE__));
define('WP_APIS_INC',WP_APIS_DIR.'inc/');
define('WP_APIS_TPL',WP_APIS_DIR.'/tpl/');

register_activation_hook(__FILE__,'wp_apis_plugin_activation');
register_deactivation_hook(__FILE__,'wp_apis_plugin_deactivation');

function wp_apis_plugin_activation(){

}
function wp_apis_plugin_deactivation(){

}


if(is_admin())
{
    include WP_APIS_INC.'admin/menus.php';
    // include WP_APIS_INC.'admin/metaboxes.php';

}

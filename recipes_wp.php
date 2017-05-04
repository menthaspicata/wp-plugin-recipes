<?php 

/**
 * @package	Recipes
 * @version 1.0
 */
/*
Plugin Name: Recipes on wordpress
Plugin URI: 
Description: Plugin for creating a foodblog
Author: Kseniya Terletskaya
Version: 1.0
Author URI: 
*/

define("RECIP_PATH", plugin_dir_path( __FILE__ ));
define("RECIP_URL", plugin_dir_url( __FILE__ ));

require RECIP_PATH . 'includes/recipes_wp_register_post_type.php';
require RECIP_PATH . 'includes/recipes_wp_save_post.php';
require RECIP_PATH . 'includes/recipes_wp_scripts.php';








    







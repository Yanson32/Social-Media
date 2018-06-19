<?php
/*
Plugin Name: Social Media
Plugin URI: https://www.youtube.com/channel/UCPrrHsGFYQWcyoP_vCqolJA
Description: Adds social media links
Version: 0.1.0
Author: Wayne J Larson Jr.
Author URI: www.yansontech.com
Text Domain: social-media-domain
Domain Path: /languages
*/

error_reporting(E_ALL);

//Exit if accessed directly
if(!defined('ABSPATH'))
{
  exit;
}


require_once(plugin_dir_path(__FILE__).'includes/social media scripts.php');


require_once(plugin_dir_path(__FILE__).'includes/social media class.php');

require_once(plugin_dir_path(__FILE__).'admin/social media menu.php');

require_once(plugin_dir_path(__FILE__).'widgets/widget.php');


/**************************************************************************//**
* @brief  Add a link in the wordpress header for font-awsome
******************************************************************************/
function sm_header_hook()
{
  echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
}

add_action('wp_head', 'sm_header_hook');

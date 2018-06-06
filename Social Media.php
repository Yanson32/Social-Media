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

//Exit if accessed directly
if(!defined('ABSPATH'))
{
  exit;
}


require_once(plugin_dir_path(__FILE__).'includes/social media scripts.php');


require_once(plugin_dir_path(__FILE__).'includes/social media class.php');

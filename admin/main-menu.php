<?php
  require_once(plugin_dir_path(__FILE__).'../includes/supported social media.php');
/*********************************************************************************************//**
*	Purpose:	Create menu page
*************************************************************************************************/
function sm_create_main_menu_page()
{
  //Generate amazing walls admin page
  add_menu_page(	"Social Media Options",							//page title
          "Social Media", 											//menu lable
          "manage_options", 										//require admin privliges
          "sm_social_media_options", 								//page slug
          "sm_admin_menu_setup_callback"							//callback for page templat
        );

  add_submenu_page('sm_social_media_options', 'Social Media Options', 'General', 'manage_options', 'sm_social_media_options', 'sm_admin_menu_setup_callback');

  //call register settings function
  add_action( 'admin_init', 'sm_register_main_menu_settings' );
}
add_action("admin_menu", "sm_create_main_menu_page");


/*********************************************************************************************//**
*	@brief  html code for main menu page
*************************************************************************************************/
function sm_admin_menu_setup_callback()
{
  require_once('social-media-admin.php');
}


/************************************************************************************************
*	Purpose:	Register main menu settings
*************************************************************************************************/
function sm_register_main_menu_settings()
{
  global $social_media;
  add_settings_section(	'sm-social-media-link-section', 			//Section id
              'Social Media Links', 								//Section title
              'sm_social_media_link_section_callback',				//Callback
              'sm_social_media_options'								//Parent page slug
            );

  foreach($social_media as $link):
    $link_lower = strtolower($link);
    register_setting(	'sm-social-media-link-group', 			    //Setting id
                      'sm_'.$link_lower.'_link'						//Setting name
                    );

    add_settings_field(	'sm-'.$link_lower.'-link', 					//Id
              $link,			 									//Title
              'sm_'.$link_lower.'_callback', 						//Callback
              'sm_social_media_options', 							//Page
              'sm-social-media-link-section'						//Section
              );
  endforeach;
}


/*****************************************************//**
*	@brief	This function updates twitter social
*			media link in the database.
*********************************************************/
function sm_twitter_callback()
{
  $twitter_link = esc_attr(get_option('sm_twitter_link'));

  echo '<input type="text" name="sm_twitter_link" value="'.$twitter_link.'" placeholder="Twitter Link">';
}


/*****************************************************//**
*	@brief	This function updates youtube social
*			media link in the database.
*********************************************************/
function sm_youtube_callback()
{
  $youtube_link = esc_attr(get_option('sm_youtube_link'));
  echo '<input type="text" name="sm_youtube_link" value="'.$youtube_link.'" placeholder="Youtube Link">';
}


/*****************************************************//**
*	@brief	This function updates facebook social
*			media link in the database.
*********************************************************/
function sm_facebook_callback()
{
  $facebook_link = esc_attr(get_option('sm_facebook_link'));
  echo '<input type="text" name="sm_facebook_link" value="'.$facebook_link.'" placeholder="Facebook Link">';
}


/*****************************************************//**
*	@brief	This function updates linkedin social
*			media link in the database.
*********************************************************/
function sm_linkedin_callback()
{
  $linkedin_link = esc_attr(get_option('sm_linkedin_link'));
  echo '<input type="text" name="sm_linkedin_link" value="'.$linkedin_link.'" placeholder="Linkedin Link">';
}


/*****************************************************//**
*	@brief	This function updates pinterest social
*			media link in the database.
*********************************************************/
function sm_pinterest_callback()
{
  $pinterest_link = esc_attr(get_option('sm_pinterest_link'));
  echo '<input type="text" name="sm_pinterest_link" value="'.$pinterest_link.'" placeholder="Pinterest Link">';
}


/*****************************************************//**
*	@brief	Callback
*********************************************************/
function sm_social_media_link_section_callback()
{
}

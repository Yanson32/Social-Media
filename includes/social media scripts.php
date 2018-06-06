<?php
  function sm_add_scripts()
  {
    //Add Main CSS
    wp_enqueue_style('sm-main-style', plugins_url().'/Social Media/css/style.css');

    //Add Main JS
    wp_enqueue_script('sm-main-script', plugins_url().'/Social Media/js/main.js');
  }

  add_action('wp_enqueue_scripts', 'sm_add_scripts');

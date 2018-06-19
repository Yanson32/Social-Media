<h1>Social Media Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
  <?php settings_fields('sm-social-media-link-group'); ?>
  <?php do_settings_sections('sm_social_media_options'); ?>
  <?php submit_button() ?>
</form>

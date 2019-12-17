<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');
  include_once('../includes/sessions.php');

  draw_header("login");
  draw_login();
  draw_footer();
?>
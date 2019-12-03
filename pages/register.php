<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');

  draw_header("login");
  draw_register();
  draw_footer();
  
  if( isset($_GET['username']) && isset($_GET['password']) && isset($_GET['confirmpassword'])) {
    if ($_GET['username'] === '' && $_GET['password'] === '' && $_GET['confirmpassword'] === '') {
      header('Location: feed.php');
    }
    else {
      header('Location: register.php');
    } 
  }
?>
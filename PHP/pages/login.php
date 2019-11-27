<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');

  draw_header("login");
  draw_login();
  draw_footer();
  
  if(isset($_GET['password'])) {
    if ($_GET['password'] === '' && $_GET['username'] === '') {
      header('Location: feed.php');
    }
    else {
      header('Location: login.php');
    } 
  }
?>
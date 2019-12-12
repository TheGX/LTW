<?php
  include_once('../includes/session.php');
  
  // Unset all of the session variables.
  $_SESSION = array();

  // If it's desired to kill the session, also delete the session cookie.
  if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time()-42000, '/');
  }
  session_destroy();
  header('Location: ../pages/login.php');
?>
<?php
  include_once('../includes/sessions.php');
  include_once('../database/users.php');
  include_once('../database/connection.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (verifyUser($username, $password)== true) {
    $_SESSION['username'] = $username;
    header('Location: ../pages/feed.php');
  } else {
      $_SESSION['error_message'] = 'Incorrect Login!';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>
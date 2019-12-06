<?php

// if(isset($_POST['password'])) {
//     if ($_POST['password'] === '' && $_POST['username'] === '') {
//       header('Location: pages/feed.php');
//     }
//     else {
//       header('Location: pages/login.php');
//     } 
// }
// ?>

<?php
  include_once('../includes/sessions.php');
  include_once('../database/users.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (/*verifyUser($username, $password)*/ true) {
    $_SESSION['username'] = $username;
    header('Location: ../pages/feed.php');
  } else {
    header('Location: ../pages/login.php');
  }
?>
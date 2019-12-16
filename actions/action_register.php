<?php
  include_once('../includes/sessions.php');
  include_once('../database/users.php');
  include_once('../database/connection.php');
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  try { 
    createUser($username, $password, $name, $email);
    $_SESSION['username']=$username;
  } catch (PDOException $e) {
    ?> <h1>ERROR ON CREATE USER</h1> <?php
    die;
  }
  header('Location: ../pages/feed.php');
?>
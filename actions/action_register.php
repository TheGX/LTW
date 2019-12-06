<?php

if(isset($_POST['password'])) {
    if ($_POST['password'] === '' && $_POST['username'] === '') {
      header('Location: pages/feed.php');
    }
    else {
      header('Location: pages/login.php');
    } 
}
?>
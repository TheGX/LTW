<?php
    include_once('../includes/session.php');

    $oldPass = $_POST['password'];

    if(verifyUser($_SESSION['username'], $oldPass)){
        
    }
?>
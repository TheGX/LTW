<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    $oldPass = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];

    if(verifyUser($_SESSION['username'], $oldPass)){
        ?> <h1>Verified user</h1><?php
        editPassword($userID, $newpassword);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);  

?>
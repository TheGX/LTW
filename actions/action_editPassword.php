<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    $oldPass = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];

    if(verifyUser($_SESSION['username'], $oldPass)){
        editPassword($userID, $newpassword);
    } else $_SESSION['error_message'] = 'Incorrect Password!';

    header('Location: ' . $_SERVER['HTTP_REFERER']);  

?>
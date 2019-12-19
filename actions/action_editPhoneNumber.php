<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    var_dump($_GET);
    $number = $_GET['phonenumber'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    editPhoneNumber($userID, $number);
    header('Location: ' . $_SERVER['HTTP_REFERER']);  

?>
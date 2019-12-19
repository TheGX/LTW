<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    var_dump($_GET);
    $email = $_GET['email'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    editEmail($userID, $email);
    header('Location: ' . $_SERVER['HTTP_REFERER']);  

?>
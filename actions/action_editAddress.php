<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    var_dump($_GET);
    $address = $_GET['address'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    editAddress($userID, $address);
    header('Location: ' . $_SERVER['HTTP_REFERER']);  
    
?>
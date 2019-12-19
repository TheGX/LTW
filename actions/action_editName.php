<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    var_dump($_GET);
    $name = $_GET['name'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    editName($userID, $name);
    header('Location: ' . $_SERVER['HTTP_REFERER']);  

?>
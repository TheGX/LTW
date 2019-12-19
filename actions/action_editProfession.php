<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    var_dump($_GET);
    $profession = $_GET['profession'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    editProfession($userID, $profession);
    header('Location: ' . $_SERVER['HTTP_REFERER']);  

?>
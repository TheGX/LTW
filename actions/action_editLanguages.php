<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    var_dump($_GET);
    $languages = $_GET['language'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    editLanguages($userID, $languages);
    header('Location: ' . $_SERVER['HTTP_REFERER']);  

?>
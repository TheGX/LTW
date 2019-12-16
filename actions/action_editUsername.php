<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    var_dump($_GET);
    $userName = $_GET['username'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    editUsername($userID, $userName);
    $_SESSION['username'] = $userName;
?>
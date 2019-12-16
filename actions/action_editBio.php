<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    var_dump($_GET);
    $description = $_GET['text'];
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    editBio($userID, $description);
?>
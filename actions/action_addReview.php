<?php 
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');
    include_once('../database/reservations.php');

    makeHouseReview($_POST['reservationID'], $_POST['rating'], $_POST['text'], date('F Y'));
    header('Location: ' . $_SERVER['HTTP_REFERER']);  

?>
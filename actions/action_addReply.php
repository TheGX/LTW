<?php 
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');
    include_once('../database/reservations.php');

    // var_dump($_POST);
    // die;

    makeGuestReview($_POST['pastReservationID'], $_POST['rating'], $_POST['text'], date('F Y'));

?>
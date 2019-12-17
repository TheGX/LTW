<?php

    include_once('../database/connection.php');
    include_once('../database/houses.php');
    include_once('../database/reservations.php');
    include_once('../includes/sessions.php');

    $houseID = intval($_GET['houseID']);
    $nGuests = intval($_GET['n_guest']);
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
    // var_dump($_GET);
    // die;

    if(checkIfAvailable($houseID, $startDate, $endDate)){
        include_once('../database/users.php');
        $userID = getInfoFromUsername($_SESSION['username'])['ID'];
        $rentPrice = getRentPrice($houseID);
        createReservation($userID, $houseID, $startDate, $endDate, $rentPrice);

        $_SESSION['message'] = 'House booked!';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else{
        ?> <H1>no good</H1><?php 
    }
?>
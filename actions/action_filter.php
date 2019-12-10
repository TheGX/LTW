<?php
    header('Location:./pages/');
    // include_once('../templates/tpl_common.php');
        
    // include_once('../database/connection.php');
    // include_once('../templates/tpl_feed.php');
    // include_once('../database/houses.php');
    // include_once('../database/reservations.php');


    // SELECT Houses.* , (Houses.SingleBeds + 2*Houses.DoubleBeds) AS Guests, Reservation.StartDate, Reservation.EndDate FROM Houses LEFT JOIN Reservation ON Reservation.HouseID = Houses.ID WHERE ((Reservation.StartDate > "11-6-2019" OR Reservation.EndDate < "13-7-2019")) AND Guests > ? AND DailyCost > "50"


    // // if()
    // // $date= $_POST['date'];
    // // $nGuest=$_POST['nGuest'];
    // // $listingType=$_POST['listingtype'];
    // // $price=$_POST['price'];
    // // var_dump($_POST);
    // if (isset($_POST['nGuest'])) {
    //     $listings = filterHouses(11-6-2019, 13-7-2019, 2, 50, "100");
    // }
    // else 
    //     $listings=getAllHouses();
    
    // header('Location: ../pages/feed.php');
    // // var_dump(filterHouses(11-6-2019, 13-7-2019, 2, 50, "100"));
    // // draw_header('feed');
    // // draw_feed(filterHouses(11-6-2019, 13-7-2019, 2, 50, "100"));

?>
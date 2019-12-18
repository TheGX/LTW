<?php 
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_feed.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/houses.php');
    include_once('../database/users.php');

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    $date=NULL;
    $nGuest=NULL;
    $listingType=NULL;
    $price=NULL;
    
    if(empty($_GET))
        $listings=getAllHouses();
    else{
        if(isset($_GET['date']))
            $date= $_GET['date'];
        if(isset($_GET['nGuest']))
            $nGuest= $_GET['nGuest'];
        if(isset($_GET['listingtype']))
            $listingType= $_GET['listingtype'];
        if(isset($_GET['price']))
            $price= $_GET['price'];
        if(isset($_GET['search']))
            $listings = searchHouse($_GET['search']);
        // $listings=filterHouses(11-6-2019, 13-7-2019, "2", 50, "100");
        unset($_GET);
    }


    draw_header('feed');
    draw_feed($listings); 
    draw_footer();
?>
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

    $startDate= 99999;
    $endDate= 0;
    $nGuest=0;
    $price=999999;
    
    if(empty($_GET))
        $listings=getAllHouses();
    else{
        if(!empty($_GET['search']))
            $listings = searchHouse($_GET['search']);
        else {
            if(!empty($_GET['startDate']))
                $startDate= $_GET['startDate'];
            if(!empty($_GET['endDate']))
                $endDate= $_GET['endDate'];
            if(!empty($_GET['nGuest']))
                $nGuest= $_GET['nGuest'];
            if(!empty($_GET['price']))
                $price= intval($_GET['price']);
            $listings=filterHouses($startDate, $endDate, $nGuest, $price);
        }
        unset($_GET);
    }

    draw_header('feed');
    draw_feed($listings); 
    draw_footer();
?>
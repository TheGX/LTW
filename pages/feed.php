<?php 
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_feed.php');
    include_once('../database/connection.php');
    include_once('../database/houses.php');

    $date=NULL;
    $nGuest=NULL;
    $listingType=NULL;
    $price=NULL;
    
    if(empty($_POST))
        $listings=getAllHouses();
    else{
        if(isset($_POST['date']))
            $date= $_POST['date'];
        if(isset($_POST['nGuest']))
            $nGuest= $_POST['nGuest'];
        if(isset($_POST['listingtype']))
            $listingType= $_POST['listingtype'];
        if(isset($_POST['price']))
            $price= $_POST['price'];
        //var_dump($_POST);
        $listings=filterHouses(11-6-2019, 13-7-2019, 2, 50, "100");
    }

    draw_header('feed');
    draw_feed($listings); 
    draw_footer();
?>
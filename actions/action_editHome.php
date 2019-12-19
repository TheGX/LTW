<?php
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');

    var_dump($_POST);
    var_dump($_FILES);
    // die;
    $houseID = $_POST['houseID'];       
    $houseInfo = getHouseInfo($houseID);

    $title = $_POST['title'];
    $dailyCost = $_POST['dailyCost'];
    $address['Country'] = $_POST['country'];
    $address['City'] = $_POST['city'];
    $address['Street'] = $_POST['street'];
    $address['ZIPCode'] = $_POST['postCode'];
    $singleBeds = $_POST['singleBeds'];
    $doubleBeds =$_POST['doubleBeds'];
    $bathrooms =$_POST['bathrooms'];
    $description = $_POST['description'];

    if(empty($_POST['title']))
        $title = $houseInfo['Title'];
    if(empty($_POST['dailyCost']))
        $dailyCost = $houseInfo['DailyCost'];
    if(empty($_POST['country']))
        $address['Country'] = $houseInfo['Country'];
    if(empty($_POST['city']))
        $address['City'] = $houseInfo['City'];
    if(empty($_POST['street']))
        $address['Street'] = $houseInfo['Street'];
    if(empty($_POST['postCode']))
        $address['ZIPCode'] = $houseInfo['ZIPCode'];
    if(empty($_POST['singleBeds']))
        $singleBeds = $houseInfo['SingleBeds'];
    if(empty($_POST['doubleBeds']))
        $doubleBeds = $houseInfo['DoubleBeds'];
    if(empty($_POST['bathrooms']))
        $bathrooms = $houseInfo['DoubleBeds'];
    if(!isset($_POST['place']))
        $houseType = $houseInfo['HouseType'];
    else $houseType = $_POST['place'];
    if(empty($_POST['description']))
        $description = $houseInfo['Description'];
    
    editHouse($houseID, $title, json_encode($address), $dailyCost, $houseID, $bathrooms, $singleBeds, $doubleBeds, $description, $houseType);

    if(!empty($_FILES)){
        // Generate filenames for original, small and medium files
        $originalFileName = "../database/images/houses/originals/$houseID.jpg";
        $smallFileName    = "../database/images/houses/thumbs_small/$houseID.jpg";
        $mediumFileName   = "../database/images/houses/thumbs_medium/$houseID.jpg";

        // Move the uploaded file to its final destination
        if(file_exists($originalFileName)){
            unlink($originalFileName);
        } 
        move_uploaded_file($_FILES['pic1']['tmp_name'], $originalFileName);

        // Crete an image representation of the original image
        $original = imagecreatefromjpeg($originalFileName);

        $width = imagesx($original);     // width of the original image
        $height = imagesy($original);    // height of the original image
        $square = min($width, $height);  // size length of the maximum square

        // Create and save a small square thumbnail
        $small = imagecreatetruecolor(205, 205);
        imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 205, 205, $square, $square);
        imagejpeg($small, $smallFileName);

        // Calculate width and height of medium sized image (max width: 400)
        $mediumwidth = $width;
        $mediumheight = $height;
        if ($mediumwidth > 521) { 
        $mediumwidth = 521; //this makes the mediumheight equal to the same % as mediumwidth
        $mediumheight = $mediumheight * ( $mediumwidth / $width ); 
        }

        // Create and save a medium image
        $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
        imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
        imagejpeg($medium, $mediumFileName);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);  


?>
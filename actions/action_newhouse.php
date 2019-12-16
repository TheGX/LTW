<?php
    
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');

    var_dump($_POST);
    var_dump($_FILES);

    
    if(!isset($_POST['place']) || !isset($_POST['n_Singlebeds']) || !isset($_POST['n_Doublebeds']) 
      || !isset($_POST['n_bathrooms']) || !isset($_POST['country']) 
      || !isset($_POST['street']) || !isset($_POST['city']) || !isset($_POST['pc']) 
      || !isset($_POST['title']) || !isset($_POST['description']) || !isset($_FILES['pic1']) ){
        ?> <h1>ERROR PLS FILL ALL THE INPUTS</h1> <?php
    } else {
        $ownerID = getInfoFromUsername($_SESSION['username'])['ID'];
        $title = $_POST['title'];
        $address['Country'] = $_POST['country'];
        $address['City'] = $_POST['city'];
        $address['Street'] = $_POST['street'];
        $address['ZIPCode'] = $_POST['pc'];
        $dailyCost = $_POST['dailycost']; //STILL MISSING
        $picture = $_POST['picture']; // DON'T KNOW HOW TO MAKE THIS ONE 
        $nBathrooms = $_POST['n_bathrooms'];
        $nSingleBeds = $_POST['n_Singlebeds'];
        $nDoubleBeds = $_POST['n_Doublebeds'];
        $houseType = $_POST['place'];
        $description = $_POST['description']; //MISSING FROM THE CREATE FUNCTION
        
        createHouse($ownerID, $title, json_encode($address), $dailyCost, $picture, $nBathrooms, $nSingleBeds, $nDoubleBeds, $houseType);    
    }
?>
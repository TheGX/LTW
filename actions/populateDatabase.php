<?php
include_once('../database/users.php');
include_once('../database/houses.php');
include_once('../database/connection.php');


    // createUser("thegx", "12344", "Goncalo", "GoncaloEmail@something.com");
    // createUser("nunogomes", "12344", "Nuno", "NunoEmail@something.com");

    $address['Country'] = "Portugal";
    $address['City'] = "Porto";
    $address['Street'] = "Cedofeita";
    $address['ZIPCode'] = "11111";
    createHouse(getInfoFromUsername("thegx")['ID'], "Title of Goncalo's House", json_encode($address), "housebig.jpg", "150", "1", "1", "ENTIRE HOME");
    $address['Country'] = "Portugal";
    $address['City'] = "Lisbon";
    $address['Street'] = "Campo Pequeno";
    $address['ZIPCode'] = "22222";
    createHouse(getInfoFromUsername("thegx")['ID'], "Title of SECOND Goncalo's House", json_encode($address), "housebig.jpg", 200, 2, 1, "ENTIRE HOME");
    
    $address['Country'] = "London";
    $address['City'] = "Porto";
    $address['Street'] = "Cedofeita";
    $address['ZIPCode'] = "42069";
    createHouse(getInfoFromUsername("nunogomes")['ID'], "big house", json_encode($address), "housebig.jpg", 420, 1, 2, "APARTMENT");
?>
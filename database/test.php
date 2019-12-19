<?php
  session_start(['cookie_httponly' => true]);
  
  $conn = new PDO('sqlite:database.db');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<h1>RUNNING PHP</h1>

<?php
    include_once('houses.php');
    include_once('users.php');
    include_once('reservations.php');


?>
    <h1>
        <?php
            //createUser($username, $password, $name, $email);
            $houseID = 2;
        ?>
    </h1>


<?php
    $address['Country'] = "London";
    $address['City'] = "Porto";
    $address['Street'] = "Cedofeita";
    $address['ZIPCode'] = "42069";

    // createHouse(getInfoFromUsername("nuno")['ID'], "expensive house", json_encode($address), 1000, 2, 3, 2, "No Wifi, yes fireplace", "flat");
    // createHouse(getInfoFromUsername("nuno")['ID'], "big house", json_encode($address), 150, 3, 4, 2, "No Wifi, yes fireplace", "flat");
    // createHouse(getInfoFromUsername("nuno")['ID'], "mansion house", json_encode($address), 900, 10, 10, 9, "No Wifi, yes fireplace", "flat");
    // createHouse(getInfoFromUsername("nuno")['ID'], "barraco house", json_encode($address), 1, 0, 1, 0, "No Wifi, yes fireplace", "flat");
    // createHouse(getInfoFromUsername("nuno")['ID'], "small house", json_encode($address), 50, 1, 1, 1, "No Wifi, yes fireplace", "flat");
    
    // createReservation(getInfoFromUsername("nuno")['ID'], 4, "2017-06-12", "2017-07-12", getRentPrice(4)); // barraco
    // createReservation(getInfoFromUsername("nuno")['ID'], 5, "2017-08-12", "2017-08-15", getRentPrice(5)); // small
    // createReservation(getInfoFromUsername("nuno")['ID'], 4, "2017-07-17", "2017-08-01", getRentPrice(4)); // barraco

    // makeHouseReview(1, 4, "nice house", date("D, M d Y (h:m:s a)"));
    // makeHouseReview(3, 5, "even better than before", date("D, M d Y (h:m:s a)"));

    //makeHouseReview(2, 3, "not good", date("D, M d Y (h:m:s a)"));


    foreach(filterHouses("2019-07-13", "2019-08-01", 0, 100000) as $house) {
        setHouseRating($house['ID']);
?>
        <h1>Available houses: <?php echo($house['Title'])?></h1> 
        <h1>Rating: <?php echo(getHouseRating($house['ID'])['Rating']);?></h1>
<?php 
    }
    foreach(getHousesFromOwner(getInfoFromUsername("nunogomes")['ID']) as $house) {
?>
        <h1>House: <?php //echo($house['Title'])?></h1>
<?php
        foreach(getReservationsInHouse($house['ID']) as $reservation) {
?>
            <h1>Reservation by <?php echo(getInfoFromID($reservation['GuestID'])['Username'])?></h1>
<?php
        }
    }
    foreach(getReservationsFromUser(getInfoFromUsername("nunookok1")['ID']) as $reservation) {
?>
        <h1>Reservations from user: <?php echo(getInfoFromID($reservation['GuestID'])['Username'])?></h1>
<?php
    }
?>
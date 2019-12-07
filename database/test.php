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
            //createReservation(getInfoFromUsername("malobo")['ID'], $houseID, "12-6-2019", "12-7-2019", getRentPrice($houseID))
        ?>
    </h1>


<?php
    // $address['Country'] = "London";
    // $address['City'] = "Porto";
    // $address['Street'] = "Cedofeita";
    // $address['ZIPCode'] = "42069";

    //createHouse(getInfoFromUsername("marquerere")['ID'], "big house", json_encode($address), "housebig.jpg", 420);
    foreach(getAllHouses() as $house) {
?>
        <h1>All houses: <?php echo($house['DailyCost'])?></h1>
<?php 
    }

    foreach(getAllReservations() as $reservation) {
?>
        <h1>Price Paid: <?php echo($reservation['PricePaid'])?></h1>
<?php 
    }

    foreach(getHousesFromOwner(getInfoFromUsername("nunogomes")['ID']) as $house) {
?>
        <h1>House: <?php echo($house['Title'])?></h1>
<?php
        foreach(getReservationsInHouse($house['ID']) as $reservation) {
?>
            <h1>Reservation by <?php echo(getInfoFromID($reservation['GuestID'])['Username'])?></h1>
<?php
        }
    }
    foreach(getReservationsFromUser(getInfoFromUsername("malobo")['ID']) as $reservation) {
?>
        <h1>Reservations from user: <?php echo($reservation['GuestID'])?></h1>
<?php
    }
?>
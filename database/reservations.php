<?php
    //Create a new reservation for $guest in $house from $start to $end with a $daily cost (WORKING)
    function createReservation($guest, $house, $start, $end, $dailyCost) {
        global $conn;

        $stmt = $conn->prepare('INSERT INTO Reservation VALUES(NULL, ?, ?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NULL)');
        $stmt->execute([$guest, $house, $start, $end, $dailyCost]);

        return $stmt->fetch();
    }
    //Retrieve all Reservations (WORKING)
    function getAllReservations() {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM Reservation');
        $stmt->execute();

        return $stmt->fetchAll();
    }
    //retrieve reservations from $guest
    function getReservationsFromUser($guest) {
        global $conn;

        //CODE HERE
        $stmt = $conn->prepare('SELECT * FROM Reservation WHERE GuestID = ?');
        $stmt->execute(array($guest));

        return $stmt->fetchAll();
    }
    //retrieve reservations in $house
    function getReservationsInHouse($house) {
        global $conn;

        //CODE HERE
        $stmt = $conn->prepare('SELECT * FROM Reservation WHERE HouseID = ?');
        $stmt->execute(array($house));

        return $stmt->fetchAll();
    }

?>
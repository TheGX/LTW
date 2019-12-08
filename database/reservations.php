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
    //retrieve reservations from $guest (WORKING)
    function getReservationsFromUser($guest) {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM Reservation WHERE GuestID = ?');
        $stmt->execute(array($guest));

        return $stmt->fetchAll();
    }
    //retrieve reservations in $house (WORKING)
    function getReservationsInHouse($house) {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM Reservation WHERE HouseID = ?');
        $stmt->execute(array($house));

        return $stmt->fetchAll();
    }

    function makeHouseReview($reservationID, $houseRating, $comment, $date) {
        global $conn;
        $stmt = $conn->prepare('UPDATE Reservation 
                                SET HouseRating = ?, Comment = ?, CommentDate = ?
                                WHERE ID = ?');

        $stmt->execute([$houseRating, $comment, $date, $reservationID]);

        return $stmt->fetchAll();
    }
    function makeGuestReview($reservationID, $guestRating, $reply, $date) {
        global $conn;
        $stmt = $conn->prepare('UPDATE Reservation 
                                SET GuestRating = ?, Reply = ?, ReplyDate = ?
                                WHERE ID = ?');

        $stmt->execute([$guestRating, $reply, $date, $reservationID]);

        return $stmt->fetch();
    }

?>
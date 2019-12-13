<?php

	//Add a house to the database (WORKING)
    function createHouse($ownerID, $title, $addressEncoded, $thumbnail, $dailyCost, $nSingleBeds, $nDoubleBeds, $houseType) {
      global $conn;

      $address = json_decode($addressEncoded);

      $stmt = $conn->prepare('INSERT INTO Houses VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ?, ?, NULL, ?)');
      $stmt->execute([$ownerID, $title, $address->{'Country'}, $address->{'City'}, $address->{'Street'}, $address->{'ZIPCode'}, $thumbnail, $dailyCost, $nSingleBeds, $nDoubleBeds, $houseType]);

      return $stmt->fetch();
	}

	//retrieve all houses (WORKING)
	function getAllHouses() {
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM Houses');
		$stmt->execute();
		return $stmt->fetchAll();
	}

  	//Get houses from owner id (WORKING)
  	function getHousesFromOwner($owner) {
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM Houses WHERE OwnerID = ?');
		$stmt->execute(array($owner));
		return $stmt->fetchAll();
	}

  	//Get houses from the description, title or address. To be used on SEARCH BAR (WORKING)
	function searchHouse($query) { 
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM Houses 
								WHERE Title LIKE ? 
								OR Description LIKE ? 
								OR Country LIKE ? 
								OR City LIKE ?
								OR Street LIKE ? 
								OR ZIPCode LIKE ?');
		$stmt->execute(["%$query%", "%$query%", "%$query%", "%$query%", "%$query%", "%$query%"]);
		return $stmt->fetchAll();
	}

	// To be used by the TOP OF PAGE FORM (UNTESTED)
	function filterHouses($start, $end, $guests, $minPrice, $maxPrice) {
		global $conn;

		$stmt = $conn->prepare('SELECT Houses.* , (Houses.SingleBeds + 2*Houses.DoubleBeds) AS Guests, Reservation.StartDate, Reservation.EndDate FROM Houses
								LEFT JOIN Reservation ON Reservation.HouseID = Houses.ID
								WHERE ((Reservation.StartDate > "11-6-2019" OR Reservation.EndDate < "13-7-2019"))
								AND Guests > 2
								AND DailyCost > "50"' );
		
		// $guests=2;
		// $stmt->execute(array($guests));
		$stmt->execute();
		
		// $stmt->execute([$start, $end, $guests, $minPrice]);
		return $stmt->fetchAll();
	}

	//DEPRECATED - getHouseInfo does it more effectively
	function getRentPrice($ID) {
		global $conn;

		$stmt = $conn->prepare('SELECT DailyCost FROM Houses WHERE ID = ?');
		$stmt->execute(array($ID));
		return $stmt->fetch()['DailyCost'];
	}

	//Checks if 1 date is between a reservation
	function checkIfAvailable($HouseID, $dateStart, $dateEnd){
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM Reservation 
								WHERE HouseID = ? AND (? < EndDate AND ?>StartDate)');
		$stmt->execute(array($HouseID, $dateStart, $dateEnd));
		return $stmt->fetch()?false:true; //returns true if dates available cause no lines where found
	}
?>
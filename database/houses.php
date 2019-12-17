<?php

	//Add a house to the database (WORKING)
    function createHouse($ownerID, $title, $addressEncoded, $dailyCost, $nBathrooms, $nSingleBeds, $nDoubleBeds, $description, $houseType) {
      global $conn;

      $address = json_decode($addressEncoded);

      $stmt = $conn->prepare('INSERT INTO Houses VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, NULL, ?, ?, ?, ?, ?)');
	  $stmt->execute([$ownerID, $title, $address->{'Country'}, $address->{'City'}, 
	  			$address->{'Street'}, $address->{'ZIPCode'}, $dailyCost, $nBathrooms, $nSingleBeds, $nDoubleBeds, $description, $houseType]);

      return $conn->lastInsertId();
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
	//Get houses info from house id
	function getHouseInfo($HouseID) {
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM Houses WHERE ID = ?');
		$stmt->execute(array($HouseID));
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

	//Given HouseID checks if house is available in the argument date
	function checkIfAvailable($HouseID, $dateStart, $dateEnd){
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM Reservation 
								WHERE HouseID = ? AND (? < EndDate AND ?>StartDate)');
		$stmt->execute(array($HouseID, $dateStart, $dateEnd));
		return $stmt->fetch()?false:true; //returns true if dates available cause no lines where found
	}

	function editRooms($house, $single, $double, $bathroom) {
		global $conn;
        $stmt = $conn->prepare('UPDATE Houses 
                                SET SingleBeds = ?, DoubleBeds = ?, Bathrooms = ?
                                WHERE ID = ?');
		$stmt->execute([$single, $double, $bathroom, $house]);
        return $stmt->fetch();
	}
	
	function editDescription($house, $description) {
		global $conn;
        $stmt = $conn->prepare('UPDATE Houses 
                                SET Description = ?
                                WHERE ID = ?');
		$stmt->execute([$description, $house]);
        return $stmt->fetch();
	}
	function editType($house, $type) {
		global $conn;
        $stmt = $conn->prepare('UPDATE Houses 
                                SET HouseType = ?
                                WHERE ID = ?');
		$stmt->execute([$type, $house]);
        return $stmt->fetch();
	}
	
?>
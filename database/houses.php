<?php
	//Add a house to the database (WORKING)
    function createHouse($owner, $title, $addressEncoded, $thumbnail, $dailyCost) {
      global $conn;

      $address = json_decode($addressEncoded);

      $stmt = $conn->prepare('INSERT INTO Houses VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)');
      $stmt->execute([$owner, $title, $address->{'Country'}, $address->{'City'}, $address->{'Street'}, $address->{'ZIPCode'}, $thumbnail, $dailyCost]);

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

		$stmt = $conn->prepare('SELECT Houses.*, (Houses.SingleBeds + 2*Houses.DoubleBeds) AS Guests, Reservation.StartDate, Reservation.EndDate FROM Houses
								LEFT JOIN Reservation ON Reservation.HouseID = Houses.ID
								WHERE ((Reservation.StartDate > ? OR Reservation.EndDate < ?))
								AND Guests > ? 
								AND DailyCost > ?
								AND DailyCost < ?');
		$stmt->execute($start, $end, $guests, $minPrice, $maxPrice);
		return json_encode($stmt->fetchAll());
	}

	//DEPRECATED - getHouseInfo does it more effectively
	function getRentPrice($ID) {
		global $conn;

		$stmt = $conn->prepare('SELECT DailyCost FROM Houses WHERE ID = ?');
		$stmt->execute(array($ID));
		return $stmt->fetch()['DailyCost'];
	}
?>
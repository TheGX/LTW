<?php
    include_once('connection.php');
    
    // Adds user to the Database (WORKING)
    function createUser($username, $password, $name, $email) {
        global $conn;

        $stmt = $conn->prepare('INSERT INTO Users VALUES(NULL, ?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NULL)');
        $stmt->execute([$username, $password, $name, $email]);

        return $stmt->fetch();  
    }

    // Queries users from the names and usernames in the database (WORKING)
    function searchUsers($query) {
        global $conn;

        $stmt = $conn->prepare('SELECT ID, Username, Name, Email FROM Users WHERE Name LIKE ? OR Username LIKE ?');
        $stmt->execute(["%$query%", "%$query%"]);

        return $stmt->fetchAll();
    }

    // Queries user info of an ID in the Database (WORKING)
    function getInfoFromID($ID) {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM Users WHERE ID = ?');
        $stmt->execute(array($ID));

        return $stmt->fetch();
    }

    // Queries user info of a username in the Database (WORKING)
    function getInfoFromUsername($username) {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM Users WHERE Username = ?');
        $stmt->execute(array($username));
        return $stmt->fetch();
    }

    // Queries user info from email in the database (WORKING)
    function getInfoFromEmail($email) {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM Users WHERE Email = ?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }
?>
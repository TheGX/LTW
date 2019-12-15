<?php
    // Adds user to the Database (WORKING, NOW WITH HASHED PASSWORDS)
    function createUser($username, $password, $name, $email) {
        global $conn;

        $options = ['cost' => 12];
        $hash = password_hash($password, PASSWORD_DEFAULT, $options);

        $stmt = $conn->prepare('INSERT INTO Users VALUES(NULL, ?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NULL)');
        $stmt->execute([$username, $hash, $name, $email]);

        return $stmt->fetch();  
    }

    //Returns true if theres a $username in the database with the $password, otherwise return false
    function verifyUser($username, $password) {
        global $conn;  

        $stmt = $conn->prepare('SELECT * FROM Users WHERE Username = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return ($user !== false && password_verify($password, $user['Password']));
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

    function editProfile($user, $languages, $job, $bio, $phone) {
        global $conn;
        $stmt = $conn->prepare('UPDATE Users
                                SET LanguagesSpoken = ?, Profession = ?, Biography = ?, PhoneNumber = ?
                                WHERE ID = ?');
        $stmt->execute([$languages, $job, $bio, $phone, $user]);
        return $stmt->fetch();
    }
    function editAvatar($user, $file)  {
        global $conn;
        $stmt = $conn->prepare('UPDATE Users 
                                SET Avatar = ?
                                WHERE ID = ?');
        $stmt->execute([$user, $file]);
        return $stmt->fetch();
    }
    function editName($user, $name) {
        global $conn;
        $stmt = $conn->prepare('UPDATE Users 
                                SET Name = ?
                                WHERE ID = ?');
        $stmt->execute([$user, $name]);
        return $stmt->fetch();
    }
?>
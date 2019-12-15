<?php

    function uploadProfileImage($username){
        global $conn;
        
        $stmt = $conn->prepare('UPDATE Users SET PhotoTitle = ?
                                    WHERE Username = ?');
        $stmt->execute(array($username, $username));
        
        $stmt =$conn->prepare('INSERT INTO Images (ID, Title)
                                VALUES (NULL, ?)');
        $stmt->execute(array($username));

        return $conn->lastInsertId();
    }
?>
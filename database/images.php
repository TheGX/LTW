<?php

    function uploadProfileImage($userID){
        global $conn;
        
        $stmt = $conn->prepare('UPDATE Users SET PhotoTitle = ?
                                    WHERE ID = ?');
        $stmt->execute(array($userID, $userID));
        
        $stmt =$conn->prepare('INSERT INTO Images (ID, Title)
                                VALUES (NULL, ?)');
        $stmt->execute(array($userID));
        return $conn->lastInsertId();
    }
?>
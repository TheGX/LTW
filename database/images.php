<?php

    function uploadProfileImage($username, $title){
        global $conn;

        $stmt =$conn->prepare('INSERT INTO Images (ID, Title)
                                VALUES (NULL, ?)');
        $stmt->execute(array($title));

        // $stmt = $conn->prepare('UPDATE Users SET Title = ?
        //                             WHERE Username = ?');
        // $stmt->execute(array($title, $username));

        return $conn->lastInsertId();
    }
?>
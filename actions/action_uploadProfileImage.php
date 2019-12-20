<?php

    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/images.php');
    include_once('../database/users.php');

    // We know this code comes from example given in the theorical class and is probably vunerable to image scrapping
    // however, we understand this code and given the time constrains no alternatives have been found
    if((isset($_SESSION['username']))) {
        $userID = getInfoFromUsername($_SESSION['username'])['ID'];
        $id = uploadProfileImage($userID);
        // Generate filenames for original, small and medium files
        $originalFileName = "../database/images/users/originals/$userID.jpg";
        $smallFileName    = "../database/images/users/thumbs_small/$userID.jpg";
        $mediumFileName   = "../database/images/users/thumbs_medium/$userID.jpg";
    
        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
    
        // Crete an image representation of the original image
        $original = imagecreatefromjpeg($originalFileName);
    
        $width = imagesx($original);     // width of the original image
        $height = imagesy($original);    // height of the original image
        $square = min($width, $height);  // size length of the maximum square
    
        // Create and save a small square thumbnail
        $small = imagecreatetruecolor(71, 71);
        imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 71, 71, $square, $square);
        imagejpeg($small, $smallFileName);
    
        // Calculate width and height of medium sized image (max width: 400)
        $mediumwidth = $width;
        $mediumheight = $height;
        if ($mediumwidth > 286) { 
        $mediumwidth = 286; //this makes the mediumheight equal to the same % as mediumwidth
        $mediumheight = $mediumheight * ( $mediumwidth / $width ); 
        }
    
        // Create and save a medium image
        $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
        imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
        imagejpeg($medium, $mediumFileName);
    }

    header('Location: ../pages/touristprofile.php');
?>
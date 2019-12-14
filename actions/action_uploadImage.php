<?php

    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/images.php');
    
    // var_dump($_FILES);
    // die;
    // We know this code comes from example given in the theorical class and is probably vunerable to image scrapping
    // however, we understand this code and given time constrains no alternatives have been found
    if((isset($_POST['title'])) && (isset($_SESSION['username']))) {
        $title = $_POST['title'];
        $id = uploadProfileImage($_SESSION['username'], $title);
        // Generate filenames for original, small and medium files
        $originalFileName = "../database/images/originals/$id.jpg";
        $smallFileName    = "../database/images/thumbs_small/$id.jpg";
        $mediumFileName   = "../database/images/thumbs_medium/$id.jpg";
    
        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
    
        // Crete an image representation of the original image
        $original = imagecreatefromjpeg($originalFileName);
    
        $width = imagesx($original);     // width of the original image
        $height = imagesy($original);    // height of the original image
        $square = min($width, $height);  // size length of the maximum square
    
        // Create and save a small square thumbnail
        $small = imagecreatetruecolor(200, 200);
        imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
        imagejpeg($small, $smallFileName);
    
        // Calculate width and height of medium sized image (max width: 400)
        $mediumwidth = $width;
        $mediumheight = $height;
        if ($mediumwidth > 400) { 
        $mediumwidth = 400; //this makes the mediumheight equal to the same % as mediumwidth
        $mediumheight = $mediumheight * ( $mediumwidth / $width ); 
        }
    
        // Create and save a medium image
        $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
        imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
        imagejpeg($medium, $mediumFileName);
    }

?> <img src="../database/images/thumbs_small/<?=$id?>.jpg" width="200" height="200" alt="soz man">

<?php

?>
<?php
    
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');
    include_once('../database/images.php');


    // var_dump($_POST);
    // var_dump($_FILES);
    // die;
    
    if(empty($_POST['place']) || empty($_POST['n_Singlebeds']) || empty($_POST['n_Doublebeds']) 
      || empty($_POST['n_bathrooms']) || empty($_POST['country']) 
      || empty($_POST['street']) || empty($_POST['city']) || empty($_POST['pc']) 
      || empty($_POST['title']) || empty($_POST['description']) || empty($_FILES['pic1']['name']) ){
        ?> <h1>ERROR PLS FILL ALL THE INPUTS</h1> <?php 
    } else {
        $ownerID = getInfoFromUsername($_SESSION['username'])['ID'];
        $title = $_POST['title'];
        $address['Country'] = $_POST['country'];
        $address['City'] = $_POST['city'];
        $address['Street'] = $_POST['street'];
        $address['ZIPCode'] = $_POST['pc'];
        $dailyCost = $_POST['dailycost'];
        $nBathrooms = $_POST['n_bathrooms'];
        $nSingleBeds = $_POST['n_Singlebeds'];
        $nDoubleBeds = $_POST['n_Doublebeds'];
        $houseType = $_POST['place'];
        $description = $_POST['description']; 
        
        $houseID = createHouse($ownerID, $title, json_encode($address), $dailyCost, $nBathrooms, $nSingleBeds, $nDoubleBeds, $description, $houseType);    
        if($houseID){
            uploadHouseImage($houseID);
            // Generate filenames for original, small and medium files
            $originalFileName = "../database/images/houses/originals/$houseID.jpg";
            $smallFileName    = "../database/images/houses/thumbs_small/$houseID.jpg";
            $mediumFileName   = "../database/images/houses/thumbs_medium/$houseID.jpg";
        
            // Move the uploaded file to its final destination
            move_uploaded_file($_FILES['pic1']['tmp_name'], $originalFileName);
        
            // Crete an image representation of the original image
            $original = imagecreatefromjpeg($originalFileName);
        
            $width = imagesx($original);     // width of the original image
            $height = imagesy($original);    // height of the original image
            $square = min($width, $height);  // size length of the maximum square
        
            // Create and save a small square thumbnail
            $small = imagecreatetruecolor(205, 205);
            imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 205, 205, $square, $square);
            imagejpeg($small, $smallFileName);
        
            // Calculate width and height of medium sized image (max width: 400)
            $mediumwidth = $width;
            $mediumheight = $height;
            if ($mediumwidth > 521) { 
            $mediumwidth = 521; //this makes the mediumheight equal to the same % as mediumwidth
            $mediumheight = $mediumheight * ( $mediumwidth / $width ); 
            }
        
            // Create and save a medium image
            $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
            imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
            imagejpeg($medium, $mediumFileName);
        }
    }

?>  <img src="../database/images/houses/thumbs_small/<?=$houseID?>.jpg"  alt="Small profile photo">
    <img src="../database/images/houses/thumbs_medium/<?=$houseID?>.jpg" alt="Medium profile photo">
<?php
?>
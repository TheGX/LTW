<?php 
    include_once('../templates/tpl_common.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    $houseID = $_GET['houseID'];
    $houseInfo = getHouseInfo($houseID);
    draw_header('edit');
?>
    <section id="EditInfo">
        <header>
            <h3>Edit House Listing</h3>
        </header>
        <form action="../actions/action_editHome.php" enctype="multipart/form-data" method="post">
            <h4>Edit Title:</h4>
                <input type="hidden" name="houseID" value="<?=$houseID?>">
                <label for="newtitle">Title:</label>
                <input type="text" id="newtitle" name="title" placeholder="<?=$houseInfo['Title']?>">
            <h4>Edit Daily Cost</h4>
                <label for="dailycost">Daily Cost:</label>
                <input type="number" id="dailycost" name="dailyCost" min="1" placeholder="<?=$houseInfo['DailyCost']?>">
            <h4>Edit Picture</h4>
                <input type="file" name="pic1" accept="image/*">
            <h4>Edit address:</h4>
                <label for="newcountry">Country:</label>
                <input type="text" id="newcountry" name="country" placeholder="<?=$houseInfo['Country']?>">
                <label for="newcity">City:</label>
                <input type="text" id="newcity" name="city" placeholder="<?=$houseInfo['City']?>">
                <label for="newstreet">Street:</label>
                <input type="text" id="newstreet" name="street" placeholder="<?=$houseInfo['Street']?>">
                <label for="newpostCode">Post Code:</label>
                <input type="text" id="newpostCode" name="postCode" placeholder="<?=$houseInfo['ZIPCode']?>">

            <h4>Edit Nº of Beds:</h4>
                <label for="newSingle">Single Beds:</label>
                <input type="text" id="newSingle" name="singleBeds" placeholder="<?=$houseInfo['SingleBeds']?>">
                <label for="newDouble">Double Beds:</label>
                <input type="text" id="newDouble" name="doubleBeds" placeholder="<?=$houseInfo['DoubleBeds']?>">

            <h4>Edit House Type:</h4>
                House Type:
                House<input type="radio" name="place" value="Entire house"> 
                Flat<input type="radio" name="place" value="Appartment"> 
            
            <h4>Edit Nº of Bathrooms:</h4>
                <label for="newBathroom">Nº of Bathrooms:</label>
                <input type="text" id="newBathroom" name="bathrooms" placeholder="<?=$houseInfo['Bathrooms']?>">
            
            <h4>Description:</h4>
                <textarea name="description" rows="5" cols="100" placeholder="<?=$houseInfo['Description']?>"></textarea>
                <input type="submit" value="Edit House Listing" style="display: block;">
        </form>
    </section>
<?php 
    draw_footer();
?>
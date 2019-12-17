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
        <h4>Edit Title:</h4>
        <form action="../actions/action_editUsername.php" method="get">
            <label for="newtitle">Title:</label>
            <input type="text" id="newtitle" name="username" placeholder="<?=$houseInfo['Title']?>">
            <input type="submit" value="Change Title">
        </form>
        
        <h4>Edit address:</h4>
        <form action="../actions/action_editAddress.php" method='get'>
            <label for="newcountry">Country:</label>
            <input type="text" id="newcountry" name="country">
            <label for="newcity">City:</label>
            <input type="text" id="newcity" name="city">
            <label for="newstreet">Street:</label>
            <input type="text" id="newstreet" name="street">
            <label for="newpostCode">Post Code:</label>
            <input type="text" id="newpostCode" name="postCode">
            <input type="submit" value="Change Address">
        </form>

        <h4>Edit Nº of Beds:</h4>
        <form action="../actions/action_editLanguages.php" method='get'>
            <label for="newSingle">Single Beds:</label>
            <input type="text" id="newSingle" name="singleBeds">
            <label for="newDouble">Double Beds:</label>
            <input type="text" id="newDouble" name="singleDouble">
            <input type="submit" value="Change Nº Beds">
        </form>

        <h4>Edit House Type:</h4>
        <form action="../actions/action_editProfession.php" method='get'>
            <label for="newType">House Type:</label>
            House<input type="radio" name="place" value="Entire house" checked> 
            Flat<input type="radio" name="place" value="Appartment"> 
            <input type="submit" value="Change House Type">
        </form>
        
        <h4>Description:</h4>
        <form action="../actions/action_editBio.php" method='get'>
            <textarea name="text" rows="5" cols="100">...</textarea>
            <input type="submit" value="Change House Description">
        </form>
    </section>
<?php 
    draw_footer();
?>
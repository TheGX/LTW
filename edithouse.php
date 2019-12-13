<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/users.php');
    include_once('../database/connection.php');

    draw_header('edithouse');
      
?>
<section id="content">
    <section id="House-Edit">
                 <section id="info">
                 <header>   
                     <h5>Currently your announce looks like this:</h5>
                      <h2>Modern Downtown Barcelona House</h2>
                      <img src="pictures/FeedHouse1.png" alt="a nice house">
               
                    <p id="description">ENTIRE HOUSE <br> <br> Bright and comfortable house located in downtown Barcelona, 5 minutes from the Sagrada Familia, 2 minutes from the Torre Agbar and 1 minute from the Glorias metro station.
                        <br>Perfect location, peaceful and a cozy stay so you can enjoy Barcelona! </p>
                    </header>
                 </section>

                <section id="EditInfo">
                    <header>
                        <h2>Edit Your Announce</h2>
                    </header>
                        <h4>Title:</h4>
                            <form action="../actions/action_editHouseTitle.php" method='post'>
                                <textarea name="text" rows="5" cols="100"></textarea><br>
                                <input type="submit" value="Change House Title">
                            </form>
                        <h4>Description:</h4>
                            <form action="../actions/action_editHouseDescription.php" method='post'>
                                <textarea name="text" rows="5" cols="100"></textarea><br>
                                <input type="submit" value="Change House Description">
                            </form>
                        <h4>Change your House's photo:</h4>
                            <form action="../actions/action_uploadImage.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload Image" name="submit">
                            </form>
                        <h4>Edit Amenities List:</h4>
                        <header>
                                    <div>
                                    <input type="checkbox" id="Wifi" name="Wifi">
                                    <label for="Wifi">Wifi</label>
                                    </div>

                                    <div>
                                    <input type="checkbox" id="FreeParking" name="FreeParking">
                                    <label for="FreeParking">Free Parking</label>
                                    </div>

                                    <div>
                                    <input type="checkbox" id="kitchen" name="kitchen">
                                    <label for="kitchen">Kitchen</label>
                                    </div>

                                    <div>
                                    <input type="checkbox" id="heating" name="heating">
                                    <label for="heating">Heating</label>
                                    </div>

                                    <div>
                                    <input type="checkbox" id="tv" name="tv">
                                    <label for="tv">Cable TV</label>
                                    </div>

                                    <div>
                                    <input type="checkbox" id="bathessencials" name="bathessencials">
                                    <label for="bathessencials">Bath Essencials</label>
                                    </div>

                                    <div>
                                    <input type="checkbox" id="smoke" name="smoke">
                                    <label for="smoke">Smoke Detector</label>
                                    </div>
                                </header>
                    </section>

        <section id="done">
        <input type="submit" value="Save Settings">
        </section>

    </section>
</section>

<?php 
    draw_footer();
?>


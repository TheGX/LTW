<?php 
    include_once('../templates/tpl_common.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    $HouseID = $_GET['houseID'];

    $houseInfoArray = getHouseInfo($HouseID);
    $houseInfo = $houseInfoArray;
    $ownerInfo = getInfoFromID($houseInfo['OwnerID']);
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];

    if($ownerInfo['ID'] === $userID){
        $ownerView = True;
    } else
        $ownerView = False;
    draw_header('houselist');
?>
    <section id="content">
    <section id="filters">
          <h2>Amenities</h2>
                <ul id="menu-filters" style="list-style-type:none;">
                <li><?=$houseInfo['SingleBeds'] +2*$houseInfo['DoubleBeds']?> guests</li>
                <li><?=$houseInfo['Bathrooms'] ?> bathroms</li>
                <!-- <li>Kitchen</li>
                <li>Wi-fi</li>
                <li>Heating</li>
                <li>Free Parking</li> -->
            </ul>
        </section>
        <section id="House-section">
            <a href="../database/images/houses/originals/<?=$houseInfo['Picture1']?>.jpg">
                <img src="../database/images/houses/thumbs_medium/<?=$houseInfo['Picture1']?>.jpg" alt="House picture">
            </a>
            <section id="info">
                <header>
                    <h2><?=$houseInfo['Title'] ?></h2>
                    <p id="description"><?=$houseInfo['HouseType'] ?> <br> 
                        <br> <?=$houseInfo['Description'] ?> </p>
                </header>
            </section>
        </section>
        <section id="calendar">
            <h2>Add dates for a price</h2>
            <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
            <form action="../actions/action_addReservation.php" id="N_guests" method="get">
                <!-- <input type="text" name="daterange" value="12/01/2019 - 01/13/2020" /> -->
                <!-- <input type="date" name="startDate" value="Start Date"> -->
                <input placeholder="Start Date" name="startDate" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input placeholder="End Date" name="endDate" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input type="hidden" name="houseID" value="<?= $houseInfo['ID']?>">
                <script>
                $(function() {
                    $('input[name="daterange"]').daterangepicker({
                            opens: 'center'
                    }, function(start, end, label) {
                            console.log("A new date selection was made: " + start.format('MM-DD-YYYY') + ' to ' + end.format('MM-DD-YYYY'));
                            var dates = {start,end};
                            console.log("start-date-> " +start);
                            return dates;
                    });
                });
                </script>

                <h3>Guests:</h3> 
                    <select name="n_guest" id="Nguest">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="1">5</option>
                    </select>
                    <input type="submit" value="RESERVE">
            </form>
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="message">
                    <?=$_SESSION['message']?>
                </div>
            <?php unset($_SESSION['message']); } ?>
                <p>Daily Cost: <?=$houseInfo['DailyCost']?></p>
            <?php if($ownerView === true) { ?>
                <div class="edit">
                    <form action="editHome.php" method="get">
                        <input type="hidden" name="houseID" value="<?=$houseInfo['ID'] ?>">
                        <button type="submit">Edit your Home</button>
                    </form>
                </div>
            <?php }?>
        </section>
        <section id="Information">
            <section id="Location">
                <h2>Location</h2>
                <img src="pictures/gps.png" alt="GPS litle pic">
                <p><?=$houseInfo['Country']?>, <?=$houseInfo['City']?></p>
                <p>Address: <?=$houseInfo['Street']?></p>
                <p>Post Code: <?=$houseInfo['ZIPCode']?></p>
            </section>
            <section id="About-Host">
                <section id="host-info">
                <h2>About Host</h2>
                <a href="touristprofile.php?ownerUsername=<?=$ownerInfo['Username']?>">
                    <h3><?= $ownerInfo['Name']?></h3>
                </a>
                </form>
                    <p id="host-location"><?= $ownerInfo['Address']?></p>
                    <p id="host-language">Languages: <?= $ownerInfo['LanguagesSpoken']?></p>
                    <p id="host-contact">Contact Host: <?= $ownerInfo['Email']?></p>
                    <!-- <a href="message.html">Contact Host!</a> -->
                </section>
            </section>
        </section>
        <section id="reviews">
                <header>
                    <h2>Reviews</h2>
                </header>
                <article>
                    <header>
                        <span id="author">Tom</span><br>
                        <span id="date">September 2019</span>
                    </header>
                    <section id="comment">
                        <p>House is perfect. Very clean and really well located.</p>
                        <p>Highly recommend</p>
                    </section>
                </article>
                <article>
                    <header>
                        <span id="author">Hollie</span>
                        <span id="date">July 2019</span>
                    </header>
                    <section id="comment">
                        <p>Etiam massa magna, dictum ac purus. Proin dignissim dolor nec scelerisque bibendum. Maecenas iaculis erat id, convallis arcu. Ut imperdiet, eros dui laoreet enim, fermentum urna. Vestibulum orci luctus et Curae arcu, ut porta massa iaculis sit amet.</p>
                        <p>Quisque a dapibus magna, non scelerisque</p>
                    </section>
                </article>
                <article>
                    <header>
                        <span id="author"> Hollie</span>
                        <span id="date">June 2019</span>
                    </header>
                    <section id="comment">
                        <p>User was a good guest,respectfull and clean.</p>
                        <p>Quisque a dapibus magna, non scelerisque</p>
                    </section>
                </article>
        </section>
    </section>

<?php 
    draw_footer();
?>
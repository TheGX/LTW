<?php 
    include_once('../templates/tpl_common.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');
    include_once('../database/reservations.php');

    if(!isset($_SESSION['username']) && !isset($_GET['houseID'])){
        header('Location: login.php');
    }

    $HouseID = $_GET['houseID'];

    $houseInfo = getHouseInfo($HouseID);
    $houseReservations = getPastReservationsInHouse($houseInfo['ID']);
    $ownerInfo = getInfoFromID($houseInfo['OwnerID']);
    $userID = getInfoFromUsername($_SESSION['username'])['ID'];
    $userPastReservations = getPastReservationsFromUser($userID);

    if($ownerInfo['ID'] === $userID){
        $ownerView = True;
    } else
        $ownerView = False;
    
    $commentView = False;
    foreach($userPastReservations as $reservation){
        if($reservation['HouseID']===$houseInfo['ID'] && empty($reservation['Comment']) ){
            $commentView = True;
            break;
        }
    }
    draw_header('houselist');
?>
    <section id="content">
    <section id="filters">
          <h2>Amenities</h2>
                <ul id="menu-filters" style="list-style-type:none;">
                <li><?=$houseInfo['SingleBeds'] +2*$houseInfo['DoubleBeds']?> guests</li>
                <li><?=$houseInfo['Bathrooms'] ?> bathroms</li>
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
            <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
            <form action="../actions/action_addReservation.php" id="N_guests" method="get">
                <input type="text" name="daterange" value="12/01/2019 - 01/13/2020" />
                <!-- <input placeholder="Start Date" name="startDate" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input placeholder="End Date" name="endDate" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"> -->

                <input name="startDate" type="hidden" id="startDate">
                <input name="endDate" type="hidden" id="endDate">
                
                <input type="hidden" name="houseID" value="<?= $houseInfo['ID']?>">
                <script>
                $(function() {
                    $('input[name="daterange"]').daterangepicker({
                            opens: 'center'
                    }, function(start, end, label) {
                            var dates = {start,end};
                            document.getElementById("startDate").value= start.format('YYYY-MM-DD');
                            document.getElementById("endDate").value= end.format('YYYY-MM-DD');
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
                </section>
            </section>
        </section>
        <section id="reviews">
                <header>
                    <h2>Reviews</h2>
                </header>
                <?php if($commentView === True) { ?>
                    <div class="reviews">
                        <h4>Add a review:</h4>
                        <form action="../actions/action_addReview.php" method='post'>
                            <textarea name="text" rows="5" cols="100" required placeholder="Describe your stay so other users can know what to expect!"></textarea>
                            <input type="hidden" name="reservationID" value="<?=$reservation['ID']?>">
                            <h4>Rate your stay:</h4>
                            <input type="number" name="rating" min='1' max='5' placeholder="1-5">
                            <input type="submit" value="review">
                        </form>
                    </div>
                <?php } ?>
                <?php foreach ($houseReservations as $pastReservation ) {
                    if(!empty($pastReservation['Comment'])) {
                        $author = getInfoFromID($pastReservation['GuestID'])?>
                        <article>
                            <header>
                                <span class="author"><?= $author['Name']?></span>
                                <span class="date"><?= $pastReservation['CommentDate']?></span>
                            </header>
                            <section class="comment">
                                <p><?= $pastReservation['Comment']?></p>
                                <p>Rating: <?=$pastReservation['HouseRating'] ?></p>
                            </section>
                        </article>
                        <?php if($ownerView === true && empty($pastReservation['Reply'])) { ?>
                            <div class="reply">
                                <h4>Add a reply:</h4>
                                <form action="../actions/action_addReply.php" method='post'>
                                    <textarea name="text" rows="3" cols="100" required placeholder="Reply to this review!"></textarea>
                                    <input type="hidden" name="pastReservationID" value="<?=$pastReservation['ID']?>">
                                    <h4>Rate your guest:</h4>
                                    <input type="number" name="rating" min='1' max='5' placeholder="1-5">
                                    <input type="submit" value="reply">
                                </form>
                            </div>
                        <?php } 
                        if(!empty($pastReservation['Reply'])) {?>
                            <article class="reply">
                                <header>
                                    <h4>Owner reply</h4>
                                    <span class="author"><?= $ownerInfo['Name']?></span>
                                    <span class="date"><?= $pastReservation['ReplyDate']?></span>
                                </header>
                                <section class="comment">
                                    <p><?= $pastReservation['Reply']?></p>
                                    <p>Guest rating: <?=$pastReservation['GuestRating'] ?></p>
                                </section>
                            </article>
                        <?php }?>
                    <?php }?>
                <?php }?>
        </section>
    </section>

<?php 
    draw_footer();
?>
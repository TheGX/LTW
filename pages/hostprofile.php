<?php 
    include_once('../templates/tpl_common.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');
    include_once('../database/houses.php');
    include_once('../database/reservations.php');

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    draw_header('hostprofile');
    $User = getInfoFromUsername($_SESSION['username']);
    
    $UserHouses=getHousesFromOwner($User['ID']);
?>
    <section id="content">
        <section id="sideInfo">
        <?php $userID = getInfoFromUsername($_SESSION['username'])['ID'];
            $photoPath = "../database/images/users/thumbs_medium/".$userID.".jpg" ;
            if(!file_exists($photoPath)) {?>
                <a href="touristprofile.php"><img src="pictures/userpic.png" width = "186" height="181" alt="User Profile Pic"></a>
            <?php } else{ 
                $original = "../database/images/users/originals/".$userID.".jpg" ; ?>
                <a href=<?=$original?>> <img src=<?=$photoPath?> alt="User Profile Pic"></a>
            <?php } ?>
            <article>
                <p><?= $User['Username']?> </p>
                <p><?= $User['Email']?></p>
                <p><?= $User['PhoneNumber']?></p>
            </article>
        </section>
        <section id="hostInfo">
            <header>
                <h3><?= $User['Name']?></h3>
            </header>
            <form action="editprofile.php">
                <input type="submit" value="Edit Profile">
            </form>
            <form action="newhouse.php">
                <input type="submit" value="Create a House Listing!">
            </form>
            <h4><?= $User['Biography']?></h4>
            <p>Lives in: <?= $User['Address']?></p>
            <p>Speaks: <?= $User['LanguagesSpoken']?></p>
            <p>Profession: <?= $User['Profession']?></p>
            
        </section>
        <section id="touristlink">
                <a href="touristprofile.php">See your Tourist Profile</a>
        </section>
        <section id="hostlistings">
            <header>
                <h3>Host's listings</h3>
            </header>
            <?php foreach($UserHouses as $listing){?>
            <nav>
                <a href="houselist.php?houseID=<?=$listing['ID']?>" class="listinglink">
                    <img src="../database/images/houses/thumbs_small/<?=$listing['Picture1']?>.jpg" alt="1st House in feed">
                    <h4 class="listingTitle"> <?=$listing['HouseType']?> </h4>
                    <p> <?=$listing['Title']?></p>
                </a>
                <div class="reservations">
                    <h4>Upcoming Stays</h4>
                    <?php $reservations = getFutureReservationsInHouse($listing['ID']); 
                    foreach($reservations as $reservation) {
                        $guest=getInfoFromID($reservation['GuestID']);?>
                        <p>Booking by <a href="touristprofile.php?ownerUsername=<?=$guest['Username']?>"> <?=$guest['Name']?></a> <br>  
                        From: <?=$reservation['StartDate']?> To: <?=$reservation['EndDate']?></p>
                    <?php } ?>
                </div>
            </nav> <?php }?>            
        </section>
        <section id="reviews">
            <header>
                <h3>Reviews</h3>
            </header>
            <?php foreach ($UserHouses as $house) {
                $pastReservations = getPastReservationsInHouse($house['ID']);
                foreach($pastReservations as $reservation) {
                    if( !empty($reservation['Comment']) ) { 
                        $author = getInfoFromID($reservation['GuestID'])?>
                        <article>
                            <header>
                                <span class="author"><?= $author['Name']?></span>
                                <span class="date"><?= $reservation['CommentDate']?></span>
                            </header>
                            <section class="comment">
                                <p><?= $reservation['Comment']?></p>
                                <p>Rating: <?=$reservation['HouseRating'] ?></p>
                            </section>
                        </article>    
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </section>
    </section>
<?php 
    draw_footer();
?>
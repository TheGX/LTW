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
    draw_header('touristprofile');
    if(isset($_GET['ownerUsername'])) {
        $User = getInfoFromUsername($_GET['ownerUsername']);
    } else $User = getInfoFromUsername($_SESSION['username']);

    $pastReservations = getPastReservationsFromUser($User['ID']);
?>
    <section id="content">
        <section id="sideInfo">
        <?php 
            $photoPath = "../database/images/users/thumbs_medium/".$User['ID'].".jpg" ;
            if(!file_exists($photoPath)) {?>
                <a href="touristprofile.php"><img src="pictures/userpic.png" width = "186" height="181" alt="User Profile Pic"></a>
            <?php } else{ 
                $original = "../database/images/users/originals/".$User['ID'].".jpg" ; ?>
                <a href=<?=$original?>> <img src=<?=$photoPath?> alt="User Profile Pic"></a>
            <?php } ?>
            <article>
                <p><?= $User['Username']?></p>
                <p><?= $User['Email']?></p>
                <p><?= $User['PhoneNumber']?></p>
            </article>
        </section>
        <section id="touristInfo">
            <header>
                <h3><?= $User['Name']?></h3>
            </header>
            <?php if(!isset($_GET['ownerUsername'])) { ?>
                <form action="editprofile.php">
                <input type="submit" value="Edit Profile">
            </form>
            <?php } ?>
            <h4><?= $User['Biography']?></h4>
            <p>Lives in: <?= $User['Address']?></p>
            <p>Speaks: <?= $User['LanguagesSpoken']?></p>
            <p>Profession: <?= $User['Profession']?></p>
        </section>
        <?php if(!isset($_GET['ownerUsername'])) { ?>
        <section id="hostlink">
                <a href="hostprofile.php">See your Host Profile</a>
        </section>
        <?php } else unset($_GET['ownerUsername']);?>
        <section id="reviews">
            <header>
                <h3>Reviews</h3>
            </header>
            <?php foreach ($pastReservations as $reservation) {
                if( !empty($reservation['Reply']) ) { 
                    $house = getHouseInfo($reservation['HouseID']);
                    $author = getInfoFromID($house['OwnerID'])?>
                    <article>
                        <header>
                            <span class="author"><?= $author['Name']?></span>
                            <span class="date"><?= $reservation['ReplyDate']?></span>
                        </header>
                        <section class="comment">
                            <p><?= $reservation['Reply']?></p>
                            <p>Rating: <?=$reservation['GuestRating'] ?></p>
                        </section>
                    </article>    
                <?php } ?>
            <?php } ?>
        </section>
    </section>
<?php 
    draw_footer();
?>
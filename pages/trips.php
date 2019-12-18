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

    draw_header('trips');

    $user = getInfoFromUsername($_SESSION['username']);
    $userPastReservations = getPastReservationsFromUser($user['ID']);
    $userFutureReservations = getFutureReservationsFromUser($user['ID']);
?>

    <section id="content">
        <section id="Trips">
            <section id="Future">
                <header>
                    <h2>Upcoming plans</h2>
                    <?php if(empty($userFutureReservations)) {?>
                        <h3>You have no upcoming trips. Start exploring ideas for your next one!</h3>
                        <h3>
                            <form action="feed.php?search=?" method="get">
                                <input type="text" name="search" placeholder="Explore!">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </h3> 
                    <?php } else { ?>
                        <nav>
                            <?php foreach($userFutureReservations as $reservation) {
                                $house = getHouseInfo($reservation['HouseID']); ?>
                                <a href="houselist.php?houseID=<?=$house['ID']?>" id="listinglink">
                                    <img src="../database/images/houses/thumbs_small/<?=$house['Picture1']?>.jpg" alt="House picture">
                                    <h4 id="listingTitle"> <?=$house['HouseType']?> </h4>
                                    <p> <?=$house['Title']?></p>
                                    <p>From: <?=$reservation['StartDate']?> To: <?=$reservation['EndDate']?></p>
                                    <p>Price Paid: <?=$reservation['PricePaid']?> </p>
                                </a>
                            <?php }?>
                        </nav>
                    <?php } ?>
                </header>
            </section>
            <section id="Past">
                <header>
                    <h2>Where you've been</h2>
                    <?php if(empty($userPastReservations)) {?>
                        <h4>It seems you have never been anywhere with us! </h4>
                    <?php } else {?>
                        <nav>
                            <?php foreach($userPastReservations as $reservation) {
                                $house = getHouseInfo($reservation['HouseID']); ?>
                                <a href="houselist.php?houseID=<?=$house['ID']?>" id="listinglink">
                                    <img src="../database/images/houses/thumbs_small/<?=$house['Picture1']?>.jpg" alt="House picture">
                                    <h4 id="listingTitle"> <?=$house['HouseType']?> </h4>
                                    <p> <?=$house['Title']?></p>
                                    <p>From: <?=$reservation['StartDate']?> To: <?=$reservation['EndDate']?></p>
                                    <p>Price Paid: <?=$reservation['PricePaid']?> </p>
                                </a>
                            <?php }?>
                        </nav>
                    <?php }?>
                </header>
            </section>
        </section>
    </section>

<?php 
    draw_footer();
?>
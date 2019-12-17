<?php function draw_feed($listings){ ?>  
    <section id="content">
        <section id="filters">
            <form action="feed.php" method="post" id="date">
                <select name="date">
                    <option value="" disabled selected>Date</option>
                    <option value="Example date">Example Date</option>            
                </select>
                <select name="nGuest">
                    <option value="" disabled selected>Nº of Guests</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>            
                </select>
                <select name="listingtype">
                    <option value="" disabled selected>Type of Place</option>
                    <option value="Appartment">Appartment</option>
                    <option value="EntireHome">Entire Home</option>            
                </select>
                <select name="price">
                    <option value="" disabled selected>Price per night</option>
                    <option value="-50">&lt50</option>
                    <option value="50_100">50-100</option>
                    <option value="100_150">100-150</option>
                    <option value="150+">&gt150</option>
                </select>
                <input type="submit" value="Submit">
            </form>
        </section>
        <?php draw_listings($listings);?>
    </section>
<?php } ?>

<?php function draw_listings($listings){
 /** 
 * Draws a section (#listingFeed) containging 
 * several listings. 
 * Uses draw_listing function to draw each 
 * listing */?>
    <section id="listingFeed">
        <?php 
            foreach($listings as $listing)
                draw_listing($listing); 
    ?></section>   
<?php }?>

<?php function draw_listing($listing){
/**
 * Draws a single listing
 */ ?>
    <section class="houselist">    
        <a href="houselist.php?houseID=<?=$listing['ID']?>">
            <img src="../database/images/houses/thumbs_medium/<?=$listing['Picture1']?>.jpg" alt="1st House in feed">
        </a>
        <!-- <img src="pictures/FeedHouse1.png" alt="1st House in feed"> -->
        <section class="viewMore">
            <a href="houselist.php?houseID=<?=$listing['ID']?>">View more</a>
        </section>
        <section class="info">
            <header>
                <h5><?=$listing['HouseType']?></h5>
                <h4><?=$listing['Title']?></h4>
            </header>
            <p class="price"><?=$listing['DailyCost']?>€/night</p>
            <p class="nGuestnBeb"><?=$listing['SingleBeds'] +2*$listing['DoubleBeds']?> guests, <?=$listing['SingleBeds'] + $listing['DoubleBeds']?> beds</p>
            <p class="houseFilters">Wifi, Kitchen, Heating</p>    
        </section>
    </section>
<?php } ?>
<?php function draw_feed($listings){ ?>  
    <section id="content">
        <section id="filters">
            <form action="feed.php" method="get" id="date">
                <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
                <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                <input type="text" name="daterange" value="12/01/2019 - 01/13/2020" />
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />  
                <input name="startDate" type="hidden" id="startDate">
                <input name="endDate" type="hidden" id="endDate">
                <script>
                $(function() {
                    $('input[name="daterange"]').daterangepicker({
                            opens: 'center'
                    }, function(start, end, label) {
                            console.log("A new date selection was made: " + start.format('MM-DD-YYYY') + ' to ' + end.format('MM-DD-YYYY'));
                            var dates = {start,end};
                            document.getElementById("startDate").value= start.format('YYYY-MM-DD');
                            document.getElementById("endDate").value= end.format('YYYY-MM-DD');
                            return dates;
                    });
                });
                </script>
                <select name="nGuest">
                    <option value="" disabled selected>Nº of Guests</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>            
                </select>
                <input type="number" name="price" id="">
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
            <p class="bathrooms"><?=$listing['Bathrooms']?> bathrooms</p>
            <p class="houseFilters">Wifi, Kitchen, Heating</p>    
        </section>
    </section>
<?php } ?>
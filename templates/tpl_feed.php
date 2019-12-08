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
        
}?>

<?php function draw_listing($listing){
/**
 * Draws a single listing
 */ ?>
    <section class="houselist">
        <img src="<?=$listing['Thumbnail']?>" alt="1st House in feed">
        <section class="viewMore">
            <a href="Houselisting.html">View more</a>
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

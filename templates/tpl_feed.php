
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
        <img src="<?=$listing['listing_image']?>" alt="1st House in feed">
        <section class="viewMore">
            <a href="Houselisting.html">View more</a>
        </section>
        <section class="info">
            <header>
                <h5><?=$listing['listing_type']?></h5>
                <h4><?=$listing['listing_title']?></h4>
            </header>
            <p class="price"><?=$listing['listing_pricePerNight']?>€/night</p>
            <p class="nGuestnBeb"><?=$listing['listing_guests']?> guests, <?=$listing['listing_beds']?> beds</p>
            <p class="houseFilters">Wifi, Kitchen, Heating</p>    
        </section>
    </section>
<?php } ?>

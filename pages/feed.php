<?php 
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_feed.php');
    draw_header('feed');
?>
<?php
  $listings = array(
        array( 
            'listing_id' => 1,
            'listing_image' =>'pictures/FeedHouse1.png',
            'listing_type' => 'Entire Home/APT', 
            'listing_title' => '5 BEDS Modern Downtown Barcelona House',
            'listing_pricePerNight' => '150',
            'listing_guests' => 8,
            'listing_beds' => '5',
        ),array( 
            'listing_id' => 2,
            'listing_image' =>'pictures/FeedHouse2.png',
            'listing_type' => 'Entire Home/APT', 
            'listing_title' => '5 BEDS Modern Downtown Barcelona House',
            'listing_pricePerNight' => '150',
            'listing_guests' => 8,
            'listing_beds' => '5',       
        )
    )    ?>
    <section id="content">
        <section id="filters">
            <form action="../action_filter.php" method="post" id="date">
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
        <?php draw_listings($listings); 
        /*<section id="listingFeed">
            <section id="houselist1">
                <img src="pictures/FeedHouse1.png" alt="1st House in feed">
                <section id="viewMore">
                    <a href="Houselisting.html">View more</a>
                </section>
                <section id="info">
                    <header>
                        <h5>ENTIRE HOME/APT</h5>
                        <h4>5 BEDS Modern Downtown Barcelona House</h4>
                    </header>
                    <p id="price">150€/night</p>
                    <p id="nGuestnBeb">8 guests, 5 beds</p>
                    <p id="houseFilters">Wifi, Kitchen, Heating</p>    
                </section>
            </section>
            <section id="houselist2">
                <img src="pictures/FeedHouse2.png" alt="2nd House in feed">
                <section id="viewMore">
                    <a href="Houselisting.html">View more</a>
                </section>
                <section id="info">
                    <header>
                        <h5>ENTIRE HOME/APT</h5>
                        <h4>4 BEDS Spacious Countryside Chalet</h4>
                    </header>
                    <p id="price">130€/night</p>
                    <p id="nGuestnBeb">7 guests, 4 beds </p> 
                    <p id="houseFilters">Wifi, Free Parking</p>    
                </section>
            </section>
        </section>*/?>
    </section>

<?php 
    draw_footer();
?>
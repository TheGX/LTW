<?php 
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_feed.php');
    include_once('../database/connection.php');
    include_once('../database/houses.php');

    draw_header('feed');
    
    $listings=getAllHouses();
    
?>  <section id="content">
        <section id="filters">
            <form action="../actions/action_filter.php" method="post" id="date">
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

<?php 
    draw_footer();
?>
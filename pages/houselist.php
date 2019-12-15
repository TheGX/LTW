<?php 
    include_once('../templates/tpl_common.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');

    draw_header('houselist');
?>
    <section id="content">
    <section id="filters">
          <h2>Amenities</h2>
                <ul id="menu-filters" style="list-style-type:none;">
                <li>5 guests</li>
                <li>4 bedrooms</li>
                <li>5 bathroms</li>
                <li>Kitchen</li>
                <li>Wi-fi</li>
                <li>Heating</li>
                <li>Free Parking</li>
            </ul>
        </section>
        <section id="House-section">
            <img src="pictures/FeedHouse1.png" alt="a nice house">
            <section id="info">
                <header>
                    <h2>Modern Downtown Barcelona House</h2>
                    <p id="description">ENTIRE HOUSE <br> <br> Bright and comfortable house located in downtown Barcelona, 5 minutes from the Sagrada Familia, 2 minutes from the Torre Agbar and 1 minute from the Glorias metro station.
<br>Perfect location, peaceful and a cozy stay so you can enjoy Barcelona! </p>
                </header>
            </section>
        </section>
        <section id="calendar">
            <h2>Add dates for a price</h2>
            <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
            <form action="../actions/action_addReservation.php" id="N_guests" method="get">
                <!-- <input type="text" name="daterange" value="12/01/2019 - 01/13/2020" /> -->
                <!-- <input type="date" name="startDate" value="Start Date"> -->
                <input placeholder="Start Date" name="startDate" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input placeholder="End Date" name="endDate" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input type="hidden" name="houseID" value="2">
                <script>
                $(function() {
                    $('input[name="daterange"]').daterangepicker({
                            opens: 'center'
                    }, function(start, end, label) {
                            console.log("A new date selection was made: " + start.format('MM-DD-YYYY') + ' to ' + end.format('MM-DD-YYYY'));
                            var dates = {start,end};
                            console.log("start-date-> " +start);
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
                        <option value="2">6</option>
                        <option value="3">7</option>
                        <option value="4">8</option>
                    </select>
                    <input type="submit" value="RESERVE">
            </form>
            <!-- <section id="Reserve!">
                    <a href="../actions/action_addReservation.php">RESERVE!</a>
            </section> -->
        </section>
        <section id="Information">
            <section id="Location">
                <h2>Location</h2>
                <img src="pictures/gps.png" alt="GPS litle pic">
            </section>
            <section id="About-Host">
                <section id="host-info">
                <h2>About Host</h2>
                <h3>José</h3>
                    <p id="host-location">Barcelona, Spain</p>
                    <p id="host-language">Languages: English, Spanish</p>
                    <a href="message.html">Contact Host!</a>
                </section>
            </section>
        </section>
        <section id="reviews">
                <header>
                    <h2>Reviews</h2>
                </header>
                <article>
                    <header>
                        <span id="author">Tom</span><br>
                        <span id="date">September 2019</span>
                    </header>
                    <section id="comment">
                        <p>House is perfect. Very clean and really well located.</p>
                        <p>Highly recommend</p>
                    </section>
                </article>
                <article>
                    <header>
                        <span id="author">Hollie</span>
                        <span id="date">July 2019</span>
                    </header>
                    <section id="comment">
                        <p>Etiam massa magna, dictum ac purus. Proin dignissim dolor nec scelerisque bibendum. Maecenas iaculis erat id, convallis arcu. Ut imperdiet, eros dui laoreet enim, fermentum urna. Vestibulum orci luctus et Curae arcu, ut porta massa iaculis sit amet.</p>
                        <p>Quisque a dapibus magna, non scelerisque</p>
                    </section>
                </article>
                <article>
                    <header>
                        <span id="author"> Hollie</span>
                        <span id="date">June 2019</span>
                    </header>
                    <section id="comment">
                        <p>User was a good guest,respectfull and clean.</p>
                        <p>Quisque a dapibus magna, non scelerisque</p>
                    </section>
                </article>
        </section>
    </section>

<?php 
    draw_footer();
?>
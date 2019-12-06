<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/users.php');
    // include_once('../includes/sessions.php');

    draw_header('hostprofile');
    $User = getInfoFromUsername($_SESSION['username']);
?>
    <section id="content">
        <section id="sideInfo">
            <img src="pictures/bigprofilepic.png" alt="Profile Picture">
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
            <form action="../actions/action_editProfile.php">
                <input type="submit" value="Edit Profile">
            </form>
            <h4><?php $User['Biography']?></h4>
            <p>Lives in: <?= $User['Address']?></p>
            <p>Speaks: <?= $User['LanguagesSpoken']?></p>
            <p>Work: <?= $User['Profession']?></p>
        </section>
        <section id="touristlink">
                <a href="touristprofile.php">See your Tourist Profile</a>
        </section>
        <section id="hostlistings">
            <header>
                <h3>Host's listings</h3>
            </header>
            <nav>
                <a href="listing.html" class="listinglink">
                    <img src="pictures/Housepic1.png" alt="House picture">
                    <h4 class="listingTitle"> ENTIRE HOME/APT </h4>
                    <p> 5 BEDS Modern Downtown Barcelona House</p>
                </a>
                <a href="listing.html" class="listinglink">
                    <img src="pictures/Housepic2.png" alt="House picture">
                    <h4 class="listingTitle">ENTIRE HOME/APT</h4>  
                    <p>4 BEDS Spacious Countryside Chalet</p>
                </a>
            </nav>
        </section>
        <section id="reviews">
            <header>
                <h3>Reviews</h3>
            </header>
            <article>
                <header>
                    <span class="author">Tom, Paris, France</span>
                    <span class="date">September 2019</span>
                </header>
                <p>User is the perfect guest, very friendly and nice.</p>
                <p>Highly recommend</p>
            </article>
            
            <article>
                <header>
                    <span class="author">Hollie, Madrid, Spain</span>
                    <span class="date">July 2019</span>
                </header>
                <p>Etiam massa magna, dictum ac purus. Proin dignissim dolor nec scelerisque bibendum. Maecenas iaculis erat id, convallis arcu. Ut imperdiet, eros dui laoreet enim, fermentum urna. Vestibulum orci luctus et Curae arcu, ut porta massa iaculis sit amet.</p>
                <p>Quisque a dapibus magna, non scelerisque</p>
            </article>
            
            <article>
                <header>
                    <span class="author"> Hollie, Porto, Portugal</span>
                    <span class="date">June 2019</span>
                </header>
                <p>User was a good guest,respectfull and clean.</p>
                <p>Quisque a dapibus magna, non scelerisque</p>
            </article>
        </section>
    </section>
    <footer>
        <nav>
            <ul id="nextComments">
                <li><a href="profile.html">&lt&lt Prev</a></li>
                <li><a href="profile.html">1</a></li>
                <li><a href="profile.html">2</a></li>
                <li><a href="profile.html">3</a></li>
                <li><a href="profile.html">Next &gt&gt</a></li>
            </ul>
        </nav>  
    </footer>

<?php 
    draw_footer();
?>
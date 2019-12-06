<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/users.php');

    draw_header('touristprofile');
    $User = getInfoFromUsername($_SESSION['username']);
?>
    <section id="content">
        <section id="sideInfo">
            <img src="pictures/bigprofilepic.png" alt="Profile Picture">
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
            <form action="../actions/action_editProfile.php">
                <input type="submit" value="Edit Profile">
            </form>
            <h4><?= $User['Biography']?></h4>
            <p>Lives in: <?= $User['Address']?></p>
            <p>Speaks: <?= $User['LanguagesSpoken']?></p>
            <p>Work: <?= $User['Profession']?></p>
        </section>
        <section id="hostlink">
                <a href="hostprofile.php">See your Host Profile</a>
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
                <li><a href="profile.php">&lt&lt Prev</a></li>
                <li><a href="profile.php">1</a></li>
                <li><a href="profile.php">2</a></li>
                <li><a href="profile.php">3</a></li>
                <li><a href="profile.php">Next &gt&gt</a></li>
            </ul>
    </nav>  
    </footer>
<?php 
    draw_footer();
?>
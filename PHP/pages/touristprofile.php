<?php 
    include_once('../templates/tpl_common.php');

    draw_header('touristprofile');
?>
    <section id="content">
        <section id="sideInfo">
            <img src="pictures/bigprofilepic.png" alt="Profile Picture">
            <article>
                <p>User provided </p>
                <p>Email address</p>
                <p>Phone Number</p>
            </article>
        </section>
        <section id="touristInfo">
            <header>
                <h3>Tourist's Name</h3>
            </header>
            <input type="submit" value="Edit Profile">
            <h4>Brief biography of the user</h4>
            <p>Lives in: XXXXXX XXXXXXX</p>
            <p>Speaks: XXXXXXX XXXXXXXXx</p>
            <p>Work: XXXXX</p>
        </section>
        <section id="hostlink">
                <a href="profile.html">See your Host Profile</a>
        </section>
        <section id="reviews">
            <header>
                <h3>Reviews</h3>
            </header>
            <article>
                <header>
                    <span id="author">Tom, Paris, France</span>
                    <span id="date">September 2019</span>
                </header>
                <p>User is the perfect guest, very friendly and nice.</p>
                <p>Highly recommend</p>
            </article>
            
            <article>
                <header>
                    <span id="author">Hollie, Madrid, Spain</span>
                    <span id="date">July 2019</span>
                </header>
                <p>Etiam massa magna, dictum ac purus. Proin dignissim dolor nec scelerisque bibendum. Maecenas iaculis erat id, convallis arcu. Ut imperdiet, eros dui laoreet enim, fermentum urna. Vestibulum orci luctus et Curae arcu, ut porta massa iaculis sit amet.</p>
                <p>Quisque a dapibus magna, non scelerisque</p>
            </article>
            
            <article>
                <header>
                    <span id="author"> Hollie, Porto, Portugal</span>
                    <span id="date">June 2019</span>
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
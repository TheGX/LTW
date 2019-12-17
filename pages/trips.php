<?php 
    include_once('../templates/tpl_common.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');
    include_once('../database/users.php');

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    draw_header('trips');
?>

    <section id="content">
        <section id="Trips">
            <section id="Future">
                <header>
                    <h2>Upcoming plans</h2>
                    <h3>You have no upcoming trips. Start exploring ideas for your next one!</h3>
                    <h3>
                    <form action="../actions/action_search.php" method="post">
                        <input type="text" name="search" placeholder="Explore!">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    </h3> 
                </header>
            </section>
            <section id="Past">
                <header>
                    <h2>Where you've been</h2>
                    <nav>
                <a href="listing.html" id="listinglink">
                    <img src="pictures/Housepic1.png" alt="House picture">
                    <h4 id="listingTitle"> ENTIRE HOME/APT </h4>
                    <p> 5 BEDS Modern Downtown Barcelona House</p>
                </a>
                <a href="listing.html" id="listinglink1">
                    <img src="pictures/Housepic2.png" alt="House picture">
                    <h4 id="listingTitle2">ENTIRE HOME/APT</h4>  
                    <p>4 BEDS Spacious Countryside Chalet</p>
                </a>
            </nav>
                </header>
            </section>
        </section>
    </section>

<?php 
    draw_footer();
?>
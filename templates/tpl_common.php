<?php function draw_header($file) {
    ?> 
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php if($file === "login"){ ?>
                <link href="../css/layoutlogin.css" rel="stylesheet">  
                <link href="../css/layoutheaderlogin.css" rel="stylesheet">
                <link href="../css/stylelogin.css" rel="stylesheet">      
            <?php } elseif ($file === "feed") { ?>
                <link href="../css/layoutheader.css" rel="stylesheet">
                <link href="../css/headerstyle.css" rel="stylesheet">
                <link href="../css/layoutfeed.css" rel="stylesheet">
                <link href="../css/stylefeed.css" rel="stylesheet">
            <?php } elseif ($file === "touristprofile") {?>
                <link href="../css/layoutheader.css" rel="stylesheet">
                <link href="../css/headerstyle.css" rel="stylesheet">
                <link href="../css/layoutprofile.css" rel="stylesheet">
                <link href="../css/styleprofile.css" rel="stylesheet">
            <?php } elseif ($file === "hostprofile") {?>
                <link href="../css/layoutheader.css" rel="stylesheet">
                <link href="../css/headerstyle.css" rel="stylesheet">
                <link href="../css/layouthostprofile.css" rel="stylesheet">
                <link href="../css/stylehostprofile.css" rel="stylesheet">
                <?php } elseif ($file === "houselist") {?>
                <link href="../css/layoutheader.css" rel="stylesheet">
                <link href="../css/headerstyle.css" rel="stylesheet">
                <link href="../css/HouseListLayout.css" rel="stylesheet">
                <link href="../css/stylehouselist.css" rel="stylesheet">
            <?php } elseif ($file === "newhouse") {?>
                <link href="../css/layoutheader.css" rel="stylesheet">
                <link href="../css/headerstyle.css" rel="stylesheet">
                <link href="../css/layoutnewhouse.css" rel="stylesheet">
                <link href="../css/stylenewhouse.css" rel="stylesheet">
            <?php } elseif ($file === "trips") {?>
                <link href="../css/layoutheader.css" rel="stylesheet">
                <link href="../css/headerstyle.css" rel="stylesheet">
                <link href="../css/layouttrips.css" rel="stylesheet">
                <link href="../css/styletrips.css" rel="stylesheet">
            <?php } elseif ($file === "edit") {?>
                <link href="../css/layoutheader.css" rel="stylesheet">
                <link href="../css/headerstyle.css" rel="stylesheet">
                <link href="../css/layouteditprofile.css" rel="stylesheet">
                <link href="../css/styleeditprofile.css" rel="stylesheet">
            <?php } ?>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Final Project</title>
        </head>
        <body>
            <header>
                <h1><a href="feed.php"><img src="pictures/logo.png" alt="House Rental Icon" style="width:280px;height:130px"></a></h1>
                <form action="feed.php" method="get">
                <input type="text" name="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <?php if($file == "login"){ ?>
                    <nav>
                        <a href="../pages/login.php"> SIGN IN</a>
                        <a href="../pages/register.php"> REGISTER</a>
                    </nav>
                <?php } else { ?>
                    <nav>
                        <a href="../pages/trips.php"> TRIPS</a>
                        <a href="register.html"> MESSAGES</a>
                        <div id="mininav">
                            <figure>
                                <?php $userID = getInfoFromUsername($_SESSION['username'])['ID'];
                                    $photoPath = "../database/images/users/thumbs_small/".$userID.".jpg" ;
                                    if(!file_exists($photoPath)) {?>
                                        <a href="touristprofile.php"><img src="pictures/userpic.png" width = "71" height="71" alt="User Profile Pic"></a>
                                    <?php } else{ ?>
                                        <a href="touristprofile.php"><img src=<?=$photoPath?> width = "71" height="71" alt="User Profile Pic"></a>
                                    <?php } ?>   
                                <figcaption> 
                                    <a href="../actions/action_logout.php">Log Out</a>     
                                </figcaption>
                            </figure>
                        </div>
                    </nav>
                <?php } ?>
            </header>
<?php } ?>

<?php function draw_footer() {
    ?>
    </body>
  </html>
<?php } ?>

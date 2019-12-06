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
            <?php } ?>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Final Project</title>
        </head>
        <body>
            <header>
                <h1><a href="feed.php"><img src="pictures/houserental.png" alt="House Rental Icon"></a></h1>
                <form action="action_search.php" method="post">
                <input type="text" name="seach" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <?php if($file == "login"){ ?>
                    <nav>
                        <a href="login.html"> SIGN IN</a>
                        <a href="register.html"> REGISTER</a>
                    </nav>
                <?php } else { ?>
                    <nav>
                        <a href="login.html"> TRIPS</a>
                        <a href="register.html"> MESSAGES</a>
                        <div id="mininav">
                            <figure>
                                <a href="touristprofile.php"><img src="pictures/userpic.png" alt="User Profile Pic"></a>
                                <figcaption> 
                                    <a href="login.html">Log Out</a>     
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

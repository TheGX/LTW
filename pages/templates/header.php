<?php 
    session_start(['cookie_httponly' => true]);
    include_once '../utils/utils.php';
    // This function generates a random 16 bit string (prevents CSRF)
    $_SESSION['random-token'] = generate_random_token();
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/header.css"/>
        <script src="https://kit.fontawesome.com/c918df4a06.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="nav-bar">
            <ul>
                <li id="home-button" class="nav-item">
                    <a href="../index.php">
                    <img src="../res/houserental.png" alt="House Rental Logo"></a>
                </li>
                <li id="welcome-prompt" class="nav-item">
                    <span>Welcome to House Rental!</span>
                </li>
                <li id="user-section" class="nav-item">
                    <ul>
                        <li id="user-header">
                            <?php
                                if (isset($_SESSION['username']))
                                    echo
                                        '<span id="greeting">
                                            <a href="index.php?page=profile.php&id=' . $_SESSION['userId'] . '">
                                                <strong>' . $_SESSION['name'] . '</strong>
                                            </a>
                                        </span>';
                                else
                                    echo
                                        '<span id="get-started">
                                            <strong>Get started!</strong>
                                        </span>';
                            ?>
                        </li>
                        <li id="user-action">
                            <?php
                                if (isset($_SESSION['username']))
                                    echo 
                                        '<form id="logout_form" action="../actions/logout.php">
                                            <button id="logout-button" class="form-button" type="submit"><i class="fas fa-sign-in-alt"></i> Logout</button>
                                        </form>';
                                else
                                    echo 
                                        '<div id="user_login">
                                            <span id="login-text">Log In</span>
                                            <form id="login-form" method="post" action="../actionslogin.php">
                                                <input class="form-textbox" type="text" name="username" placeholder="Your Username"/>
                                                <input class="form-textbox" type="password" name="password" placeholder="Your Password"/>
                                                <button class="form-button" id="enter" type="submit"><i class="fas fa-sign-in-alt"></i>Enter</button>
                                            </form>
                                        </div>
                                        <span class="divider">|</span>
                                        <a href="index.php?page=register.php">
                                            <span id="signup-invite">Not a Member?</span>
                                        </a>';
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>    
        </div>
        
        <div class="spacing" style="margin-bottom: 4em"></div>
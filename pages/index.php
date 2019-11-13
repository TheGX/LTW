<?php
include_once('templates/header.php');

if ($_GET['page'] === 'landing_page.php') include_once('templates/landing_page.php');
else if ($_GET['page'] === 'search_results.php') include_once('templates/search_results.php');
else if ($_GET['page'] === 'register.php') include_once('templates/register.php');

include_once('templates/footer.html');
<?php
include_once('../database/users.php');

$query = '';
if (isset($_GET['query']))
    $query = htmlspecialchars($_GET['query']);
?>
<link rel="stylesheet" type="text/css" href="../css/landing_page.css"/>
<div id="logo">
    <img alt="logo" src="../res/houserental.png">
</div>

<form id="search-form" action="index.php" method="get">
    <input hidden="hidden" type="text" name="page" value="search_results.php">
    <input id="search-box" type="text" name="query" placeholder="Search for a place to rent." value="<?= $query ?>"/>

    <button id="search-button">Search!</button>
</form>
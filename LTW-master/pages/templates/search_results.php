<?php
include_once('../database/users.php');

$query = '';
if (isset($_GET['query']))
    $query = htmlspecialchars($_GET['query']);
?>

<div id="body">
    <input id="search-box" type="text" name="query" value="<?= $query ?>"/>

    <div id="slider"></div>

    <div id="search-results">
        <ul id="search-tabs">
            <li class="tab active" id="rentals-tab"><a href="#rentals">Rentals</a></li>
            <li class="tab" id="users-tab"><a href="#users">Users</a></li>
        </ul>

        <div id="rentals" class="search-container">
        </div>

        <div id="users" class="search-container">
        </div>
      </div>
    </div>
</div>
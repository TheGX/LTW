<?php
include_once('../database/users.php');
include_once('../database/restaurants.php');
include_once('../utils/utils.php');

$id = (int)htmlspecialchars($_GET['id']);


// This file will load the profile for the user with the received ID
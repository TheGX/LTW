<?php
//This file sets up the connection to the SQL database
// database.db file to be created
  
  $conn = new PDO('sqlite:../database/database.db');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->query('PRAGMA foreign_keys = ON');
?>
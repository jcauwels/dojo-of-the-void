<?php # Script 9.2 - mysqli_connect.php

//Jeff Cauwels
//4/3/2014
//
// This file contains the database access information. 
// This file also establishes a connection to MySQL, 
// selects the database, and sets the encoding.

// Set the database access information as constants:
DEFINE ('DB_USER', 'j.cauwels');
DEFINE ('DB_PASSWORD', 'GpcKRXybJVw4D9Lc');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'l5r');

// Make the connection:
$mysqli = new MySQLi(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    unset($mysqli);
} else { //set the encoding
    $mysqli->set_charset('utf8');
}
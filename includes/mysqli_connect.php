<?php

/*
 * Title: Blogowiz mysql
 * Author: Marc Funston
 * Purpose: condenses code to log in to database.
 * Bugs: .
 * Last Edit Date: 4/05/2018
 * 
 */

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'blogowiz');


// make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MYSQL: ' . mysqli_connect_error());

// Set the encoding
mysqli_set_charset($dbc, 'utf8');


?>
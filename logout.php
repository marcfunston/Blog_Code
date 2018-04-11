<?php 
/*
 * Title: Blogowiz Logout Page
 * Author: Marc Funston
 * Purpose: This page logs user out 
 * Bugs: ** Doesn't work currently :(
 * Last Edit Date: 3/31/2018
 * 
 */

// If no cookie is present, redirect the user:
if (!isset($_COOKIE['user_id'])) {

	// Need the function:
	require ('includes/login_functions.inc.php');
	redirect_user();	
	
} else { // Delete the cookies:
	setcookie ('user_id', '', time()-3600, '/', '', 0, 0);
	setcookie ('first_name', '', time()-3600, '/', '', 0, 0);
	setcookie ('logged_in', false);
}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include ('includes/head.php');

// Print a customized message:
echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
echo"       <div class=\"w3-container\">\n";
echo"		<h1>Logged Out!</h1>\n";
echo"		<p> {$_COOKIE['first_name']}, You are now logged out!</p>\n";
echo"       </div>\n";
echo"   </div>\n";

include ('includes/footerPlain.php');
?>
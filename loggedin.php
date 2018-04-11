<?php 

/*
 * Title: Blogowiz Logged In Page
 * Author: Marc Funston
 * Purpose: This page send the user to a harmless page that connects to the rest of the site.
 *          
 * Bugs: None known at this time
 * Last Edit Date: 3/31/2018
 * 
 */


$page_title = 'Logged In';
include ('includes/head.php');

			// Print a message:
            echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
            echo"       <div class=\"w3-container\">\n";
            echo"       <h1>You are now logged in!</h1>\n";
            echo"       </div>\n";
            echo"   </div>\n";


 include ('includes/footerPlain.php'); ?>
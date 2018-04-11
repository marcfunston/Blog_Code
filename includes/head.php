<?php

/*
 * Title: Blogowiz Head Page
 * Author: Marc Funston
 * Purpose: This page contains the top part of the html. 
 * Bugs: None known at this time
 * Last Edit Date: 4/05/2018
 * 1 - Added function to nav buttons to show / not show
 *   - depending on user admin level or logged in.
 * 
 */

?>

<!DOCTYPE html>
<html>
<title>BLOGOWIZ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<head>

    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

</head>

<?php  

// If no page is set, set to 1:
if (!isset($_COOKIE['page'])) {
    setcookie ('page', 1);	
  } else { // get the page
    $page = $_COOKIE['page'];
  }

?>

<body class="w3-light-grey">

 <!-- Navbar -->
 <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGIN</a>
            

            
            <?php if(isset($_COOKIE['logged_in'])){ // if user is logged in display more buttons
            echo"<a href=\"post.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hide-small\">POST</a>\n";
            echo"<a href=\"password.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hide-small\">PASSWORD</a>\n";
            echo"<a href=\"message.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hide-small\">MESSAGE</a>\n";
            echo"<a href=\"javascript:void(0)\" class=\"w3-padding-large w3-hover-red w3-hide-small w3-right\"><i class=\"fa fa-search\"></i></a>\n";
            
            // check if user is admin and display additional controls
                if(isset($_COOKIE['admin']) && $_COOKIE['admin']){
                    echo"<a href=\"view_users.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hide-small\">EDIT USERS</a>\n";
                }
            }

            ?>
        </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGIN</a>
            <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGOUT</a>
            <a href="post.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">POST</a>
            <a href="register.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">REGISTER</a>
            <a href="messages.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MESSAGE</a>
            <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
    </div>


<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1000px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>BLOGOWIZ</b></h1>
  <p>Welcome to <span class="w3-tag">blogowiz</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">

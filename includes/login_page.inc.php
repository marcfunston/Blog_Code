<?php 
/*
 * Title: Blogowiz login_page.inc.php Page
 * Author: Marc Funston
 * Purpose: This page handles the form and displays success. 
 * Bugs: None known at this time
 * Last Edit Date: 3/31/2018
 * 
 */


// Include the header:
$page_title = 'Login';
include ('includes/head.php');


// Print any error messages, if they exist:
echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
echo"       <div class=\"w3-container\">\n";
	if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}
echo"       </div>\n";
echo"   </div>\n";

// Display the form: ?>
<div class="w3-card-4 w3-margin w3-white w3-round-xlarge">
	<div class="w3-container">
		<h1>Login</h1>
		<form action="login.php" method="post">
			<p>Email Address: <input type="text" name="email" size="20" maxlength="60" /> </p>
			<p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
			<p><input class="w3-border w3-grey w3-button w3-padding-large w3-hide-small" type="submit" name="submit" value="LOGIN" /></p>
		</form>
	</div>
</div>


<hr>
<div class="w3-card-4 w3-margin w3-white w3-round-xlarge">
	<div class="w3-container">
		<h1>Log Out</h1>
		<form action="logout.php" method="post">
		<span class=""></span>
			<p><input class="w3-border w3-grey w3-button w3-padding-large w3-hide-small" type="submit" name="submit" value="LOG OUT" /></p>
		</form>
	</div>
</div>
<hr>

<div class="w3-card-4 w3-margin w3-white w3-round-xlarge">
    <div class="w3-container">
		<h1 class="w3-opacity">Register here to join Blogowiz!</h1>
	 		<a href="register.php" class="w3-border w3-grey w3-button w3-padding-large w3-hide-small">REGISTER</a>
	 	<p></p>
    </div>
</div>
<hr>

<?php
include ('includes/footerPlain.php'); 
?>
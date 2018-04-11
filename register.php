<?php 

/*
 * Title: Blogowiz Register Page
 * Author: Marc Funston
 * Purpose: This script performs an INSERT query to add a record to the users table.
 *          After checking the data for bad things 
 * Bugs: None known at this time
 * Last Edit Date: 3/31/2018
 * 
 */


$page_title = 'Register';
include ('includes/head.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('includes/mysqli_connect.php'); // Connect to the db.
		
    $errors = array(); // Initialize an error array.
    
    // get values from server
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $user_name = $_REQUEST['user_name'];
    $email= $_REQUEST['email'];
    $password= $_REQUEST['password'];
	
	// Check for a first name:
	if (empty($_REQUEST['first_name']) || ($_REQUEST['first_name'] == null) || ($_REQUEST['first_name'] == "") ) {
        $errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['first_name'])));
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['last_name'])));
	}
    
    // Check for a user name:
	if (empty($_POST['user_name'])) {
		$errors[] = 'You forgot to enter your user name.';
	} else {
		$un = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['user_name'])));
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['email'])));
	}
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['password'])) {
		if ($_POST['password'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['password'])));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO users (first_name, last_name, email, user_name, password, registration_date) VALUES ('$fn', '$ln', '$un', '$e', SHA1('$p'), NOW() )";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
            echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
            echo"       <div class=\"w3-container\">\n";
            echo"       <h1>Thank you!</h1>\n";
            echo"       <h2>You are now registered</h2>\n";
            echo"       </div>\n";
            echo"   </div>\n";

            //include ('includes/footer.php');
		
		} else { // If it did not run OK.
			
  			// Print a message:
            echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
            echo"       <div class=\"w3-container\">\n";
            echo"       <h1>System Error</h1>\n";
			echo"       <h2>You could not register due to a system error. We apologize for any inconvenience.</h2>\n";
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
            echo"       </div>\n";
            echo"   </div>\n"; 
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include ('includes/footerPlain.php'); 
		exit();
		
	} else { // Report the errors.
    
        echo"<div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
        echo"<div class=\"w3-container\">\n";
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
        echo '</p><p>Please try again.</p><p><br /></p>';
        echo"</div>\n</div>\n";
		
	} // End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>
<div class="w3-card-4 w3-margin w3-white w3-round-xlarge">
    <div class="w3-container">
        <h1>Register</h1>
        <form action="register.php" method="post">
            <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
            <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
            <p>User Name: <input type="text" name="user_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
            <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
            <p>Password: <input type="password" name="password" size="10" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"  /></p>
            <p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
            <p><input type="submit" name="submit" value="Register" /></p>
        </form>

    </div>
</div>
<hr>
<?php include ('includes/footerPlain.php'); ?>
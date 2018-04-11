<?php 

/*
 * Title: Blogowiz Message Page
 * Author: Marc Funston
 * Purpose: This page is just for contact messages at this time. 
 * Bugs: None known at this time
 * Last Edit Date: 4/06/2018
 *  1 - changes to message from contacts page
 *  2 - removed user first and last name
 *  3 - posts to database table messages
 */

// If no cookie is present, redirect the user:
if (!$_COOKIE['logged_in']) {
    /* Redirect browser */
   header("Location: /Blog_Code/login.php");

   /* Make sure that code below does not get executed when we redirect. */
   exit;	
}

$page_title = 'Post';
include ('includes/head.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('includes/mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for an email:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email.';
	} else {
		$e = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['email'])));
    }
    
    // Check for a message:
	if (empty($_POST['message'])) {
		$errors[] = 'You forgot to enter your message.';
	} else {
		$m = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['message'])));
    }
        
	if (empty($errors)) { // If everything's OK.
	
		// Post the entry in the database...
		
		// Make the query:
		$q = "INSERT INTO messages (email, message, contact_date) VALUES ('$e', '$m', NOW() )";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
        
			// Print a message:
            echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
            echo"       <div class=\"w3-container\">\n";
            echo"       <h1>Contact Recieved</h1>\n";
            echo"       <h2>We will respond as soon as possible!</h2>\n";
            echo"       </div>\n";
            echo"   </div>\n";	
        
        } else { // If it did not run OK.
            
            // Print a message:
            echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
            echo"       <div class=\"w3-container\">\n";
            echo"       <h1>System Error</h1>\n";
            echo"       <h2>You could not post a message due to a system error. We apologize for any inconvenience.</h2>\n";
            // Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
            echo"       </div>\n";
            echo"   </div>\n";

			// Public message:
			echo '<h1></h1>
			<p class="error">You could not post a message due to a system error. We apologize for any inconvenience.</p>'; 
			

						
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

<!-- ===Contact Entry=== -->
<div class="w3-card-4 w3-margin w3-white w3-round-xlarge">
    <div class="w3-container">
        <h1>Message</h1>
        <form action="message.php" method="post">
	        <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
            <p>Message</p>
            <textarea rows="4" cols="50" name="message" value="">
            </textarea> 
	        <p ><input type="submit" name="submit" value="Send" /></p>
        </form>
    </div>
</div>
<hr>

<!-- ===Contact Entry=== -->

<?php include ('includes/footerPlain.php'); ?>
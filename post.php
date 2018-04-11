<?php 

/*
 * Title: Blogowiz Post Page
 * Author: Marc Funston
 * Purpose: This script performs an INSERT query to add a record to the posts table.
 *          After checking the data for bad things. Now uploads pictures. 
 * Bugs: None known at this time
 * Last Edit Date: 4/04/2018
 * 4/04/2018 Added picture upload feature
 * 
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_FILES['upload'])) {

	require ('includes/mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for an user_id name:
		/*
	if (empty($_POST['user_id'])) {
		$errors[] = 'No user matches your id number.';
	} else {
		$ui = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['user_id'])));
	}*/

	// Check for a entry_title:
	if (empty($_POST['entry_title'])) {
		$errors[] = 'You forgot to enter your entry title.';
	} else {
		$et = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['entry_title'])));
	}
	
	// Check for a short_text:
	if (empty($_POST['short_text'])) {
		$errors[] = 'You forgot to enter the short text.';
	} else {
		$st = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['short_text'])));
	}
	
	// Check for an long_text:
	if (empty($_POST['long_text'])) {
		$errors[] = 'You forgot to enter your long text.';
	} else {
		$lt = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['long_text'])));
    }
    
    // Check for an image name:
	if (empty($_POST['image_name'])) {
		$errors[] = 'You forgot to enter your image name.';
	} else {
		$in = strip_tags(mysqli_real_escape_string($dbc, trim($_POST['image_name'])));
	}


	
	if (empty($errors)) { // If everything's OK.
	
		// Post the entry in the database...
		
		// Make the query:
		$q = "INSERT INTO posts (entry_title, short_text, long_text, image_name, views, entry_date) VALUES ('$et', '$st', '$lt', '$in', 0, NOW() )";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
        
			// Print a message:
            echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
            echo"       <div class=\"w3-container\">\n";
            echo"       <h1>Post Complete</h1>\n";
            echo"       <h2>Return to home to your handy work!</h2>\n";
            echo"       </div>\n";
            echo"   </div>\n";	
        
        } else { // If it did not run OK.
            
            // Print a message:
            echo"   <div class=\"w3-card-4 w3-margin w3-white w3-round-xlarge\">\n";
            echo"       <div class=\"w3-container\">\n";
            echo"       <h1>System Error</h1>\n";
            echo"       <h2>You could not post due to a system error. We apologize for any inconvenience.</h2>\n";
            // Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
            echo"       </div>\n";
            echo"   </div>\n";

			// Public message:
			echo '<h1></h1>
			<p class="error">You could not post due to a system error. We apologize for any inconvenience.</p>'; 
			

						
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

//get user_id
/* 
if(!empty($_REQUEST[user_id])){
	echo"<p>User id = $_REQUEST[user_id]</p>\n";
}else{
	echo"<p>User id = not set</p>\n";
}*/

?>

<div class="w3-card-4 w3-margin w3-white w3-round-xlarge">
    <div class="w3-container">
        <h1>Post</h1>
        <form action="post.php" method="post">
		<?php 
		// put user id in form
		//echo"<input type=\"hidden\" name=\"user_id\" value=\"$user_number\">\n";
		?>
        <p>Title: <input type="text" name="entry_title" size="20" maxlength="40" value="<?php if (isset($_POST['entry_title'])) echo $_POST['entry_title']; ?>" /></p>
        <p>Short Text: <input type="text" name="short_text" size="20" maxlength="40" value="<?php if (isset($_POST['short_text'])) echo $_POST['short_text']; ?>" /></p>
		<p>Image Name: <input type="text" name="image_name" size="20" maxlength="60" value="<?php if (isset($_POST['image_name'])) echo $_POST['image_name']; ?>"  /> </p>
		<p>Long Text:</p>
	    <textarea rows="4" cols="50" name="long_text" value="<?php if (isset($_POST['long_text'])) echo $_POST['long_text']; ?>">
        </textarea> 
        <p><input align="left" type="submit" name="submit" value="Post" /></p>
        </form>
    </div>
</div>
<hr>

<div class="w3-card-4 w3-margin w3-white w3-round-xlarge">
    <div class="w3-container">
        <h1>Upload Pictures</h1>
<?php # Script 11.2 - upload_image.php

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for an uploaded file:
	if (isset($_FILES['upload'])) {
		
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
		
			// Move the file over.
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "../uploads/{$_FILES['upload']['name']}")) {
				echo '<p><em>The file has been uploaded!</em></p>';
			} // End of move... IF.
			
		} else { // Invalid type.
			echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		}

	} // End of isset($_FILES['upload']) IF.
	
	// Check for an error:
	if ($_FILES['upload']['error'] > 0) {
		echo '<p class="error">The file could not be uploaded because: <strong>';
	
		// Print a message based upon the error.
		switch ($_FILES['upload']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini.';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
				break;
			case 3:
				print 'The file was only partially uploaded.';
				break;
			case 4:
				print 'No file was uploaded.';
				break;
			case 6:
				print 'No temporary folder was available.';
				break;
			case 7:
				print 'Unable to write to the disk.';
				break;
			case 8:
				print 'File upload stopped.';
				break;
			default:
				print 'A system error occurred.';
				break;
		} // End of switch.
		
		print '</strong></p>';
	
	} // End of error IF.
	
	// Delete the file if it still exists:
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);
	}
			
} // End of the submitted conditional.
?>
<form enctype="multipart/form-data" action="post.php" method="post">

	<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
	
	<fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>
	
	<p><b>File:</b> <input type="file" name="upload" /></p>
	
	</fieldset>
	<p></p>
	<div align="left"><input type="submit" name="submit" value="Submit" /></div>
	<p></p>
</form>
</div>
</div>
<hr>

<?php include ('includes/footerPlain.php'); ?>
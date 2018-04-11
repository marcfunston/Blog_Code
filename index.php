<?php

/*
 * Title: Blogowiz Index Page
 * Author: Marc Funston
 * Purpose: Blogowiz Index page.
 * Bugs: None known at this time
 * Last Edit Date: 4/05/2018
 * 1 - Added views to blog entry
 * 
 */

require("includes/mysqli_connect.php");
require("includes/Entry.php");
include("includes/head.php");

// testing varibles
$comments = array('bob' => 'wow', 'fred' => 'no way','fran' => 'oh my!',);

// set page number
if($_SERVER['REQUEST_METHOD'] == 'GET') {

    $page = 1; // start at home page of blogowiz

}elseif($_SERVER['REQUEST_METHOD'] == 'POST') {

    $page = $_REQUEST['page']; // get current page of blogowiz
    if($page < 1)
        $page = 1; // prevent under run of entries

}

// Entry object to load up from data base
$entry = new Entry();

// Make the query:
$q = "SELECT entry_number, entry_title AS title, short_text, long_text, image_name, views, entry_date FROM posts";		

$r = @mysqli_query ($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

// number of pages
$pages = ceil($num / 4);

// check and correct over run of pages
if($page > $pages)
    $page = $pages;

if ($num > 0) { // If it ran OK, display the records.
    
    // display the first 4
    $increment = 0;

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

    // determine which entries are shown
    $start_entry = $page * 4 - 4;
    //echo"<p>startentry = $start_entry</p>";
    $end_entry = $page * 4 + 1;
    //echo"<p>endEntry = $end_entry</p>";

    if($row['entry_number'] > $start_entry && $row['entry_number'] < $end_entry){

        //set values in blog entry
        $entry->setEntry_title($row['title']);
        $entry->setEntry_date($row['entry_date']);
        $entry->setEntry_number($row['entry_number']);
        $entry->setImage_name($row['image_name']);
        $entry->setShort_text($row['short_text']);
        $entry->setLong_text($row['long_text']);
        $entry->setView_number($row['views']);

        // update views
        $new_total = $entry->getView_number() + 1;
        $blog = $entry->getEntry_number();
        $q = "UPDATE posts SET views = $new_total WHERE entry_number = $blog";		
        @mysqli_query($dbc, $q);
         
        // publish blog entry to html
        $entry->StartEntry();
        }
    }

	mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.
	echo '<p class="error">There are currently no blog entries or the data base is busy.</p>';
}
// end of fill table ==================================================================

// footer to include pages
include("includes/footer.php");

// close db
mysqli_close($dbc);


?>



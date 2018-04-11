<?php

/*
 * Title: Blogowiz Footer Page
 * Author: Marc Funston
 * Purpose: This page contains the top part of the html. 
 * Bugs: None known at this time
 * Last Edit Date: 4/01/2018
 * 
 */

?>

<!-- END BLOG ENTRIES -->

</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
  <img src="images/img_me.jpg" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>Pheo</b></h4>
      <p>Just me, myself and I, exploring the universe of php. Yes I am wandering around lost, come, join me! I want to share my confusion with you.</p>
    </div>
  </div><hr>
  
  <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Popular Posts</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
      <li class="w3-padding-16">
        <img src="images/workshop.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Work?</span><br>
        <span>Wooden Pipes</span>
      </li>
      <li class="w3-padding-16">
        <img src="images/gondol.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Heights</span><br>
        <span>Do you smell the fear?</span>
      </li> 
      <li class="w3-padding-16">
        <img src="images/skies.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Airplane</span><br>
        <span>What I wish I could see from my seat!</span>
      </li>   
      <li class="w3-padding-16 w3-hide-medium w3-hide-small">
        <img src="images/rock.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Mountain</span><br>
        <span>I'm too lazy to climb it.</span>
      </li>  
    </ul>
  </div>
  <hr> 
 
  <!-- Labels / tags -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Tags</h4>
    </div>
    <div class="w3-container w3-white">
    <p><span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">DIY</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
    </p>
    </div>
  </div>
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">

<?php 

// set page values
$previousPage = $page - 1;
$nextPage = $page + 1;

?>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">

<div class="w3-row">
    <div class="w3-half w3-container">
        <form action="index.php" method="post">
            <input type="hidden" name="page" value=<?php echo"$previousPage"; ?>>
            <button class="w3-button w3-black w3-padding-large w3-margin-bottom w3-right" input type="submit" name="submit" value="Next" />Previous</button>
        </form>
    </div>

    <div class="w3-half w3-container">
        <form action="index.php" method="post">
            <input type="hidden" name="page" value=<?php echo"$nextPage"; ?>>
            <button class="w3-button w3-black w3-padding-large w3-margin-bottom" input type="submit" name="submit" value="Next" />Next</button>
        </form>
    </div>
</div>
  
</footer>
</body>
</html>
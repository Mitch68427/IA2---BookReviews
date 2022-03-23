	<div class="info-banner"></div>
	<div class='banner row'>
	  <div class='col-6'>
		  <div class='display-box banner-logo'>
			  <img src="images/logo.png" width="122px" height="113px">
		  </div>
		  <div class='display-box banner-title'>
			<h1>Book Worm Reviews</h1>
			<p class='banner-sub-heading'>The home for all of your favourite book reviews</p>
		  </div>
		  <?php 
		  if(session_status() == PHP_SESSION_NONE)
		  {
			 session_start();
		  }
		  if(isset($_SESSION['fullname'])) { ?>
		  <div class="display-box banner-title col-12">	 
			<h4> Welcome to book worm reviews - <?php echo $_SESSION['fullname'];  ?> </h4>
	      </div>
		  <?php } ?>
	  </div>
	  <div class='col-6'>
		  <ul class="menu-list">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="support.php">Support</a></li>
			<li><a href="book-of-the-week.php">Book Of The Week</a></li>
			<?php 
				if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1){
					echo ("<li><a href='admin-page.php'>Admin</a></li>");
				}
			?>
			<?php 
				if (isset($_SESSION['userid'])){
					echo ("<li><a href='logout.php'>Log Out</a></li>");
				}
			?>
		  </ul>
		</div>
	</div>
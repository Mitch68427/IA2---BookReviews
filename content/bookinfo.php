<!DOCTYPE html>

<html>
	<head> 
		<title>Book Info</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<style> 
		th {
			background-color: pink;
		}
	</style>
	<body class="bg-one">	
	
	<?php require 'header-panel.php'; ?>
	<a href="search.php">Back</a>
		
	<?php
		//Check & Set Search Term
		if (isset($_GET['book'])){
			$search=$_GET['book'];
			$_SESSION['bookid']=$search;
		} else {
			$search="";
		}
		
		$userLoggedIn = isset($_SESSION['userid']);
					
		//Connect to Database
		$conn = new mysqli("localhost", "root", "", "ia2") or die(mysqli_error($conn));
		
		//SQL commands 
		$sqlBookData="SELECT * FROM bookdata WHERE bookid='$search'";
		$sqlBookReviews="SELECT users.fullName, bookReviews2.rating, bookReviews2.review 
						 FROM users
						 INNER JOIN bookReviews2 ON users.userId = bookReviews2.userId
						 WHERE bookReviews2.bookid='$search'";
		
		//Run SQL Command on Connected Database
		$queryBookData = mysqli_query($conn,$sqlBookData);
		$queryBookReviews = mysqli_query($conn,$sqlBookReviews);
		
		//Fetch Row from Query
		$row = mysqli_fetch_row($queryBookData);	
		$bookTitle = $row[1];
		$bookAuthor = $row[2];
		$bookYear = $row[3];
		$bookGenre = $row[4];
		$bookImagePath = $row[5];	
		$bookDescription = $row[6];
						
		//Print Function
		function print_review($query) {
			$numberOfRows = 0;
			$fields_num = mysqli_num_fields($query);
			while($row = mysqli_fetch_row($query)) {
				$numberOfRows = $numberOfRows + 1;		
				echo("<div class='col-8 review-table ml-50 mt-10'>");
				echo("<div class='col-3 no-padding'><h3>User: ".$row[0]."</h3></div>");
				echo("<div class='col-9 no-padding'><h3>Rating: ".$row[1]."</h3></div>");
				echo("<div class='col-8 no-padding'>");
				echo("<p>".$row[2]."</p>");
				echo("</div>");	
				echo("</div>");				
			}

			if($numberOfRows == 0){
				echo("<div class='row book-table ml-50'>");
				echo("<div class='col-10 book-table-cell'>No reviews have been added for this book.</div>");
				echo '</div>';
			}
		}
		
		?>
		
		<div class="row ml-50">
			<div class="display-box banner-title col-12">
				<h1><?php echo $bookTitle; ?></h1>
			</div>	
			<div class="col-2 no-padding">
				<img alt="<?php echo $bookAuthor; ?> - <?php echo $bookYear; ?> - <?php echo $bookGenre; ?>"
					 src="<?php echo $bookImagePath; ?>">
			</div>
			<div class="display-details col-6">
				<p><b>Author:</b> <?php echo $bookAuthor; ?></p>
				<p><b>Genre:</b> <?php echo $bookGenre; ?></p>
				<p><b>Year:</b> <?php echo $bookYear; ?></p>
				<p><b>Description:</b> <?php echo $bookDescription; ?></p>
			</div>
		</div>
		
		<div class="row ml-50">
			<div class="display-box banner-title col-12">
				<h1>Reviews</h1>
			</div>
			<?php print_review($queryBookReviews); ?>
		</div>
		
		<div class="row ml-50 mt50">
			<?php 
			if($userLoggedIn == true) {
				require 'add-review-panel.php';
			}
			else { 
			?>
			 <div class="display-box banner-title col-12">
				<h1>Log on or signup to add a review!</h1>
			 </div>
			<?php require 'login-signup-panel.php'; } ?>		
		</div>		
	</body>
</html>
<?php
	//Collect all variables
	session_start();
	$userid=$_SESSION['userid'];
	$bookid=$_SESSION['isadmin'];
	$bookreviewid=$_GET['bookreviewid'];


	//Connect to Database
	$conn = new mysqli("localhost", "root", "", "ia2") or die(mysqli_error($conn));
	
	//SQL command 
	$sql="DELETE FROM `bookReviews2` WHERE bookreviewid='$bookreviewid'";
	
	//Run SQL Command on Connected Database
	$query = mysqli_query($conn,$sql);
	
	//Take user to back to book page
	header("Location:admin-page.php");
	
?>
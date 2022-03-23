<?php
	//Collect all variables
	session_start();
	$userid=$_SESSION['userid'];
	$bookid=$_SESSION['bookid'];
	$review=$_GET['review'];
	$rating=$_GET['rating'];
	
	//Connect to Database
	$conn = new mysqli("localhost", "root", "", "ia2") or die(mysqli_error($conn));
	
	//SQL command 
	$sql="INSERT INTO `bookReviews2`(`userid`, `bookid`, `review`, `rating`) VALUES ('$userid','$bookid','$review','$rating')";
	
	//Run SQL Command on Connected Database
	$query = mysqli_query($conn,$sql);
	
	//Take user to back to book page
	header("Location:bookinfo.php?book="."$bookid");
	
?>
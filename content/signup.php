<?php
	//Collect all variables
	$email=$_POST['email'];
	$password=$_POST['password'];
	$fullname=$_POST['fullname'];
	$birthday=$_POST['birthday'];
	$encodedpassword=md5($password);
	
	//Connect to Database and run command
	$conn = new mysqli("localhost", "root", "", "ia2") or die(mysqli_error($conn));
	$sql="INSERT INTO `users`(`email`, `password`, `fullname` , `birthday`) VALUES ('$email','$encodedpassword','$fullname','$birthday')";
	$query = mysqli_query($conn,$sql);
	
	//Get the new user 
	$sql="SELECT * FROM users WHERE email='$email'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($query);
	$conn->close();
	
	//Set up the logged in session
	if($row[0] != null) {
		session_destroy();
		session_start();
		$_SESSION['userid']=$row[0];
		$_SESSION['fullname']=$row[3];
	}
	
	//Take user to back to book page
	header("Location:search.php");
	
?>
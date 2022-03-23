<?php
	//Get Variables from URL using GET
	$email=$_POST['email'];
	$password=$_POST['pword'];
	
	//Hash Password using MD5
	$password=md5($password);
	
	echo $password;

	//Connect to Database
	$conn = new mysqli("localhost", "root", "", "ia2") or die(mysqli_error($conn));
	
	//SQL command 
	$sql="SELECT * FROM users WHERE email='$email'";
	
	//Run SQL Command on Connected Database
	$query = mysqli_query($conn,$sql);
	
	//Fetch Row from Query
	$row = mysqli_fetch_row($query);
	
	//TO DO: Checks to see if empty & returns error if empty. 
	
	$tablePW=$row[2];
	
	if ($password==$tablePW){
		//Login & start session saving variables
		session_start();
		$_SESSION['userid']=$row[0];
		$_SESSION['fullname']=$row[3];
		$_SESSION['isadmin']=$row[5];
		
		header("Location:index.php");
	} else{
		//Error
		header("Location:login-page.php?login=failed");
	}
?>
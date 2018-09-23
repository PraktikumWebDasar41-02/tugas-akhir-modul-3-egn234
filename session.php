<?php
	include('conn.php');
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysqli_query($db, "SELECT * FROM user WHERE username = '$user_check'");
	$row = mysqli_fetch_array($ses_sql);
	$login_session =$row['username'];
	if(!isset($login_session)){
		mysql_close($db); // Closing Connection
		header('Location: login.html'); // Redirecting To Home Page
	}
?>
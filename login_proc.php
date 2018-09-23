<?php
	include("conn.php");
	session_start();

	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$query = mysqli_query($db, "SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
		$row = mysqli_fetch_array($query);

		if($username == $row['username'] && $password == $row['password']){
			// $_SESSION['nama'] = $;
			$_SESSION['login_user'] = $username;
			echo '<script language="javascript">
			alert("login berhasil");
			</script>';
			header("location: home.php");
		}else{
			echo '<script language="javascript">
			alert("login fail");
			document.location = "login.html"; 
			</script>';
			session_destroy();
		}
	}
?>
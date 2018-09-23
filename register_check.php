<?php
	include("conn.php");

	if (isset($_POST['subregister'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$nama = $_POST['nama'];

		$input = mysqli_query($db, "INSERT INTO user(username, password, nama) VALUES ('$username', '$password', '$nama')");
		
		if (!$input) {
		    echo "Error: " . $input . "<br>" . mysqli_error($db);
		    // echo "<br> <script language='javascript'>
		    // 		document.location = 'register.html';
		    // 	</script>";
		} else {
		    echo 
		    	"<script language='javascript'>
					alert('register berhasil');
					document.location = 'login.html'; 
				</script>";
		}

		mysqli_close($db);

	}
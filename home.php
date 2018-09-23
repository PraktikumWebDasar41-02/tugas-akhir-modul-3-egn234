<?php
	include("session.php");
	$username = $_SESSION['login_user'];


	// $query = mysqli_query($db, "SELECT * FROM user WHERE username = '".\"' ");
  	

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Gallery of <?php echo $username ?> </h1>
	<form method="POST" action="home.php" enctype="multipart/form-data">
		<input type="file" name='pic' required>
		<button type="submit" name="subpic">submit pic</button>
	</form>
	<?php
		if(isset($_POST['subpic'])){
		    $name       = $_FILES['pic']['name'];  
		    $temp_name  = $_FILES['pic']['tmp_name'];  
		    if(isset($name)){
		        if(!empty($name)){      
		            $location = 'img/';
		            mysqli_query($db,"INSERT INTO gambar(username, gmbr) VALUES('$username',' ".$location.$name."') ");
		            if(move_uploaded_file($temp_name, $location.$name)){
		                echo 'File uploaded successfully';
		            }
		        }       
		    }  else {
		        echo 'You should select a file to upload !!';
		    }
		}
	?>
	<table>
		<?php
			$results = mysqli_query($db, "SELECT * FROM gambar WHERE username = '$username' ");	
				while ($row = mysqli_fetch_array($results)){
		?>
		<tr>
			<td><?php echo "<img src= '".$row['gmbr']."' width='100' height='100'> " ;?></tSd>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
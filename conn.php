<?php

	$db = mysqli_connect("localhost", "root", "", "belajarphp");
	
	if(!$db){
		echo "tidak tersambung";
	}else{
		echo "tersambung";
	}
	
?>
<?php
include "db/pdo.php";


$username = $_POST['amburegul'];
$password = $_POST['amesiyu'];

if($_POST['submit']=="Login"){
	if(empty($username)){
		header("Location: $base_url/login.php?empty=username");
	}
	elseif(empty($password)){
		header("Location: $base_url/login.php?empty=password");
	}
	else {
		if($username=="adminbpkad"&&$password=="admin123*#"){
			$_SESSION['username']=$username;
			header("Location: $base_url/index.php");
		} else {
			header("Location: $base_url/index.php?nopass=true");
		}
		
	}	
}

?>
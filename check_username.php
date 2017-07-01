<?php 
require 'connection.php';
$username = $_POST['username'];

$check = "SELECT * FROM users
	WHERE username='$username'";

	$result = mysqli_query($connect,$check);
	if (mysqli_num_rows($result)>0) {
		echo "Username ".$username." is already taken. Please try another one.";
	} else {
		echo "Username available.";
	}

 ?>
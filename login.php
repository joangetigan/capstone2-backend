<?php 
require 'connection.php';

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * FROM users
	WHERE username='$username'
	AND password='$password'
	AND status='APPROVED'";

	$result = mysqli_query($connect,$sql);

	if (mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_assoc($result)) {
			extract($row);
		$_SESSION['id']=$id;	
		$_SESSION['firstname']=$firstname;
		$_SESSION['username']=$username;
		$_SESSION['email']=$email;
		$_SESSION['role']=$role;
		$_SESSION['message'] = "Hi $username";
		$_SESSION['is_logged_in'] = TRUE;

		if ($_SESSION['role']=='admin') {
			$_SESSION['is_admin']=TRUE;
			header('location:adminPage.php');
		} else {
			header('location:memberPage.php');
		}

		}
	}
}

 ?>
<?php  
require 'connection.php';
session_start();

$user = $_SESSION['id'];
$book = $_GET['id'];

$add = "INSERT INTO saved_books(user_id,book_id)
	VALUES('$user','$book')";

mysqli_query($connect,$add);


 ?>

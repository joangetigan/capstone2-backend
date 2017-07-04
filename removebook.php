<?php  
require 'connection.php';
session_start();

$user = $_SESSION['id'];
$book = $_GET['id'];

$remove = "DELETE FROM saved_books WHERE user_id='$user' AND book_id='$book'";

mysqli_query($connect,$remove);


 ?>

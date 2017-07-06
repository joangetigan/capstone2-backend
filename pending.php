<?php  
require 'connection.php';
session_start();

$id = $_GET['id'];

$pending = "UPDATE users SET status='PENDING', date=date WHERE id='$id'"; 

mysqli_query($connect,$pending);


 ?>

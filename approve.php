<?php  
require 'connection.php';
session_start();

$id = $_GET['id'];

$approve = "UPDATE users SET status='APPROVED', date=date WHERE id='$id'"; 

mysqli_query($connect,$approve);


 ?>

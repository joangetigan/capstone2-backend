<?php  
require 'connection.php';
session_start();

$id = $_GET['id'];

$delete = "DELETE FROM users WHERE id='$id'"; 

mysqli_query($connect,$delete);


 ?>

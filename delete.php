<?php  
require 'connection.php';
session_start();

$id = $_POST['id'];

$delete = "DELETE FROM users WHERE id='$id'"; 

mysqli_query($connect,$delete);


 ?>

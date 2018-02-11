<?php 

// $host='wvulqmhjj9tbtc1w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
// $username='q8u4harrh9hl2h49';
// $password='d4dxaw50vdc71da3';
// $database='q1bwypvg2ewiw4n1';

// $connect = mysqli_connect($host,$username,$password,$database);

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

// Create connection
$connect = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connection was successfully established!";

 ?>
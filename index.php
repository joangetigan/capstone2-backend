<?php 
//$url = getenv('mysql://q8u4harrh9hl2h49:d4dxaw50vdc71da3@wvulqmhjj9tbtc1w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/q1bwypvg2ewiw4n1');
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connection was successfully established!";
function get_title() {
	echo "Book Musketeers";
}

function display_content() {
	echo '
	<h2>New York Times Best Sellers</h2>
    <div class="bestseller">
        <img src="images/camino.jpg" alt="camino" class="book">
        <img src="images/franken.jpg" alt="franken" class="book">
        <img src="images/hidden.jpg" alt="hidden" class="book">
        <img src="images/zookeeper.jpg" alt="zookeeper" class="book">
        <img src="images/identical.jpg" alt="identical" class="book">
    </div>
    <h2>One book for all. All books for one</h2>
    <h4>NO membership fee.</h4>
    <h4>Share a book and read ALL the others.</h4>
    <h4>Virtual library at your fingertips.</h4>
    <a href="register.php"><button class="signup">SIGN UP NOW</button></a>
    ';
}

require_once 'template.php';

?>
<?php 
require_once 'template.php';

function get_title() {
	echo "Member Page - Book Musketeers";
}

function display_content() {
	echo '
	<h2 style="margin-bottom:40px">Welcome back, '.$_SESSION['firstname'].'.</h2>

	<h4 class="memberpage">Titles you\'ve saved.</h4>
	<div class="divide">';

	require 'connection.php';
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM books b JOIN saved_books s ON (b.id=s.book_id) WHERE user_id='$id'";
	$result = mysqli_query($connect,$sql);

	if (mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_assoc($result)) {
			extract($row);
			echo "<div>";
			echo '<img src="'.$cover.'" class="cover"><br>';
			echo $title.'<br>';
			echo 'by '.$author.'<br>';
			echo "<a href='read.php'><button class='user-action'>Read Now</button></a><br><br>";
			echo "</div>";
		}
	}
	echo '</div>';
}


?>
<?php  
require 'connection.php'; 

if(isset($_SESSION['is_admin'])) {
	echo "<br><a href='adminPage.php'><button style='margin-bottom:5px'>Admin Page</button></a>";
		
	$set = "SELECT DISTINCT status FROM users";
	$select = mysqli_query($connect,$set);

	echo "<form method='POST'>";
		echo "<select name='status'>";
		echo "<option>All</option>";
		while ($row = mysqli_fetch_assoc($select)) {	
			extract($row);
			if(isset($_POST['status']) && $_POST['status']==$status) {		
				echo "<option selected value='$status'>".$status."</option>";
				} else {
				echo "<option value='$status'>".$status."</option>";
				}
			}
		echo "</select>&nbsp";
		echo "<input type='submit' name='submit' value='Sort'>";
	echo "</form>";
}

if(isset($_SESSION['is_logged_in'])) {
	echo "<br><a href='addbook.php'><button>Add Book</button></a><br>";

	echo "<h3>Newly Added Titles</h3>";
	$new = "SELECT * FROM books b JOIN users u ON (b.ebook=u.ebook) ORDER BY date DESC LIMIT 2";
	$result = mysqli_query($connect,$new);
	while ($row=mysqli_fetch_assoc($result)) {
		extract($row);
		echo "<div>";
		echo '<img src="'.$cover.'" class="cover"><br>';
		echo $title.'<br>';
		echo '<span class="author">by '.$author.'</span><br>';
		echo "</div><br>";
	}

} else {
	echo "
	<h3>In Demand Titles</h3>
	<p>For new sign ups, members would really appreciate if you could contribute one of these.</p><br>
	<p>TOM CLANCY:<br>POINT OF CONTACT<br>by Mike Maden</p>
	<p>COME SUNDOWN<br>by Nora Roberts</p>
	<p>THE HANDMAID'S TALE<br>by Margaret Atwood</p>
	<p>DANGEROUS MINDS<br>by Janet Evanovich</p><br>
	<a href='register.php'><button>SHARE AND READ</button></a>

	<div class='social'>
    	<img src='images/facebook.png' alt='facebook' class='icon'>
    	<img src='images/twitter.png' alt='twitter' class='icon'>
    	<img src='images/pinterest.png' alt='pinterest' class='icon'>
	</div>
	";
}

?>


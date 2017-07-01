<?php  
require 'connection.php'; 

if(isset($_SESSION['is_admin'])) {
	echo "<br><a href='adminPage.php'><button>Admin Page</button></a><br><br>";
		
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
		echo "</select>";
		echo "<span class='form-signup'><input type='submit' name='submit' value='Sort'></span>";		
	echo "</form>";
}

if(isset($_SESSION['is_logged_in'])) {
	echo "
	<h3>Newly Added Titles</h3>
	
	";

} else {
	echo "
	<h3>In Demand Titles</h3>
	<p>For new sign ups, members would really appreciate if you could contribute one of these.</p><br>
	<p>TOM CLANCY:<br>POINT OF CONTACT<br>by Mike Maden</p>
	<p>COME SUNDOWN<br>by Nora Roberts</p>
	<p>THE HANDMAID'S TALE<br>by Margaret Atwood</p>
	<p>INTO THE WATER<br>by Paula Hawkins</p><br>
	<a href='register.php'><button>SHARE AND READ</button></a>

	<div class='social'>
    	<img src='images/facebook.png' alt='facebook' class='icon'>
    	<img src='images/twitter.png' alt='twitter' class='icon'>
    	<img src='images/pinterest.png' alt='pinterest' class='icon'>
	</div>
	";
}

?>


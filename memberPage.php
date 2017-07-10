<?php 
require_once 'template.php';

function get_title() {
	echo "Member Page - Book Musketeers";
}

function display_content() {
if(!isset($_SESSION['is_logged_in'])) {
	echo "<h4>You do not have permission to access this page.</h4>";
} else {
	echo '<h2 style="margin-bottom:20px">Welcome back, '.$_SESSION['firstname'].'.</h2>
		<h4 style="margin-bottom:30px">Titles you\'ve saved.</h4>';

	require 'connection.php';
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM books b JOIN saved_books s ON (b.id=s.book_id) WHERE user_id='$id'";
	$result = mysqli_query($connect,$sql);

	if (mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<div class='row'>";
			extract($row);
			echo "<div class='col-xs-6 right'>";
			echo '<img src="'.$cover.'" class="cover"><br></div>';
			echo "<div class='col-xs-6 left'>";
			echo '<span class="title">'.$title.'</span><br>';
			echo '<span class="author">by '.$author.'</span><br><br>';
			echo "<a href='read.php?title=".urlencode($title)."&book=".$ebook."' target='block'><button class='user-action'>Read Now</button></a><br>";
			echo "<button name='remove' id='$book_id' onclick='removebook(this.id)' class='user-action'>Remove from Saved</button><br><br></div>";
			echo "</div><br>";
		}
	}
}
}

?>


<script>
function removebook(id){
    $.post("removebook.php?id="+id,
    {
    
    },
    function(data, status){
    	swal({
			title: "Removed from Saved Items",
			// text: "Log out to see summary of orders :)",
			type: "success",
			// showCancelButton: false,
			closeOnConfirm: true,
			// showLoaderOnConfirm: false,
	    },
	    function(){
			location.reload();
	    });
	});
}

</script>


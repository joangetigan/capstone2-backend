<?php 

if(isset($_POST['browse'])){
	$select = $_POST['select'];
	$query = $_POST['query'];
	header("location:browse.php?select=$select&query=$query");
}
if(isset($_POST['type'])){
	$choose = $_POST['choose'];
	header("location:browse.php?choose=$choose");
}

require_once 'template.php';

function get_title() {
	echo "Browse - Book Musketeers";
}

function display_content() {
	echo '<h2 style="margin-bottom:20px">Browse Items</h2>
		<h3 style="margin-bottom:30px">Search Results</h3>';

	require 'connection.php';

	if (isset($_GET['select']) && isset($_GET['query'])) {
		$select = $_GET['select'];
		$query = $_GET['query'];

		if ($select=="author") {
			$sql = "SELECT * FROM books WHERE author LIKE '%$query%'";
		} else {
			$sql = "SELECT * FROM books WHERE title LIKE '%$query%'";
		}

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
				if(isset($_SESSION['is_logged_in'])) {
					echo "<button name='save' id='$id' onclick='savebook(this.id)' class='user-action'>Save for Later</button><br>";
					echo "<a href='read.php?title=".$title."&book=".$ebook."' target='block'><button class='user-action'>Read Now</button></a><br><br>";
				}
				echo "</div>";
				echo "</div><br>";
			}
		} else {
			echo "No results found.";
		}
	} else if (isset($_GET['choose'])) {
		$choose = $_GET['choose'];

		if ($choose=="fiction") {
			$sql = "SELECT * FROM books WHERE category='fiction'";
		} else {
			$sql = "SELECT * FROM books WHERE category='non-fiction'";
		}

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
				if(isset($_SESSION['is_logged_in'])) {
					echo "<button name='save' id='$id' onclick='savebook(this.id)' class='user-action'>Save for Later</button><br>";
					echo "<a href='read.php?title=".$title."&book=".$ebook."' target='block'><button class='user-action'>Read Now</button></a><br><br>";
				}
				echo "</div>";
				echo "</div><br>";
			}
		} else {
			echo "No results found.";
		}
	} else if (isset($_POST['see-all'])) {
		$sql = "SELECT * FROM books";

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
				if(isset($_SESSION['is_logged_in'])) {
					echo "<button name='save' id='$id' onclick='savebook(this.id)' class='user-action'>Save for Later</button><br>";
					echo "<a href='read.php?title=".$title."&book=".$ebook."' target='block'><button class='user-action'>Read Now</button></a><br><br>";
				}
				echo "</div>";
				echo "</div><br>";
			}
		}
	}
}

?>


<script>
function savebook(id){
    $.post("savebook.php?id="+id,
    {
    
    },
    function(data, status){
    	swal({
			title: "Saved!",
			text: "Go to Saved Items to Read :)",
			type: "success",
			closeOnConfirm: true,
	    },
	    function(){
			location.reload();
	    });
	});
}

</script>

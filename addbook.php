<?php 
function get_title() {
	echo "Add Book - Book Musketeers";
}

function display_content() {
	require 'connection.php';
	$message = '';

	if (isset($_POST['add'])) {
		$id = $_SESSION['id'];
		$username = $_SESSION['username'];
		$title = addslashes($_POST['title']);
		$author = addslashes($_POST['author']);
		$file = $_FILES["file"]["name"];

		$addbook = "INSERT INTO books(author,title,ebook)
		VALUES('$author','$title','$file')";

		mysqli_query($connect,$addbook);
		
		$target_dir = "uploads/$username/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$uploadOk = 1;
		$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

		$get_bookid = "SELECT id FROM books WHERE title='$title' AND author='$author'";
		$bookid = mysqli_query($connect,$get_bookid);	
		$row=mysqli_fetch_assoc($bookid);
		$book = $row['id'];

		$list = "INSERT INTO users_books(user_id,book_id)
		VALUES('$id','$book')";
		mysqli_query($connect,$list);

		$message = "Book added successfully.<br>Thank you for sharing :)";
	}

	echo '
	<form method="POST" enctype="multipart/form-data">
	<h2>Add Book</h2>
	<h5>Kindly check if the book has not yet been uploaded.</h5>
	<ul class="form-signup">
	    <li><label>Book Title<span class="required">*</span></label><input type="text" name="title" required></li>

	    <li><label>Book Author<span class="required">*</span></label><input type="text" name="author" required></li>

		<li><label>Upload file<span class="required">*</span></label><input type="file" name="file" required></li><br>

	    <li><input type="submit" name="add" value="Submit"></li>
	</ul>
	</form>
	    '.$message;
}

require_once 'template.php';

?>
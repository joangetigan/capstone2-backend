<?php 
function get_title() {
	echo "Add Book - Book Musketeers";
}

function display_content() {
	global $message;
	echo '
	<form method="POST" enctype="multipart/form-data">
	<h2>Add Book</h2>
	<ul class="form-signup divide">
	    <li><label>Book Title<span class="required">*</span></label><input type="text" name="title" required></li>

	    <li><label>Book Author<span class="required">*</span></label><input type="text" name="author" required></li>

		<li><label>Description</label><textarea style="resize:none" name="description" rows="7"></textarea></li><br><br>	

		<li><label>Upload cover</label><input type="file" name="cover"></li><br>

		<li><label>Upload file<span class="required">*</span></label><input type="file" name="file" required></li><br>

	    <li><input type="submit" name="add" value="Submit"></li>
	</ul>
	</form>
	    '.$message;
}

require_once 'template.php';

?>
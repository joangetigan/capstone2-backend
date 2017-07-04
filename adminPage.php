<?php 
require_once 'template.php';

function get_title() {
	echo "Admin Page - Book Musketeers";
}

function display_content() {
require 'connection.php';

if(!isset($_SESSION['is_admin'])) {
	echo "<h4>You do not have permission to access this page.</h4>";
} else {

	if(!isset($_POST['submit']) && !isset($_POST['approve'])) {
		$_SESSION['status_filter'] = 'All';
	}
	if (isset($_POST['approve'])) {
		$id = $_GET['id'];
		$approve = "UPDATE users SET status='APPROVED', date=date WHERE id='$id'"; 
		mysqli_query($connect,$approve);
	}
	if (isset($_POST['delete'])) {
		$id = $_GET['id'];
		$delete = "DELETE FROM users WHERE id='$id'"; 
		mysqli_query($connect,$delete);
	}

		echo '<h3>MASTER LIST</h3>';
		$sql = "SELECT * FROM users ORDER BY date";
		$result = mysqli_query($connect,$sql);
				echo '
				<table class="table table-hover left">
					<tr>
						<th><h4>Id</h4></th>
						<th><h4>First_Name</h4></th>
						<th><h4>Username</h4></th>
						<th><h4>Email</h4></th>
						<th><h4>Ebook</h4></th>
						<th><h4>Timestamp</h4></th>
						<th><h4>Status</h4></th>
						<th><h4>Action</h4></th>
					</tr>';
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				extract($row);
				if(isset($_POST['submit'])){
					$_SESSION['status_filter'] = $_POST['status'];
				}
				if ($status==$_SESSION['status_filter'] || $_SESSION['status_filter']=='All') {
				echo '
					<tr>
						<td>'.$id.'</td>
						<td>'.$firstname.'</td>
						<td>'.$username.'</td>
						<td>'.$email.'</td>
						<td>'.$ebook.'</td>
						<td>'.$date.'</td>';
						if ($status=="PENDING") {
							echo '<td style="color:red">'.$status.'</td>';
						} else {
							echo '<td>'.$status.'</td>';
						}
						echo '<td><form method=POST action="adminPage.php?id='.$id.'">';
							if ($status=='PENDING') {
								echo '<button class="action btn-success" name="approve" id="approve">Approve</button>';
							} else {
								echo '<button class="action btn-danger" name="delete">Delete</button>';
							}
						echo '</form>
						</td>
					</tr>';
				}
			}
				echo '</table>';
		}	
	}
}


?>

<script>
$("#approve").click(function(){
	swal("Approved!", "", "success");
	
});
</script>

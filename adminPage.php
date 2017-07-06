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
					echo '<td>';
					if ($status=='PENDING') {
						echo "<button class='action mid btn-success' name='approve' id='$id' onclick='approve(this.id)'>Approve</button><br>";
						echo "<button class='action btn-danger' name='delete' id='$id' onclick='erase(this.id)'>Delete</button>";
					} else {
						echo "<button class='action mid btn-default' name='pending' id='$id' onclick='pending(this.id)'>Pending</button><br>";
						echo "<button class='action btn-danger' name='delete' id='$id' onclick='erase(this.id)'>Delete</button>";
					}
					echo '</td>
				</tr>';
			}
		}
			echo '</table>';
	}	
}
}

?>


<script>
function approve(id){
    $.post("approve.php?id="+id,
    {},
    function(data, status){
    	swal({
			title: "Approved!",
			type: "success",
			closeOnConfirm: true,
	    },
	    function(){
			location.reload();
	    });
	});
};

function pending(id){
    $.post("pending.php?id="+id,
    {},
    function(data, status){
    	swal({
			title: "Pending!",
			type: "success",
			closeOnConfirm: true,
	    },
	    function(){
			location.reload();
	    });
	});
};

function erase(id){
	swal({
    	title: "Are you sure?",
        text: "You will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                id: id,
            },
            dataType: "html",
            success: function () {
                swal({
                	title: "Done!", 
                	text: "It was succesfully deleted!",
                	type: "success"},
                	function(){ 
				       location.reload();
				   }
                );
            },
        });
    });
}


</script>
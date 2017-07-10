<?php 
function get_title() {
	echo "Account - Book Musketeers";
}

function display_content() {
	require 'connection.php';
	$username = $_SESSION['username'];
	$em_display = $_SESSION['email'];
	$message = '';

	$sql = "SELECT * FROM users WHERE username='$username'";
	$retrieve = mysqli_query($connect,$sql);

	while ($row=mysqli_fetch_assoc($retrieve)) {
		$checkpw = $row['password'];

		if (isset($_POST['changepw'])) {
			$oldpw = sha1($_POST['oldpw']);
			$newpw = sha1($_POST['newpw']);
			$retype = sha1($_POST['retype']);

			if ($oldpw=='' || $newpw=='' || $retype=='') {
				$message = "Failed password change.";
			} else {
				if ($oldpw == $checkpw && $newpw == $retype) {
				$update = "UPDATE users SET password='$newpw', date=date WHERE username='$username'";
				mysqli_query($connect,$update);

				$message = "Password successfully changed.";
				} else {
					$message = "Passwords did not match.";
				}
			}
		}

		if (isset($_POST['change_email'])) {
			$new_email = $_POST['new_email'];

			$update_em = "UPDATE users SET email='$new_email', date=date WHERE username='$username'";
			mysqli_query($connect,$update_em);

			$message = "Email successfully changed.";
			$_SESSION['email'] = $new_email;
			$em_display = $_SESSION['email'];
		}
	}

		
	echo '
	<form method="POST">
	<h2>Account Settings</h2>
		<ul class="form-signup divide">
			<h4>Sign In Info</h4>
			<li><label>Username</label>
				<input type="text" value="'.$username.'" readonly></li><br>

			<h4>Change Email</h4>
			<li><label>Email</label>
				<input type="email" name="new_email" value="'.$em_display.'"></li>

			<li><input type="submit" name="change_email" value="Submit"></li><br>

			<h4>Change Password</h4>
			<li><label>Old Password</label>
			<input type="password" name="oldpw"></li>

			<li><label>New Password</label>
			<input type="password" name="newpw"></li>

			<li><label>Retype New Password</label>
			<input type="password" name="retype"></li>

			<li><input type="submit" name="changepw" value="Submit"></li>
		</ul>
	</form>'.$message;
}

require_once 'template.php';

?>
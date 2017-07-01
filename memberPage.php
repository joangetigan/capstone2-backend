<?php 
function get_title() {
	echo "Member Page - Book Musketeers";
}

function display_content() {

echo '
<h2 style="margin-bottom:40px">Welcome back, '.$_SESSION['firstname'].'.</h2>

<div class="memberpage">
	<h4>Titles you\'ve saved.</h4>
</div>
';

}

require_once 'template.php';

?>
<?php 
function get_title() {
	echo "Book Musketeers";
}

function display_content() {
	echo '
	<h2>New York Times Best Sellers</h2>
    <div class="bestseller">
        <img src="images/camino.jpg" alt="camino" class="book">
        <img src="images/franken.jpg" alt="franken" class="book">
        <img src="images/hidden.jpg" alt="hidden" class="book">
        <img src="images/zookeeper.jpg" alt="zookeeper" class="book">
        <img src="images/identical.jpg" alt="identical" class="book">
    </div>
    <h2>One book for all. All books for one</h2>
    <h4>NO membership fee.</h4>
    <h4>Share a book and read ALL the others.</h4>
    <h4>Virtual library at your fingertips.</h4>
    <a href="register.php"><button class="signup">SIGN UP NOW</button></a>
    ';
}

require_once 'template.php';

?>
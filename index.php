<?php 
function get_title() {
	echo "Book Musketeers";
}

function display_content() {
	echo '
	<h2>New York Times Best Sellers</h2>
    <div class="bestseller">
        <img src="images/ebook1.jpg" alt="ebook1" class="book">
        <img src="images/ebook2.jpg" alt="ebook2" class="book">
        <img src="images/ebook3.jpg" alt="ebook3" class="book">
        <img src="images/ebook4.jpg" alt="ebook4" class="book">
        <img src="images/ebook5.jpg" alt="ebook5" class="book">
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
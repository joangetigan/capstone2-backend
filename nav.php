<?php 
require_once 'login.php';
 ?>

 <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                <!-- browse button with sidenav -->
                <button class="col-md-2 openbtn navs">Browse Titles</button>
                <div id="mySidenav" class="sidenav">
                    <button class="closebtn">&times;</button>
                    <h3>BOOK<br>MUSKETEERS</h3>
                    <form method="POST" action="browse.php">
                        <h4>BROWSE BY</h4>
                        <input type="radio" name="select" value="author"> Author<br>
                        <input type="radio" name="select" value="title"> Title<br><br>
                        <div class="search_outer">
                            <input type="text" class="search_input" placeholder="Search" name="query" autocomplete="off" aria-label="Search">
                        </div><br>
                        <span class='form-signup'><input type='submit' name='browse' value='Submit'></span>
                    </form>
                    <hr>
                    <form method="POST" action="browse.php">
                        <h4>BROWSE BY</h4>
                        <input type="radio" name="choose" value="fiction"> Fiction<br>
                        <input type="radio" name="choose" value="nonfic"> Non-fiction<br><br>
                        <span class='form-signup'><input type='submit' name='type' value='Submit'></span>
                        <hr>
                        <button class="see-all" name="see-all">SEE ALL TITLES</button>
                    </form>
                    <div class='nav-social'>
                        <img src='images/facebook.png' alt='facebook' class='icon'>
                        <img src='images/twitter.png' alt='twitter' class='icon'>
                        <img src='images/pinterest.png' alt='pinterest' class='icon'>
                    </div>
                </div>

                <!-- brand -->
                <a class="navbar-brand col-md-8" href="index.php">BOOK MUSKETEERS</a>

                <!-- login button with dropdown -->
                <div class="col-md-2 dropdown navbar-right navs">
                    <?php 
                    if(!isset($_SESSION['is_logged_in'])) {
                        echo "<a class='dropdown-toggle' href='#' data-toggle='dropdown'><button><span class='glyphicon glyphicon-log-in'></span>&nbsp&nbsp&nbsp Login</button></a>
                            <div class='dropdown-menu'>
                                <form method='POST'>
                                    <ul class='form-login'>
                                        <li>
                                            <label>USERNAME</label><input type='text' name='username'>
                                        </li>
                                        <li>
                                            <label>PASSWORD</label><input type='password' name='password'>
                                        </li>   
                                        <li>
                                            <input type='submit' name='login' value='Submit'/>
                                        </li>
                                        <li>
                                            <a href='register.php'>Not yet a member?</a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>";
                    } else {
                        echo "
                            <a href='memberPage.php'><i class='fa fa-bookmark-o fa-lg' aria-hidden='true'></i>&nbsp&nbspSaved</a>&nbsp&nbsp&nbsp&nbsp&nbsp
                            <span class='dropdown-toggle' href='#' data-toggle='dropdown'>
                                <i class='fa fa-user-circle-o fa-2x' aria-hidden='true'></i>&nbsp
                                <i class='fa fa-angle-down' aria-hidden='true'></i>
                            </span>
                            <div class='dropdown-menu'>
                                <form method='POST'>
                                    <ul class='form-login'>
                                        <li>
                                            <h4 style='margin-bottom:20px'>Hi, ".$_SESSION['firstname']."!</h4>
                                        </li>
                                        <li>
                                            <a href='account.php'><h4>Account Settings</h4></a>
                                        </li>   
                                        <li>
                                            <a href='logout.php'><h4>Sign out</h4></a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>";
                    }
                    ?>

            </div>
        </div>
    </nav>
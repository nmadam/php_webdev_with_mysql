<?php
//Generate the navigation menu
echo '<hr />';
echo "<div class='container'>";
    echo "<ul class='nav nav-tabs'>";
    if (isset($_SESSION['username'])) {
        echo "<li class='active'><a href='index.php'>Home</a></li>";
        echo "<li class='active'><a href='logexercise.php'>Log Exercise</a></li>";
        echo "<li class='active'><a href='viewprofile.php'>View Profile</a></li>";
        echo "<li class='active'><a href='editprofile.php'>Edit Profile</a></li>";
        echo "<li class='active'>";
        echo '<a href="logout.php">Log Out (' . $_SESSION['username'] . ') </a>';
        echo "</li>";
        
    }
    else {
        echo "<li class='active'><a href='login.php'>Log In</a></li>";
        echo "<li class='active'><a href='signup.php'>Sign Up</a></li>";
    } 
    echo "</ul>";
    echo "</div>";
echo "</div>";
?>
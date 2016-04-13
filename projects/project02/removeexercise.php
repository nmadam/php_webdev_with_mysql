<?php
  require_once('startsession.php');
    
    $page_title='View Profile';
    require_once('header.php');
    
    require_once('appvars.php');
    require_once('connectvars.php');

    require_once('navmenu.php');

    // Make sure the user is logged in before going any further.
    if (!isset($_SESSION['user_id'])) {
        echo '<p class="text-danger">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    }
    else {
        echo('<p class="text-info">You are logged in as ' . $_SESSION['username'] . '.</p>');
    }
   
    if (isset($_GET['user_id']) && isset($_GET['exercise_date']) && isset($_GET['exercise_type']) && isset($_GET['exercise_time_in_minutes']) && isset($_GET['exercise_heart_rate'])) {
        // Grab the exercise data from the GET
        $user_id = $_GET['user_id'];
        $exercise_date = $_GET['exercise_date'];
        $exercise_type = $_GET['exercise_type'];
        $exercise_time_in_minutes = $_GET['exercise_time_in_minutes'];
        $exercise_heart_rate = $_GET['exercise_heart_rate'];
    }
    else if (isset($_POST['user_id']) && isset($_POST['exercise_date']) && isset($_POST['exercise_type']) && isset($_POST['exercise_time_in_minutes'])) {
        $user_id = $_POST['user_id'];
        $exercise_date = $_POST['exercise_date'];
        $exercise_type = $_POST['exercise_type'];
        $exercise_time_in_minutes = $_POST['exercise_time_in_minutes'];
    }
    else {
        echo '<p class="text-danger">Sorry, no exercise data was specified for removal.</p>';
    }

    if (isset($_POST['submit'])) {
        if ($_POST['confirm'] == 'Yes') {
         
        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

        // Delete the exercise data from the database
        $query = "DELETE FROM exercise_log WHERE user_id = $user_id LIMIT 1";
        mysqli_query($dbc, $query);
        mysqli_close($dbc);

        // Confirm success with the user
        echo '<p>The exercise for ' . $exercise_date . ' type ' . $exercise_type . ' was successfully removed.';
    }
    else {
      echo '<p class="text-danger">The exercise data was not removed.</p>';
    }
    }
    else if (isset($user_id) && isset($exercise_date) && isset($exercise_type) && isset($exercise_time_in_minutes)) {
        echo "<div class = 'container'>";
        echo '<p>Are you sure you want to delete the following exercise?</p>';
        echo '<p><strong>Exercise Date: </strong>' . $exercise_date . '<br /><strong>Exercise Type: </strong>' . $exercise_type .
        '<br /><strong>Exercise Time: </strong>' . $exercise_time_in_minutes . '</p>';
        echo '<form method="post" action="removeexercise.php">';
        echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="submit" value="Submit" name="submit" />';
        echo '<input type="hidden" name="user_id" value="' . $user_id . '" />';
        echo '<input type="hidden" name="exercise_date" value="' . $exercise_date . '" />';
        echo '<input type="hidden" name="exercise_type" value="' . $exercise_type . '" />';
        echo '<input type="hidden" name="exercise_time_in_minutes" value="' . $exercise_time_in_minutes . '" />';
        echo '</form>';
        echo "</div>";
    }

    echo '<p><a href="viewprofile.php">Back to the view profile page</a></p>';
?>


<?php
    // Insert the page footer
    require_once('footer.php');
?>
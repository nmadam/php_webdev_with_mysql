<?php
    require_once('startsession.php');
    
    $page_title='Log New Exercise!';
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
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Grab the data needed for calories burned calculation from database
    if (!isset($_GET['user_id'])) {
        $query = "SELECT user_gender, user_birthdate, user_weight FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
    }
    else {
        $query = "SELECT user_gender, user_birthdate, user_weight FROM exercise_user WHERE user_id = '" . $_GET['user_id'] . "'";
    }
    $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $user_gender = $row['user_gender'];
            $user_birthdate = $row['user_birthdate'];
            $user_weight = $row['user_weight'];
        }
        
    mysqli_close($dbc);
?>
            
<?php
    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (isset($_POST['submit'])) {
        //Grab the exercise data from the post
        $exercise_type = mysqli_real_escape_string($dbc, trim($_POST['type']));
        $exercise_date = mysqli_real_escape_string($dbc, trim($_POST['date']));
        $exercise_time_in_minutes = mysqli_real_escape_string($dbc, trim($_POST['time']));
        $exercise_heart_rate = mysqli_real_escape_string($dbc, trim($_POST['heart_rate']));
        $age = (date('Y') - date('Y',strtotime($user_birthdate)));
        if ($user_gender == 'M') { 
            $calories_burned = (ceil(((-55.0969 + (0.6309 * $exercise_heart_rate) + (0.090174 * $user_weight) + (0.2017 * $age)) / 4.184) * $exercise_time_in_minutes));
        }
        else if ($user_gender == 'F') {
            $calories_burned = (ceil(((-20.4022 + (0.4472 * $exercise_heart_rate) - (0.057288 * $user_weight) + (0.074 * $age)) / 4.184) * $exercise_time_in_minutes));
        }
    }
    
    // Update the exercise data in the database
    if (!empty($exercise_type) && !empty($exercise_date) && is_numeric($exercise_time_in_minutes) && is_numeric($exercise_heart_rate)) {
            $query = "INSERT INTO exercise_log (user_id, exercise_date, exercise_type, exercise_time_in_minutes, exercise_heart_rate, calories_burned) VALUES ('$_SESSION[user_id]', '$exercise_date', '$exercise_type',  $exercise_time_in_minutes, $exercise_heart_rate, $calories_burned)";
            mysqli_query($dbc, $query);
    
        // Confirm success with the user
        echo "<div class='container'>";
        echo "<h4>Your exercise has been successfully added.</h4>";
        echo '<h4>The amount of calories you burned: ' . $calories_burned . '</h4>';
        echo "</div>";

        mysqli_close($dbc);
        exit();
    }
?>

<!--Display the form-->
<div class = "container">
    <p class="text-info">Log Your New Exercise!</p>
</div>

<div class = "container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="type">Type of Exercise:</label>
            <div class="row">
                    <div class="col-md-5">
                        <select class="form-control" name="type">
                        <option value="Running">Running</option>
                        <option value="Walking">Walking</option>
                        <option value="Swimming">Swimming</option>
                        <option value="Pilates">Pilates</option>
                        <option value="Yoga">Yoga</option>
                        <option value="Resistance Training">Resistance Training</option>
                    </select><br />
                    </div>
            </div>
        </div>
        <div class="form-group">
            <label for="date">Date of Exercise:</label>
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="date" value="<?php if (!empty($exercise_date)) echo $exercise_date; ?>" /><br />
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="time">Time (in minutes):</label>
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="time" value="<?php if (!empty($exercise_time_in_minutes)) echo $exercise_time_in_minutes; ?>" /><br />
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="heart_rate">Average Heart Rate:</label>
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="heart_rate" value="<?php if (!empty($exercise_heart_rate)) echo $exercise_heart_rate; ?>" /><br />
                    </div>
                </div>
        </div>
        
        <input type="submit" value="Log Exercise" name="submit" />
    </form>
</div>


<?php
    //Insert the page footer
    require_once('footer.php');
?>
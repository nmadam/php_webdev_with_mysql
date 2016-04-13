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

    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Grab the profile data from the database
    if (!isset($_GET['user_id'])) {
        $query = "SELECT username, user_first_name, user_last_name, user_gender, user_birthdate, user_weight, picture FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
    }
    else {
        $query = "SELECT username, user_first_name, user_last_name, user_gender, user_birthdate, user_weight, picture FROM exercise_user WHERE user_id = '" . $_GET['user_id'] . "'";
    }
    $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
            // The user row was found so display the user data
            $row = mysqli_fetch_array($data);
            $user_gender = $row['user_gender'];
            $user_birthdate = $row['user_birthdate'];
            $user_weight = $row['user_weight'];
            
            echo "<div class='container'>";
            echo "<h3>Profile Information</h3>";
            echo "<table class='table'>";
    
            if (!empty($row['username'])) {
                echo '<tr><td class="text-muted">Username:  </td><td>' . $row['username'] . '</td></tr>';
            }
            if (!empty($row['user_first_name'])) {
                echo '<tr><td class="text-muted">First name:  </td><td>' . $row['user_first_name'] . '</td></tr>';
            }
            if (!empty($row['user_last_name'])) {
                echo '<tr><td class="text-muted">Last name:  </td><td>' . $row['user_last_name'] . '</td></tr>';
            }
            if (!empty($row['user_gender'])) {
                echo '<tr><td class="text-muted">Gender:  </td><td>';
                if ($row['user_gender'] == 'M') {
                    echo 'Male';
                }
                else if ($row['user_gender'] == 'F') {
                    echo 'Female';
                }
                else {
                    echo '?';
                }
                echo '</td></tr>';
            }
            if (!empty($row['user_birthdate'])) {
                if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
                    // Show the user their own birthdate
                    echo '<tr><td class="text-muted">Birthdate:  </td><td>' . $row['user_birthdate'] . '</td></tr>';
                }
                else {
                    // Show only the birth year for everyone else
                    list($year, $month, $day) = explode('-', $row['user_birthdate']);
                    echo '<tr><td class="text-muted">Year born:  </td><td>' . $year . '</td></tr>';
                }
            }
            if (!empty($row['user_weight'])) {
                if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
                    // Show the user their own weight
                    echo '<tr><td class="text-muted">Weight:  </td><td>' . $row['user_weight'] . '</td></tr>';
                }
            }
            if (!empty($row['picture'])) {
                echo '<tr><td class="text-muted">Picture:  </td><td><img src="' . MM_UPLOADPATH . $row['picture'] .
                        '" class="img-circle" alt="Profile Picture"   /></td></tr>';
            }
            echo '</table>';
            echo "</div>";
        
    } // End of check for a single row of user results
    else {
        echo '<p class="text-danger">There was a problem accessing your profile.</p>';
    }

    mysqli_close($dbc);
?>

<?php
// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Grab the exercise information from the database
if (!isset($_GET['user_id'])) {
        $query = "SELECT exercise_date, exercise_type, exercise_time_in_minutes, exercise_heart_rate  FROM exercise_log WHERE user_id = '" . $_SESSION['user_id'] . "'ORDER BY exercise_date DESC LIMIT 15";
    }
    else {
        $query = "SELECT exercise_date, exercise_type, exercise_time_in_minutes, exercise_heart_rate FROM exercise_log WHERE user_id = '" . $_GET['user_id'] . "'ORDER BY exercise_date DESC LIMIT 15";
    }
    $data = mysqli_query($dbc, $query);
    
    //display table header of exercise information
    echo "<div class='container'>";
    echo "<h3>Exercise Log</h3>";
    echo "<table class='table'>";
    echo "<thead>";
        echo "<tr>";
            echo "<th>Date</th>";
            echo "<th>Type</th>";
            echo "<th>Time in Minutes</th>";
            echo "<th>Heart Rate</th>";
            echo "<th>Calories Burned</th>";
        echo "</tr>";
    echo "</thead>";
    
    //Retrieve exercise information to be displayed in a table
    while($row = mysqli_fetch_array($data)) {
        $exercise_date = $row['exercise_date'];
        $exercise_type = $row['exercise_type'];
        $exercise_time_in_minutes = $row['exercise_time_in_minutes'];
        $exercise_heart_rate = $row['exercise_heart_rate'];
        $age = (date('Y') - date('Y',strtotime($user_birthdate)));
        if ($user_gender == 'M') { 
            $calories_burned = (ceil(((-55.0969 + (0.6309 * $exercise_heart_rate) + (0.090174 * $user_weight) + (0.2017 * $age)) / 4.184) * $exercise_time_in_minutes));
        }
        else if ($user_gender == 'F') {
            $calories_burned = (ceil(((-20.4022 + (0.4472 * $exercise_heart_rate) - (0.057288 * $user_weight) + (0.074 * $age)) / 4.184) * $exercise_time_in_minutes));
        }
        
        echo "<tbody>";
            echo "<tr>";
                echo "<td>$exercise_date</td>";
                echo "<td>$exercise_type</td>";
                echo "<td>$exercise_time_in_minutes</td>";
                echo "<td>$exercise_heart_rate</td>";
                echo "<td>$calories_burned</td>";
                echo '<td><a href="removeexercise.php?user_id=' .$_SESSION['user_id'] . '&amp;exercise_date=' . $exercise_date .
                        '&amp;exercise_type=' . $exercise_type . '&amp;exercise_time_in_minutes=' . $exercise_time_in_minutes .
                        '&amp; exercise_heart_rate=' . $exercise_heart_rate . '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';
            echo "</tr>";
        echo "</tbody>";
    }
    echo "</table>";
    echo "</div>";
    
    mysqli_close($dbc);
?>

<?php
    // Insert the page footer
    require_once('footer.php');
?>
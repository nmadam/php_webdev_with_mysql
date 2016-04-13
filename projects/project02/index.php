<?php 
    //Start the session
    require_once('startsession.php');

    //Insert the page header
    $page_title = 'Where it all begins!';
    require_once('header.php');
    
    //Application and connection variables
    require_once('appvars.php');
    require_once('connectvars.php');
    
    //Show the navigation menu
    require_once('navmenu.php');
    
    //Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    // Retrieve the user data from MySQL
    $query = "SELECT user_id, user_first_name, picture FROM exercise_user WHERE user_first_name IS NOT NULL ORDER BY user_first_name ASC";
    $data = mysqli_query($dbc, $query);

    // Loop through the array of user data
    echo '<h4>Team Exercise Members:</h4>';
    echo '<table>';
    while ($row = mysqli_fetch_array($data)) {
        if (is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH. $row['picture']) > 0) {
            echo '<tr><td><img src="' . MM_UPLOADPATH . $row['picture'] . '" class="img-thumbnail" alt="' . $row['user_first_name'] . '" /></td>';
        }
        else {
            echo '<tr><td><img src="' . MM_UPLOADPATH . 'nopic.jpg' . '" class="img-thumbnail" alt="' . $row['user_first_name'] . '" /></td>';
        }
        
        if (isset($_SESSION['user_id'])) { 
            echo '<td><a href="viewprofile.php?user_id=' . $row['user_id'] . '">' . $row['user_first_name'] . 
                    '</a></td></tr>';
        }
        else {
            echo '<td>' . $row['user_first_name'] . '</td></tr>';
        }
    }
    echo '</table>';
    
    mysqli_close($dbc);
?>

<?php
    //Insert the page footer
    require_once('footer.php');
?>

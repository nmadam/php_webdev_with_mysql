<?php
    require_once('startsession.php');
    
    $page_title='Sign Up';
    require_once('header.php');
    
    require_once('appvars.php');
    require_once('connectvars.php');
    
    require_once('navmenu.php');
    
    //Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    
    if (isset($_POST['submit'])) {
        //Grab the profile data from the POST
        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
        
        if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
            //Check for duplicate registration
            $query = "SELECT * FROM exercise_user WHERE username = '$username'";
            $data = mysqli_query($dbc, $query);
            if (mysqli_num_rows($data) == 0) {
                //Username is unique, insert user into database
                $query = "INSERT INTO exercise_user (username, password) VALUES ('$username', SHA('$password1'))";
                
                mysqli_query($dbc, $query);
                
                //Confirm success with the user
                echo '<p>Your new account has been successfully created. You\'re now ready to log in and <a href="login.php">edit your profile</a>.</p>';
                
                mysqli_close($dbc);
                exit();
            }
            else {
                // An account already exists for this username, so display an error message
                echo '<p class="text-danger">An account already exists for this username. Please use a different username.</p>';
                $username = ""; 
            }
        }
        else {
            echo '<p class="text-danger">You must enter all of the sign-up data, including the desired password twice.</p>';
             $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        }
    }
    
    mysqli_close($dbc);
?>

<!--Display the form-->
<div class = "container">
    <p class="text-info">Please enter your username and desired password to sign up on Exercise Logger.</p>
</div>

<div class = "container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="username">User Name:</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="password1">Password:</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="password" class="form-control" name="password1">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="password2">Re-enter Password:</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="password" class="form-control" name="password2">
                </div>
            </div>
        </div>
    <input type="submit" value="Sign Up" name="submit" />
    </form>
</div>
<?php
    //Insert page footer
    require_once('footer.php');
?>
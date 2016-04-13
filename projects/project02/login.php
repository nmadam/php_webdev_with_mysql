<?php

    require_once('startsession.php');
   
    require_once('connectvars.php');
   
    // Clear the error message
    $error_msg = "";
    
    //If the user isn't logged in, try to log them in
    if (!isset($_SESSION['user_id'])) {
        if (isset($_POST['submit'])) {
            //Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
            //Grab the user-entered login data
            $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
            if (!empty($username) && !empty($password)) {
                //Look up the username and password in the database
                $query = "SELECT user_id, username FROM exercise_user WHERE username = '$username' AND password = SHA('$password')";
                $data = mysqli_query($dbc, $query);
                
                if (mysqli_num_rows($data) == 1) {
                    //The login is OK so set the user_id and username session vars (and cookies), and redirect to the home page 
                    $row = mysqli_fetch_array($data);
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                    setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                    header('Location: ' . $home_url);
                }
                else {
                    //The username/password are incorrect so set an error message
                    $error_msg = '****Sorry, you must enter a valid username and password to log in.';
                }
            }
            else {
                //The username/password weren't entered so set an error message
                $error_msg = 'Sorry, you must enter your username and password to log in.';
            }
        }
    }
?>

<?php
    // Insert the page header
    $page_title='Log In';
    require_once('header.php');

    // If the session variable is empty, show any error message and the log-in form; otherwise confirm the log-in
    if (empty($_SESSION['user_id'])) {
        echo '<p class="text-danger">' . $error_msg . '</p>';
?>

<!--Display the form-->
<div class = "container">
    <p class="text-info">Please enter your username and password to log onto Exercise Logger.</p>
</div>

<div class = "container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="username">User Name:</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
        </div>
    <input type="submit" value="Log In" name="submit" />
    </form>
</div>

<?php
    }
    else {
        // Confirm the successful log-in
        echo('<p class="text-info">You are logged in as ' . $_SESSION['username'] . '.</p>');
    }
?>

<?php
    // Insert the page footer
    require_once('footer.php');
?>

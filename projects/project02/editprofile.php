<?php
    require_once('startsession.php');
    
    $page_title='Edit Profile';
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
    
    //Grab data from the user input form
    if (isset($_POST['submit'])) {
        // Grab the profile data from the POST
        $user_first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
        $user_last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
        $user_gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
        $user_birthdate = mysqli_real_escape_string($dbc, trim($_POST['birthdate']));
        $user_weight = mysqli_real_escape_string($dbc, trim($_POST['weight']));
        $old_picture = mysqli_real_escape_string($dbc, trim($_POST['old_picture']));
        $picture = mysqli_real_escape_string($dbc, trim($_FILES['picture']['name']));
        $picture_type = $_FILES['picture']['type'];
        $picture_size = $_FILES['picture']['size'];
        
        if (!empty($picture)) {
            list($picture_width, $picture_height) = getimagesize($_FILES['picture']['tmp_name']);
        }
        $error = false;

        // Validate and move the uploaded picture file, if necessary
        if (!empty($picture)) {
            if ((($picture_type == 'image/gif') || ($picture_type == 'image/jpeg') || ($picture_type == 'image/pjpeg') ||
                    ($picture_type == 'image/png')) && ($picture_size > 0) && ($picture_size <= MM_MAXFILESIZE) &&
                    ($picture_width <= MM_MAXIMGWIDTH) && ($picture_height <= MM_MAXIMGHEIGHT)) {
                if ($_FILES['file']['error'] == 0) {
                    // Move the file to the target upload folder
                    $target = MM_UPLOADPATH . basename($picture);
                    if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {
                        // The new picture file move was successful, now make sure any old picture is deleted
                        if (!empty($old_picture) && ($old_picture != $picture)) {
                            @unlink(MM_UPLOADPATH . $old_picture);
                        }
                    }
                    else {
                        // The new picture file move failed, so delete the temporary file and set the error flag
                        @unlink($_FILES['picture']['tmp_name']);
                        $error = true;
                        echo '<p class="error">Sorry, there was a problem uploading your picture.</p>';
                    }
                }
            }
            else {
                // The new picture file is not valid, so delete the temporary file and set the error flag
                @unlink($_FILES['picture']['tmp_name']);
                $error = true;
                echo '<p class="text-danger">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024) .
                        ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';
            }
        }

        // Update the profile data in the database
        if (!$error) {
            if (!empty($user_first_name) && !empty($user_last_name) && !empty($user_gender) && !empty($user_birthdate) && is_numeric($user_weight)) {
                // Only set the picture column if there is a new picture
                if (!empty($picture)) {
                    $query = "UPDATE exercise_user SET user_first_name = '$user_first_name', user_last_name = '$user_last_name', user_gender = '$user_gender', " .
                            " user_birthdate = '$user_birthdate', user_weight = '$user_weight', picture = '$picture' WHERE user_id = '" . $_SESSION['user_id'] . "'";
                }
                else {
                    $query = "UPDATE exercise_user SET user_first_name = '$user_first_name', user_last_name = '$user_last_name', user_gender = '$user_gender', " .
                            " user_birthdate = '$user_birthdate', user_weight = '$user_weight' WHERE user_id = '" . $_SESSION['user_id'] . "'";
                }
                mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Your profile has been successfully updated. Would you like to <a href="viewprofile.php">view your profile</a>?</p>';

            mysqli_close($dbc);
            exit();
            }
            else {
                echo '<p class="text-danger">You must enter all of the profile data (the picture is optional).</p>';
            }
        }
    } // End of check for form submission
    else {
        // Grab the profile data from the database
        $query = "SELECT user_first_name, user_last_name, user_gender, user_birthdate, user_weight, picture FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $data = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($data);

        if ($row != NULL) {
            $user_first_name = $row['user_first_name'];
            $user_last_name = $row['user_last_name'];
            $user_gender = $row['user_gender'];
            $user_birthdate = $row['user_birthdate'];
            $user_weight = $row['user_weight'];
            $old_picture = $row['picture'];
        }
        else {
            echo '<p class="text-danger">There was a problem accessing your profile.</p>';
        }
    }
    mysqli_close($dbc);
?>

<!--Display the form-->
<div class = "container">
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
    <legend>Personal Information</legend>
    <div class="form-group">
        <label for="firstname">First name:</label>
        <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="firstname" value="<?php if (!empty($user_first_name)) echo $user_first_name; ?>" /><br />
                </div>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname">Last name:</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="lastname" value="<?php if (!empty($user_last_name)) echo $user_last_name; ?>" /><br />
                </div>
            </div>
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
            <div class="row">
                <div class="col-md-5">
                    <select class="form-control" name="gender">
                        <option value="M" <?php if (!empty($user_gender) && $user_gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
                        <option value="F" <?php if (!empty($user_gender) && $user_gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
                    </select><br />
                </div>
            </div>
    </div>
    <div class="form-group">
        <label for="birthdate">Birthdate:</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="birthdate" value="<?php if (!empty($user_birthdate)) echo $user_birthdate; else echo 'YYYY-MM-DD'; ?>" /><br />
                </div>
            </div>
    </div>
    <div class="form-group">
        <label for="weight">Weight (in pounds):</label>
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="weight" value="<?php if (!empty($user_weight)) echo $user_weight; ?>" /><br />
                </div>
            </div>
    </div>
    <div class="form-group">
            <input type="hidden" name="old_picture" value="<?php if (!empty($old_picture)) echo $old_picture; ?>" />
    </div>
    <div class="form-group">
        <label for="picture">Picture:</label>
        <div class="row">
                <div class="col-md-3">
                    <input type="file" class="form-control" name="picture" />
                </div>
            </div>
    </div>
    <?php if (!empty($old_picture)) {
        echo '<img class="profile" src="' . MM_UPLOADPATH . $old_picture . '" alt="Profile Picture" />';
    } ?>
    
    <input type="submit" value="Save Profile" name="submit" />
    </form>
</div>

<?php
    //Insert the page footer
    require_once('footer.php');
?>
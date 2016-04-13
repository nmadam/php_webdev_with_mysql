<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Stool Collection - Add Your Stool</title>
</head>
  <body>
    <h2>Stool Collection - Add Your Stool</h2>
 
    <?php
        require_once('appvars.php');
        require_once('connectvars.php');
   
        if (isset($_POST['submit'])) 
        {
            // Grab the stool data from the POST and the file info as well
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];
            $image_type = $_FILES['image']['type'];
            $image_size = $_FILES['image']['size']; 
   
            if (!empty($description) && !empty($image)) 
            {
                if ((($image_type == 'image/gif') || ($image_type == 'image/jpeg') || ($image_type == 'image/pjpeg') || ($image_type == 'image/png'))
                        && ($image_size > 0) && ($image_size <= SC_MAXFILESIZE)) 
                {
                    if ($_FILES['image']['error'] == 0) 
                    {
                        // Move the file to the target upload folder
                        $target = SC_UPLOADPATH . $image;
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
                        {
                            // Connect to the database
                            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                                    or die("Error connecting to DB_NAME server.");
   
                            // Write the data to the database
                            $query = "INSERT INTO stoolCollection VALUES (0, NOW(), '$description', '$image')";
                            mysqli_query($dbc, $query)
                                    or die("Error querying DB_NAME.");
   
                            // Confirm success with the user
                            echo '<p>Thanks for adding your stool! It will be added to the list of interesting stools.</p>';
                            echo '<p><strong>Description:</strong> ' . $description . '<br />';
                            echo '<img src="' . SC_UPLOADPATH . $image . '" alt="Stool image" /></p>';
                            echo '<p><a href="index.php"><< Back to the list of interesting stools</a></p>';
   
                            // Clear the stool data to clear the form
                            $description = "";
                            $image = "";
   
                            mysqli_close($dbc);
                        }
                        else
                        {
                            echo '<p class="error">Sorry, there was a problem uploading your stool image.</p>';
                        }
                    }
                }
                else
                {
                    echo '<p class="error">The stool image must be a GIF, JPEG, or PNG image file no greater than ' . (SC_MAXFILESIZE / 1024) . ' KB in size.</p>';
                }
   
                // Try to delete the temporary screen shot image file
                //@unlink($_FILES['image']['tmp_name']);
                if(file_exists($_FILES['image']['tmp_name']))
                {
                    unlink($_FILES['image']['tmp_name']);
                }
            }
            else
            {
                echo '<p class="error">Please enter all of the information to add your stool.</p>';
            }
        }
    ?>
 
    <hr />
    <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo SC_MAXFILESIZE; ?>" />
      <label for="name">Description:</label>
      <input type="text" id="description" name="description" value="
        <?php 
            if (!empty($description))
            {
                 echo $description; 
            }
        ?>
      "/><br />
      <label for="image">Stool image:</label>
      <input type="file" id="image" name="image" />
      <hr />
      <input type="submit" value="Add" name="submit" />
    </form>
  </body> 
</html>
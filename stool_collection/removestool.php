<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Stool Collection - Remove a Stool</title>
  </head>
  <body>
    <h2>Stool Collection - Remove a Stool</h2>
 
    <?php
 
        require_once('appvars.php');
        require_once('connectvars.php');
 
        if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['description']) && isset($_GET['image'])) 
        {
            // Grab the stool data from the GET
            $id = $_GET['id'];
            $date = $_GET['date'];
            $description = $_GET['description'];
            $image = $_GET['image'];
        }
        else if (isset($_POST['id']) && isset($_POST['description'])) 
        {
            // Grab the stool data from the POST
            $id = $_POST['id'];
            $name = $_POST['description'];
        }
        else
        {
            echo '<p class="error">Sorry, no stool was specified for removal.</p>';
        }
 
        if (isset($_POST['submit'])) 
        {
 
            // Confirmed, OK to delete
            if ($_POST['confirm'] == 'Yes') 
            {
                // Connect to the database
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                      or die("Error connecting to DB_NAME server.");
 
                $query = "SELECT image FROM stoolCollection WHERE id = $id LIMIT 1";
                $data = mysqli_query($dbc, $query)
                      or die("Some Error querying DB_NAME.");
 
                $row = mysqli_fetch_array($data);
 
                // Delete the screen shot image file from the server
                @unlink(SC_UPLOADPATH . $row['image']);
 
                // Delete the stool data from the database
                $query = "DELETE FROM stoolCollection WHERE id = $id LIMIT 1";
                mysqli_query($dbc, $query)
                      or die("Error querying DB_NAME.");
 
                mysqli_close($dbc);
 
                // Confirm success with the user
                echo '<p>The stool with description ' . $description . ' was successfully removed.';
            }
            else
            {
                echo '<p class="error">The stool was not removed.</p>';
            }
        }
        else if (isset($id) && isset($description) && isset($date)) 
        {
            echo '<p>Are you sure you want to delete the following stool?</p>';
            echo '<p><strong>description: </strong>' . $description . '<br /><strong>Date: </strong>' . $date . '</p>';
            echo '<form method="post" action="removestool.php">';
            echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
            echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
            echo '<input type="submit" value="Submit" name="submit" />';
            echo '<input type="hidden" name="id" value="' . $id . '" />';
            echo '<input type="hidden" name="description" value="' . $description . '" />';
            echo '</form>';
        }
 
        // DEBUG
        echo "id: $id, description: $description, date: $date<br/>";
        // END DEBUG
 
        echo '<p><a href="admin.php"><< Back to admin page</a></p>';
    ?>
 
  </body> 
</html>
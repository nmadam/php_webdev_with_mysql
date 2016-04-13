<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Stool Collection</title>
  </head>
  <body>
    <h2>Stool Collection</h2>
    <p>Welcome to My Stool Collection. If you have a stool to share, feel free to <a href="addstool.php">add one</a>.</p>
    <hr />
 
    <?php
        require_once('appvars.php');
        require_once('connectvars.php');
 
        // Connect to the database 
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die("Error connecting to DB_NAME server.");
 
        // Retrieve the stool collection data from MySQL
        $query = "SELECT * FROM stoolCollection ORDER BY date DESC";
 
        $data = mysqli_query($dbc, $query)
                or die("Error querying DB_NAME.");
 
        // Loop through the array of stool collection data, formatting it as HTML 
        echo "<table border='1px solid;'>";
        echo "<tr><th>Date</th><th>Description</th><th>Image</th></tr>";
 
        $i = 0;
 
        while ($row = mysqli_fetch_array($data))
        { 
            // Display the stool collection data
            echo '<tr><td>' . $row['date'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
 
            if (is_file(SC_UPLOADPATH . $row['image']) && filesize(SC_UPLOADPATH . $row['image']) > 0) 
            {
                echo '<td><img src="' . SC_UPLOADPATH . $row['image'] . '" alt="Stool image" /></td></tr>';
            }
            else
            {
                echo '<td><img src="' . SC_UPLOADPATH . 'genericStool.png' . '" alt="Generic stool image" /></td></tr>';
            }
 
            $i++;
        }
 
        echo '</table>';
 
        mysqli_close($dbc);
    ?>
  </body> 
</html>
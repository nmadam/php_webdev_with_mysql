<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Stool Collection - Stools Administration</title>
  </head>
  <body>
    <h2>Stool Collection - Stools Administration</h2>
    <p>Below is a list of all Stools in the collection. Use this page to remove Stools as needed.</p>
    <hr />
   
    <?php
        require_once('appvars.php');
        require_once('connectvars.php');
   
        // Connect to the database 
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die("Error connecting to DB_NAME server.");
   
        // Retrieve the stool data from MySQL
        $query = "SELECT * FROM stoolCollection ORDER BY date DESC";
        $data = mysqli_query($dbc, $query)
                or die("Error querying DB_NAME.");
   
        // Loop through the array of stool data, formatting it as HTML 
        echo "<table border='1px solid;'>";
   
        while ($row = mysqli_fetch_array($data)) 
        { 
            // Display the stool data
            echo '<tr ><td>' . $row['date'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '<td><a href="removestool.php?id=' . $row['id'] . '&date=' . $row['date'] .
                    '&description=' . $row['description']  . '&image=' . $row['image'] . '">Remove</a></td></tr>';
        }
   
        echo '</table>';
   
        mysqli_close($dbc);
    ?>
   
  </body> 
</html>
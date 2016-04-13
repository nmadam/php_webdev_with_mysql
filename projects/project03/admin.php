<?php
    require_once ('authorize.php');
    
    $page_title='Administer the Blog';
    require_once('header.php');
    require_once('connectvars.php');
    require_once('navmenu.php');

    // Connect to the database 
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

    // Retrieve the blog data
    $query = "SELECT * FROM is_knowledge_blog ORDER BY title ASC, date ASC";
    $result = mysqli_query($dbc, $query);

    // Display the blog data
    echo "<div class='container'>";
        echo "<table class='table'>";
        echo '<h3 class="text-success"><strong>IS Knowledge Blogs</strong></h3>';
        echo "<table class='table'>";
        echo "<thead>";
            echo "<tr>";
                echo '<th class="lead">Date</th>';
                echo '<th class="lead">Title</th>';
                echo '<th class="lead">Blog</th>';
                echo '<th class="lead">Remove</th>';
                echo '<th class="lead">Approve</th>';
            echo "</tr>";
        echo "</thead>";
        while ($row = mysqli_fetch_array($result)) { 
            echo '<tr ><td>' . $row['date'] . '</td>';
            echo '<td>' . $row['title'] . '</td>';
            echo '<td>' . $row['post'] . '</td>';
        
            //embedding the URL which makes it a "GET request"
            echo '<td class="text-justified"><a href="removeblog.php?blog_id=' . $row['blog_id'] . '&amp;date=' . 
                    $row['date'] . '&amp;title=' . $row['title'] . '&amp;post=' . $row['post'] .
                    '"><span class="glyphicon glyphicon-remove"></span></a></td>';
      
            if ($row['approved'] == '0') {
                echo '<td class="text-justified"><a href="approveblog.php?blog_id=' . $row['blog_id'] . '&amp;date=' . 
                        $row['date'] . '&amp;title=' . $row['title'] . '&amp;post=' . $row['post'] .
                        '"><span class="glyphicon glyphicon-ok"></span></a></td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    echo '</div>';

    mysqli_close($dbc);
?>
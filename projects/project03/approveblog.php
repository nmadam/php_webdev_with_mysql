<?<?php
    require_once ('authorize.php');
    
    $page_title='Approve the Blog';
    require_once('header.php');
    require_once('connectvars.php');
    require_once('navmenu.php');

    
    if (isset($_GET['blog_id']) && isset($_GET['date']) && isset($_GET['title'])) {
        //Grab the blog data from the GET
        $blog_id = $_GET['blog_id'];
        $date = $_GET['date'];
        $title = $_GET['title'];
        $post = $_GET['post'];
        
    }
    else if (isset($_POST['blog_id']) && isset($_POST['title']) && isset($_POST['post'])) {
    // Grab the blog data from the POST
        $blog_id = $_POST['blog_id'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $post = $_POST['post'];
    }
    else {
        echo "<div class='container'>";
            echo '<h3 class="text-warning">Sorry, a blog was not specififed for approval.</h3>';
        echo "</div>";
    }
    
    if (isset($_POST['submit'])) {
        if ($_POST['confirm'] == 'Yes') {
            //Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
            //Approve the blog by setting the approved column in the database
            $query = "UPDATE is_knowledge_blog SET approved = 1 WHERE blog_id = $blog_id";
            mysqli_query($dbc, $query);
            mysqli_close($dbc);
            
            //Confirm success with the user
            echo "<div class='container'>";
                echo '<h3 class="text-success">The blog: ' . $title . ' for date ' . $date . ' was successfully approved.</h3>'; 
            echo "</div>";
        }
        else {
            echo "<div class='container'>";
                echo '<h3 class="text-danger">Sorry, there was a problem approving the blog.</h3>';
            echo "</div>";
        }
    }
    else if (isset($blog_id) && isset($title) && isset($date) && isset($post)) {
        echo '<div class = "container">';
            echo '<h3 class = "text-danger">Are you sure you want to approve the following blog?</h3>';
            echo '<p><strong>Title: </strong>' . $title . '<br /><strong>Date: </strong>' . $date .
                    '<br /><strong>Blog: </strong>' . $post . '</p>';
        echo '</div>';
        echo '<div class = "container">';
            echo '<form method="post" action="approveblog.php">';
                echo '<label class="radio-inline">';
                    echo '<input type="radio" name="confirm" value="Yes" />Yes ';
                echo '</label>';
                echo '<label class="radio-inline">';
                    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
                echo '</label>';
                echo '<div>';
                    echo '<br />';
                    echo '<input type="submit" class="btn btn-info" value="Submit" name="submit" />';
                    echo '<input type="hidden" name="blog_id" value="' . $blog_id . '" />';
                    echo '<input type="hidden" name="title" value="' . $title . '" />';
                    echo '<input type="hidden" name="date" value="' . $date . '" />';
                    echo '<input type="hidden" name="post" value="' . $post . '" />';
                    echo '</div>';
                echo '</div>';
            echo '</form>';
        echo '</div>';
    }
    
    echo '<div class = "container">';
        echo '<br />';
        echo '<h4 class="text-info"><a href="admin.php"><kbd>Back to Admin Page</kbd></a></h4>';
    echo '</div>' 
?>?>
</body>
</html>
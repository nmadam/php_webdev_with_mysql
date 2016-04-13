<?php
    $page_title='Blog';
    require_once('header.php');
    require_once('connectvars.php');
    require_once('navmenu.php');
?>
 <!--Display Blog-->
    <div class = "container">
        <br />
        <p class="lead"><strong>Please enter Blog</strong></p>
    </div>

    <div class = "container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="title">Blog Title:</label>
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="blog">Blog:</label>
                <textarea class="form-control" rows="5" name = "post"></textarea>
        </div>
        <input type="submit" class="btn btn-info" value="Enter Blog" name="submit" />
        </form>
    </div>
    
<?php
function insertBlog() {
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to MySQL server.');
        
    $title = $_POST['title'];
    $post = $_POST['post'];
    	
    //Insert blog into database
    $query = "INSERT INTO is_knowledge_blog (title, post)" . 
                "VALUES ('$title', '$post')";
                          
    mysqli_query ($dbc, $query)
            or die('Error querying database.');
               
    mysqli_close($dbc);
}
    
function displayBlogs() {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to MySQL server.');
              
    //Retrieve blogs   
    $querySelect = "SELECT * FROM is_knowledge_blog ORDER BY blog_id desc";
        
    $result = mysqli_query($dbc, $querySelect)
            or die('Error querying database.');
            
    //Display blogs
    echo "<div class='container'>";
        echo '<hr />';
        echo '<h3 class="text-success"><strong>IS Knowledge Blogs</strong></h3>';
        echo '<table class="table table-striped">';
        echo "<thead>";
            echo "<tr>";
                echo '<th class="lead">Date</th>';
                echo '<th class="lead">Title</th>';
                echo '<th class="lead">Blog</th>';
            echo "</tr>";
        echo "</thead>";
    
        //Retrieve blog information from database
        while($row = mysqli_fetch_array($result)) {
            if ($row['approved'] == '1') {
                $date = $row['date'];
                $title = $row['title'];
                $post = $row['post'];
        
                echo "<tbody>";
                    echo "<tr>";
                        echo "<td>$date</td>";
                        echo "<td>$title</td>";
                        echo "<td>$post</td>";
                    echo "</tr>";
                echo "</tbody>";
            }
        }
        echo "</table>";
        echo "</div>";
    
    mysqli_close($dbc);
}

displayBlogs();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $post = $_POST['post'];
    	
    if (empty($title) || empty($post)) {
        echo "<div class='container'>";
    	    echo '<h3 class="text-danger">You must enter all information.</h3><br />';
    	echo '</div>';
    }
    else {
        insertBlog();
    }
}   
?>
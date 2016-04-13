<html>
<head>
  <title>Remove Email</title>
</head>
<body>
  <h2>Remove Email</h2>
  
<?php

   /*Application that will remove user's email from the email_list database*/
    
    $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
        or die('Error connecting to MySQL server.');
    
    $email = $_POST['email'];
    
    $query = "DELETE FROM email_list WHERE email = '$email'";
    
    mysqli_query($dbc, $query)
      or die('Error querying database.');
      
    echo 'Customer removed: ' . $email;
    
    mysqli_close($dbc);
    
?>

</body>
</html>


<html>
<head>
  <title>Send Email</title>
</head>
<body>
  <h2>Send Email</h2>
  
<?php

    /*Application that will send an email to all user's in the email_list database*/

    $from = 'nmeister1@madisoncollege.edu';
    $subject = $_POST['subject'];
    $text = $_POST['elvismail'];
    
    $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
        or die('Error connecting to MySQL server.');
        
    $query = "SELECT * FROM email_list";
    
    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');
        
    //Retrieve each user's information to send form email
     while($row = mysqli_fetch_array($result)) {
         $first_name = $row['first_name'];
         $last_name = $row['last_name'];
         
         $msg = "Dear $first_name $last_name, \n $text";
         $to = $row['email'];
         mail($to, $subject, $msg, 'From:' . $from);
         
         echo 'Email sent to: ' . $to . '<br /><br />';
         
          echo 'Test the loop without sending email: ' . $first_name . ' ' . $last_name . ' ' . $msg . '<br /><br />';
     }
      
    mysqli_close($dbc);
    
?>
</body>
</html>
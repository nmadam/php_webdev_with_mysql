<?php
    //username and password for authentication
    $username = 'admin';
    $password = 'knowledge';
    
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
            ($_SERVER['PHP_AUTH_USER'] !=$username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
        //The user name/password are incorrect so send the authorization  
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="IS Knowledge"');
        exit('<h2>IS Knowledge Blog</h2>Sorry, you must enter a valid user name and password to access this page.');
    }
?>
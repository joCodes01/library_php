<?php
session_start();

///////// DESTROY SESSION AFTER 2 HOURS
//////// Reference source below
/////////https://processwire.com/talk/topic/4450-session-with-timeout-destroying-session-variables-after-5mins-how-to/

// When session starts create a time variable to track the time


if(!isset($_SESSION['user_start'])) {
    $_SESSION['user_start'] = time();
} else {

    if (time() - $_SESSION['user_start'] < 7200) { 
        // 7200 seconds = 2 hours
        //stay logged in
    } else {
        // After 2 hours unset the session variables
    unset($_SESSION['user_start']); 
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_type']);
    session_destroy();
    header('Location: login.php');
    exit();
    }
}



 


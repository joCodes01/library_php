<?php

session_start();

///////// DESTROY SESSION AFTER 2 HOURS
//////// Reference source below
/////////https://processwire.com/talk/topic/4450-session-with-timeout-destroying-session-variables-after-5mins-how-to/

// Create a session variable called something like this after you start the session:
$_SESSION['user_start'] = time();
 
// Then when they get to submitting the payment, just check whether they're within the 5 minute window
if (time() - $_SESSION['user_start'] < 7200) { // 300 seconds = 5 minutes
    // they're within the 5 minutes so save the details to the database
} else {
    // sorry, you're out of time
   unset($_SESSION['user_start']); // and unset any other session vars for this task
   unset($_SESSION['logged_in']);
   unset($_SESSION['user_type']);
}
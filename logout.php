<?php
//start session with that user
session_start();

//destroy all session data with that user
session_destroy();

//redirect to the login screen
header("Location: login.php");
exit();
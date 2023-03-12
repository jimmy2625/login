<?php
//start session with that user
session_start();

//if there is a user with the given user_id then unset that user_id
if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
}

//redirect to the login screen
header("Location: login.html");
exit();
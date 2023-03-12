<?php
session_start();

include("connection.php");
//check if do_login variable is declared from the ajax call
if(isset($_POST['do_login']))
{
    //retrieve the username and password from validate.js post
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    //check if fields are not empty and the name is not numeric
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //read from the database, max 1 user
        $query = "select * from users where user_name = '$user_name' limit 1";

        //if the username is the same then true
        $result = mysqli_query($con, $query);

            if($result)
            {
                //check if the result is true and the database has more than 1 row
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    //check if the password is the same as inputted
                    if($user_data['password'] === $password) 
                    {
                        //assign the user_data to the session variable or else the check login will send it back to the login screen
                        $_SESSION['user_id'] = $user_data['user_id'];
                        //echo success if username or password is correct
                        echo "success";
                    } else {
                        //echo fail if username or password is incorrect
                        echo "fail";
                    }
                    exit();
                }
            }
        }
    }
?>
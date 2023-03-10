<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript">
        function do_login()
        {
        var user_name=$("#user_name").val();
        var pass=$("#password").val();
        if(user_name!="" && pass!="")
        {
            $.ajax
            ({
            type:'post',
            url:'do_login.php',
            data:{
            do_login:"do_login",
            user_name:user_name,
            password:pass
            },
            success:function(response) 
            {
            if(response=="success")
            {
                window.location.href="index.php";
            }
            else
            {
                alert("Wrong Details");
            }
            }
            });
        }

        return false;
        }
        </script>
    </head>

    <body class="body">
        <form method="post" class="form" onsubmit="return do_login();">
            <div class="container">
                <div class="img-container">
                    <img src="BC_LOGO.png" style="width:90%">
                </div>
                    <label class="labeltext" for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" id="user_name" name="user_name" required> <br>

                    <label class="labeltext" for="psw"><b>Password</b></label> 
                    <input type="password" placeholder="Enter Password" id="password" name="password" required> 

                    <button type="submit" id="login-button" class='button'>Login</button>   
            </div>
        </form>
    </body>
</html>
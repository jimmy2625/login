function do_login() {
    //assign variables with input from login form
    var user_name=$("#user_name").val();
    var pass=$("#password").val();
    //check if its non-empty
    if(user_name!="" && pass!="")
    {
        //use ajax call to send data to do_login.php file
        $.ajax
        ({
        type:'post',
        url:'do_login.php',
        data:{
        do_login:"do_login",
        user_name:user_name,
        password:pass
        },
        // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
        beforeSend: function () { 
            $("#spinner").show();
        },
        //handle response from do_login.php
        success:function(response) 
            {
                //if success head to index.php
                if(response=="success")
                {
                    window.location.href="index.php";
                }
                //if fail alert that username or password is incorrect
                else
                {
                    Swal.fire({
                        icon:'error',
                        title:'Wrong username or password!',
                        confirmButtonColor: '#2C8897',
                    }) 
                }
            },
            // Set our complete callback, adding the .hidden class and hiding the spinner.
            complete: function () { 
                $("#spinner").hide();
            },
        });
    }

    return false;
}
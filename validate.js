function do_login() {
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
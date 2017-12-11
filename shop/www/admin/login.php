<?php
    define ('ThisWorldIsJustIllusion', true);
    include("include/db_connect.php");
    include("include/functions.php");
?>﻿
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style-login.css" rel="stylesheet" type="text/css" />
<title>A: login</title>
<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>  
<script type="text/javascript">
$(document).ready(function(){
    $("#button-auth").click(function() {    //авторизация
        
        var auth_login = $("#auth_login").val();
        var auth_pass = $("#auth_pass").val();
        
        if (auth_login.length < 4 || auth_login.length > 15 )
        {
            $("#auth_login").css("borderColor", "red");
            send_login = 'no';
        } else {
            $("#auth_login").css("borderColor", "blue");
            send_login = 'yes';
        }
        
        if (auth_pass.length < 4 || auth_pass.length > 15 ) {
            $("#auth_pass").css("borderColor", "red");
            send_pass = 'no';
        } else {
            $("#auth_pass").css("borderColor", "blue");
            send_pass = 'yes';
        }
        
        
        if (send_login == 'yes' && send_pass == 'yes') {
            $("#button-auth").hide(); //$("#button-auth").css("color", "grey");
        }
        
        $.ajax({
            type: "POST",
            url: "/admin/include/auth.php",
            data: {login: auth_login, pass: auth_pass},
            dataType: "html",
            cache: false,
            success: function(data){
                if (data == true){    //пользователь авторизирован:
                       window.location.href="http://shop/admin/index.php";   //обновить страницу
                } else {
                    $("#message-auth").slideDown(200);  //показать ошибку
                    $("#button-auth").show();    //$("#button-auth").css("color", "black");
                }
            }
        });
    });
});
</script>
</head>
<body>


<div id="block-top-auth">
    <form method="post">
        <ul id="input-email-pass">
            <h3>Вход</h3>
            <p id="message-auth">Неверный логин/пароль</p>
            <li><input type="text" id="auth_login" placeholder="Логин" /></li>
            <li><input type="text" id="auth_pass" placeholder="Пароль" /></li>
            <p><a id="button-auth">Вход</a></p>
        </ul>
    </form>
</div>


            

</body>
</html>
$(document).ready(function(){
    $('.top-auth').toggle(
        function() {
            $(".top-auth").attr("id","active-button");
            $("#block-top-auth").fadeIn(100);
        },
        function() {
            $(".top-auth").attr("id","");
            $("#block-top-auth").fadeOut(100);
        }
    );
});



$(document).ready(function(){
    $('#auth-user-info').toggle(
        function() {
            $("#block-user").fadeIn(100);
        },
        function() {
            $("#block-user").fadeOut(100);
        }
    );
});


$(document).ready(function(){           //выход
    $('#logout').click(function() {
        $.ajax({
            type: "POST",
            url: "include/logout.php",
            dataType: "html",
            cache: false,
            success: function(data) {
                if (data == true) {
                    location.reload();
                    document.location.href = "/"
                }
            }
        });
    });
        
    
});



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
        
        if (auth_pass.length < 6 || auth_pass.length > 15 ) {
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
            url: "/include/auth.php",
            data: {login: auth_login, pass: auth_pass},
            dataType: "html",
            cache: false,
            success: function(data){
                if (data == true){    //пользователь авторизирован:
                     location.reload(); //обновить страницу
                } else {
                    $("#message-auth").slideDown(200);  //показать ошибку
                    $("#button-auth").show();    //$("#button-auth").css("color", "black");
                }
            }
        });
    });
});























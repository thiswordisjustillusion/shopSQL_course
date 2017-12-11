<?php 
    define ('ThisWorldIsJustIllusion', true);
    session_start();
    include('/include/db_connect.php');
    include('/fun/functions.php');
    
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Регистрация</title> 
<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script> 
<script type="text/javascript" src="/js/jquery.form.js"></script> 
<script type="text/javascript" src="/js/jquery.validate.js"></script> 
<script type="text/javascript" src="/js/jquery.cookie.js.js"></script>
<script type="text/javascript" src="/js/validate.reg.js"></script>
</head>
<body>
<div class="top-auth-reg">
        <a class="top-auth">Вход</a>
        <a class="top-reg" href="registration.php">Регистрация</a>
</div>
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
<div class="registration">
    <h2 class="h2_title">Регистрация</h2>
    <form method="post" id="form_reg" action="/reg/handler_reg.php">
        <p id="reg_message"></p>
        <div id="block-form-registration">
            <ul id="form-registration">
                <li>
                   <label>Логин<span id="star">*</span></label>
                   <input type="text" name="reg_login" id="reg_login" />
                </li>
                <li>
                   <label>Пароль<span id="star">*</span></label>
                   <input type="text" name="reg_pass" id="reg_pass" />
                </li>
                <li>
                   <label>E-mail<span id="star">*</span></label>
                   <input type="text" name="reg_email" id="reg_email" />
                </li>
                <li>
                   <label>Фамилия<span id="star">*</span></label>
                   <input type="text" name="reg_surname" id="reg_surname" />
                </li>
                <li>
                   <label>Имя<span id="star">*</span></label>
                   <input type="text" name="reg_name" id="reg_name" />
                </li>
                <li>
                   <label>Телефон<span id="star">*</span></label>
                   <input type="text" name="reg_phone" id="reg_phone" />
                </li>
                <li>
                   <label>Адрес доставки<span id="star">*</span></label>
                   <input type="text" name="reg_address" id="reg_address" />
                </li>
                <!--<li>
                    <div id="block-captcha">
                        <label>Защитный код<span id="star">*</span></label>
                        <img src="/reg/reg_captcha.php" />
                        <input type="text" name="reg_captcha" id="reg_captcha" />
                        <p id="reload-captcha">Обновить</p>
                    </div>
                </li>-->
            </ul>
        </div>
        <p><input type="submit" name="reg_submit" id="form_submit" value="Регистрация"/></p>
    </form>
</div>





</body>
</html>


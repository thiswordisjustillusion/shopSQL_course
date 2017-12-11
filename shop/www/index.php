<?php 
    session_start();
    define ('ThisWorldIsJustIllusion', true);
    include('/include/db_connect.php');
    include('/fun/functions.php');
    
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>board games</title>
<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script> 
<script type="text/javascript" src="/js/jquery.form.js"></script> 
<script type="text/javascript" src="/js/jquery.validate.js"></script> 
<script type="text/javascript" src="/js/jquery.cookie.js.js"></script>
<script type="text/javascript" src="/js/validate.reg.js"></script> 
<script type="text/javascript" src="/js/shop-script.js"></script> 
</head>
<body>

<?php
    if ($_SESSION['auth'] == 'yes_auth') {
        echo
        '
        <div id="auth-user-info"><a>'.$_SESSION['auth_login'].'</a></div>
        ';
    } else {
        echo 
        '
        <div class="top-auth-reg">
            <a class="top-auth">Вход</a>
            <a class="top-reg" href="registration.php">Регистрация</a>
        </div>
        ';
    }
?>

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

<div id="block-user">
    <ul>
        <li><a href="change-profile.php">Изменить данные</a></li>
        <li><a href="history-profile.php">История покупок</a></li>
        <li><a id="logout">Выход</a></li>
    </ul>
</div>

<div id="block-search">
    <form method="get" action="search.php?q=">	
        <input type="text" id="input-search" name="q" placeholder="Поиск по товарам" /> 
        <input type="submit" id="button-search" value="Поиск"/>
    </form> 
</div>

<?php 
    $result = mysql_query("SELECT * FROM shop",$link); // результат запроса в $result
    $shop = mysql_fetch_array($result); 
    do{
    echo    //вывод товаров
    '
    <div class="cart">
        <p class="title">'.$shop["name"].'</p>
        <img src="/image/'.$shop["image"].'" />
        <div class="price">'.$shop["price"].'</div>
        <button class="btn-buy" id="'.$shop['id'].'">Купить</button>
    </div>
    ';
    } while ($shop = mysql_fetch_array($result));
?>

</body>
</html>


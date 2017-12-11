<?php 
    define ('ThisWorldIsJustIllusion', true);
    session_start();
    include('/include/db_connect.php');
    include('/fun/functions.php');
    $search = clear_string($_GET["q"]);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title><?php echo $search; ?></title>
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

    
<?php
    $count = mysql_query("SELECT COUNT(*) FROM shop WHERE name LIKE '%$search%'",$link);
    $temp = mysql_fetch_array($count);
    
    if ($temp[0] > 0)
    {
        
    
     
    $result = mysql_query("SELECT * FROM shop WHERE name LIKE '%$search%'",$link); // результат запроса в $result
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
    } else {
        echo '<h3>Товаров не найдено</h3>';
    }
?>

</body>
</html>


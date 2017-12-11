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
<title>Профиль</title>
<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script> 
<script type="text/javascript" src="/js/jquery.form.js"></script> 
<script type="text/javascript" src="/js/jquery.validate.js"></script> 
<script type="text/javascript" src="/js/jquery.cookie.js.js"></script>
<script type="text/javascript" src="/js/validate.reg.js"></script> 
<script type="text/javascript" src="/js/shop-script.js"></script> 
</head>
<body>


<div id="auth-user-info"><a><?php echo $_SESSION['auth_login']?></a></div>

<div id="block-user">
    <ul>
        <li><a href="change-profile.php">Изменить данные</a></li>
        <li><a href="history-profile.php">История покупок</a></li>
        <li><a id="logout">Выход</a></li>
    </ul>
</div>

<?php 
    echo '
        <table id="history-table">
            <tr id="history-table-in">
                <td>Номер заказа</td>
                <td>Дата заказа</td>
                <td>Доставка</td>
                <td>Статус заказа</td>
            </tr>
        ';
    $id = $_SESSION['auth_id'];    
    $result = mysql_query("SELECT * FROM orders WHERE user_id='$id'",$link); // результат запроса в $result
    $orders = mysql_fetch_array($result); 
    do{
    echo '
            <tr id="history-table-out">
                <td><center>'.$orders['order_id'].'</center></td>
                <td><center>'.$orders['date'].'</center></td>
                <td><center>'.$orders['dostavka_id'].'</center></td>
                <td><center>'.$orders['status'].'</center></td>
            </tr>
        ';
    } while ($orders = mysql_fetch_array($result));
    echo '</table>'
    
?>



</body>
</html>


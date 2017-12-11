<?php

        
    session_start();
    define ('ThisWorldIsJustIllusion', true);
    include("include/db_connect.php");
    include("include/functions.php");
?>﻿
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>A: index</title>
<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script> 
<script type="text/javascript" src="/js/shop-script.js"></script>   
</head>
<body>
<h3>Управление товарами:</h3>
<!-- вывод товаров с кнопками изменить/удалить/добавить: -->
<?php 
    echo '
    <table>
            <tr id="history-table-in">
                <td>ID товара</td>
                <td>Название</td>
                <td>Цена</td>
                <td>Фото</td>
                <td>Категория</td>
                <td>Удалить</td>
                <td>Изменить</td>
                <td>Скрыть</td>
            </tr>';
    $result = mysql_query("SELECT * FROM shop",$link); // результат запроса в $result
    $shop = mysql_fetch_array($result); 
    do{
    echo    //вывод товаров
    '
            <tr>
                <td id="id_shop"><center>'.$shop['shop_id'].'</center></td>
                <td><center>'.$shop['name'].'</center></td>
                <td><center>'.$shop['price'].'</center></td>
                <td><center>'.$shop['image'].'</center></td>
                <td><center>'.$shop['category_id'].'</center></td>
                <td id="delete-shop"><center>удалить</center></td>
                <td id="change-shop"><center>изменить</center></td>
                <td id="hide-shop"><center>скрыть</center></td>
            </tr>
    ';
    } while ($shop = mysql_fetch_array($result));
?>



<!-- /header -->




<!-- left-menu -->




<!-- /left-menu -->            




</body>
</html>
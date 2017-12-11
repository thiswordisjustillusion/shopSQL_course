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

<!-- header -->

<div id="auth-user-info"><a><?php echo $_SESSION['admin_login'] ?></a></div>

<div id="block-user">
    <ul>
        <li><a href="/admin/change-shop.php">Управление товарами</a></li>
        <li><a href="/admin/index.php">Статистика</a></li>
        <li><a id="logout">Выход</a></li>
    </ul>
</div>


<!-- /header -->




<!-- left-menu -->




<!-- /left-menu -->            




</body>
</html>
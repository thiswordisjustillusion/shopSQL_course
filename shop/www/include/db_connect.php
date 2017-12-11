<?php
    defined('ThisWorldIsJustIllusion') or die ('<a href="/">Заблудились?</a>');
    $db_host = 'localhost';
    $db_user = 'admin';
    $db_pass = 'phpmy';
    $db_database = 'shop';
    $link = mysql_connect($db_host,$db_user,$db_pass);
    mysql_select_db($db_database,$link) or die("Нет соединения с БД ".mysql_error());
    mysql_query("SET names UTF-8");
?> 
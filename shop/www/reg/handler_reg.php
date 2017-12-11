<?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    
    {session_start();
    include('../include/db_connect.php');
    include('../fun/functions.php');
    
    $error = array();
    
    $login = iconv("UTF-8", "cp1251", clear_string($_POST['reg_login']));
    $pass = iconv("UTF-8", "cp1251", clear_string($_POST['reg_pass']));
    $surname = iconv("UTF-8", "cp1251", clear_string($_POST['reg_surname']));
    $name = iconv("UTF-8", "cp1251", clear_string($_POST['reg_name']));
    $email = iconv("UTF-8", "cp1251", clear_string($_POST['reg_email']));
    $phone = iconv("UTF-8", "cp1251", clear_string($_POST['reg_phone']));
    $address = iconv("UTF-8", "cp1251", clear_string($_POST['reg_address']));
    
    if (strlen($login) < 4 or strlen ($login) > 15) {
        $error[] = "Логин должен быть от 4 до 15 символов";
    } else {
        $result = mysql_query("SELECT login FROM user WHERE login = '$login'",$link);
        if (mysql_num_rows($result) > 0) {
            $error[] = "Логин занят";
        }
    }
    if (strlen($pass) < 6 or strlen ($pass) > 15) $error[] = "Пароль должен быть от 6 до 15 символов";
    if (strlen($pass) < 2 or strlen ($pass) > 15) $error[] = "Имя должно быть от 2 до 15 символов";
    if (strlen($pass) < 2 or strlen ($pass) > 15) $error[] = "Фамилия должна быть от 2 до 15 символов";
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "Указан некорректный email";
    if (!$phone) $error[] = "Укажите номер телефона. Пример: 89996665544";
    if (!$address) $error[] = "Укажите адрес доставки";
    
    if (count($error)){
        echo implode('<br />', $error);
    } else {
        
       $pass = md5($pass);
        $pass = strrev($pass);
        $pass = "9qweqwr2r".$pass."2asd7f";
        
        $ip = $_SERVER['REMOTE_ADDR'];
        
        mysql_query("INSERT INTO 
                        user (user_id, user_name, user_fam, user_tel, user_address, email, login, password, date, ip)
                        VALUES ('', '".$name."','".$surname."','".$phone."','".$address."','".$email."','".$login."','".$pass."',NOW(),'".$ip."'
                    )",$link);
        echo true;
    }   }
?>

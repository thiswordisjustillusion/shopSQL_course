<?php
        define ('ThisWorldIsJustIllusion', true);
        session_start();
        include ('/db_connect.php');
        include ('../fun/functions.php');
        if($_SERVER["REQUEST_METHOD"] == "POST"){  //проверить!
         
        $login = clear_string($_POST['login']);
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $pass = strrev($pass);
        $pass = "9qweqwr2r".$pass."2asd7f";
        
        
        
        $result = mysql_query("SELECT * FROM user 
                                WHERE login = '$login' AND password = '$pass'");
        if (mysql_num_rows($result) > 0) {
            $row = mysql_fetch_array($result);
            
            $_SESSION['auth'] = 'yes_auth';
            $_SESSION['auth_id'] = $row["user_id"];
            $_SESSION['auth_login'] = $row["login"];
            $_SESSION['auth_pass'] = $row["password"];
            $_SESSION['auth_name'] = $row["user_name"];
            $_SESSION['auth_surname'] = $row["user_fam"];
            $_SESSION['auth_phone'] = $row["user_tel"];
            $_SESSION['auth_email'] = $row["email"];
            $_SESSION['auth_address'] = $row["user_address"];
            $_SESSION['auth_date'] = $row["date"];
            echo true;
        } else {
            echo true;
        } 
           
        }
        
        
        
        
        
        
        
        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?> 
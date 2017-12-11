<?php 
        define ('ThisWorldIsJustIllusion', true);
        session_start();
        include ('db_connect.php');
        include ('functions.php');
        if($_SERVER["REQUEST_METHOD"] == "POST"){  //проверить!
         
        $login = clear_string($_POST['login']);
        $pass = clear_string($_POST['pass']);
        /*$pass = md5($pass);
        $pass = strrev($pass);
        $pass = "9qweqwr2r".$pass."2asd7f";*/
        
        
        
        $result = mysql_query("SELECT * FROM admin 
                                WHERE admin_login = '$login' AND admin_pass = '$pass'");
        if (mysql_num_rows($result) > 0) {
            $row = mysql_fetch_array($result);
            
            $_SESSION['admin'] = 'yes_auth';
            $_SESSION['admin_id'] = $row["admin_id"];
            $_SESSION['admin_login'] = $row["admin_login"];
            $_SESSION['admin_pass'] = $row["admin_pass"];
            echo true;
        } else {
            echo false;
        } 
           
        }
        
        
        
        
        
        
        
        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?> 
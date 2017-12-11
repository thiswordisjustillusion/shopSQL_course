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



</body>
</html>


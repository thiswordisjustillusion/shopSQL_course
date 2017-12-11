<?php 
    define ('ThisWorldIsJustIllusion', true);
    session_start();
    include('/include/db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Вывод товаров</title>
</head>
<body>


<?php 
        echo '
        <table>
            <tr>
                <td>id</td>
                <td>количество</td>
                <td>Стоимость</td>
                <td>Удалить</td>
            </tr>
        ';
    $temp=$_SESSION['cart'];
    foreach($temp as $id=>$kol){
        echo '
        <tr id="'.$id.'">
            <td>id товара: '.$id.'</td>
            <td><input type="number" class="count-product" id="'.$id.'" value="'.$kol.'"></td>
            <td></td>
            <td><button class="btn-del" id="'.$id.'">Удалить</button></td>
        </tr>
        
        ';
    };
    echo '</table>';
    
?>

<script src="/jquery-1.7.1.min.js"></script>  
<script src="/cart-index.js"></script> 
<script src="/cart-count.js"></script>
<script src="/cart-delete.js"></script>
</body>
</html>
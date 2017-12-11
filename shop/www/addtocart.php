<?php
define ('ThisWorldIsJustIllusion', true);
$id = $_POST['id_tov'];//получаем id товара

        session_start();
        if (!isset($_SESSION['cart'])) {//если сесcия корзины не существует
            $temp[$id] = 1;//в масcив заносим количество товара 1 
        } else {//если в сессии корзины уже есть товары
            $temp = $_SESSION['cart'];//заносим в массив старую сессию
            if (!array_key_exists($id, $temp)) {//проверяем есть ли в корзине уже такой товар
            $temp[$id] = 1; //в массив заносим количество товара 1
            }      
        }
        $count = count($temp);//считаем товары в корзине
        $_SESSION['cart'] = $temp;//записываем в сессию наш массив
        echo $count; //возвращаем количество товаров
?> 
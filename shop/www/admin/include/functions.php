<?php
define ('ThisWorldIsJustIllusion', true);
function clear_string ($cl_str){                    //удаление символов из поисковой строки
    $cl_str = strip_tags($cl_str);                //удаление тегов html и php
    $cl_str = mysql_real_escape_string($cl_str);  //удаление спецсимволов: "" ? и др.
    $cl_str = trim($cl_str);                      //удаление пробелов
return $cl_str;
}
?>
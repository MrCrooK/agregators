<?
if($_REQUEST["true_nbki"]){
$querystr = '';
foreach($_REQUEST as $key => $val)
	$querystr .= $key ."=". trim(str_replace(' ','+',$val))."&";
$tableNBKI = file_get_contents('http://82.112.49.209:2222/nbki.php?'.$querystr);

//Подключаемся к БД
require("dbconnect.php");
mysql_query("UPDATE `nbkinew` SET `html` = '".addslashes($tableNBKI)."' WHERE `id` = ".$_REQUEST["id"].";");
mysql_close($link);
} else {
//Подключаемся к БД
require("dbconnect.php");
mysql_query("UPDATE `nbkinew` SET `html` = '<hr><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tbody><tr valign=\"top\"><td class=\"h1\" valign=\"top\">НБКИ</td><td valign=\"top\">По техническому регламенту проверка НБКИ не требуется</td></tr></tbody></table>' WHERE `id` = ".$_REQUEST["id"].";");
mysql_close($link);
}
?>

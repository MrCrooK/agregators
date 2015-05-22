<?
if($_REQUEST["ldate"]&&$_REQUEST['region']&&$_REQUEST['lfam']&&$_REQUEST['lname']&&$_REQUEST["id"]) {
$json = json_decode(file_get_contents("http://vk.fssprus.ru/app/search?name=".$_REQUEST['lfam']."+".$_REQUEST['lname']."&region=".$_REQUEST['region']."&date=".$_REQUEST["ldate"]));
$fssprus  = $json->content;
echo $fssprus;
//Подключаемся к БД
require("dbconnect.php");
mysql_query("UPDATE `nbkinew` SET `fssprus` = '".addslashes($fssprus)."' WHERE `id` = ".$_REQUEST["id"].";");
mysql_close($link);
} else { echo "Не достаточно данных Служба Приставов<br>";}
?>

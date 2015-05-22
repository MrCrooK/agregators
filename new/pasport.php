<?
if($_REQUEST["pnum"]&&$_REQUEST["pseri"]&&$_REQUEST["id"]) {
//Подключаемся к БД
require("dbconnect.php");
$query = "SELECT * FROM `pasport` WHERE `NUM` = '".$_REQUEST["pnum"]."' AND `SERIAL` = '".$_REQUEST["pseri"]."' LIMIT 1";
$result = mysql_query($query); 
if($line = mysql_fetch_array($result, MYSQL_ASSOC))
	{mysql_query("UPDATE `nbkinew` SET `pasport` = '<b style=\"color: red;\">паспорт не действителен</b>' WHERE `id` = ".$_REQUEST["id"].";");}
else
	{mysql_query("UPDATE `nbkinew` SET `pasport` = '<b style=\"color: green;\">паспорт среди не действительных не значится</b>' WHERE `id` = ".$_REQUEST["id"].";");}
mysql_close($link);
} else { echo "Не достаточно данных Паспорт<br>";}
?>

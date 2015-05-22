<?
//$str = "-----------".date("m.d.Y H:i:s")."-----------\r\n";
//file_put_contents('log.txt',$str,FILE_APPEND);
header("Content-Type: text/html; charset=cp1251");
require("dbconnect.php");
$query = "SELECT * FROM `issexpert` WHERE `status` = '0' ORDER BY `aid` LIMIT 1"; 
$result = mysql_query($query); 
$line = mysql_fetch_array($result, MYSQL_ASSOC);
if(is_array($line)) {
	mysql_query("UPDATE `issexpert` SET `status` = '1' WHERE `id` = ".$line['id'].";");
	echo $tableEXPERT = iconv('windows-1251', 'UTF-8', file_get_contents("https://portal.lnmoney.ru/info/expert/goexpert.php?".http_build_query($line)));	
	//echo http_build_query($line);
	//Обновили запись в базе
	mysql_query("UPDATE `nbkinew` SET `expert` = '".addslashes($tableEXPERT)."' WHERE `id` = ".$line['id'].";");
	// Удаляем запись из таблицы эксперта
	$query = "DELETE FROM `issexpert` WHERE `id` = '".$line['id']."'"; 
	mysql_query($query);
} else {echo "Нет очереди.";}
mysql_close($link);
?>

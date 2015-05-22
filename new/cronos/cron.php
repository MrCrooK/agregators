<?
//$str = "-----------".date("m.d.Y H:i:s")."-----------\r\n";
//file_put_contents('/home/bitrix/www/info/new/cronos/log.txt',$str,FILE_APPEND);

require("dbconnect.php");
$query = "SELECT * FROM `cronostab` ORDER BY `aid` LIMIT 1"; 
$result = mysql_query($query); 
$line = mysql_fetch_array($result, MYSQL_ASSOC);
if(is_array($line)) {
	if($line['session']) {
		$aid =  $line['aid'];
		$id =  $line['id'];
		$session = $line['session'];
		require('cronos_next.php');
	} else {
		$bdate = $line['bdate'];
		$fio = $line['fio'];
		$aid =  $line['aid'];
		require('cronos.php');
		mysql_query("UPDATE `cronostab` SET `session` = '".$session."' WHERE `aid` = '".$aid."'");	
	}
} else {echo "Нет очереди.";}
mysql_close($link);
?>

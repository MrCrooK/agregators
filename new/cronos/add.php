<?
if($_REQUEST['fio']&&$_REQUEST["id"]) {
	require("dbconnect.php");
	mysql_query('INSERT INTO cronostab SET fio="'.$_REQUEST['fio'].'",bdate="'.$_REQUEST['bdate'].'",id="'.$_REQUEST["id"].'"'); 
	mysql_close($link);
} else {echo "Не достаточно данных CRONOS";}
?>
<?
header("Content-Type: text/html; charset=cp1251");
// Добавляем очередь в базу Эксперта
//id		int(11)	 
//bdate		text	 
//fname		text	 
//lname		text	 
//oname		text	 
//status	int(11)
require("dbconnect.php");
mysql_query('INSERT INTO issexpert SET id="'.$_REQUEST['id'].'",bdate="'.$_REQUEST['bdate'].'",fname="'.$_REQUEST["fname"].'",name="'.$_REQUEST["name"].'",oname="'.$_REQUEST["oname"].'",status="0"'); 
mysql_close($link);
// Конец
?>

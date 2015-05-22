<?
$query = "SELECT * FROM `pasport` WHERE `NUM` = '".$_REQUEST["pnum"]."' AND `SERIAL` = '".$_REQUEST["pseri"]."' LIMIT 1";
$result = mysql_query($query); 
if($line = mysql_fetch_array($result, MYSQL_ASSOC))
	{$pasportvalid=0;/*echo "<b style='color: red;'>паспорт не действителен</b>";*/}
else
	{$pasportvalid=1;/*echo "<b style='color: green;'>паспорт среди не действительных не значится</b>";*/}
?>

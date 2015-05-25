<html>
<head>
<title>Личный кабинет</title>
<script src="jquery-latest.js"></script>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<style>
.bordrad {border-radius: 5px;}
#formperson input {width: 150px;}
table {font-size: 16px;border-spacing: 0; color: #777; font-family: 'Times New Roman', Geneva, Arial, Helvetica, sans-serif; }
hr {width: 100%; color: #255b8e; background-color:#255b8e; border:0px none; height:2px; clear:both; }
.h1 {color: #255b8e; font-size: 16px; font-weight: bold; width: 150px; padding: 5px;}
.h2 {font-size: 16px; }
.title {color: #255b8e; font-size: 16px;}
span {color: #255b8e;}
.tgray {margin-bottom: 10px;}
.tgray TBODY tr {background: #e1e7ed; border-top: 1px solid #255b8e;}
.tgray THEAD td {color: #255b8e; font-size: 16px;}
.rash {font-size: 12px; margin-bottom: 15px;}
.rash b {width: 12px; height: 12px; line-height: 12px; text-align: center; display: inline-block; margin-bottom: 3px;}
.clasitmA {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #ffcc00; background: #ffcc00;}
.clasitmX {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #c0c0c0; background: #c0c0c0;}
.clasitm0 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #666; border: 1px solid #666; background: #fff;}
.clasitm1 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #009966; background: #009966;}
.clasitm2 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #fe9800; background: #fe9800;}
.clasitm3 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #ff6600; background: #ff6600;}
.clasitm4 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #fe3200; background: #fe3200;}
.clasitm5 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #cc0000; background: #cc0000;}
.clasitm6 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #000000; background: #000000;}
.clasitm7 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #000000; background: #000000;}
.clasitm8 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #000000; background: #000000;}
.clasitm9 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #000000; background: #000000;}
.clVK {color: #255b8e;width: 650px;background:#e1e7ed;border:1px solid #d3dae0;float:left;padding:5px;margin:5px 0;}
.clVK a {color: #255b8e;}
.clOK {color: #255b8e;width: 650px;background:#e1e7ed;border:1px solid #d3dae0;float:right;padding:5px;margin:5px 0;}
.clOK a {color: #255b8e;}

.app_result_head {
background-color: #e1e7ed;
color: #255b8e;
height: 18px;
font-weight: normal;
text-align: center;
border-bottom: 1px solid #d3dae0;
width: 20%;
padding: 5px 6px;
}
.app_result_cell:first-child {
border-left: 1px solid #dae1e8;
}
.app_result_cell {
background-color: white;
border-right: 1px solid #dae1e8;
border-bottom: 1px solid #dae1e8;
text-align: left;
vertical-align: top;
padding: 5px 4px;
color: #777;
width: 20%;
}	
.title-person {
text-align: center;
color: #255b8e;
margin-bottom: 30px;
}
.cronos-item:before  {

}
.cronos-item {
background: #e1e7ed;
border: 1px solid #d3dae0;	
margin: 10px 0;
padding: 10px;
}
</style>
</head>
<body style="background: url(headerfon.jpg);background-attachment:fixed;">
<div style="width: 1500px; padding: 20px; margin: 20px auto; border-radius: 10px; background: #fff;">
<?
//Подключаемся к БД
require("dbconnect.php");

//Проверяем существет ли запись с ИД в БД
if($_REQUEST["numid"]) {
$query = "SELECT * FROM `nbkinew` WHERE `numid` = '".$_REQUEST["numid"]."' ORDER BY id DESC LIMIT 1"; //lnmoney
$result = mysql_query($query); 
if($line = mysql_fetch_array($result, MYSQL_ASSOC)) $inSQL = true; else $inSQL = false;

//Если существует выводим данные из БД, иначе загружаем всю эту байду из сервисов
if($inSQL) {
?>
<div class="title-person">
<h1><?=$line["fio"]?></h1>
<b><?=$line["bdate"]?></b>
</div>
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tbody><tr valign="top">
        <td class="h1" valign="top">Социальные сети</td>
        <td valign="top">
		<?
		if($line["vkvalid"]) echo $line["vk"]; 
		if(!$line["vk"]) echo "<div class='clVK'>Соц. сеть ВКконтакте: данные отсутствуют</div>";

		if($line["okvalid"]) echo $line["ok"]; 
		if(!$line["ok"]) echo "<div class='clOK'>Соц. сеть Однокласники: данные отсутствуют</div>";

		echo "<div style='clear: both; width: 100%'></div>";
		?>
	</td>
    </tr>
</tbody></table>
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tbody><tr valign="top">
        <td class="h1" valign="top">Проверка паспорта</td>
        <td valign="top">
		<?
		if(!$line["pasport"]) echo "В обработке..."; 
		echo $line["pasport"];
		?>
	</td>
    </tr>
</tbody></table>
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tbody><tr valign="top">
        <td class="h1" valign="top">Служба Судебных Приставов</td>
        <td valign="top">
		<?
		if(!$line["fssprus"]) echo "В обработке..."; 
		echo $line["fssprus"];
		echo "<div style='clear: both; width: 100%'></div>";
		?>
	</td>
    </tr>
</tbody></table>
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tbody><tr valign="top">
        <td class="h1" valign="top">База ISS-EXPERT</td>
        <td valign="top">
		<?
		if(!$line["expert"]) echo "В обработке..."; 
		echo $line["expert"];
		echo "<div style='clear: both; width: 100%'></div>";
		?>
	</td>
    </tr>
</tbody></table>
<?
if(!$line["html"]) echo "НБКИ в обработке...";
echo $line["html"];
?>
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tbody><tr valign="top">
        <td class="h1" valign="top">База КРОНОС</td>
        <td valign="top" width="1340" style="overflow: hidden;">
		<div style="overflow: hidden; width: 1340px">
		<?
		if(!$line["cronos"]) echo "В обработке..."; 
		echo $line["cronos"];
		echo "<div style='clear: both; width: 100%'></div>";
		?>
		</div>
		</td>
    </tr>
</tbody></table>
<?
} else {
echo "<b style='color: red;'>Нет записи об этой заявке</b>";
}} else {
$query = "SELECT * FROM `nbkinew` ORDER BY id DESC"; //lnmoney
$result = mysql_query($query); 
while($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
$d = new DateTime($line['timestamp']);
if($d->format("d.m.Y")!=$olddate) {if($ni) echo "<br><b>Заявок за день: ".$ni."</b><br>"; echo "<h1>".$d->format("d.m.Y")."</h1>";$ni=0;}
$olddate=$d->format("d.m.Y");$ni++;
echo "<a href='?numid=".$line['numid']."'>".$line['numid']."</a>, ";
}}
?>
<?
mysql_close($link);
?>
</div>
</body>
</html>

<?
if($_REQUEST['lfam']&&$_REQUEST['lname']&&$_REQUEST["lotch"]&&$_REQUEST["id"]) {
$tableEXPERT = iconv('cp1251','utf-8',file_get_contents('https://portal.lnmoney.ru/info/new/cronos/add.php?fio='.$_REQUEST["lfam"].'+'.$_REQUEST["lname"].'+'.$_REQUEST["lotch"].'&id='.$_REQUEST["id"].'&bdate='.$_REQUEST["ldate"]));

} else { echo "Не достаточно данных CRONOS<br>";}
?>

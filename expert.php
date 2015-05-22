<?
if($_REQUEST["ldate"]&&$_REQUEST['lfam']&&$_REQUEST['lname']&&$_REQUEST["lotch"]&&$_REQUEST["id"]) {
$tableEXPERT = iconv('cp1251','utf-8',file_get_contents('https://portal.lnmoney.ru/info/expert/init.php?fname='.$_REQUEST["lfam"].'&name='.$_REQUEST["lname"].'&oname='.$_REQUEST["lotch"].'&bdate='.$_REQUEST["ldate"].'&id='.$_REQUEST["id"]));
} else { echo "Не достаточно данных EXPERT<br>";}
?>

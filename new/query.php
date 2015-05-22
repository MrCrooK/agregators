<?
$str = "-----------".date("m.d.Y H:i:s")."-----------\r\n";
foreach($_REQUEST as $key => $val)
	$str .= $key .":". $val."\r\n";

file_put_contents('log.txt',$str,FILE_APPEND);

//Подключаемся к БД
require("dbconnect.php");
//Создаем запись в БД
mysql_query('INSERT INTO nbkinew SET numid="'.$_REQUEST['numid'].'",fio="'.$_REQUEST["lfam"]." ".$_REQUEST["lname"]." ".$_REQUEST["lotch"].'",bdate="'.$_REQUEST['ldate'].'"'); 
$latest_id = mysql_insert_id(); 
mysql_close($link);
//Создали запись в БД

//Проверка паспорта
//require 'pasport.php';
$curl = curl_init('https://portal.lnmoney.ru/info/new/pasport.php?pseri='.(int)$_REQUEST["pseri"].'&pnum='.(int)$_REQUEST["pnum"].'&id='.$latest_id);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);       
$response = curl_exec($curl);
curl_close($curl);

//VK include
//require 'vk.php';
$curl = curl_init('https://portal.lnmoney.ru/info/new/vk.php?ldate='.$_REQUEST["ldate"].'&propcity='.$_REQUEST["propcity"].'&lfam='.$_REQUEST["lfam"].'&lname='.$_REQUEST["lname"].'&id='.$latest_id);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);       
$response = curl_exec($curl);
curl_close($curl);

//OK include
//require 'ok.php';
$curl = curl_init('https://portal.lnmoney.ru/info/new/ok.php?ldate='.$_REQUEST["ldate"].'&propcity='.$_REQUEST["propcity"].'&lfam='.$_REQUEST["lfam"].'&lname='.$_REQUEST["lname"].'&id='.$latest_id);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);       
$response = curl_exec($curl);
curl_close($curl);

//Проверка в службе Судебных Приставов
//require 'fssprus.php';
$curl = curl_init('https://portal.lnmoney.ru/info/new/fssprus.php?ldate='.$_REQUEST["ldate"].'&region='.$_REQUEST["region"].'&lfam='.$_REQUEST["lfam"].'&lname='.$_REQUEST["lname"].'&id='.$latest_id);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);       
$response = curl_exec($curl);
curl_close($curl);

//ISS-EXPERT include
//require 'expert.php';
$curl = curl_init('https://portal.lnmoney.ru/info/new/expert.php?ldate='.$_REQUEST["ldate"].'&lotch='.$_REQUEST["lotch"].'&lfam='.$_REQUEST["lfam"].'&lname='.$_REQUEST["lname"].'&id='.$latest_id);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);       
$response = curl_exec($curl);
curl_close($curl);

//NBKI include
//require 'nbki.php';
$querystr = '';
foreach($_REQUEST as $key => $val) $querystr .= $key ."=". trim(str_replace(' ','+',$val))."&";
$curl = curl_init('https://portal.lnmoney.ru/info/new/nbki.php?'.$querystr.'id='.$latest_id);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);       
$response = curl_exec($curl);
curl_close($curl);

//CRONOS include
//require 'cronos.php';
$curl = curl_init('https://portal.lnmoney.ru/info/new/cronos.php?lotch='.$_REQUEST["lotch"].'&lfam='.$_REQUEST["lfam"].'&lname='.$_REQUEST["lname"].'&ldate='.$_REQUEST["ldate"].'&id='.$latest_id);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);       
$response = curl_exec($curl);
curl_close($curl);
?>

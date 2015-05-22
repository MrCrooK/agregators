<?
$str = date("m.d.Y H:i:s")."\r\n";
foreach($_REQUEST as $key => $val)
	$str .= $key .":". $val."\r\n";

file_put_contents('log.txt',$str);

if(!($_REQUEST["region"]&&$_REQUEST["pseri"]&&$_REQUEST["pnum"]&&$_REQUEST["lfam"]&&$_REQUEST["lname"]&&$_REQUEST["lotch"]&&$_REQUEST["ldate"]&&$_REQUEST["propcity"]&&$_REQUEST["numid"])) { echo "Нужно заполнить все поля"; exit; }

$dbhost = "localhost"; // Хост
$dbuser = "root"; // Имя пользователя
$dbpassword = ""; // Пароль
$dbname = "otchet"; // Имя базы данных
$link = mysql_connect($dbhost, $dbuser, $dbpassword) or die('Не удалось соединиться: ' . mysql_error());
mysql_select_db($dbname, $link) or die('Не удалось выбрать базу данных'); // Выбирает базу данных MySQL $dbname

$dateb = explode(".", $_REQUEST["ldate"] );
$datep = explode(".", $_REQUEST["pdate"] );

//Проверка паспорта
require 'pasport.php';
//VK include
require 'vk.php';
//OK include
require 'ok.php';
//Проверка в службе Судебных Приставов
require 'fssprus.php';
//ISS-EXPERT include
require 'expert.php';
//NBKI include
//require 'nbki.php';

//Генерация ПДФ
//require 'pdf.php';

//Добавим новую запись
$query = "insert into lnmoney values(0,".$_REQUEST['numid'].",'".addslashes($tableOK)."','".addslashes($tableVK)."','".addslashes($fssprus)."','".addslashes($tableEXPERT)."','".$pasportvalid."',1,1)"; 
$result = mysql_query($query); 

print_r($result);
?>
<?
mysql_close($link);
?>

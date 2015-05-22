<?
$str = date("m.d.Y H:i:s")."\r\n";
foreach($_REQUEST as $key => $val)
	$str .= $key .":". $val."\r\n";

file_put_contents('log.txt',$str);

if(!($_REQUEST["pseri"]&&$_REQUEST["pnum"]&&$_REQUEST["pdate"]&&$_REQUEST["pkem"]&&$_REQUEST["pmesto"]&&$_REQUEST["lfam"]&&$_REQUEST["lname"]&&$_REQUEST["lotch"]&&$_REQUEST["ldate"]&&$_REQUEST["lmesto"]&&$_REQUEST["propcity"]&&$_REQUEST["propul"]&&$_REQUEST["projcity"]&&$_REQUEST["projul"]&&$_REQUEST['region']&&$_REQUEST["numid"])) { echo "Нужно заполнить все поля"; exit; }

//Создаем запись в БД
$dbhost = "localhost"; // Хост
$dbuser = "root"; // Имя пользователя
$dbpassword = ""; // Пароль
$dbname = "otchet"; // Имя базы данных
$link = mysql_connect($dbhost, $dbuser, $dbpassword) or die('Не удалось соединиться: ' . mysql_error());
mysql_select_db($dbname, $link) or die('Не удалось выбрать базу данных'); // Выбирает базу данных MySQL $dbname
$query = "insert into nbki values(0,".$_REQUEST['numid'].",'в обработке...','в обработке...','в обработке...','в обработке...','в обработке...','в обработке...',1,1)"; 
$result = mysql_query($query); 
mysql_close($link);
//Создали запись в БД

$dateb = explode(".", $_REQUEST["ldate"] );
$datep = explode(".", $_REQUEST["pdate"] );

//Проверка паспорта
//require 'pasport.php';

//VK include
//require 'vk.php';

//OK include
//require 'ok.php';

//Проверка в службе Судебных Приставов
//require 'fssprus.php';

//ISS-EXPERT include
//require 'expert.php';

//NBKI include
//require 'nbki.php';

//Генерация ПДФ
//require 'pdf.php';

?>

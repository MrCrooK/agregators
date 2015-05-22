<?
$dbhost = "localhost"; // Хост
$dbuser = "root"; // Имя пользователя
$dbpassword = ""; // Пароль
$dbname = "otchet"; // Имя базы данных
$link = mysql_connect($dbhost, $dbuser, $dbpassword) or die('Не удалось соединиться: ' . mysql_error());
mysql_select_db($dbname, $link) or die('Не удалось выбрать базу данных'); // Выбирает базу данных MySQL $dbname
?>

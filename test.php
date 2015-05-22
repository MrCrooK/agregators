<?
ini_set('display_errors',1);
error_reporting(E_ALL);
header('Content-Type: text/plain');
$run = "su root; ts /var/www/html/getnbki.sh {$_SERVER['REMOTE_ADDR']}";
system($run, $code);
var_dump($code);
?>

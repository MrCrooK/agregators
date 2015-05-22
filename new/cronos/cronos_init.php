<?
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, 'http://82.112.49.209:2225/cgi/CroScriptOld.exe' );
$post = array(
	'text'=>'000000',
	'bgcolor'=>'C0C0C0',
	'bgcolor2'=>'808080',
	'link'=>'800000',
	'HttpHostAdd'=>'',
	'Name'=>'Admin',
	'Protocol'=>'http:',
	'Password'=>'',
	'UserId'=>'',
	'WorkingDirectory'=>'C:\\www\\',
	'Login'=>'Войти'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
$answer = curl_exec($ch);
$pattern = '/UserId=([0-9]*)/'; 
preg_match($pattern, $answer, $matches); 
$session=(int)$matches[1];
/*
if(stristr($answer, iconv('utf-8','cp1251','Количество пользователей превысило максимальное'))) file_get_contents('http://82.112.49.209:2225/cgi/restart.exe');
if(stristr($answer, iconv('utf-8','cp1251','По адресу банк не найден'))) file_get_contents('http://82.112.49.209:2225/cgi/restart.exe');
*/
?>

<?
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, 'http://82.112.49.209:2225/cgi/CroScriptOld.exe' );
$post = array(
	'WorkingDirectory'=>'C%3A%5Cwww%5CU'.$session.'%5C',
	'Exit'=>'%CA%EE%ED%E5%F6+%F1%E5%F1%F1%E8%E8'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
$answer = curl_exec($ch);
?>

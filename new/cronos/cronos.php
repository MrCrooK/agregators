<?
$ch = curl_init();
require('cronos_init.php');
if($session){
	echo 'Session: '.$session.'<br>';

	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, 'http://82.112.49.209:2225/cgi/CroScriptOld.exe' );
	$post = array(
		'WorkingDirectory'=>'C%3A%5Cwww%5CU'.$session.'%5C',
		'Bank'=>'-1836686750',
		'BankSelect'=>'%C2%FB%E1%F0%E0%F2%FC+%E1%E0%ED%EA'
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	$answer = curl_exec($ch);
	
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, 'http://82.112.49.209:2225/cgi/CroScriptOld.exe' );
	$post = array(
		'WorkingDirectory'=>'C%3A%5Cwww%5CU'.$session.'%5C',
		'ReqType'=>'Simple',
		'ViewRows'=>'20',
		'Base'=>'1',
		'BaseSelect'=>'%C2%FB%E1%F0%E0%F2%FC+%E1%E0%E7%F3'
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	$answer = curl_exec($ch);

	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, 'http://82.112.49.209:2225/cgi/CroScriptOld.exe' );
	$post = array(
		'WorkingDirectory'=>'C%3A%5Cwww%5CU'.$session.'%5C',
		'SimpleFind'=>'%C2%FB%EF%EE%EB%ED%E8%F2%FC+%E7%E0%EF%F0%EE%F1',
		'Field4'=>iconv('utf-8','cp1251',$fio),
		'Field5'=>iconv('utf-8','cp1251',$bdate),
		'Empty'=>'',
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	$answer = curl_exec($ch);
	echo "В обработке....";
}
curl_close($ch);
?>

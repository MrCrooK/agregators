<?
$ch = curl_init();
if($session){
	echo 'Session: '.$session.'<br>';
	//$str = "-----------".date("m.d.Y H:i:s")."-----------\r\n";
	//$str .= 'Session: '.$session.'\r\n';
	//file_put_contents('/home/bitrix/www/info/new/cronos/log.txt',$str,FILE_APPEND);

	$answer = file_get_contents('http://82.112.49.209:2225/cgi/CroScriptOld.exe?WorkingDirectory=C:\www\U'.$session.'\&Finding=%CF%EE%E8%F1%EA');
	
	if(substr_count($answer,'BankSelect')) { 
			$query = "DELETE FROM `cronostab` WHERE `aid` = '".$aid."'"; 
			$result = mysql_query($query);
			/*echo file_get_contents('http://82.112.49.209:2225/cgi/restart.exe');*/
	}
	
	if(substr_count($answer,'GlobalReport')) {
		preg_match_all("/ViewCheck([0-9]*)/", $answer, $matches);
		$post = array();
		foreach($matches[1] as $val) {if($val) { $post['ViewCheck'.$val]='on'; $cc++; }}
		if($cc){
			$post['WorkingDirectory']='C%3A%5Cwww%5CU'.$session.'%5C';
			$post['ViewCheckAll']='on';
			$post['OutViewRows']='10000';
			$post['GlobalReport']='%CE%F2%F7%E5%F2';

			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_URL, 'http://82.112.49.209:2225/cgi/CroScriptOld.exe' );
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
			$answer = curl_exec($ch);		

			$cronos_html = iconv('cp1251','utf-8',$answer);
			$cronos_html_new = '';
			preg_match_all('/<a name=\"([0-9]+)\"><\/a>/is', $cronos_html, $count);
			foreach($count[1] as $items){
				$end = count($count[1]);
				$from = (int)trim($items);
				$to = $from+1;
				
				$start = '<a name=\"'.$from.'\"><\/a>';
				$stop = '<a name=\"'.$to.'\"><\/a>';
				if($to==$end)$stop = '<script';

				preg_match_all('/'.$start.'(.*)'.$stop.'/is', $cronos_html, $media);
				$cronos_html_new .= "<div class='cronos-item'>------------------------------------".$to."------------------------------------<br>".$media[1][0]."</div>";
			}
			//$str = "-----------".date("m.d.Y H:i:s")."-----------\r\n";
			//file_put_contents('/home/bitrix/www/info/new/cronos/log.txt',$answer,FILE_APPEND);
			
			mysql_query("UPDATE `nbkinew` SET `cronos` = '".addslashes($cronos_html_new)."' WHERE `id` = ".$id.";");

			$query = "DELETE FROM `cronostab` WHERE `aid` = '".$aid."'"; 
			$result = mysql_query($query); 
			
		} else {
			mysql_query("UPDATE `nbkinew` SET `cronos` = 'Записей не найдено' WHERE `id` = ".$id.";");
			$query = "DELETE FROM `cronostab` WHERE `aid` = '".$aid."'"; 
			$result = mysql_query($query); 
			echo "Записей не найдено";
		}
		require('cronos_close.php');
	}
	echo "В обработке....";
}
curl_close($ch);
?>


<?
foreach($_SERVER as $key => $val)
	$str .= $key .":". $val."\r\n";
foreach($_REQUEST as $key => $val)
	$str .= $key .":". $val."\r\n";

file_put_contents('log.txt',$str);

echo "записали";
?>

<?
$querystr = '';
foreach($_GET as $key => $val)
	$querystr .= $key ."=". trim(str_replace(' ','+',$val))."&";

$tableNBKI = file_get_contents('http://185.5.142.58:2222/nbki.php?'.$querystr);
?>

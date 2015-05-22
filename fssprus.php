<?
$json = json_decode(file_get_contents("http://vk.fssprus.ru/app/search?name=".$_REQUEST['lfam']."+".$_REQUEST['lname']."&region=".$_REQUEST['region']."&date=".$_REQUEST["ldate"]));
$fssprus  = $json->content;
?>

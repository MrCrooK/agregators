<?
if($_REQUEST["ldate"]&&$_REQUEST["propcity"]&&$_REQUEST['lfam']&&$_REQUEST['lname']&&$_REQUEST["id"]) {
$dateb = explode(".", $_REQUEST["ldate"] );

$propcity = trim(str_replace(array("рп.","г.","д.","п.","гор."),"",$_REQUEST["propcity"]));

//VK Start
require 'vkapi.class.php';
 
$api_id = '4742930'; // Insert here id of your application
$vk_id = '288553600'; // Insert here you vk id
 
$VK = new vkapi($api_id, $vk_id);
 
$resp = $VK->api('database.getCities', array('q'=>$propcity,'country_id'=>'1','count'=>'100'));

foreach($resp->items->city as $cities) {
	//echo $cities->title." ".$cities->region."<br>";
	if($cities->region=="Свердловская область") {$city = $cities->id; break;}
	if($cities->region=="Челябинская область") {$city = $cities->id; break;}
}
if(!$city) $city = $resp->items->city->id;
//echo $city;

$resp = $VK->api('users.search', array('q'=>$_REQUEST['lfam']." ".$_REQUEST['lname'],'count'=>'1','country'=>'1','city'=>$city,'birth_day'=>$dateb[0],'birth_month'=>$dateb[1],'birth_year'=>$dateb[2],));
$uid = $resp->items->user->id;
$type="full birth";
if(!$uid) {
	$resp = $VK->api('users.search', array('q'=>$_REQUEST['lfam']." ".$_REQUEST['lname'],'count'=>'1','country'=>'1','city'=>$city,'birth_day'=>$dateb[0],'birth_month'=>$dateb[1]));
	$uid = $resp->items->user->id;
	$type="birth no year";
}
if(!$uid) {
	$resp = $VK->api('users.search', array('q'=>$_REQUEST['lfam']." ".$_REQUEST['lname'],'count'=>'1','country'=>'1','city'=>$city));
	$uid = $resp->items->user->id;
	$type="no birth";
}


if($uid){
$resp = $VK->api('users.get', array('user_ids'=>$uid,'name_case'=>'Nom','fields'=>'sex,bdate,city,country,photo_50,photo_100,photo_200_orig,photo_200,photo_400_orig,photo_max,photo_max_orig,photo_id,online,online_mobile,domain,has_mobile,contacts,connections,site,education,universities,schools,can_post,can_see_all_posts,can_see_audio,can_write_private_message,status,last_seen,common_count,relation,relatives,counters,screen_name,maiden_name,timezone,occupation,activities,interests,music,movies,tv,books,games,about,quotes,personal'));

/*echo "<pre>";print_r($resp);echo "</pre>";*/
$igm = file_get_contents($resp->user->photo_100);
file_put_contents('img/'.md5($igm),$igm);
$uimg='img/'.md5($igm);

$tableVK = "<div  class='clVK'>Профиль ВКонтакте <a href='http://vk.com/id".$resp->user->id."'>".$resp->user->first_name." ".$resp->user->last_name."</a> ".$type."<br>
<img align='left' src='".$uimg."'>Город: ".$resp->user->city->title."<br>Skype: ".$resp->user->skype."<br>Телефон: ".$resp->user->home_phone."<br>День рождения: ".$resp->user->bdate."<br>";

if($resp->user->relatives->relative):
$tableVK .= "Родственники: ";
foreach($resp->user->relatives->relative as $val):
	if($val->id > 0) $respid = $VK->api('users.get', array('user_ids'=>$val->id,'fields'=>'screen_name,maiden_name,'));
	if($val->id > 0) $tableVK .= "<a href='http://vk.com/id".$val->id."'>".$respid->user->first_name." ".$respid->user->last_name."</a> ";
	else $tableVK .= $val->name." ";
endforeach;
endif;
$tableVK .= "<div style='width: 100%; clear: both;'></div></div>";
//VK End
echo $tableVK;
//Подключаемся к БД
require("dbconnect.php");
mysql_query("UPDATE `nbkinew` SET `vk` = '".addslashes($tableVK)."', `vkvalid` = '1' WHERE `id` = ".$_REQUEST["id"].";");
mysql_close($link);
}
} else { echo "Не достаточно данных ВКонтакте<br>";}
?>

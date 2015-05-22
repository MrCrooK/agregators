<?
//OK Start
$urlauth = 'https://www.ok.ru/https';

$urlsear = 'http://ok.ru/dk?st.cmd=searchResult&st.query='.$_REQUEST['lfam'].'%20'.$_REQUEST['lname'].'&st.bthDay='.$dateb[0].'&st.bthMonth='.($dateb[1]-1).'&st.bthYear='.$dateb[2].'&st.location='.$_REQUEST['propcity'].'&st.country=10414533690&st.mode=Users&st.grmode=Groups&st.posted=set';


$user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 6.0; ru; rv:1.9.2.13) ' .
           'Gecko/20101203 Firefox/3.6.13 ( .NET CLR 3.5.30729)';

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, ('cookie.txt'));
curl_setopt($ch, CURLOPT_COOKIEJAR, ('cookie.txt'));
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, $urlauth );
$post = array(
'st.redirect' => '',
'st.asr' => '',
'st.posted' => 'set',
'st.originalaction' => 'http://ok.ru/dk?cmd=AnonymLogin&st.cmd=anonymLogin',
'st.fJS' => 'enabled',
'st.st.screenSize' => '1366 x 768',
'st.st.browserSize' => '367',
'st.st.flashVer' => '16.0.0',
'st.email' => 'jopply@gmail.com',
'st.password' => '123456La',
'st.remember' => 'on',
'st.iscode' => 'false',
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
$answer = curl_exec($ch);
curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, ('cookie.txt'));
curl_setopt($ch, CURLOPT_COOKIEJAR, ('cookie.txt'));
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, $urlsear );
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
$answer = curl_exec($ch);
curl_close($ch);

if(preg_match('~data-log-click="(.*?)"~', $answer, $res));
if(preg_match('{"searchfb":"([0-9]*?),([0-9]*?),([0-9]*?),([0-9]*?)"}', html_entity_decode($res[1]), $rest));
/*echo "<pre>";print_r($rest);echo "</pre>";*/
if($rest[3]) {
$sig = md5("application_key=CBAGNKNDEBABABABAfields=uid,first_name,last_name,name,gender,age,location,pic_2,birthdayformat=JSONmethod=users.getInfoscope=VALUABLE_ACCESSuids=".$rest[3]."2677BE1CFD6CE0F1977E3927");

$arOK = json_decode(file_get_contents("http://api.odnoklassniki.ru/fb.do?application_key=CBAGNKNDEBABABABA&method=users.getInfo&scope=VALUABLE_ACCESS&uids=".$rest[3]."&fields=uid%2Cfirst_name%2Clast_name%2Cname%2Cgender%2Cage%2Clocation%2Cpic_2%2Cbirthday&format=JSON&sig=".$sig));
/*echo "<pre>";print_r($arOK);echo "</pre>";*/

$tableOK = "<div class='clOK'>Профиль Однокласники <a href='http://ok.ru/profile/".$rest[3]."'>".$arOK[0]->name."</a><br>";
$tableOK .= "<img align='left' src='".$arOK[0]->pic_2."'>";
$tableOK .= "День рождения: ".$arOK[0]->birthday."<br>";
$tableOK .= "Город: ".$arOK[0]->location->city."<br>";
$tableOK .= "<div style='width: 100%; clear: both;'></div></div>";
//OK End

//echo $tableOK;
}
?>

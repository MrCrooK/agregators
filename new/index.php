<html>
<head>
<title>Личный кабинет</title>
<script src="jquery-latest.js"></script>
<meta http-equiv="Content-Type" content="text/html;charset=windows-1251"/>
<link type="text/css" href="datepicker.css" rel="stylesheet" />    
<script type="text/javascript" src="datepicker.js"></script>
<script type="text/javascript">
/*
$(function(){
    $('#j_date').datepicker({ 
	changeMonth:true, 
	changeYear:true,
	minDate: "-10y",
	maxDate: "0",
	dateFormat: 'dd.mm.yy' 
    });
    $('#p_date').datepicker({ 
	changeMonth:true, 
	changeYear:true,
	minDate: "-10y",
	maxDate: "0",
	dateFormat: 'dd.mm.yy' 
    });
});
*/
</script>
<style>
.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #a4e271;
	-webkit-box-shadow:inset 0px 1px 0px 0px #a4e271;
	box-shadow:inset 0px 1px 0px 0px #a4e271;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #729e0c), color-stop(1, #4e7000));
	background:-moz-linear-gradient(top, #729e0c 5%, #4e7000 100%);
	background:-webkit-linear-gradient(top, #729e0c 5%, #4e7000 100%);
	background:-o-linear-gradient(top, #729e0c 5%, #4e7000 100%);
	background:-ms-linear-gradient(top, #729e0c 5%, #4e7000 100%);
	background:linear-gradient(to bottom, #729e0c 5%, #4e7000 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#729e0c', endColorstr='#4e7000',GradientType=0);
	background-color:#729e0c;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #74b807;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:11px 46px;
	text-decoration:none;
	text-shadow:2px 3px 2px #487009;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #4e7000), color-stop(1, #729e0c));
	background:-moz-linear-gradient(top, #4e7000 5%, #729e0c 100%);
	background:-webkit-linear-gradient(top, #4e7000 5%, #729e0c 100%);
	background:-o-linear-gradient(top, #4e7000 5%, #729e0c 100%);
	background:-ms-linear-gradient(top, #4e7000 5%, #729e0c 100%);
	background:linear-gradient(to bottom, #4e7000 5%, #729e0c 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#4e7000', endColorstr='#729e0c',GradientType=0);
	background-color:#4e7000;
}
.myButton:active {
	position:relative;
	top:1px;
}

.bordrad {border-radius: 5px;}
#formperson input {width: 150px;}
table {font-size: 12px;}


hr {width: 100%; color: #003399; background-color:#003399; border:0px none; height:2px; clear:both; }
.h1 {color: #003399; font-size: 16px; font-weight: bold; width: 150px;}
.h2 {font-size: 15px; }
.title {color: #003399; font-size: 16px;}
span {color: #666666;}
.tgray {margin-bottom: 10px;}
.tgray TBODY tr {background: #e0e0e0; border-top: 1px solid #666666;}
.tgray THEAD td {color: #003399; font-size: 15px;}
.rash {font-size: 10px; margin-bottom: 15px;}
.rash b {width: 12px; height: 12px; line-height: 12px; text-align: center; display: inline-block; margin-bottom: 3px;}
.clasitmA {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #ffcc00; background: #ffcc00;}
.clasitmX {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #c0c0c0; background: #c0c0c0;}
.clasitm0 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #666; border: 1px solid #666; background: #fff;}
.clasitm1 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #009966; background: #009966;}
.clasitm2 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #fe9800; background: #fe9800;}
.clasitm3 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #ff6600; background: #ff6600;}
.clasitm4 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #fe3200; background: #fe3200;}
.clasitm5 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #cc0000; background: #cc0000;}
.clasitm6 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #000000; background: #000000;}
.clasitm7 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #000000; background: #000000;}
.clasitm8 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #000000; background: #000000;}
.clasitm9 {width: 12px; height: 12px; line-height: 12px; text-align: center; color: #fff; border: 1px solid #000000; background: #000000;}
.clVK {width: 400px; background: #dfdfdf; margin-bottom: 10px; border: 1px solid #c0c0c0; float: left; margin-right: 10px; padding: 5px;}
.clOK {width: 400px; background: #dfdfdf; margin-bottom: 10px; border: 1px solid #c0c0c0; float: left; margin-right: 10px; padding: 5px;}

.app_result_head {
background-color: #e1e7ed;
color: #255b8e;
height: 18px;
font-weight: normal;
text-align: center;
border-bottom: 1px solid #d3dae0;
width: 20%;
padding: 5px 4px;
}
.app_result_cell:first-child {
border-left: 1px solid #dae1e8;
}
.app_result_cell {
background-color: white;
border-right: 1px solid #dae1e8;
border-bottom: 1px solid #dae1e8;
text-align: left;
vertical-align: top;
padding: 5px 4px;
color: #777;
width: 20%;
}	
</style>
</head>
<body style="background: url(headerfon.jpg);-moz-background-size: cover;background-size: cover;">
<div style="width: 960px; padding: 20px; margin: 20px auto; border-radius: 10px; background: #fff;">
		<script type="text/javascript">
            function AjaxFormRequest() {
		$('#result_id').html('Loading...');
                jQuery.ajax({
                    url:     "query.php", //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных
                    data: jQuery("#formperson").serialize(), 
                    success: function(response) { //Если все нормально
                       document.getElementById("result_id").innerHTML = response;
                    },
                    error: function(response) { //Если ошибка
                       document.getElementById("result_id").innerHTML = "Ошибка при отправке формы";
                    }
             });
        }
 	</script>
<form method="post" action="query.php" id="formperson">
<table cellpadding="5" ><tr valign="top">
<td>
<b>Данные паспорта</b><br>
Серия:<br>
<input type="text" name="pseri" value="<?=$_REQUEST['pseri']?>"><br><br>

Номер:<br>
<input type="text" name="pnum" value="<?=$_REQUEST['pnum']?>"><br><br>

Дата выдачи:<br>
<input type="text" name="pdate" id="p_date" value="<?=$_REQUEST['pdate']?>"><br><br>
    
Кем выдано:<br>
<input type="text" name="pkem" value="<?=$_REQUEST['pkem']?>"><br><br>

Место выдачи:<br>
<input type="text" name="pmesto" value="<?=$_REQUEST['pmesto']?>"><br><br>
<td>
<td>
<b>Личные данные</b><br>
Фамилия:<br>
<input type="text" name="lfam" value="<?=$_REQUEST['lfam']?>"><br><br>

Имя:<br>
<input type="text" name="lname" value="<?=$_REQUEST['lname']?>"><br><br>

Отчество:<br>
<input type="text" name="lotch" value="<?=$_REQUEST['lotch']?>"><br><br>

Дата рождения:<br>
<input type="text" name="ldate" id="j_date" value="<?=$_REQUEST['ldate']?>"><br><br>
    
Место рождения:<br>
<input type="text" name="lmesto" value="<?=$_REQUEST['propul']?>"><br><br>
</td>
<td>
<b>Адрес прописки</b><br>
Город:<br>
<input type="text" name="propcity" value="<?=$_REQUEST['propul']?>"><br><br>

Улица:<br>
<input type="text" name="propul" value="<?=$_REQUEST['propul']?>"><br><br>

Регион:<br>
<input type="text" name="region" value="<?=$_REQUEST['region']?>"><br><br>
</td>
<td>
<b>Адрес проживания</b><br>
Город:<br>
<input type="text" name="projcity" value="<?=$_REQUEST['projcity']?>"><br><br>

Улица:<br>
<input type="text" name="projul" value="<?=$_REQUEST['projul']?>"><br><br>

Номер заявки:<br>
<input type="text" name="numid" value="<?=$_REQUEST['numid']?>"><br><br>
<input type="hidden" name="true_nbki" value="4">
</td>
</tr></table>
<input type="submit" id="sendForm" style="margin: 6px;" value="Проверить" onclick="AjaxFormRequest(); return false;">
</form>
<div id="result_id"></div>
</div>
</body>
</html>

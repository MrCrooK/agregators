
<style>
.bordrad {border-radius: 5px;}
#formperson input {width: 150px;}
table {font-size: 12px;border-spacing: 0; color: #777; font-family: 'Times New Roman', Geneva, Arial, Helvetica, sans-serif; }
hr {width: 100%; color: #255b8e; background-color:#255b8e; border:0px none; height:2px; clear:both; }
.h1 {color: #255b8e; font-size: 16px; font-weight: bold; width: 150px; padding: 5px;}
.h2 {font-size: 15px; }
.title {color: #255b8e; font-size: 16px;}
span {color: #255b8e;}
.tgray {margin-bottom: 10px;}
.tgray TBODY tr {background: #e1e7ed; border-top: 1px solid #255b8e;}
.tgray THEAD td {color: #255b8e; font-size: 15px;}
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
.clVK {color: #255b8e;width: 380px;background:#e1e7ed;border:1px solid #d3dae0;float:left;padding:5px;margin:5px 0;}
.clVK a {color: #255b8e;}
.clOK {color: #255b8e;width: 380px;background:#e1e7ed;border:1px solid #d3dae0;float:right;padding:5px;margin:5px 0;}
.clOK a {color: #255b8e;}

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
<?
	$output = file_get_contents('result.xml');
	preg_match_all("/product(.*)product/s", $output, $matches);
	$str = "<?xml version='1.0' encoding='windows-1251' ?><".$matches[0][0].">";

	$xml = simplexml_load_string($str);
	$person = $xml->preply->report->PersonReply;
	$calc = $xml->preply->report->calc;
	$pasport = $xml->preply->report->IdReply;
	$adres = $xml->preply->report->AddressReply;
	$banki = $xml->preply->report->AccountReply;
?>
<?
$tableContact = '
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tr valign="top">
        <td class="h1" valign="top">Заемщик</td>
        <td valign="top">
		<div class="title">ФИО</div>
		<div>'.$person->name1.' '.$person->first.' '.$person->paternal.'</div>
	</td>
        <td valign="top">
		<div class="title">Личные данные</div>
		<div><span>Дата рождения:</span> '.substr($person->birthDt, 0, 10).'</div>
		<div><span>Место рождения:</span> '.$person->placeOfBirth.'</div>
		<div><span>Гражданство:</span> '.$person->nationality.'</div>
		<div><span>Пол:</span> '.$person->genderText.'</div>
	</td>
    </tr>
</table>
';
?>


<?foreach($calc->totalHighCredit as $item):?>
	<?$totalHighCredit .= '<div style="text-align: right;">'.$item->Code.' '.$item->Value.'</div>';?>
<?endforeach?>
<?foreach($calc->totalScheduledPaymnts as $item):?>
	<?$totalScheduledPaymnts .= '<div style="text-align: right;">'.$item->Code.' '.$item->Value.'</div>';?>
<?endforeach?>
<?foreach($calc->totalCurrentBalance as $item):?>
	<?$totalCurrentBalance .= '<div style="text-align: right;">'.$item->Code.' '.$item->Value.'</div>';?>
<?endforeach?>
<?foreach($calc->totalPastDueBalance as $item):?>
	<?$totalPastDueBalance .= '<div style="text-align: right;">'.$item->Code.' '.$item->Value.'</div>';?>
<?endforeach?>
<?foreach($calc->totalScheduledPaymnts as $item):?>
	<?$totalScheduledPaymnts .= '<div style="text-align: right;">'.$item->Code.' '.$item->Value.'</div>';?>
<?endforeach?>

<?
$tableCalc = '
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tr valign="top">
        <td class="h1" valign="top">Сводка</td>
        <td valign="top">
		<div class="title">Счета</div>
		<table border="0" width="100%" class="tgray" cellspacing="0" cellpadding="3">
		<THEAD>
		    <tr>
			<td width="20%">Тип счета</td>
			<td width="20%">Счета</td>
			<td width="20%">Договоры</td>
			<td width="20%">Баланс</td>
			<td width="20%">Открыт</td>
		    </tr>
		</THEAD>
		<TBODY>
		    <tr>
			<td class="h2" valign="top">Все счета</td>
			<td valign="top">
				<div><span>Всего:</span> '.$calc->totalAccts.'</div>
				<div><span>Негативных:</span> '.$calc->negativeRating.'</div>
				<div><span>Открытых:</span> '.$calc->totalActiveBalanceAccounts.'</div>			
			</td>
			<td valign="top">
				<div><span>Кред.лимит:</span><br>'.$totalHighCredit.'
				</div>
				<div><span>Ежемес.плат.:</span><br>'.$totalScheduledPaymnts.'
				</div>			
			</td>
			<td valign="top">
				<div><span>Текущий:</span><br>'.$totalCurrentBalance.'</div>
				<div><span>Задолж-сть:</span><br>'.$totalPastDueBalance.'</div>
				<div><span>Просрочено:</span><br>'.$totalScheduledPaymnts.'</div>
			</td>
			<td valign="top">
				<div><span>Последний:</span> '.substr($calc->mostRecentAcc, 0, 10).'</div>
				<div><span>Первый:</span> '.substr($calc->oldest, 0, 10).'</div>
			</td>
		    </tr>
		</TBODY>
		</table>
		<div class="title">Запросы</div>
		<table border="0" width="100%" class="tgray" cellspacing="0" cellpadding="3">
		<THEAD>
		    <tr>
			<td width="20%">Тип запроса</td>
			<td width="20%">Всего</td>
			<td width="20%">За послед.30 дней</td>
			<td width="20%">Последние (24 месяца)</td>
			<td width="20%">Последний</td>
		    </tr>
		</THEAD>
		<TBODY>
		    <tr>
			<td class="h2" valign="top">Все запросы</td>
			<td valign="top">
				<div>'.$calc->totalInquiries.'</div>			
			</td>
			<td valign="top">
				<div>'.$calc->recentInquiries.'</div>			
			</td>
			<td valign="top">
				<div>'.$calc->collectionsInquiries.'</div>
			</td>
			<td valign="top">
				<div>'.$calc->mostRecentInqText.'</div>
			</td>
		    </tr>
		</TBODY>
		</table>
	</td>
    </tr>
</table>
';
?>

<?
$tablePasport = '
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tr valign="top">
        <td class="h1" valign="top">Идентификация<br>заемщика</td>
        <td valign="top">
		<div class="title">Паспорт гражданина РФ</div>
		<table border="0" width="100%" class="tgray" cellspacing="0" cellpadding="3">
		<THEAD>
		    <tr>
			<td width="90">Номер</td>
			<td width="90">Дата выдачи</td>
			<td>Кем выдан</td>
			<td width="60">Дата</td>
		    </tr>
		</THEAD>
		<TBODY>
		    <tr>
			<td valign="top">'.$pasport->seriesNumber.' '.$pasport->idNum.'</td>
			<td valign="top">'.substr($pasport->issueDate, 0, 10).'</td>
			<td valign="top">'.$pasport->issueAuthority.'</td>
			<td valign="top">'.substr($pasport->lastUpdatedDt, 0, 10).'</td>
		    </tr>
		</TBODY>
		</table>
	</td>
    </tr>
</table>
';
?>

<?foreach($adres as $item):?>
<?
$fulladres .= '
		<div class="title">'.$item->addressTypeText.'</div>
		<table border="0" width="100%" class="tgray" cellspacing="0" cellpadding="3">
		<THEAD>
		    <tr>
			<td>Улица</td>
			<td width="90">Страна</td>
			<td width="90">Регион</td>
			<td width="120">Район</td>
			<td width="60">Дата</td>
		    </tr>
		</THEAD>
		<TBODY>
		    <tr>
			<td valign="top">'.$item->postal.', '.$item->city.', '.$item->street.', '.$item->houseNumber.', '.$item->apartment.'</td>
			<td valign="top">'.$item->countryCodeText.'</td>
			<td valign="top">'.$item->prov.'</td>
			<td valign="top">'.$item->provText.'</td>
			<td valign="top">'.substr($item->lastUpdatedDt, 0, 10).'</td>
		    </tr>
		</TBODY>
		</table>
';?>
<?endforeach?>

<?
$tableAdres = '
<hr>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tr valign="top">
        <td class="h1" valign="top">Адреа</td>
        <td valign="top">
'.$fulladres.'
	</td>
    </tr>
</table>
';
?>

<?
$tableInfo = '
<hr>
<div style="page-break-after:always; width: 100%;"></div>
<!--<hr>-->
<table border="0" width="100%" cellspacing="0" cellpadding="0>
    <tr valign="top">
        <td class="h1" valign="top">Счета</td>
        <td valign="top">
		<div class="title">Расшифровка своевременности платежей</div>
		<table border="0" width="100%" cellspacing="0" cellpadding="0" class="rash"><tr>
			<td valign="top">
				<div><b style="color: #666; border: 1px solid #666;">0</b> Новый, оценка невозможна</div>
				<div><b style="color: #fff; border: 1px solid #009966; background: #009966;">1</b> Оплата без просрочек</div>
				<div><b style="color: #fff; border: 1px solid #ffcc00; background: #ffcc00;">A</b> Просрочка от 1 до 29 дней</div>
			</td>
			<td valign="top">
				<div><b style="color: #fff; border: 1px solid #fe9800; background: #fe9800;">2</b> Просрочка от 30 до 59 дней</div>
				<div><b style="color: #fff; border: 1px solid #ff6600; background: #ff6600;">3</b> Просрочка от 60 до 89 дней</div>
				<div><b style="color: #fff; border: 1px solid #fe3200; background: #fe3200;">4</b> Просрочка от 90 до 119 дней</div>
			</td>
			<td valign="top">
				<div><b style="color: #fff; border: 1px solid #cc0000; background: #cc0000;">5</b> Просрочка более 120 дней</div>
				<div><b style="color: #fff; border: 1px solid #000; background: #000;">7</b> Регулярн.консолидир.платежи</div>
				<div><b style="color: #fff; border: 1px solid #000; background: #000;">8</b> Взыскание оплаты залогом</div>
			</td>
			<td valign="top">
				<div><b style="color: #fff; border: 1px solid #000; background: #000;">9</b> Безнадёжный долг/ передано на взыскание</div>
				<div><b style="color: #fff; border: 1px solid #c0c0c0; background: #c0c0c0;">X</b> Нет данных</div>
			</td>
		</tr></table>
	</td>
    </tr>
</table>
';
?>


<?foreach($banki as $bankiitm):?>
<?
$daystr = '';
$str = '';
$str = (string) $bankiitm->paymtPat;
while ($i < strlen($str)):
 $daystr .= "<td class='clasitm".$str[$i]."'>".$str[$i]."</td>";
$i++;
endwhile;
?>
<?
$tableBanki .= '
<table border="0" width="100%" class="tgray" cellspacing="0" cellpadding="3">
		<TBODY>
		    <tr>
			<td valign="top" width="25%">
				<div class="title">Счет</div>
				<div><span>Вид:</span> '.$bankiitm->acctTypeText.'</div>
				<div><span>Отношение:</span> '.$bankiitm->ownerIndicText.'</div>
			</td>
			<td valign="top" width="25%">
				<div class="title">Договор</div>
				<div><span>Размер/лимит:</span> '.$bankiitm->currencyCode.' '.$bankiitm->creditLimit.'</div>
			</td>
			<td valign="top" width="25%">
				<div class="title">Состояние</div>
				<div><span>Открыт:</span> '.substr($bankiitm->openedDt, 0, 10).'</div>
				<div><span>Статус:</span> '.$bankiitm->accountRatingText.'</div>
				<div><span>Дата статуса:</span> '.substr($bankiitm->reportingDt, 0, 10).'</div>
				<div><span>Последн.выплата:</span> '.substr($bankiitm->lastPaymtDt, 0, 10).'</div>
				<div><span>Последн.обновление:</span> '.substr($bankiitm->paymtPatStartDt, 0, 10).'</div>
			</td>
			<td valign="top" width="25%">
				<div class="title">Баланс</div>
				<div><span>Всего выплачено:</span> '.$bankiitm->currencyCode.' '.$bankiitm->curBalanceAmt.'</div>
				<div><span>Задолж-сть:</span> '.$bankiitm->currencyCode.' '.$bankiitm->amtOutstanding.'</div>
				<div><span>Просрочено:</span> '.$bankiitm->currencyCode.' '.$bankiitm->amtPastDue.'</div>
				<div><span>След.платеж:</span> '.$bankiitm->currencyCode.' '.$bankiitm->termsAmt.'</div>
			</td>
		    </tr>
		    <tr>	
			<td valign="top" width="25%">
				<div class="title">Просроч.платежей</div>
				<div><span>Просрочек от 30 до 59 дн.:</span> '.substr($bankiitm->numDays30, 0, 10).'</div>
				<div><span>Просрочек от 60 до 89 дн.:</span> '.substr($bankiitm->numDays60, 0, 10).'</div>
				<div><span>Просрочек более, чем на 90 дн.:</span> '.substr($bankiitm->numDays90, 0, 10).'</div>
			</td>
			<td valign="top" colspan="3">
				<div class="title">Своевременность платежей (за '.$bankiitm->monthsReviewed.' мес, последний - слева)</div>
				<table><tr>
'.$daystr.'
				</tr></table>
			</td>
		    </tr>
		</TBODY>
</table>
';
?>
<?endforeach?>
<?
//Выводим собранные данные
echo $tableContact.$tableCalc.$tablePasport.$tableAdres.$tableInfo.$tableBanki;
?>

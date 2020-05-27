<?php 
include './manage.php';
$RESDATA = rest_data($_POST['id-rest']);
echo "<form id=\"edit-profile-rest\">
		<h2 align=\"center\">Основная информация</h2>";

foreach ($RESDATA as $key => $value){
	if($value == Null){
$value = "";
};
if ($key == "name") {
	unset($key);
}
	switch ($key) {

		case 'address':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">Адрес</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите адрес предприятия\" value=\"".$value."\" required>
	</div>";
			break;
		case 'email':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">E-mail</label>
        <input type=\"email\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите электронную почту\" value=\"".$value."\" required>
	</div>";
			break;
			case 'city':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">Город</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Укажите город, в котором находится ваш ресторан\" value=\"".$value."\" required>
	</div>";
			break;
			case 'work_phone':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\"> Рабочий телефон</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите рабочий номер телефона\" value=\"".$value."\" required>
	</div>";
			break;
			
        case 'description':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">Описание</label>
        <textarea class=\"form-control\" id=\"".$key."\" name=\"".$key."\" rows=\"5\" cols=\"30\" required maxlength=\"300\"
        placeholder=\"Опишите ваш ресторан\">".$value."</textarea>
    </div>";
			break;
			case 'site_link':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\"> Сайт</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Укажите ссылку на ваш сайт или группу в соц.сети\" value=\"".$value."\">
	</div>";
			break;
	
	}
	

}

echo "<h2 align=\"center\">Банковские реквизиты</h2>";
foreach ($RESDATA as $key => $value){
	if($value == Null){
$value = "";
};
if ($key == "name") {
	unset($key);
}
	switch ($key) {

		case 'BIK':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">БИК</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите БИК\" value=\"".$value."\" required>
	</div>";
			break;
		case 'INN':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">ИНН</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите ИНН\" value=\"".$value."\" required>
	</div>";
			break;
			case 'OKPO':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">ОКПО</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите ОКПО\" value=\"".$value."\" required>
	</div>";
			break;
			case 'KPP':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\"> КПП</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите КПП\" value=\"".$value."\" required>
	</div>";
			break;
			case 'recipiet':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\"> Получатель</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите ФИО получателя\" value=\"".$value."\" required>
	</div>";
			break;
			case 'KC':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\"> Корреспондентский счёт</label>
        <input type=\"text\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите К/С\" value=\"".$value."\" required>
	</div>";
			break;
	}
	

}


echo "<div class=\"row\">
	<div class=\"col-sm-12 col-md-6\" align=\"left\">
		<button type=\"submit\" class=\"btn btn-outline-info\">Сохранить</button>
	</div>
	<div class=\"col-sm-12 col-md-6\" align=\"right\">
		<button type=\"button\" class=\"btn btn-outline-primary reset\">Сбросить изменения</button>
	</div>
</div>


</form>";
?>
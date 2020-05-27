<?php 
echo "
	<p class='rest-head mb-0' align='center'>Основная информация</p>
	<div class=\"form-group\">
        <label for=\"name\" class=\"control-label\">Название</label>
        <input type=\"text\" name=\"name\"class=\"form-control\" placeholder=\"Введите название ресторана*\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"description\" class=\"control-label\">Описание</label>
        <textarea class=\"form-control\"name=\"description\" rows=\"5\" cols=\"30\" required maxlength=\"300\"
        placeholder=\"Опишите ваш ресторан*\"></textarea>
        
	</div>
	<div class=\"form-group\">
        <label for=\"site_link\" class=\"control-label\">Ссылка</label>
        <input type=\"text\" name=\"site_link\"class=\"form-control\" placeholder=\"Ссылка(если есть)\" value=\"\">
    </div>

    <p class='rest-head mb-0' align='center'>Контанкты</p>
	<div class=\"form-group\">
        <label for=\"email\" class=\"control-label\">E-mail</label>
        <input type=\"email\" name=\"email\"class=\"form-control\" placeholder=\"Введите email*\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"city\" class=\"control-label\">Город</label>
        <input type=\"text\" name=\"city\"class=\"form-control\" placeholder=\"Укажите название города\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"address\" class=\"control-label\">Адрес</label>
        <input type=\"text\" name=\"address\"class=\"form-control\" placeholder=\"Укажите адрес ресторана*\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"work_phone\" class=\"control-label\">Рабочий телефон</label>
        <input type=\"text\" name=\"work_phone\"class=\"form-control\" placeholder=\"Введите рабочий номер телефона*\" value=\"\" required>
	</div>

	<p class='rest-head mb-0' align='center'>Банковские реквазиты</p>
	<div class=\"form-group\">
        <label for=\"BIK\" class=\"control-label\">БИК</label>
        <input type=\"text\" name=\"BIK\"class=\"form-control\" placeholder=\"Введите БИК*\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"INN\" class=\"control-label\">ИНН</label>
        <input type=\"text\" name=\"INN\"class=\"form-control\" placeholder=\"Введите ИНН*\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"OKPO\" class=\"control-label\">ОКПО</label>
        <input type=\"text\" name=\"OKPO\"class=\"form-control\" placeholder=\"Введите ОКПО*\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"KPP\" class=\"control-label\">КПП</label>
        <input type=\"text\" name=\"KPP\"class=\"form-control\" placeholder=\"Введите КПП*\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"recipiet\" class=\"control-label\">Получатель</label>
        <input type=\"text\" name=\"recipiet\"class=\"form-control\" placeholder=\"Введите получателя*\" value=\"\" required>
	</div>
	<div class=\"form-group\" >
        <label for=\"KC\" class=\"control-label\">К/С</label>
        <input type=\"text\" name=\"KC\"class=\"form-control\" placeholder=\"Введите К/С*\" value=\"\" required>
	</div>

";?>
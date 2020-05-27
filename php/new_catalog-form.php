<?php 


echo "
	<div class=\"form-group\" align='center'>
        <label for=\"status\" class=\"control-label\">Статус</label>
        <input type=\"checkbox\" style='margin-left:48%' name=\"status\"class=\"form-control\">
	</div>
	<div class=\"form-group\">
        <label for=\"name\" class=\"control-label\">Название продукта</label>
        <input type=\"text\" name=\"name\"class=\"form-control\" placeholder=\"Введите название продукта\" value=\"\" required>
	</div>
	<div class=\"form-group\">
        <label for=\"description\" class=\"control-label\">Описание</label>
        <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"5\" cols=\"30\" required maxlength=\"300\"
        placeholder=\"Опишите ваш продукт\"></textarea>
    </div>
	<div class=\"form-group\">
        <label for=\"price\" class=\"control-label\">Цена</label>
        <input type=\"number\" id=\"price\" name=\"price\"class=\"form-control\" placeholder=\"Укажите стоимость\" value=\"\" required>
	</div>";


?>
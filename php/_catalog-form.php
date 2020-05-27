<?php 

include 'catalog_prog.php';
$id =  preg_replace("/.*?\?/", '', $_POST["id-rest"]);
$openCaT = $catalog->getCat($id);
$correctCAT = $_POST["id_prod"];

foreach ($openCaT[$correctCAT] as $key => $value){

	switch ($key) {
		case '0':
			break;
		case 'status':
			if ($value == 1){
				$status = "checked";
			}else{
				$status = "";
			}
			echo "
	<div class=\"form-group\" align='center'>
        <label for=\"".$key."\" class=\"control-label\">Статус</label>
        <input type=\"checkbox\" style='margin-left:48%' name=\"".$key."\"class=\"form-control\" ".$status.">
	</div>";
			break;
		case 'name':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">Название продукта</label>
        <input type=\"text\" name=\"".$key."\"class=\"form-control\" placeholder=\"Введите название продукта\" value=\"".$value."\" required>
	</div>";
			break;
        case 'description':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">Описание</label>
        <textarea class=\"form-control\" id=\"".$key."\" name=\"".$key."\" rows=\"5\" cols=\"30\" required maxlength=\"300\"
        placeholder=\"Опишите ваш продукт\">".$value."</textarea>
    </div>";
			break;
			case 'price':
			echo "
	<div class=\"form-group\">
        <label for=\"".$key."\" class=\"control-label\">Цена</label>
        <input type=\"number\" id=\"".$key."\" name=\"".$key."\"class=\"form-control\" placeholder=\"Укажите стоимость\" value=\"".$value."\" required>
	</div>";
			break;
	
	}
	

}?>
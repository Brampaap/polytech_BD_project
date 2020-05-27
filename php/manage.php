<?php
session_start();
require 'connect.php';
class RegRest {
    public function reg() {
    	global $dbh;
        //Подключение
        // Подготовка запроса
		$exe = $dbh->prepare("
        INSERT INTO contacts (email,city,address,work_phone) VALUES (:email,:city,:address,:work_phone);
        INSERT INTO details(BIK,INN,OKPO,KPP,recipiet,KC) VALUES(:BIK,:INN,:OKPO,:KPP,:recipiet,:KC);
        INSERT INTO Restaurants(name, id_bank_details, id_contacts, description, image, site_link) VALUES (:name, (SELECT id FROM details ORDER BY ID DESC LIMIT 1), (SELECT id FROM contacts ORDER BY ID DESC LIMIT 1),:description, :image, :site_link);
        INSERT INTO admin_in_restaurant(id_user, id_restaurant) VALUES (:id_admin,(SELECT id FROM Restaurants order by ID DESC limit 1));
        ");
        // Выполнение запроса
		return $exe->execute(array(
			':email' 		=> 		$_POST["email"], 
			':city' 		=> 		$_POST["city"], 
			':address' 		=>	 	$_POST["address"], 
			':work_phone' 	=> 		$_POST["work_phone"], 
			':BIK' 			=>		$_POST["BIK"], 
			':name' 		=> 		$_POST["name"],
			':description' 	=> 		$_POST["description"],
			':site_link' 	=> 		$_POST["site_link"],
			':INN' 			=> 		$_POST["INN"],
			':OKPO' 		=> 		$_POST["OKPO"], 
			':KPP' 			=> 		$_POST["KPP"], 
			':recipiet' 	=>	 	$_POST["recipiet"], 
			':KC' 			=> 		$_POST["KC"], 
			':id_admin' 	=>		$_SESSION["id"],
			':image'		=>		"../img/default-image.jpg"
		));

        }
    }

function rest_data($id){
	#Запрос данных о ресторане
	#Содержимое:
	#[email, city, address, work_phone, // Contacts
	# BIK, INN, OKPO, KPP, recipiet, KC // Details
	# name, id_bank_details, id_contacts, description, image, site_link // Restaurants
	# f_name, l_name // userdata - admin name]
	$id =  preg_replace("/.*?\?/", '', $id);
	$exe = $GLOBALS['dbh']->query("SELECT id, name, id_bank_details, id_contacts, description, image, site_link FROM Restaurants WHERE id = ".$id.";");
	$result = $exe->fetch();
	$exe = $GLOBALS['dbh']->query("SELECT email, city, address, work_phone FROM contacts WHERE id = ".$result["id_contacts"].";");
	$tmp = $exe->fetch();
	$result += $tmp;
	$exe = $GLOBALS['dbh']->query("SELECT BIK, INN, OKPO, KPP, recipiet, KC FROM details WHERE id = ".$result["id_bank_details"].";");
	$tmp = $exe->fetch();
	$result += $tmp;
	$exe = $GLOBALS['dbh']->query("SELECT f_name, l_name FROM userdata WHERE id = (SELECT id_userdata FROM user_in_data WHERE id_user = ".$_SESSION["id"].");");
	$tmp = $exe->fetch();
	$result += $tmp;
	return $result;
}


if(isset($_FILES['image'])){
	#Запрос данных о ресторане
	$res = rest_data($_POST['id_rest']);
	#Lоступно для загрузки всего 2 формата: .png, .jpg)
	#Для редактирование обращаться в manager.php - input.dropify

	#Путь для сайта
	$destination_dir = '../restaurants/'.$res["name"].'/'.$_FILES['image']['name'];
	#Путь для БД
	$dir = './restaurants/'.$res["name"].'/'.$_FILES['image']['name'];
	#Загрузка изображения на сервер
	move_uploaded_file($_FILES['image']['tmp_name'], $destination_dir);
	#Загрузка пути и названия в БД
	$exe = $GLOBALS['dbh']->prepare("UPDATE Restaurants SET image = '".$dir."' WHERE id = ".$res["id"].";");
	$exe->execute();
	echo $dir;
	return 0;
}
if(!isset($_POST["adds-res"])){
	if (isset($_POST['work_phone'], $_POST["description"])) {
	#Запрос данных о ресторане
	$res = rest_data($_POST["id-rest"]);
	$exe = $GLOBALS['dbh']->prepare("UPDATE Restaurants SET description = :description, site_link = :site_link WHERE id = ".$res["id"].";
		UPDATE contacts Set email = :email, city = :city, address = :address, work_phone = :work_phone WHERE id = ".$res["id_contacts"]."; 
		UPDATE details Set BIK = :BIK, INN = :INN, OKPO = :OKPO, KPP = :KPP, recipiet = :recipiet, KC = :KC WHERE id =".$res["id_bank_details"].";");
	$exe->execute(array(':description' => $_POST["description"], ':site_link' => $_POST["site_link"], ':email' => $_POST["email"], ":city" => $_POST["city"], ":address" => $_POST["address"], ":work_phone" => $_POST["work_phone"],':BIK' => $_POST["BIK"], ':INN' => $_POST["INN"], ":OKPO" => $_POST["OKPO"],":KPP" => $_POST["KPP"],':recipiet' => $_POST["recipiet"],':KC' => $_POST["KC"]));
	return 0;

 

}
}else{
if(isset($_POST["name"])){
	$reg = new RegRest();
	$reg->reg();
}}
?>
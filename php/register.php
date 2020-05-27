<?php 
require 'connect.php';

class RegClass {
    /**
     * Регистрация пользователя в сети, все проверки 
     * выполняются в запросах или у клиента
     */

    
    public function reg() {
    	global $dbh;
        //Подключение
        // Подготовка запроса
		$exe = $dbh->prepare("
        INSERT INTO users(login, password) VALUES(:login, :password);
        INSERT INTO contacts (email) VALUES (:email);
        INSERT INTO userdata(f_name, d_of_reg, born, id_contacts, gender) VALUES (:f_name, (SELECT CURRENT_DATE), :born, (SELECT id FROM contacts order by `ID` DESC limit 1), :gender);
        INSERT INTO social_networks(id) SELECT id FROM userdata order by `ID` DESC limit 1;
        INSERT INTO bonus(id) SELECT id FROM userdata order by `ID` DESC limit 1;
        INSERT INTO user_in_data VALUES(null,(SELECT id_user FROM users order by `id_user` DESC limit 1),(SELECT id FROM userdata order by `ID` DESC limit 1));
        INSERT INTO user_in_level VALUES(null,(SELECT id_user FROM users order by `id_user` DESC limit 1),0);
        ");
        // Выполнение запроса
		return $exe->execute(array(':login' => $_POST["login"], ':password' => md5($_POST["password"]), ':email' => $_POST["email"], ":f_name" => $_POST["name"], ":born" => $_POST["born"], ":gender" => $_POST["gender"]));

        
        }
    }
// Потенциальный функционал - удаление аккаунта
 
$auth = new RegClass();
 
if($auth->reg()){
    echo '<script>document.location.href="/page-login.php"</script>';
}
exit();


?>
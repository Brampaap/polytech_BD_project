<? 
session_start();
require 'connect.php';

class AuthClass {
    /**
     * Проверяет, авторизован пользователь или нет
     * Возвращает true если авторизован, иначе false
     * @return boolean 
     */
    
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }
     
    /**
     * Авторизация пользователя
     * @param string $login
     * @param string $passwors 
     */
    public function auth($login, $password) {	
		$exe = $GLOBALS['dbh']->prepare("SELECT * FROM user_in_data WHERE id_user = (SELECT id_user FROM users WHERE login = :login AND password = :password);");
		$exe->execute(array(':login' => $login, ':password' => $password));
		$result = $exe->fetch();
        if (isset($result["id_userdata"])) { //Если логин и пароль введены правильно
            $tmp = $GLOBALS['dbh']->query("SELECT f_name FROM userdata WHERE id = ".$result["id_userdata"].";");
            $tmp = $tmp->fetch();
            $_SESSION["id"] = $result["id_user"];
            $_SESSION["f_name"] = $tmp["f_name"];
            $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
            unset($_SESSION["bad_try"]);
            return true;
        }
        else { //Логин и пароль не подошел

            $_SESSION["is_auth"] = false;
            $_SESSION["bad_try"] = true;
            return false; 
        }
    }
     
    /*
     * Запрос уровня доступа 
     */
    public function levelAccess() {
        if ($this->isAuth()) { //Если пользователь авторизован
            $exe = $GLOBALS['dbh']->query("SELECT id_level FROM user_in_level WHERE id_user = ".$_SESSION["id"].";");
            $result = $exe->fetch();
            return $result["id_level"];
        }
    }
    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
     
     
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}
 
class RestRequest {

    public function openRec()
    {
      $exe = $GLOBALS['dbh']->prepare("SELECT Restaurants.id, name, description, image, site_link, address FROM Restaurants INNER JOIN contacts ON Restaurants.id_contacts = contacts.id LIMIT 10;");
      $exe->execute();
      $res = $exe->fetchAll();
      return $res;
    }
    // MANAGER START
    public function managerCatalog()
    {
      $exe = $GLOBALS['dbh']->prepare("SELECT Restaurants.id, name, description, image, site_link, address FROM Restaurants INNER JOIN contacts ON Restaurants.id_contacts = contacts.id WHERE Restaurants.id IN (select id_restaurant FROM admin_in_restaurant WHERE id_user = ".$_SESSION["id"].");");
      $exe->execute();
      $res = $exe->fetchAll();
      return $res;
    }
    //MANAGER END
    public function pageRest($id)
    {
     $id =  preg_replace("/.*?\?/", '', $id);
     $exe = $GLOBALS['dbh']->prepare("SELECT name, description, image, site_link, address FROM Restaurants INNER JOIN contacts ON Restaurants.id_contacts = contacts.id WHERE Restaurants.id = :id;");
      $exe->execute(array(':id' => $id ));
      $res = $exe->fetchAll();
      if ($res == []){
        echo '<script>document.location.href="./index.php"</script>';
      }
      return $res[0];
    }
    public function catReq($id)
    {
     $id =  preg_replace("/.*?\?/", '', $id);
     $exe = $GLOBALS['dbh']->prepare("SELECT * FROM product WHERE id IN(SELECT idProd FROM product_in_restaurants WHERE idRest = (SELECT id FROM Restaurants WHERE id = :id));");
      $exe->execute(array(':id' => $id ));
      $catReq = $exe->fetchAll();
      return $catReq;
    }

}
$rest = new RestRequest();
$auth = new AuthClass();
 
if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($_POST["login"], md5($_POST["password"]))){ //Если логин и пароль введен не правильно
      echo '<script>document.location.href="/page-login.php"</script>';
    }
    else{
    	echo '<script>document.location.href="/index.php"</script>';
    }
    $dbh = null;
}else if(isset($_POST["out"])){
  out();
}

?>
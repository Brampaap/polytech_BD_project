<? 
session_start();
require 'connect.php';
class Catalog {

    public function getCat($id)
    {
      $exe = $GLOBALS['dbh']->prepare("SELECT * FROM product WHERE id IN(SELECT idProd FROM product_in_restaurants WHERE idRest =".$id.") LIMIT 20;");
      $exe->execute();
      $res = $exe->fetchAll();
      return $res;
    }
    public function setCat($id){
    	// echo "<script>console.log(\"".$POST["price"]."\");</script>";
    if($_POST['status'] == "on"){
    	$status = 1;
    }else{
    	$status = 0;
    }
      $exe = $GLOBALS['dbh']->prepare("UPDATE product SET name =:name, description = :description, status = :status, price = :price WHERE id =".$_POST['id'].";");
      
      $exe->execute(array(':name' => $_POST['name'],':description' => $_POST['description'], ':status' => $status, ':price' => $_POST['price']));
    }
    public function newProd($id){
	if($_POST['status'] == "on"){
    	$status = 1;
    }else{
    	$status = 0;
    }
     $id =  preg_replace("/.*?\?/", '', $id);
      $exe = $GLOBALS['dbh']->prepare("INSERT INTO product (name, description, status, price)VALUES (:name, :description, :status, :price);
      	INSERT INTO product_in_restaurants (idProd, idRest) VALUES ((SELECT MAX(id) FROM product), ".$id.");");
      
      $exe->execute(array(':name' => $_POST['name'],':description' => $_POST['description'], ':status' => $status, ':price' => $_POST['price']));
    }
    public function delProd($id){
      $id =  preg_replace("/.*?\?/", '', $id);
	if($_POST['status'] == "on"){
    	$status = 1;
    }else{
    	$status = 0;
    }

      $exe = $GLOBALS['dbh']->prepare("DELETE FROM product_in_restaurants WHERE (idProd = :id AND idRest = ".$id.");
      	DELETE FROM product WHERE id = :id;");
      
      $exe->execute(array(':id' => $_POST['erase']));
    }

}
$catalog = new Catalog();

if(isset($_POST["id"])){
	$catalog->setCat($_POST["id-rest"]);
}elseif (isset($_POST["add"])){
	$catalog->newProd($_POST["id-rest"]);
}elseif (isset($_POST["erase"])){
	$catalog->delProd($_POST["id-rest"]);
}
?>
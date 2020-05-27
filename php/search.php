<?php 
include 'connect.php';
// echo json_encode($_POST["search"]);
if(isset($_POST["search"])){
	$exe = $GLOBALS['dbh']->prepare("SELECT id FROM product WHERE name LIKE '".$_POST["search"]."%';");
	$exe->execute();
    $res = $exe->fetchAll();
    echo json_encode($res);
}
?>

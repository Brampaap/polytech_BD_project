<?php 
include 'connect.php';
// echo json_encode($_POST["search-r"]);
if(isset($_POST["search-re"])){
	$exe = $GLOBALS['dbh']->prepare("SELECT id FROM Restaurants WHERE name LIKE '".$_POST["search-re"]."%';");
	$exe->execute();
    $res = $exe->fetchAll();
	echo json_encode($res);
}
?>
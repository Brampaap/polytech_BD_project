<?php 
if ($_POST['login'] == "+7(___)___-__-__"){
	echo 2;
	exit();
}else{
	require 'connect.php';
	$exe = $dbh->prepare("SELECT login FROM users WHERE login = login");
		$exe->execute(array('f_name' => $_POST["login"]));
		$result = $exe->fetch();
		$a = str_split($_POST["login"]);
		if($a[count($a)-1] != "_" and !($_POST["login"] == $result[0])) {
			echo 1;
			exit();
		}else{
			echo 0;
		}
	}
?>


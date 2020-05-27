<?session_start();?>
<!DOCTYPE html5>
<html lang="ru">

<head>
<title>Кушать подано | Авторизация</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.5, maximum-scale=1.0, user-scalable=0">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="./vendor/animate-css/vivify.min.css">
<link rel="stylesheet" href="./vendor/font-awesome/css/font-awesome.min.css">
<link href="css/main.css" rel="stylesheet" media="all">

</head>
<body class="log">

<div class="pattern">
	<span class="white"></span>
    <span class="blue"></span>
    <span class="red"></span>
</div>

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar" href="javascript:void(0);"><img src="./img/logo.svg" width="40" height="40" class="d-inline-block align-top mr-2" alt="Logo">Кушать подано</a>
        </div>
        <div class="card">
            <div class="body">
                <p class="lead">Панель авторизации</p>
                <form class="form-auth-small m-t-20" action="./php/login.php"
                method="POST">
                    <div class="form-group">
                        <label for="signin-tel" class="control-label sr-only">Номер телефона</label>
                        <input type="text"class="form-control round"id="signin-tel" name="login" placeholder="Номер телефона" value="" required>
     				</div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Пароль</label>
                        <input type="password" class="form-control round" id="signin-password" name = "password" placeholder="Пароль" value="" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">Войти</button>
                    <div class="bottom">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="#">Забыли пароль?</a></span>
                        <span>У вас ещё нет аккаунта? <a href="page-register.php">Регистрация</a></span>
                        <?
                        if($_SESSION["bad_try"]) { 

							echo "<span class='bad_try'>Неправильный логин или пароль!"; 
							
							}
						session_destroy();
                         ?>
                        
                    </div>

                </form>
            </div>
        </div>
        <div class="card guest">
            <div class="body">
                <p class="lead">Гостевой аккаунт</p>
                <span>Номер телефона: <b>+7(111)111-11-11</b></span><br>
                <span>Пароль: <b>11111</b></span>
            </div>
        </div>
    </div>
    <div id="particles-js">
    </div>
</div>
<!-- END WRAPPER -->
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="vendor/input-mask/jquery.maskedinput.js" type="text/javascript"></script>  
<script src="vendor/partic/particles.min.js"></script> 
<script src="js/login.js"></script> 
</body>
</html>

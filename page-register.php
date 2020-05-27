<!DOCTYPE html5>
<html lang="ru">

<head>
<title>Кушать подано | Регистрация</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.5, maximum-scale=1.0, user-scalable=0">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="./vendor/animate-css/vivify.min.css">
<link rel="stylesheet" href="./vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/bootstrap-datepicker/bootstrap-datepicker3.css">
<link href="css/main.css" rel="stylesheet" media="all">

</head>
<body class="reg">

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
                <p class="lead">Новый аккаунта</p>
                <form class="form-auth-small m-t-20" method="POST" action="php/register.php">
                    <div class="form-group">
                         <label for="name" class="control-label sr-only">Имя пользователя</label>
                        <input type="text" id="name" name="name"class="form-control round" placeholder="Имя пользователя" value="" required>
                    </div>
                    <div class="form-group">       
                        <label for="signin-tel" class="control-label sr-only">Номер телефона</label>
                        <input type="text"class="form-control round" id="signin-tel" name="login" placeholder="Номер телефона" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label sr-only">Пароль</label>
                        <input type="text" class="form-control round"id="password" name="password" placeholder="Пароль" value="" required> 
                    </div>
                    <div class="form-group">  
                        <label for="email" class="control-label sr-only">Email</label><input type="email" class="form-control round" id="email" name="email" placeholder="E-mail" value="" required>
                    </div>
                    <div class="form-group">       
                        <div class="input-group">
                            <input data-provide="datepicker" data-date-autoclose="true" name="born" class="form-control round" placeholder="Дата рождения" required>
                        </div>
                    </div>
                    <div class="form-group">       
                        <label class="fancy-radio custom-color-green"><input name="gender" value="male" type="radio"><span><i></i>Мужчина</span></label>
                        <label class="fancy-radio custom-color-green"><input name="gender" value="female" type="radio" checked><span><i></i>Женщина</span></label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-round btn-block">Регистрация</button>
                    <div class="bottom">
                        <span><a href="page-login.php">Назад</a></span>
                    </div>               
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="vendor/input-mask/jquery.maskedinput.js" type="text/javascript"></script>  
<script src="vendor/partic/particles.min.js"></script> 
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="js/login.js"></script> 
</body>
</html>
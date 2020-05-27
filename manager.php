<?php 
session_start();
	if(!($_SESSION["is_auth"])){
		header("Location: ./page-login.php");
	}else{
		include 'php/login.php';
		if(!($auth->levelAccess() > 0)){
			header("Location: ./index.php");
		}
		else{
			$id =  preg_replace("/.*?\?/", '', $_SERVER['REQUEST_URI']);
			include './php/manage.php';
			$RESDATA = rest_data($_SERVER['REQUEST_URI']);
			
		}
	}

?>
<!DOCTYPE html5>
<html lang="ru">

<head>
	<title>Кушать подано</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="vendor/dropify-master/css/dropify.min.css">
	<link rel="stylesheet" href="vendor/SLI/simple-line-icons.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="./vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" href="vendor/metisMenu/metisMenu.css">
	<link rel="stylesheet" href="../vendor/animate-css/vivify.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<!-- MAIN CSS -->
<link rel="stylesheet" href="/css/main.css">
<link href="https://fonts.googleapis.com/css?family=Exo+2|Poiret+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head> 
<!-- Button trigger modal -->


<body>
	<nav class="navbar top-navbar">
		<div class="container-fluid con">
			<div class="navbar-left">
			<ul class="nav navbar-nav">
				<li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                    	<i class="icon-bell"></i>
                    	<span class="notification-dot bg-azura">2</span>
                    </a>
                  	<ul class="dropdown-menu feeds_widget vivify fadeIn">
                    	<li class="header blue">У вас 2 новых уведомления</li>
                        <li>
                        	<a href="javascript:void(0);">
                           		<div class="feeds-left bg-red"><i class="fa fa-check"></i></div>
                            	<div class="feeds-body">
                            		<h4 class="title text-danger">Название <small class="float-right text-muted">5:10 AM</small></h4>
                            		<small>Lorem ipsum dolor sit amet.</small>
                            	</div>
                             </a>
                        </li>                               
                       	<li>
                           	<a href="javascript:void(0);">
                            	<div class="feeds-left bg-info"><i class="fa fa-user"></i></div>
                                <div class="feeds-body">
                                    <h4 class="title text-info">Ещё одно название <small class="float-right text-muted">8:15 PM</small></h4>
                                    <small>Lorem ipsum dolor sit amet, consectetur.</small>
                                </div>
                            </a>
                        </li>
					</ul>
				</li>
				<li>
					<a href="#" class="te megamenu_toggle icon-menu" title="Instructions">Рецепты</a>
				</li>
				<li>
					<a href="#" class="te megamenu_toggle icon-menu" title="Instructions">Отзывы</a>
				</li>
			</ul>
			</div>
			<div class="navbar-right">
				<div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i class="icon-magnifier"></i></a></li>                        
                        <li><a href="page-login.php" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
			</div>
		</div>
		<div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
		</div>
	</nav>
	<div class="menu">
	<div id="left-sidebar" class="sidebar">
		<div class="navbar-brand">
			<a href="index.php"><img src="img/logo.svg" alt="Логотип" class="img-fluid logo"><span>Кушать подано</span></a>
			<button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
		</div>
		<div class="sidebar-scroll">
			<div class="user-account">
				<div class="user_div" style="background-image: url(img/user.png);">
				</div>
				<div class="dropdown">
					<span>Привет,</span>
					<a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php echo $_SESSION["f_name"];
					?></strong></a>
					<ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
						<li><a href="#"><i class="icon-user"></i>Профиль</a></li>
						<li><a href="#"><i class="icon-envelope-open"></i>Заказы</a></li>
						<li><a href="javascript:void(0);"><i class="icon-settings"></i>Настройки</a></li>
						<?php
						if($auth->levelAccess() > 1){
						echo '<li><a href="manager_catalog.php"><i class="icon-wrench"></i>Управление</a></li>';
						}
						?>
						<li><a id="out" href="page-login.php"><i class="icon-power"></i>Выйти</a></li>
					</ul>
				</div>                
			</div>  
			<nav id="left-sidebar-nav" class="sidebar-nav">
				<ul id="main-menu" class="metismenu">
					<li class="header">Главное меню</li>
					<li class="active open"><a href="index.php"><i class="icon-speedometer"></i><span>Рестораны</span></a></li>
					<li ><a href="#"><i class="icon-diamond"></i><span>Новости</span></a></li>
					<li><a href="#"><i class="icon-rocket"></i><span>Обратная связь</span></a></li>
					<li><a href="#"><i class="icon-badge"></i><span>Сотрудничество</span></a></li>
					<li><a href="#"><i class="icon-cursor"></i><span>Акции</span></a></li>
				</ul>
			</nav>     
		</div>
	</div>
	</div>
	<div id="main-content">
		<div class="container-fluid">
			<div class="block-header">
				<div class="row clearfix">
					<div class="col-md-6 col-sm-12">
					<h2>Управление</h2>
					<nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="#">Кушать подано</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Управление</li>
                        </ol>
                    </nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right hidden-xs">
						<a href="#" class="btn btn-sm btn-success">
							 Акции</a>
						<a href="./catalog.php?
						<?php echo $id; ?>" class="btn btn-sm btn-primary">
							 Каталог</a>
						
					</div>
				</div>
			</div>
			<div class="row clearfix">
			<div class="col-sm-12 col-md-4 offset-md-1">
				<div class="header"><h2>Информация</h2></div>
                <div class="card">
                	<div class="body">
     
                		<div class=" text-center m-b-20">
                		<?php
                		if(!($RESDATA['image'] == '')){
						echo "
						<div class='img-thumbnail im-log rounded-circle' data-show-remove='false' data-toggle='modal' data-target='.modal' style='background-image: url(\"".$RESDATA['image']."\");'><i class='icon-cloud-upload align-middle'></i></div>";
						}else{
						echo "
						<div class='img-thumbnail im-log rounded-circle' data-show-remove='false' data-toggle='modal' data-target='.modal' style='background-image: url(\"../img/default-image.jpg\");'><i class='icon-cloud-upload'></i></div>";
						}
                		echo "
                			<a href=\"".$RESDATA['site_link']."\" class='name-comp'>
                			<h5 class='mt-3'>".$RESDATA['name']."
                			</h5>
                			</a>
                			<div class='text-center text-muted'>".$RESDATA['f_name']." ".$RESDATA['l_name']."</div>
                			";
						
						?>

						</div>
						
					</div>
					<div class="card-footer col-sm-12">
						<?php foreach ($RESDATA as $key => $value) {
							if($value == Null){
							$value = "Неизвестно";
							};
							if ($key == "name") {
								unset($key);
							}
							switch ($key) {
								case 'address':
									echo "<div class='block'>
										<small class='text-muted'>Адрес:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'email':
									echo "<div class='block'>
										<small class='text-muted'>E-mail:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'work_phone':
									echo "<div class='block w-phone'>
										<small class='text-muted'>Рабочий телефон:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'city':
									echo "<div class='block'>
										<small class='text-muted'>Город:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'description':
									echo "<div class='block'>
										<small class='text-muted'>Описание:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
							}
						}
						?>
						</div>
					

                		
<!-- Modal -->
					<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Изменить изображение</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="php/manage.php" method="POST" id="image-file"  enctype="multipart/form-data">
                                <div class="modal-body">
                                  
                                  <input type="file" name="image" class="dropify" data-allowed-file-extensions="jpeg png jpg" data-max-file-size="3M" data-min-width="511" data-max-width="513" data-min-height="511" data-max-height="513">
                                  </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-round btn-success ava" name="image-restaurant"form="image-file">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Modal -->  
			</div>
				<div class="col-sm-12 col-md-6">
					<div class="header"><h2>Статистика</h2></div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6">
                        <div class="card-wrapper flip-left">
                            <div class="card s-widget-top">
                                <div class="front p-3 px-4">
                                    <div>Суммарных доход</div>
                                    <div class="py-4 m-0 text-center h2 text-info">$2,258</div>
                                    <div class="d-flex">
                                        <small class="text-muted">За сегодня</small>
                                        <div class="ml-auto">0%</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-wrapper flip-left">
                            <div class="card s-widget-top">
                                <div class="front p-3 px-4 bg-danger text-light">
                                    <div>Заказы</div>
                                    <div class="py-4 m-0 text-center h2">428</div>
                                    <div class="d-flex">
                                        <small>За сегодня</small>
                                        <div class="ml-auto"><i class="fa fa-caret-down"></i>10%</div>
                                    </div>
                                </div>
                                <
                            </div>
                        </div>
                    </div>
                </div>
                <!--  End counters-->
                <div id="accordion">
					<div class="card">
						<div class="card-header form-1" id="headingOne">
						    <p class="mb-0 col_but" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					          Редактировать информацию о ресторане
						    </p>
					    </div>
					    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						    <div class="card-footer">
					      	<!--Сюда подгружается форма, см. reg.js -->
						    </div>
					    </div>
					</div>

					<div class="header"><h2>Банковские реквизиты</h2></div>
					<div class="details card">
						<div class="card-footer">
							
							<?php foreach ($RESDATA as $key => $value) {
							if($value == Null){
							$value = "Неизвестно";
							};
							if ($key == "name") {
								unset($key);
							}
							switch ($key) {
								case 'BIK':
									echo "<div class='block'>
										<small class='text-muted'>БИК:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'INN':
									echo "<div class='block'>
										<small class='text-muted'>ИНН:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'OKPO':
									echo "<div class='block w-phone'>
										<small class='text-muted'>ОКПО:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'KPP':
									echo "<div class='block'>
										<small class='text-muted'>КПП:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'recipiet':
									echo "<div class='block'>
										<small class='text-muted'>Получатель:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
								case 'KC':
									echo "<div class='block'>
										<small class='text-muted'>Корреспонденский счёт:</small>
										<p>	
											".$value."
										</p>
									</div>";
									break;
							}
						}
						?>
						

						</div>
					</div>
				</div>
				
                	</div>
                </div>
			</div>
			</div>

			<div class="row clearfix"></div>
		</div>
<!--Alert-->

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="vendor/dropify-master/js/dropify.min.js"></script>
<script src="vendor/input-mask/jquery.maskedinput.js" type="text/javascript"></script> 
<script src="vendor/metisMenu/metisMenu.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/reg.js"></script>
</body>
</html>

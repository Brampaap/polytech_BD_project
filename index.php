<?php session_start();
	if(!($_SESSION["is_auth"])){
		header("Location: ./page-login.php");
	}else{
		include './php/login.php';
		$open = $rest->openRec();

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
	<link rel="stylesheet" href="vendor/SLI/simple-line-icons.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="./vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" href="vendor/metisMenu/metisMenu.css">
	<link rel="stylesheet" href="vendor/animate-css/vivify.min.css">


<!-- MAIN CSS -->
<link rel="stylesheet" href="/css/main.css">
<link href="https://fonts.googleapis.com/css?family=Exo+2|Poiret+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head> 

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
						<h2>Рестораны</h2>
						<nav aria-label="breadcrumb">
                   			<ol class="breadcrumb">
                       			<li class="breadcrumb-item"><a href="#">Кушать подано</a>
                        		<li class="breadcrumb-item active" aria-current="page">Рестораны</li>
	                        </ol>
	                    </nav>
				</div>
				<div class="col-sm-6 text-right hidden-xs">
						<div class="dropdown basket">
	                    	<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-sm btn-success "><i class="icon-basket-loaded"></i> Корзина
							</a>
							<div id="basket-scroll"> 
		                  	<ul class="dropdown-menu dropdown-menu-right main-part feeds_widget">
								
		                    	<li class="header">
		                    	<div class="row">
									<div class="col-sm-6">
										<p class="mb-0">Ваша корзина</p>
									</div>
									<div class="col-sm-6">
										<button class="pay">Оплатить</button>
									</div>
								</div>
								</li>
								<div class="podcts">
		                        <li>
		                        	<div class="menu-position row">
		                           		<div class=" col-sm-2 img-pos" style="background-image: url('img/default-image.jpg');">
		                           		</div>
		                            	<div class="feeds-body col-sm-9">
		                            		<h5 class="text">Устрица по Неу-доЛагманскиУстрица по Неу-доЛагмански</h5>
		                            		<p class="mb-0 price-pos">Стоимость: 500₽</p>
		                            	</div>
		                            	<div class="col-sm-1 trash">
		                            		<i class="icon-trash"></i>
		                            	</div>
		                             </div>
		                        </li>   
		                    	 <li>
		                        	<div class="menu-position row">
		                           		<div class=" col-sm-2 img-pos" style="background-image: url('img/default-image.jpg');">
		                           		</div>
		                            	<div class="feeds-body col-sm-9">
		                            		<h5 class="text">Устрица по Неу-доЛагманскиУстрица по Неу-доЛагмански</h5>
		                            		<p class="mb-0 price-pos">Стоимость: 500₽</p>
		                            	</div>
		                            	<div class="col-sm-1 trash">
		                            		<i class="icon-trash"></i>
		                            	</div>
		                             </div>
		                        </li>  
		                         <li>
		                        	<div class="menu-position row">
		                           		<div class=" col-sm-2 img-pos" style="background-image: url('img/default-image.jpg');">
		                           		</div>
		                            	<div class="feeds-body col-sm-9">
		                            		<h5 class="text">Устрица по Неу-доЛагманскиУстрица по Неу-доЛагмански</h5>
		                            		<p class="mb-0 price-pos">Стоимость: 500₽</p>
		                            	</div>
		                            	<div class="col-sm-1 trash">
		                            		<i class="icon-trash"></i>
		                            	</div>
		                             </div>
		                        </li>  
		                         <li>
		                        	<div class="menu-position row">
		                           		<div class=" col-sm-2 img-pos" style="background-image: url('img/default-image.jpg');">
		                           		</div>
		                            	<div class="feeds-body col-sm-9">
		                            		<h5 class="text">Устрица по Неу-доЛагманскиУстрица по Неу-доЛагмански</h5>
		                            		<p class="mb-0 price-pos">Стоимость: 500₽</p>
		                            	</div>
		                            	<div class="col-sm-1 trash">
		                            		<i class="icon-trash"></i>
		                            	</div>
		                             </div>
		                        </li>  
		                                
		                        </div>
							</ul>
							</div>
						</div>
				</div>
				</div>
			</div>
			<div class="row clearfix">
				<?php
					foreach ($open as $restData) {
				
					echo "
					<div class=\"col-sm-6\">
						<a href=\"/page-restaurant.php?".$restData['id']."\">
						<div class=\"card offset-sm-1 col-sm-10\">
							
							<div class=\"card-img-top\" style=\"background-image: url('".$restData['image']."');\"></div>
							<div class=\"body\">
								<div class=\"head-body row\">
								<div class=\"price\">$$$$$</div>
								<div class=\"col-sm-6\">
									<h5><a target=\"_blank\" class=\"name-rest\" href=\"".$restData["site_link"]."\">".$restData['name']."</a></h5>
								</div>
								
								<div class=\"col-sm-6 head-body-rating\">
									<span>5.0</span>
								</div>
								<div class=\"col-sm-12 address-p\">
									<div class=\"row\">
										<div class=\"col-sm-6 address\">
										<p>".$restData['address']."</p>
									</div>
									<div class=\"col-sm-6 time\">
										<p>Рабочее время:<br> 09<sup>00</sup> -  23<sup>30</sup></p>	
									</div>
									</div>
								</div>
								<div class=\"col-sm-12 card-desc\">
									<hr>
									<p>".$restData['description']."</p>
								</div>
								</div>
							
							
		
							</div>
						</div>
						</a>
					</div>";
					}
					?>

			</div>
			<div class="row clearfix"></div>
		</div>
	</div>
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="vendor/metisMenu/metisMenu.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/reg.js"></script>
</body>
</html>

<?php 
// Подключаем модель Корзина
include_once ROOT.'/models/Cart.php';

//Подключаем файл с заголовками в шапке сайта
$titlesPath = ROOT.'/config/titles.php';
$titles = include($titlesPath);
?>

<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
	<head>
		<title><?php echo $titles['shopname']; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
		<!--Head for main page-->
		<script src="/template/js/jquery.min.js"></script>
		<script src="/template/js/skel.min.js"></script>
		<script src="/template/js/skel-layers.min.js"></script>
		<script src="/template/js/init.js"></script>
		<script src="/template/js/jquery-add-to-cart.js"></script>
		
		<link rel="stylesheet" href="/template/css/skel.css" />
		<link rel="stylesheet" href="/template/css/style.css" />
		<link rel="stylesheet" href="/template/css/style-xlarge.css" />
	</head>
	<body class="landing">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1><strong><a href="/main"><?php echo $titles['shopname']; ?></a></strong> by <?php echo $titles['owner']; ?></h1>
				<nav id="nav">
					<ul>
						<li><a href="/main"><?php echo $titles['mainpage']; ?></a></li>
						<li><a href="/shop"><?php echo $titles['shop']; ?></a></li>
						<li><a href="/cart" ><?php echo $titles['cart']; ?>
						( <span id="cart-count"><?php echo Cart::countServices();?> </span> )
						</a></li>
					</ul>
				</nav>
			</header>
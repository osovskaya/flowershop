<?php

// Роуты

return array(
	//Корзина CartController
	'cart/add/([0-9]+)' => 'cart/add/$1', //actionAdd 
	'cart/clear' => 'cart/clear', //actionClear
	'cart/delete/([0-9]+)' => 'cart/delete/$1', //actionDelete
	'cart/order' => 'cart/order', //actionOrder
	'cart/submit' => 'cart/submit', //actionSubmit
	'cart' => 'cart/index', //actionIndex
	
	//Каталог услуг ShopController
	'shop/([0-9]+)/([0-9]+)' => 'shop/serviceView/$1/$2', //actionServiceView 
	'shop/([0-9]+)' => 'shop/view/$1', //actionView
	'shop' => 'shop/index',	//actionIndex
	
	//Главная страница MainController
	'main' => 'main/index', //actionIndex
	'' => 'main/index', //actionIndex 	
);

?>

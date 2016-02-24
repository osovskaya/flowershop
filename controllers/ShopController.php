<?php

// Подключает модель Услуги
include_once ROOT.'/models/Services.php';

// Контроллер Магазин

class ShopController
{
	/*
	*Выводит список категорий
	*/
	public function actionIndex()
	{		
		// список категорий			
		$categoryList = array();
		$categoryList = Services::getCategoryList();
		
		require_once(ROOT . '/views/shop/index.php');
		
		return true;
	}
	
	/*
	*Выводит список услуг для заданной категории
	*/
	public function actionView($categoryid)
	{
		if ($categoryid)
		{
			// список категорий
			$categoryList = array();
			$categoryList = Services::getCategoryList();
			
			// спиок услуг в категории
			$serviceList = array();
			$serviceList = Services::getServicesByCategoryId($categoryid);
			
			require_once(ROOT . '/views/shop/services.php');
		}
		
		return true;
	}
	
	/*
	*Выводит данные об услуге по id услуги
	*/
	public function actionServiceView($categoryid, $serviceid)
	{
		if ($categoryid && $serviceid)
		{
			// данные об услуге
			$service = array();
			$service = Services::getServiceByServiceId($serviceid);
			
			require_once(ROOT . '/views/shop/oneservice.php');
		}
		
		return true;
	}
}
?>
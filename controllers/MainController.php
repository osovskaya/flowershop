<?php

// Класс Главный контроллер

class MainController
{
	/*
	*Подключает вид главной страницы
	*/
	public function actionIndex()
	{
		require_once(ROOT . '/views/main/index.php');
		return true;
	}
}
?>
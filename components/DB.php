<?php

// Класс База данных
class Db
{
	/*
	*Подключает к базе данных
	*/
	public static function getConnection()
	{
		// Подключаем файл с параметрами подключения базы данных
		$parametersPath = ROOT. '/config/db_parameters.php';
		$parameters = include($parametersPath);
		
		// Подключаемся к базе данных
		$dsn = "mysql:host={$parameters['host']};dbname={$parameters['dbname']}";
        $db = new PDO($dsn, $parameters['user'], $parameters['password']);
		
		// Задаем кодировку
        $db->exec("set names utf8");
		
		return $db;
	}
}

?>
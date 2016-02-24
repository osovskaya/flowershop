<?php

// Класс Роутер. Подключает соответствующий контроллер

class Router
{
	private $routes;
	
	/*
	*Подключает роуты
	*/
	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

	/*
	*Возвращает URI запрос
	*/ 
	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI']))
		{
			return trim($_SERVER['REQUEST_URI'], '/');
		}		
	}	
	
	/*
	*Запускает роутер
	*/
	public function run()
	{
		// Получаем URI запрос
		$uri = $this->getURI();
		
		// Проверяем, есть ли такой запрос в роутах
		foreach ($this->routes as $uriPattern => $path)
		{
			// Если находим совпадение
			if (preg_match("~$uriPattern~", $uri))
			{				
				// меняем текст запроса
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				
				// определяем контроллер и экшн
				$segments = explode('/', $internalRoute);
				$controllerName = ucfirst(array_shift($segments)).'Controller';
				$actionName = 'action'.ucfirst(array_shift($segments));
				
				// сохраняем остальные параметры из запроса
				$parameters = $segments;
				
				// подключаем контроллер 
				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
				if (file_exists($controllerFile))
				{
					include_once($controllerFile);
				}
				
				// создаем объект-контроллер и запускаем экшн 
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result) 
				{
					break;
				}				
			}
		}
	}
}
?>
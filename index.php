<?php

//FRONT CONTROLLER
// Начинаем сессию
if (!isset($_SESSION))
  {
    session_start();
  }  
 
// Основные настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

// Подключаем системные файлы 
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/DB.php');

// Вызываем роутер
$router = new Router();
$router->run();

?>
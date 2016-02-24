<?php

//Модель Корзина
class Cart
{				
	/**
	* Добавляет услугу в корзину, 
	* возвращает количество услуг в корзине
	*/
	public static function addToCart($serviceid)
	{
		// Приводим $id к типу integer
        $serviceid = intval($serviceid);
		
        // Услуги в корзине
        $serviceInCart = array();
				
        // Если в корзине уже есть услуги
        if (isset($_SESSION['services'])) 
		{
            // Заполняем массив услугами
            $serviceInCart = $_SESSION['services'];
        }

		// Если услуга в корзине уже есть
        if (array_key_exists($serviceid, $serviceInCart)) 
		{
            // Увеличим количество услуг на 1
            $serviceInCart[$serviceid]++;
        } 
		else 
		{
            // Добавляем id новой услуги в корзину с количеством 1
            $serviceInCart[$serviceid] = 1;
        }

        // Записываем массив с услугами в сессию
        $_SESSION['services'] = $serviceInCart;

		// Возвращаем количество услуг в корзине
        return self::countServices();		
	}
	
	/**
	* Удаляет услугу из корзины
	*/
	public static function deleteService($serviceid)
	{
		// Получаем список услуг в корзине и их количество
        $serviceInCart = self::getServices();

        // Удаляем из массива элемент с указанным id
        unset($serviceInCart[$serviceid]);

        if (!empty($serviceInCart))
		{
			// Записываем массив услуг с удаленным элементом в сессию
			$_SESSION['services'] = $serviceInCart;
		}
		else
		{
			// Если корзина пустая, очищаем сессию
			unset($_SESSION['services']);			
		}
	
		return true;        
	}
	
	/**
	* Возвращает количество услуг в корзине
	*/
	public static function countServices()
	{
		if (isset($_SESSION['services']))
		{
			$count = 0;
			foreach ($_SESSION['services'] as $serviceid => $quantity)
			{
				$count = $count + $quantity;
			}
			
			return $count;
		}
		else 
		{
			return 0;
		}		
	}
	
	/**
     * Возвращает массив с идентификаторами и количеством товаров в корзине
     * Если товаров нет, возвращает false; 
     */
    public static function getServices()
    {
        if (isset($_SESSION['services'])) 
		{
            return $_SESSION['services'];
        }
        else 
		{
			return 0;
		}
    }
	
	/**
     * Возвращает общую стоимость услуг в корзине; 
     */
    public static function getTotalSum(array $orderedServices)
    {
        // Получаем список услуг в корзине и их количество 
		$servicesInCart = self::getServices();
		
		$totalSum = 0;
		//Для каждой услуги в корзине
		foreach ($orderedServices as $item)
		{
			//Подсчитавыем стоимость услуги как (цена * количество)
			$sum = $servicesInCart[$item['id']] * $item['price'];
			// Подсчитываем общую стоимость услуг в корзине
			$totalSum = $totalSum + $sum;
		}
		
		return $totalSum;
    }
	
	/**
     * Очищает корзину
     */
    public static function clear()
    {
        if (isset($_SESSION['services'])) 
		{
            unset($_SESSION['services']);
		}
		return true;
    }
	
	/**
     * Записывает данные о пользователе в базу данных,
	 возвращает id только что добавленного пользователя
     */
    public static function saveUser($name, $email, $phone)
    {
        $db = Db::getConnection();
		
		// Текст запроса к БД
        $sql = 'INSERT INTO user (name, email, phone) VALUES(:name, :email, :phone)';
		
		// Выполнение запроса
        $result = $db->prepare($sql);
		
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
		
		$result->execute();
		
		$userid = $db->lastInsertId();	
		if ($result) 
		{
            return $userid;
		}
		else
		{
			return 0;
		} 			
    }
	
	/**
     * Записывает данные о заказе в базу данных,
	 возвращает id заказа
     */
    public static function saveOrder($userid, $description)
    {
        $db = Db::getConnection();
		
		// Текст запроса к БД
        $sql = 'INSERT INTO orders (userid, description) VALUES(:userid, :description)';
		
		// Выполнение запроса
        $result = $db->prepare($sql);
		
        $result->bindParam(':userid', $userid, PDO::PARAM_INT);
		$result->bindParam(':description', $description, PDO::PARAM_STR);
				
		$result->execute();
		
		$orderid = $db->lastInsertId();
		
		if ($result) 
		{
            return $orderid;
		}
		else
		{
			return 0;
		}
        
    }
	
	/**
     * Валидация данных о пользователе
     */
    public static function validation($name, $phone)
    {
        // Сведения об ошибках
		$errorMessage = array();
		
		$patternName = "~^([A-Za-zА-Яа-яЁё]+[\s\-\']*){2,50}$~u";
		
		if (!preg_match($patternName, $name))
		{
			$errorMessage['name'] = true;
		}
		else
		{
			$errorMessage['name'] = false;
		}
		
		// Удаляем из номера телефона лишние пробелы
		$phonenumber = str_replace(' ', '', $phone);
		
		$patternPhone = "~^380[0-9]{9}$~";
		
		if (!preg_match($patternPhone, $phonenumber))
		{
			$errorMessage['phone'] = true;
		}
		else
		{
			$errorMessage['phone'] = false;
		}
		return $errorMessage;
	}
}

?>
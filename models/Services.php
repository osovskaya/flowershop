<?php

//Модель Услуги

class Services
{
	/**
	*Возвращает список категорий
	*/
	public static function getCategoryList()
	{
		// Соединение с БД
        $db = Db::getConnection();
		
		// Запрос к базе данных
		$result = $db->query('SELECT * FROM categories');
		
		// Список категорий
		$categoryList = array();
		
		// Получение и возврат результатов 
		$i =0;
        while ($row = $result->fetch()) 
		{
            $categoryList[$i]['categoryname'] = $row['categoryname'];
            $categoryList[$i]['id'] = $row['id'];
            $i++;
        }		
				
		return $categoryList;
	}
	
	/**
	*Возвращает список услуг по id категории
	*/
	public static function getServicesByCategoryId($id)
	{
		// Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM services WHERE category = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Получение данных в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение запроса
        $result->execute();
		
		if (isset($result))
		{
			// Получение и возврат результатов
			$i = 0;
			$services = array();
			while ($row = $result->fetch()) 
			{
				$services[$i]['category'] = $row['category'];
				$services[$i]['name'] = $row['name'];
				$services[$i]['price'] = $row['price'];
				$services[$i]['image'] = $row['image'];
				$services[$i]['description'] = $row['description'];
				$services[$i]['id'] = $row['id'];
				$i++;
			}					
		}
		return $services;
	}
	
	/**
	*Возвращает данные об услуге по id услуги
	*/
	public static function getServiceByServiceId($id)
	{
		// Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM services WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Получение данных в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняется запрос
        $result->execute();
		
		if (isset($result))
		{
			// Получение и возврат результатов
			return $result->fetch();											
		}		
	}
	
	/**
     * Возвращает массив с данными об услугах по заданным id
    */
    public static function getServicesDetailed(array $ids)
    {    
		$i = 0;
		$services = array();
		
		//Для каждого идентификатора услуги в массиве
		foreach ($ids as $key => $id)
		{
			// Получаем данные об услуге 
			$services[$i] = self::getServiceByServiceId($id);
			$i++;
		}
		
		return $services;
    }
}

?>
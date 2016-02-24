<?php

// Подключаем модели Корзина, Услуги
include_once ROOT.'/models/Cart.php';
include_once ROOT.'/models/Services.php';

// Контроллер Корзина

class CartController
{
	/*
	*Выводит список услуг в корзине
	*/
	public function actionIndex()
	{			
		// Получаем список услуг в корзине
		$order = Cart::getServices();
		
		if ($order)
		{
			// Получаем массив с идентификаторами товаров в корзине
			$servicesIds = array_keys($order);
			//Получаем данные об услугах в корзине 
			$services = Services::getServicesDetailed($servicesIds);
			// Подсчитываем общую стоимость услуг в корзине
			$totalSum = Cart::getTotalSum($services);
			
			require_once(ROOT . '/views/cart/order.php');
			return true;
		}
		// Если корзина пустая			
		else
		{
			require_once(ROOT . '/views/cart/empty.php');
			return true;
		}
	}
	
	/*
	*Добавляет услуги в корзину
	*/
	public function actionAdd($serviceid)
	{
		if ($serviceid)
		{
			echo Cart::addToCart($serviceid);
		}
		
		return true;
	}
	
	/*
	*Удаляет услугу из корзины
	*/
	public function actionDelete($serviceid)
	{
		if ($serviceid)
		{
			// Удаляем услугу
			Cart::deleteService($serviceid);
			
			// Возвращаем пользователя в корзину
			header("Location: /cart");
		}
		
		return true;
	}
	
	/*
	*Очищает корзину
	*/
	public function actionClear()
	{
		Cart::clear();
		
		// Возвращаем пользователя в корзину
		header("Location: /cart");
		
		return true;
	}
	
	/*
	*Переводит пользователя на страницу оформления заказа
	*/
	public function actionOrder()
	{
		// Значение для формы по умолчанию
		$name = 'Фамилия Имя';
		$email = 'example@mailbox.ua';
		$phone = '38 XXX XX XX';
		
		require_once(ROOT . '/views/cart/submit.php');
		return true;
	}
	
	/*
	*Оформляет заказ
	*/
	public function actionSubmit()
	{
		if (isset($_POST))
		{
			// Получаем данные из формы
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];

			// Валидация данных
			$message = Cart::validation($name, $phone);
			
			if ($message['name'] || $message['phone'])
			{
				require_once(ROOT . '/views/cart/submit_err.php');
			}
			else
			{
				// Если ошибок нет, сохраняем данные о пользователе в базе данных
				$id = Cart::saveUser($name, $email, $phone);
				
				// Формируем описание заказа в виде строк
				$order = Cart::getServices();
				if ($order)
				{
					$servicesIds = array_keys($order);
					$services = Services::getServicesDetailed($servicesIds);
					$totalSum = Cart::getTotalSum($services);
				
					$orderDetails = 'Новый заказ ';
					$orderDetails .= 'от пользователя: id='.$id.', имя: '.$name.', email: '.$email.', тел.: '.$phone.'. ';
					foreach ($services as $service)
					{
						$orderDetails .= $service["name"].' (id = '.$service["id"].') по цене '.$service["price"].' грн. в количестве '.$order[$service["id"]].'. '; 
					}
					$orderDetails .= 'На общую сумму '.$totalSum.' грн.';
					
					// Сохраняем заказ в базе данных
					$orderId = Cart::saveOrder($id, $orderDetails);
				}
				// Если заказ сохранен
				if ($orderId != 0)
				{
					// Оповещаем администратора о новом заказе по почте                
					$adminEmail = 'ad.fl87@mail.ru';
					$subject = 'Новый заказ! Номер '.$orderId;
					$message = 'От пользователя: id='.$id.', имя: '.$name.', email: '.$email.', тел.: '.$phone.'.';
					
					// Если письмо успешно отправлено
					if (mail($adminEmail, $subject, $message))
					{
						// Очищаем корзину
						Cart::clear();
					}
				}
				require_once(ROOT . '/views/cart/done.php');
			}
		}
		else
		{
			require_once(ROOT . '/views/cart/submit.php');
		}
		return true;
	}
}

?>
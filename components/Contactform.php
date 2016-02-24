<?php

	// Если контактная форма заполнена, отправляем письмо администратору
	// Данный файл вызывается через js скрипт строка 29, файл jquery-for-mainpage.js
	if (array_key_exists('message', $_POST))
	{
		$to = 'ad.fl87@mail.ru';
		$subject = 'Заполнена контактная форма с '.$_SERVER['HTTP_REFERER'];
		$subject = "=?utf-8?b?". base64_encode($subject) ."?=";
		$message = "Имя: ".$_POST['name']."\nEmail: ".$_POST['email']."\nСообщение: ".$_POST['message'];
		$headers = 'Content-type: text/plain; charset="utf-8"';
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";
		mail($to, $subject, $message, $headers);
		echo $_POST['name'];
	}
?>
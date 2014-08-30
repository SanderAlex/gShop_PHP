<?php
	define("DB_HOST", "127.0.0.1");	//сервер базы данных
	define("DB_PORT", "3306");	//сервер базы данных
	define("DB_LOGIN", "root");		//логин для соединения с базой
	define("DB_PASSWORD", "root");	//пароль
	define("DB_NAME", "gshop");		//имя бызы
	define("ORDERS_LOG", "orders.log");	//имя файла с личными данными пользователей
	$count = 0; //кол-во товаров в корзине пользователя

	//соединение с сервером MySQL
	$mysqli = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME, DB_PORT) or die("Database connection error");

	$result = mysqli_query($mysqli, "CALL countGoodsInTheBasket('$session_id')") or die(mysqli_error($mysqli));
	$count = mysqli_num_rows($result);
	
	do {
		mysqli_free_result($result);
		mysqli_next_result($mysqli);
	} while(mysqli_more_results($mysqli));
?>
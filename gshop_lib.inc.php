<?php
	function db2Array($data) {
		$array = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $array;
	}

	function newGoodsValidation() {
		global $mysqli, $data; 
		foreach ($data as $key => $value) {
			$data[$key] = mysqli_real_escape_string($mysqli, trim(strip_tags($value)));
		}
		$data["price"] = $data["rPrice"].".".$data["kPrice"];
	}

	function posterValidation($poster, $max_size) {
		$path = "img/catalog/";
		if(!empty($poster['name'])) {
		// Проверяем, что при загрузке не произошло ошибок
			if(($poster['error'] == 0) && ((int)$poster['size'] < $max_size)) {
			    // Если файл загружен успешно, то проверяем - графический ли он
			    if(substr($poster['type'], 0, 5) == 'image') {
			    	move_uploaded_file($poster["tmp_name"], $path.$poster["name"]);
			    	return $path.$poster["name"];
			    }
			}
		}
		return "img/catalog/none.jpg";		
	}

	function save2cat($title, $developer, $pubyear, $price, $poster) {
		global $mysqli;
		if(mysqli_query($mysqli, "CALL add2catalog('$title', '$developer', $pubyear, $price, '$poster')")) {
			header("Location: add2catalog.php");
		}
		else {
			echo mysqli_error($mysqli);
		}
	}

	function showCatalog() {
		global $mysqli;
		if($catalog = mysqli_query($mysqli, "CALL showCatalog()")) {
			return db2Array($catalog);			
		}
		else {
			echo mysqli_error($mysqli);		
		}
	}

	function add2basket($goods, $cust) {
		global $mysqli;
		if($catalog = mysqli_query($mysqli, "CALL add2basket($goods, '$cust')")) {
			header("Location: basket.php");		
		}
		else {
			echo mysqli_error($mysqli);		
		}
	}

	function deleteFromBasket($goods, $cust) {
		global $mysqli;
		if($catalog = mysqli_query($mysqli, "CALL deleteFromBasket($goods, '$cust')")) {
			header("Location: basket.php");		
		}
		else {
			echo mysqli_error($mysqli);		
		}
	}

	function myBasket($sess_id) {
		global $mysqli;
		if($basket = mysqli_query($mysqli, "CALL showBasket('$sess_id')")) {
			return db2Array($basket);			
		}
		else {
			echo mysqli_error($mysqli);		
		}
	}
?>
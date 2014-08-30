<?php
	require "gshop_db.inc.php";
	require "gshop_lib.inc.php";

	$data = $_POST;

	newGoodsValidation();

	save2cat($data["title"], $data["developer"], $data["pubyear"], $data["price"], $data["poster"]);
?>
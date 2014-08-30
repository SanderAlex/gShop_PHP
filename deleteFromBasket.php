<?php
	session_start();
	$session_id = session_id();

	require "gshop_db.inc.php";
	require "gshop_lib.inc.php";

	$goods_id = $_GET['id'];

	echo $goods_id;
	echo $session_id;

	deleteFrombasket($goods_id, $session_id);
?>
<?php
    session_start();
    $session_id = session_id();

	require "gshop_db.inc.php";
	require "gshop_lib.inc.php";

	$userName = trim(strip_tags($_POST["userName"]));
	$email = trim(strip_tags($_POST["email"]));
	$time = time();

	$orderString = "$userName|$email|$session_id|$time\r\n";

	file_put_contents(ORDERS_LOG, $orderString, FILE_APPEND);
?>
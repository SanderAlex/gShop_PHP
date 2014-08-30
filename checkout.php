<?php
  session_start();
  $session_id = session_id();

  require "gshop_db.inc.php";
  require "gshop_lib.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Add to catalog</title>
  </head>
  <body>
  	<div>
  		<form enctype="multipart/form-data" action="newOrder.php" method="POST">
  			<p>Имя: <input type="text" name="userName" maxlength="50" size="50" required></p>
        <p>Email: <input type="email" name="email" maxlength="100"  size="50" required></p>
  			<p><input type="submit" value="Оформить"></p>
  		</form>
	  </div>
  </body> 
<html>
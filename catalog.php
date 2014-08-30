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
    <link rel="stylesheet" href="style.css">
    <title>Catalog</title>
  </head>
  <body>
    <div id="container">
      <p>Товаров в <a href="basket.php">корзине</a>: <?= $count ?></p>
    	<div id="catalog">
    		<?php
    			$allGoods = showCatalog();
          foreach ($allGoods as $key => $value) {
        ?>
          <div id='goods'>
            <p><?= $value['title'] ?></p>
            <div id='poster'><img src="<?= $value['poster'] ?>"></div>
            <p>
              Цена: <?= $value['price'] ?>
              <a href="add2basket.php?id=<?= $value['id'] ?>">В корзину</a>
            </p>
          </div>
        <?php
          }
        ?>
    	</div>
    </div>
  </body> 
<html>

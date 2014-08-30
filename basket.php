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
    <title>Basket</title>
  </head>
  <body>
    <div id="container">
      <p>Товаров в <a href="basket.php">корзине</a>: <?= $count ?></p>
      <div id="catalog">
        <div id="games">
          <?php
            $total = 0;
            if ($count == 0)
              echo "<p>Ваша корзина пуста :(</p>";
            else {
              $allGoodsInTheBasket = myBasket($session_id);
              foreach ($allGoodsInTheBasket as $key => $value) {
                $total += $value['price'];
          ?>
          <div id='goods'>
            <p><?= $value['title'] ?></p>
            <div id='poster'><img src="<?= $value['poster'] ?>"></div>
            <p>
              Цена: <?= $value['price'] ?>
              <a href="deleteFromBasket.php?id=<?= $value['goodsid'] ?>">Удалить</a>
            </p>
          </div>
          <?php
              }        
            }
          ?>
          </div>
        <p>Итого: <?= $total ?> руб.</p>
        <form action="checkout.php">
          <button>Оформить заказ</button>
        </form>
      </div>
    </div>
  </body> 
<html>

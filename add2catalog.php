<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
    <script type="text/javascript">
      window.onload = function() {
        var poster_uploader = document.getElementById("posterUpload");
        poster_uploader.addEventListener("change", SendFile, false);
      }

      function SendFile() {
        //отправка файла на сервер
        $$f({
          formid: 'add2catalogForm',//id формы
          url: 'upload_img.php',//адрес на серверный скрипт который будет принимать файл
          onstart: function() {//действие при начале загрузки файла
            $$('miniPoster','Изображение загружается');//в элемент с id="result" выводим результат
          }
        });
      }
    </script>
    <title>Add to catalog</title>
  </head>
  <body>
  	<div>
      <form id="add2catalogForm" enctype="multipart/form-data" method="POST">
        <p>Постер: <input id="posterUpload" type="file" name="poster" accept="image/jpeg,image/png,image/gif"></p>
        <div id="miniPoster">
        </div>
      </form>
  		<form enctype="multipart/form-data" action="save2catalog.php" method="POST">
  			<p>Название: <input type="text" name="title" maxlength="100" size="100" required></p>
        <p>Разработчик: <input type="text" name="developer" maxlength="50" size="50" required></p>
        <p>Год выпуска: <input type="text" name="pubyear" maxlength="4" size="4" pattern="[0-9]{4}" required></p>
        <p>Цена: <input type="text" name="rPrice" maxlength="4" size="4" pattern="^[ 0-9]+$" required>руб. <input type="text" name="kPrice" maxlength="2" size="2" pattern="[0-9]{2}" value="00" required>коп.</p>
        <input id="poster_post" type="hidden" name="poster">
  			<p><input type="submit" value="Добавить"></p>
  		</form>
	  </div>
  </body> 
<html>
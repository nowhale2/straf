<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/лого.svg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Нарушений нет</title>
  </head>
  <body>
    <div class="container">
      <div class="container-mu">
        <form method="post" action="controller/add.php">
          <label for="category">Категория нарушения</label>
          <select class="reg" name="category" id="category">
            <option value="Выберете категорию">Выберете категорию</option>
            <option value="Проезд на красный">Проезд на красный</option>
            <option value="Превышение скорости">Превышение скорости</option>
            <option value="Пересечение разметки">Пересечение разметки</option>
          </select>
          <label for="theme">Тема обращения</label>
          <input class="reg" type="text" name="theme" id="theme">
          <label for="text">Текст обращения</label>
          <input class="reg" type="text" name="text" id="text">
          <input type="submit"  value="Отправить">
        </form>
      </div>
    </div>    
  </body>
</html>

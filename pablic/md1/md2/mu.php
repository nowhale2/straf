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
    <div class="nav">
      <ul>
        <?php if ($_SESSION['user']['name'] == "admin") {?>
        <li><a href=""><img class="icon" src="img/лого.svg" alt=""><span class="title">Нарушениям.Нет</span></a></li>
        <!-- <li id="mu"><a href="mu.php"><img class="icon" src="img/добавить.svg" alt=""><span class="title">Добавить заявление</span></a></li> -->
        <li id="md2"><a href="md2.php"><img class="icon" src="img/удалить.svg" alt=""><span class="title">Поданные заявления</span></a></li>
          <?} else {?>
        <li><a href=""><img class="icon" src="img/лого.svg" alt=""><span class="title">Нарушениям.Нет</span></a></li>
        <li id="mu"><a href="mu.php"><img class="icon" src="img/добавить.svg" alt=""><span class="title">Добавить заявление</span></a></li>
        <li id="md2"><a href="md2.php"><img class="icon" src="img/удалить.svg" alt=""><span class="title">Мои заявления</span></a></li>
        <li id="md2"><a href="controller/delete_ac.php"><img class="icon" src="img/удалитьАк.svg" alt=""><span class="title">Удалить аккаунт</span></a></li>    
        
        <?}?>
        <?php if ($_SESSION['user']) {
          echo "<li><a href='controller/logout.php'><img class='icon' src='img/выход.svg' alt=''><span class='title'>Выйти (" . $_SESSION['user']['name']. ") </a></span></a></li>";}?>
      </ul>
      <div class="toggle">

      </div>
    </div>
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
          <!-- <input type="text" name="category" id="category"> -->
          <label for="theme">Тема обращения</label>
          <input class="reg" type="text" name="theme" id="theme">
          <label for="text">Текст обращения</label>
          <input class="reg" type="text" name="text" id="text">
          <input type="submit"  value="Отправить">
        </form>
      </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script  nomodulesrc="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript">
      let nav = document.querySelector('.nav');
      let toggle = document.querySelector('.toggle')
      toggle.onclick = function () {
        nav.classList.toggle('active')
      }
    </script>
    
  </body>
</html>

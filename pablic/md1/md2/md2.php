<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: index.php");
}
require_once('controller/connect.php');
$mysqli = new mysqli("localhost", "root", "", "straf");
$mysqli->set_charset('utf8');
$id = $_SESSION['user']['id'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="private">
    <link rel="shortcut icon" href="img/лого.svg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Нарушений нет</title>
</head>

<body>
    <div class="nav">
        <ul>
            <?php if ($_SESSION['user']['name'] == "admin") { ?>
                <li><a href=""><img class="icon" src="img/лого.svg" alt=""><span class="title">Нарушениям.Нет</span></a></li>
                <!-- <li id="mu"><a href="mu.php"><img class="icon" src="img/добавить.svg" alt=""><span class="title">Добавить заявление</span></a></li> -->
                <li id="md2"><a href="md2.php"><img class="icon" src="img/удалить.svg" alt=""><span class="title">Поданные заявления</span></a></li>
            <? } else { ?>
                <li><a href=""><img class="icon" src="img/лого.svg" alt=""><span class="title">Нарушениям.Нет</span></a></li>
                <li id="mu"><a href="mu.php"><img class="icon" src="img/добавить.svg" alt=""><span class="title">Добавить заявление</span></a></li>
                <li id="md2"><a href="md2.php"><img class="icon" src="img/удалить.svg" alt=""><span class="title">Мои заявления</span></a></li>
                <li id="md2"><a href="controller/delete_ac.php"><img class="icon" src="img/удалитьАк.svg" alt=""><span class="title">Удалить аккаунт</span></a></li>

            <? } ?>
            <?php if ($_SESSION['user']) {
                echo "<li><a href='controller/logout.php'><img class='icon' src='img/выход.svg' alt=''><span class='title'>Выйти (" . $_SESSION['user']['name'] . ") </a></span></a></li>";
            } ?>
        </ul>
        <div class="toggle">

        </div>
    </div>
    <div class="container-1">
        <div class="container-md2">
            <?php
            //Проверка учётной записи
            if ($_SESSION['user']) {
                if ($_SESSION['user']['name'] == "admin") { // Для администратора
                    $result = mysqli_query($connect, "SELECT u.name, s. * FROM `users` u JOIN statment s ON u.id = s.id");
                    while ($r = mysqli_fetch_assoc($result)) {
                        echo '<div class="cart">
                            <p>' . $r['name'] . '</p>
                                    <div class="cart-cat"><h3>Категория заявления:</h3><p>' . $r['category'] . '</p></div>
                                    <div class="cart-theme"><h3>Тема:</h3><p>' . $r['theme'] . '</p></div>
                                    <div class="cart-text"><h3>Текст:</h3><p>' . $r['text'] . '</p></div>
                                    <div class="cart-status"><h3>Статус:</h3><p>' . $r['status'] . '</p></div>
                                    <a href="controller/view.php?id=' . $r['number'] . '" id="card-link-click">Рассмотреть</a></li>
                                    <a href="controller/deny.php?id=' . $r['number'] . '" id="card-link-click">Отклонить</a></li>' .
                            '</div>';
                    }
                } else {
                    //Берем все элементы из базы данных, из таблицы list 
                    // $query = "SELECT * FROM `statment` WHERE `id` = '$id'";
                    // if (!$result = $mysqli->query($query)) echo "Ошибка при запросе:";

                    // //Цикл который выводит все элементы, значения
                    $result = mysqli_query($connect, "SELECT * FROM `statment` WHERE `id` = '$id'");
                    while ($r = mysqli_fetch_assoc($result)) {
                        echo '<div class="cart">
                                    <div class="cart-cat"><h3>Категория заявления:</h3><p>' . $r['category'] . '</p></div>
                                    <div class="cart-theme"><h3>Тема:</h3><p>' . $r['theme'] . '</p></div>
                                    <div class="cart-text"><h3>Текст:</h3><p>' . $r['text'] . '</p></div>
                                    <div class="cart-status"><h3>Статус:</h3><p>' . $r['status'] . '</p></div>
                                    <a href="controller/delete.php?id=' . $r['number'] . '" id="card-link-click">Удалить</a></li>' .
                            '</div>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodulesrc="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript">
        let nav = document.querySelector('.nav');
        let toggle = document.querySelector('.toggle')
        toggle.onclick = function() {
            nav.classList.toggle('active')
        }
    </script>
</body>

</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Нарушений нет</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <form method="POST" action="controller/signup.php">
                <input class="reg" type="text" name="FullName" placeholder="ФИО" required>
                <input class="reg" type="text" name="phone" placeholder="Телефон" required>
                <input class="reg" type="email" name="email" placeholder="Почта" required>
                <input class="reg" type="password" name="pass" placeholder="Пароль" required>
                <input class="reg" type="password" name="pass2" placeholder="Повтор пароля" required>
                <input class="reg" type="submit" value="Зарегистрироваться">
            </form>
            <p>Есть аккаунт? - <a href="index.php">Войти</a></p>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'].'</p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
</body>
</html>
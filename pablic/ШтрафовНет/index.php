<?php
session_start(); 

if ($_SESSION["user"]) {
    header("Location: mu.php");
}
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
            <form method="POST" action="controller/signin.php">
                <input class="reg" type="email" name="email" placeholder="Почта">
                <input class="reg" type="password" name="pass" placeholder="Пароль">
                <input type="submit" value="Войти">
            </form>
            <p>Нет аккаунта? - <a href="reg.php">Зарегистрируйтесь</a></p>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
</body>
</html>
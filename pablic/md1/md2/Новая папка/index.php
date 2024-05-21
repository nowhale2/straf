<?php
    require_once('connect.php');

    if(isset($_REQUEST['doGo'])){
        $login = $_REQUEST['login'];
        $psw = $_REQUEST['psw'];
        $result = mysqli_query($db, "SELECT `login`, `psw`, `id` FROM `users` WHERE `login` = '" .$login. "'");
        while($row = mysqli_fetch_assoc($result)){
            if($row['psw'] != $psw){?>
                <script>alert("Пароли не совпадают");</script>
            <?}
            else{
            header('Location: title.php');
            }
        }
        session_start();
        $_SESSION['login'] =$_REQUEST['login'];    
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нарушениям.НЕТ</title>
    <link rel="stylesheet" href="css/styleVh.css">
</head>
<body>
    <form action="" method="post">
        <p class="zag">Войдите в аккаунт</p>    

        <div>
            <p>Логин</p>
            <input type="text" name="login" placeholder="Введите логин">
        </div>

        <div>
            <p>Пароль</p>
            <input type="password" name="psw" id="" placeholder="Введите пароль">
        </div>

        <input type="submit" name="doGo" value="Войти">
        <p>У вас еще нет аккаунта? <a href="reg.php">Зарегестрируйтесь</a></p>
    </form>
</body>
</html>
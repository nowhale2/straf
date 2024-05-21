<?php
require_once 'connect.php';
if(isset($_REQUEST['doGo'])){
    if(!$_REQUEST['login']){
        $error = 'Введите логин';
    }
    if(!$_REQUEST['psw']){
        $error = 'Введите пароль';
    }  
    if(!$_REQUEST['name']){
        $error = 'Введите name';
    }  
    if(!$_REQUEST['lastname']){
        $error = 'Введите lastname';
    }  
    if(!$_REQUEST['middlename']){
        $error = 'Введите middlename';
    }  
    if(!$error){
        $login = $_REQUEST['login'];
        $psw = $_REQUEST['psw'];
        $name = $_REQUEST['name'];
        $lastname = $_REQUEST['lastname'];
        $middlename = $_REQUEST['middlename'];
        $number = $_REQUEST['number'];
        $email = $_REQUEST['email'];
        mysqli_query($db, "INSERT INTO `users` (`login`, `name`, `lastname`, `middlename`, `number`, `email`, `psw`) 
        VALUES('" .$login."', '" .$name."', '" .$lastname."', '" .$middlename."', '" .$number."', '" .$email."', '" .$psw."')");
        echo "<script>alert(\"Регистрация успешна.\");</script>";
    }
    else{
        echo "<script>alert(\". $error .\");</script>";
    }
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
    <form method="post">
        <p class="zag">Зарегестрируйтесь</p>
    
        <div>
        <p>Логин</p>
        <input type="text" name="login" placeholder="Введите логин">
        </div>

        <div>
        <p>Имя</p>
        <input type="text" name="name" placeholder="Введите имя">
        </div>

        <div>
        <p>Фамилия</p>
        <input type="text" name="lastname" placeholder="Введите фамилию">
        </div>

        <div>
        <p>Отчество</p>
        <input type="text" name="middlename" placeholder="Введите отчество">
        </div>

        <div>
        <p>Номер телефона</p>
        <input type="tel" name="number" placeholder="Введите пароль">
        </div>

        <div>
        <p>Email</p>
        <input type="email" name="email" placeholder="Введите пароль">
        </div>

        <div>
        <p>Пароль</p>
        <input type="password" name="psw" placeholder="Введите пароль">
        </div>

        <div>
        <p>Повторите пароль</p>
        <input type="password" name="passwordcopy" id="" placeholder="Повторите пароль">
        </div>

        <input type="submit" name="doGo" value="Зарегестрироваться">
        <p>У вас уже есть аккаунт?<a href="index.php">Войти</a></p>
    </form>
</body>
</html>
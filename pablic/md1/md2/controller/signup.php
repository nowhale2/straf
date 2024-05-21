<?php
session_start();
require_once 'connect.php';

// получение данных с предыдущей страницы
$FullName = $_POST["FullName"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$pass2 = $_POST["pass2"];

//проверка данных
if ($pass === $pass2) {
    
    mysqli_query($connect, "INSERT INTO `users` 
    (`id`, `name`, `phone`, `email`, `pass`)
    VALUES (NULL, '$FullName', '$phone', '$email', '$pass')");

    $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass'");
    if (mysqli_num_rows($check) > 0) {
        $user = mysqli_fetch_assoc($check);

        $_SESSION['user'] = [
            "id" => $user["id"],
            "name" => $user["name"],
            "email" => $user["email"]
        ];
        header("Location: ../mu.php");
    }
} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header("Location: ../reg.php");
}
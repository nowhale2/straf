<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $pass = ($_POST['pass']);

    // Добавить возможность реализации админ панели
    $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass'");
    if (mysqli_num_rows($check) > 0) {
        $user = mysqli_fetch_assoc($check);

        $_SESSION['user'] = [
            "id" => $user["id"],
            "name" => $user["name"],
            "email" => $user["email"]
        ];

        if ($_SESSION['user']['name'] == "admin") {
            header("Location: ../md2.php");
        } else header("Location: ../mu.php");

    } else {
        $_SESSION['message'] = 'Почта или пароль введены некорректно';
        header('Location: ../mu.php');
    }
    
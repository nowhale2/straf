<?php 
session_start();
if (!$_SESSION["user"]) {
    header("Location: ../index.php");
}
require 'connect.php';

$account = $_SESSION['user']['id'];

mysqli_query($connect, "DELETE FROM `users` WHERE `id` = '$account'");

unset($_SESSION['user']);

header('Location: ../index.php');
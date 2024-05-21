<?php
session_start();

if (!$_SESSION["user"]) {
    header("Location: ../index.php");
}

require 'connect.php';

$num = $_GET['id'];

mysqli_query($connect, "UPDATE `statment` SET `status` = 'Рассмотренно' WHERE `statment`.`number` = '$num'");

header("Location: ../md2.php");

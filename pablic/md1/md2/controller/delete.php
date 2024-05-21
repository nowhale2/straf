<?php 
session_start();

if (!$_SESSION["user"]) {
    header("Location: ../index.php");
}

require 'connect.php';

$number = $_GET['id'];

mysqli_query($connect, "DELETE FROM `statment` WHERE `number` = '$number'");

header('Location: ../md2.php');
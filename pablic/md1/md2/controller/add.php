<?php
session_start();
if (!$_SESSION["user"]) {
    header("Location: ../index.php");
}
require 'connect.php';

$category = $_POST['category'];
$theme = $_POST['theme'];
$text = $_POST['text'];
$id = $_SESSION['user']['id'];

mysqli_query($connect, 
"INSERT INTO `statment` (`number`, `id`, `category`, `theme`, `text`, `status`) VALUES
(NULL, '$id', '$category', '$theme', '$text', 'В обработке')");


header('Location: ../md2.php');
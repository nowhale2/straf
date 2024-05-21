<?php
$db = mysqli_connect('localhost','root','','baza');
if (mysqli_connect_errno()) {
    echo 'Не удается подключиться к бд';
    exit();
}
?>
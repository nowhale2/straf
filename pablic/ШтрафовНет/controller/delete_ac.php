<?php
session_start();
if (!$_SESSION["user"]) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
    if (window.confirm("Вы действительно хотите удалить аккаунт?")) {
        window.close();
        window.open("confirm.php");
    } else {
        window.open("../md2.php");
    }
    </script>
</body>
</html>
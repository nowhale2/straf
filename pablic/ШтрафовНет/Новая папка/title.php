<?php
    require_once('connect.php');
    session_start();
    if(isset($_REQUEST['doGo'])){
        $result = mysqli_query($db, "SELECT `id` FROM `users` WHERE `login` = '" .$_SESSION['login']. "'");
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];

        
        $num = $_REQUEST['num'];
        $text = $_REQUEST['text'];
        $result = mysqli_query($db, "INSERT INTO `statment` (`num`, `text`, `iduser`, `status`)
        VALUES('" .$num. "', '" .$text. "', '" .$id. "', '" ."В рассмотрении". "')");

        /*$idstatment = mysqli_query($db, "SELECT `id` FROM `statment` WHERE `number` = '" .$number. "'");
        $result = mysqli_query($db, "INSERT INTO `userstatment` (`idpolz`, `idstatment`)
        VALUES('" .$id. "', '" .$idstatment. "')");*/
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <p>НАРУШЕНИЯМНЕТ</p>
        <div>
            <p><?echo($_SESSION['login']);?></p>
            <a href="logout.php">Выйти</a>
            <a href="zav.php">Мои заявления</a>
        </div>
    </header>


    <div class="body">
            <div class="bl1">
                <form action="" method="post">
                    <p>Отправльте ваше заявление</p>

                    <div>
                        <p>Номерной знак</p>
                        <input class="inp1" type="text" name="num">
                    </div>

                    <div>
                        <p>Нарушение</p>
                        <input class="inp2" type="text" name="text">
                    </div>
                    <input type="submit" value="Отправить" name="doGo">
                </form>
            </div>
    </div>


    <footer>
        
    </footer>
</body>
</html>
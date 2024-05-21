<?
    require_once('connect.php');
    session_start();
    $res = mysqli_query($db, "SELECT `id` FROM `users` WHERE `login` = '" .$_SESSION['login']. "'");
    $row = mysqli_fetch_assoc($res);
    $iduser = $row['id'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleZav.css">
</head>
<body>
    <header>
        <a href="title.php">НАРУШЕНИЯМНЕТ</p>
        <div>
            <p><?echo($_SESSION['login']);?></p>
            <a href="logout.php">Выйти</a>
            <a href="zav.php">Мои заявления</a>
        </div>
    </header>

    <div class="body">
        <form action="">
            <?
            $result = mysqli_query($db, "SELECT `id`, `num`, `text`, `status` FROM `statment` WHERE `iduser` = '" .$iduser. "'");
                $i = 0;
                while($row = mysqli_fetch_assoc($result)){?>
                <?$i = $i + 1;?>
                    <div class="bl1">
                        <p><?=$i?></p>
                        <p><?=$row['num']?></p>
                        <p><?=$row['text']?></p>
                        <p><?=$row['status']?></p>
                    </div>
                <?}
            ?>
        </form>
    </div>


<footer>
    
</footer>
</body>
</html>
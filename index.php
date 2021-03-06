<?php
    include 'path.php';
    include 'app/database/db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Абитуриенты ОТИ НИЯУ МИФИ</title>
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png">
</head>
<body>
    <?php include "app/include/header.php"; ?>

    <main class="main">
        <form method="post" action="log.php">
            <div class="err">
                <p><?=$errMsg?></p>
            </div>
            <label>Логин</label>
            <input type="text" value="<?=$login?>" name="login" placeholder="Введите свой логин">
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">
            <button type="submit" name="button-log" class="login-btn">Войти</button>
            <p>
                Профиль еще не создан? - <a href="/reg.php">Создать профиль</a>
            </p>
            <p class="msg none">Lorem ipsum dolor sit amet.</p>
        </form>

    </main>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
</body>
</html>

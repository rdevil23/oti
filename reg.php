<?php
    include "path.php";
    include "app/controllers/user.php";
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png">
</head>
<body>
<?php include "app/include/header.php"; ?>
    <!-- Форма регистрации -->
<main class="main">
    <form method="post" action="reg.php">
        <div class="err">
            <p><?=$errMsg?></p>
        </div>
        <label>Логин</label>
        <input type="text" name="login" value="<?=$login?>" required minlength="2" required maxlength="20" placeholder="Введите логин (от 2 до 20 символов)">
        <label>Почта</label>
        <input type="email" name="email" value="<?=$email?>" required maxlength="40" placeholder="Введите адрес электронной почты">
        <label>Пароль</label>
        <input type="password" name="pass-first" required minlength="4" required maxlength="20" placeholder="Введите пароль (от 4 до 20 символов)">
        <label>Подтверждение пароля</label>
        <input type="password" name="password-second" placeholder="Подтвердите пароль">
        <button type="submit" name="button-reg" class="reg-btn">создать профиль</button>
        <p>
            Профиль создан? - <a href="/log.php">Войти</a>
        </p>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
    </form>
</main>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
</body>
</html>
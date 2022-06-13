<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!--NAVBAR-->
<div class="navbar">
    <a href="<?php echo BASE_URL ?>">Абитуриенты ОТИ НИЯУ МИФИ</a>
<!--    <a href="#">Если надо будет добавить еще кнопку в меню</a>-->
    <div class="dropdown">

        <?php if (isset($_SESSION['id_user'])): ?>

        <button class="dropbtn">
            <?php echo $_SESSION['login']; ?>
            <i class="fa fa-caret-down"></i>
        </button>

        <div class="dropdown-content">
            <?php if ($_SESSION['admin']): ?>
            <a href="<?php echo BASE_URL . "admin/admin.php"; ?>">Админ панель</a>
            <?php endif; ?>
            <a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a>

        <?php else: ?>

        <button class="dropbtn">Авторизация
            <i class="fa fa-caret-down"></i>
        </button>

        <div class="dropdown-content">
            <a href="<?php echo BASE_URL . "log.php"; ?>">Войти</a>
            <a href="<?php echo BASE_URL . "reg.php"; ?>">Добавить пользователя</a>
<!--            <a href="#">если нужен будет еще параметр в выпадающем меню</a>-->
            <?php endif; ?>
        </div>
    </div>
<!--    <div class="search-container">-->
<!--        <form action="/action_page.php">-->
<!--            <input type="text" placeholder="Искать..." name="search">-->
<!--            <button type="submit"><i class="fa fa-search"></i></button>-->
<!--        </form>-->
<!--    </div>-->
</div>

</body>
</html>
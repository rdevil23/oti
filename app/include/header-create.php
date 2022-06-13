<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--    <link href="https://iksweb.ru/api/">-->
    <link rel="icon" type="image/png" sizes="16x16" href="../../image/favicon-16x16.png">
    <title>Админ. панель</title>

</head>
<body>



<!--NAVBAR-->
<div class="navbar">
    <a href="<?php echo BASE_URL . "admin/posts/index.php"?>">Абитуриенты ОТИ НИЯУ МИФИ</a>
    <!--    <a href="#">Если надо будет добавить еще кнопку в меню</a>-->
    <div class="dropdown">

        <button class="dropbtn">
            <?php echo $_SESSION['login']; ?>
            <i class="fa fa-caret-down"></i>
        </button>

        <div class="dropdown-content">
            <a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a>
        </div>

    </div>

    <a href="<?php echo BASE_URL . "admin/posts/index.php"?>">Назад к списку</a>



</div>

<script src="../../assets/js/jquery-3.4.1.min.js"></script>

</body>
</html>
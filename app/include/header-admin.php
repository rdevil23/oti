<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/header.css">
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

    <a href="<?php echo BASE_URL . "admin/posts/create.php"?>">Добавить абитуриента</a>

    <div class="search-container">

        <form action="../../admin/posts/search.php" method="post">
            <input type="text" placeholder="Искать..." name="entrant-search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>

    </div>

     <div class="sort-container">

    <form action="" method="get">
        <div class="select-sort">
            <div class="placeholder" data-text="Отсортировать по: "></div>
            <select name="sort" id="js-sort">
                <option value="case_number_asc" <?php if (@$_GET['sort'] == 'case_number_asc') echo 'selected'; ?>>Номер дела по возрастанию</option>
                <option value="case_number_desc" <?php if (@$_GET['sort'] == 'case_number_desc') echo 'selected'; ?>>Номер дела по убыванию</option>
                <option value="full_name_asc" <?php if (@$_GET['sort'] == 'full_name_asc') echo 'selected'; ?>>ФИО в алфав. порядке</option>
                <option value="full_name_desc" <?php if (@$_GET['sort'] == 'full_name_desc') echo 'selected'; ?>>ФИО в обратном порядке</option>
                <option value="birthday_asc" <?php if (@$_GET['sort'] == 'birthday_asc') echo 'selected'; ?>>Дата рождения (сначала старше)</option>
                <option value="birthday_desc" <?php if (@$_GET['sort'] == 'birthday_desc') echo 'selected'; ?>>Дата рождения (сначала моложе)</option>
            </select>
        </div>
    </form>

    </div>

</div>

<script src="../../assets/js/jquery-3.4.1.min.js"></script>

</body>
</html>
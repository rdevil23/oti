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


<?php
/*// Запросы к бд (PDO)

$connection = new PDO("mysql:host=127.0.0.1:3336;dbname=otidb", "root", "root");

$case_number = '65';
$full_name = 'Петрова Оля Викторовна';
$birthday = '2001-11-07';
$sex = 'жен.';
$address = 'Ленина 15, кв. 246';
$phone_number = '79085824179';
$email = 'studentka@mail.ru';


$entrant = [
	'numb' => $case_number,
	'name' => $full_name,
	'bday' => $birthday,
	'sex' => $sex,
	'addr' => $address,
	'phone' => $phone_number,
	'email' => $email
];


$sql = "INSERT entrant (case_number, full_name, birthday, sex, address, phone_number, email) VALUES (:numb, :name, :bday, :sex, :addr, :phone, :email)"; // готовим запрос с плейсхолдерами

$query = $connection->prepare($sql); // подготавливаем запрос

$query->execute($entrant); // пробрасываем массив


// Запрос данных
$query = "SELECT * FROM entrant";

// Запись данных
$query = "INSERT entrant (case_number, full_name, birthday, sex, address, phone_number, email) VALUES ('175', 'Петров Иван Олегович', '1999-06-13', 'муж.', 'К. Маркса д.8, кв. 228', '7957651028', 'test3@gmail.com')";
$connection->exec($query);
*/

?>


<?php
include "app/database/db.php";

$errMsg = '';

function userAuth($user){
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['login'] = $user['login'];
    if($_SESSION['admin']){
        header('location: ' . BASE_URL . "admin/posts/index.php");
    }else{
        header('location: ' . BASE_URL);
    }
}


// Для формы регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['password-second']);
    $admin = 0;

    // проверка данных
    if ($login === '' || $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif ($passF !== $passS){
        $errMsg = "Пароли не совпадают!";
    }else{
        $existence = selectOne('user', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже существует!";
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'login' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('user', $post);
            $user = selectOne('user', ['id_user' => $id]);
            userAuth($user);
        }
    }
}
else{
    $login = '';
    $email = '';
}

//    $password = password_hash($_POST['password_confirm'], PASSWORD_DEFAULT);
//    $password_confirm = $_POST['password_confirm'];

// Для формы авторизации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);

    if ($login === '' || $pass === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
        $existence = selectOne('user', ['login' => $login]);
        if ($existence && password_verify($pass, $existence['password'])){
            userAuth($existence);
        }elseif (mb_strlen($pass) < 4){
            $errMsg = "Пароль не может быть меньше 4-х символов!";
        }else{
            $errMsg = "Неверный логин или пароль!";
        }
    }
}
//else{
//    $login = '';
//}

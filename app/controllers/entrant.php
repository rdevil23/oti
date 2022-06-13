<?php
    include_once "../../app/database/db.php";
    include "../../path.php";


    $errMsg = '';
    $id_entrant = '';
    $case_number = '';
    $full_name = '';
    $birthday = '';
    $sex = '';
    $address = '';
    $phone_number = '';
    $email = '';
    $education_number = '';
    $extra = '';
    $region_city_name = '';
    $id_region_city ='';

    global $pdo;

//if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['consent']) && isset($_POST['original'])){
//    $consent = "согласен";
//    $original = "оригинал";
//} else {
//    $consent = "не согласен";
//    $original = "копия";
//}
//$checkbox_consent = $pdo->prepare("INSERT INTO specialty(consent) VALUES ('$consent')");
//$checkbox_consent->execute();
//dbCheckError($checkbox_consent);
//return $checkbox_consent->fetch();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['entrant-create'])){
    $case_number = trim($_POST['case_number']);
    $full_name = trim($_POST['full_name']);
    $birthday = trim($_POST['birthday']);
    $sex = trim($_POST['sex']);
    $address = trim($_POST['address']);
    $phone_number = trim($_POST['phone_number']);
    $email = trim($_POST['email']);
    $education_number = trim($_POST['education_number']);
    $extra = trim($_POST['extra']);
    $region_city_name = trim($_POST['region_city_name']);

    // проверка данных и запись в БД персональных данных абитуриента
    if ($case_number === '' || $full_name === '' || $birthday === '' || $phone_number === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (!preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $email)){
        $errMsg = "Электронная почта введена неверно!";
    } else{
        $existence = selectOne('entrant', ['case_number' => $case_number]);
//        $existence = selectOne('region_city', ['region_city_name' => $region_city_name]);
        if (!empty($existence['case_number']) && $existence['case_number'] === $case_number){
            $errMsg = "Дело с таким номером уже существует!";
        }else{
            $entrant = [
                'case_number' => $case_number,
                'full_name' => $full_name,
                'birthday' => $birthday,
                'sex' => $sex,
                'address' => $address,
                'phone_number' => $phone_number,
                'email' => $email,
                'education_number' => $education_number,
                'extra' => $extra
            ];
            $region_city = [
                'region_city_name' => $region_city_name
            ];
            $id_entrant = insert('entrant', $entrant);
            $entrant = selectOne('entrant', ['id_entrant' => $id_entrant]);
            $id_region_city = insert('region_city', $region_city);
//            $region_city = selectOne('region_city', ['id_region_city' => $id_region_city]);
            header('location: ' . BASE_URL . 'admin/posts/index.php');
        }
    }
}else{
    $case_number = '';
    $full_name = '';
    $birthday = '';
    $sex = '';
    $address = '';
    $phone_number = '';
    $email = '';
    $education_number = '';
    $extra = '';
    $region_city = '';
}

    // редактирование данных об абитуриенте и сохранение измененной информации
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_entrant'])){
        $id_entrant = $_GET['id_entrant'];
        $row = selectOne('entrant', ['id_entrant' => $id_entrant]);
        $case_number = $row['case_number'];
        $full_name = $row['full_name'];
        $birthday = $row['birthday'];
        $sex = $row['sex'];
        $address = $row['address'];
        $phone_number = $row['phone_number'];
        $email = $row['email'];
        $education_number = $row['education_number'];
        $extra = $row['extra'];
        $region_city = $row['region_city'];
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['entrant-edit'])){
    $case_number = trim($_POST['case_number']);
    $full_name = trim($_POST['full_name']);
    $birthday = trim($_POST['birthday']);
    $sex = trim($_POST['sex']);
    $address = trim($_POST['address']);
    $phone_number = trim($_POST['phone_number']);
    $email = trim($_POST['email']);
    $education_number = trim($_POST['education_number']);
    $extra = trim($_POST['extra']);
    $region_city_name = trim($_POST['region_city_name']);

    // проверка данных и запись в БД персональных данных абитуриента
    if ($case_number === '' || $full_name === '' || $birthday === '' || $phone_number === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (!preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $email)){
        $errMsg = "Электронная почта введена неверно!";
    } else{
            $entrant = [
                'case_number' => $case_number,
                'full_name' => $full_name,
                'birthday' => $birthday,
                'sex' => $sex,
                'address' => $address,
                'phone_number' => $phone_number,
                'email' => $email,
                'education_number' => $education_number,
                'extra' => $extra
            ];
            $region_city = [
                'region_city_name' => $region_city_name
            ];
            $id_entrant = $_POST['id_entrant'];
//            $id_region_city = $_POST['id_region_city'];
            $id_entrant = update('entrant', $id_entrant, $entrant);
//            $region_city = update('region_city', $id_region_city, $region_city);
            header('location: ' . BASE_URL . 'admin/posts/index.php');
        }

}

// удаление абитуриента
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id_entrant = $_GET['delete_id'];
    delete('entrant', $id_entrant);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}
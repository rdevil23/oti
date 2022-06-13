<?php

session_start();
require 'connect.php';
global $pdo;
//function test($value){
//	echo '<pre>';
//	print_r($value);
//	echo '</pre>';
//    exit();
//}

// проверка выполнения запроса к БД
function dbCheckError($query){
	$errInfo = $query->errorInfo();
	if ($errInfo[0] != PDO::ERR_NONE){
		echo $errInfo[2];
		exit();
	}
	return true;
}


$sort_list = [
    'case_number_asc' => '`case_number`',
    'case_number_desc' => '`case_number` DESC',
    'full_name_asc' => '`full_name`',
    'full_name_desc' => '`full_name` DESC',
    'birthday_asc' => '`birthday`',
    'birthday_desc' => '`birthday` DESC',
    'sex' => '`sex`',
    'address' => '`address`',
    'phone_number' => '`phone_number`',
    'email' => '`email`',
    'extra' => '`extra`'
];

/* Проверка GET-переменной */
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
    $sort_sql = $sort_list[$sort];
} else {
    $sort_sql = reset($sort_list);
}

$query1 = $pdo->prepare("SELECT * FROM entrant 
        LEFT JOIN specialty 
        ON specialty.id_specialty_entrant = entrant.id_entrant
        ORDER BY {$sort_sql}");
// $query1 = $pdo->prepare("SELECT specialty_code FROM `specialty`");
$query1->execute();
// $query1->execute();
global $list;
$list = $query1->fetchAll(PDO::FETCH_ASSOC);
// $list1 = $query1->fetchAll(PDO::FETCH_ASSOC);
return $list;

// Поиск по заголовкам и содержимому (простой)
function seacrhInTitileAndContent($text, $table1){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT 
        e.*
        FROM $table1 AS e 
        WHERE e.full_name LIKE '%$text%' OR e.case_number LIKE '%$text%' OR e.phone_number LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// запрос на получение данных с одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";
    // сюда проваливаемся, если есть хоть одно значение параметра params
	if (!empty($sort_list)) {
		$i = 0;
        foreach ($sort_list as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
	}
//	$query = $pdo->prepare($sql);
//	$query->execute();
//	dbCheckError($query);
//	return $query->fetchAll();
}


// запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";
    // сюда проваливаемся, если есть хоть одно значение параметра params
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}
//$params = [
//    'id_univer_entrant' => 1
//];
//	'case_number' => 65
//    'sex' => 'жен.'
//    'full_name' => 'Иванов Иван Андреевич'


// функция вывода нескольких значений
//test(selectAll('entrant', $params));
// функция вывода одного значения
//selectOne('university', 1, $params);

// запись в таблицу БД
function insert($table, $params) {
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask ."'" ."$value". "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" ."$value". "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql); // подготовка запроса
    $query->execute($params); // запрос
    dbCheckError($query); // проверка на ошибку
    return $pdo->lastInsertId();
}


//$arrData = [
//    'case_number' => '66',
//    'full_name' => 'Милонова Оксана Алексеевна',
//    'birthday' => '1997-06-26',
//    'sex' => 'жен.',
//    'address' => 'Пушкина 46, кв. 35',
//    'phone_number' => '79925678320',
//    'email' => 'newstud@mail.ru'
//];

// функция изменения данных
//insert('entrant', $arrData);

// обновление данных в таблице БД
function update($table, $id_entrant, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str .", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id_entrant = $id_entrant";
    $query = $pdo->prepare($sql); // подготовка запроса
    $query->execute($params); // запрос
    dbCheckError($query); // проверка на ошибку
}
//$update_param = [
//    'birthday' => '1998-12-04'
////    'phone_number' => '79807364215',
////    'case_number' => '1'
//];
//
//update('entrant', 1, $update_param);


// удаление данных из таблицы БД
function delete($table, $id) {
    global $pdo;
    $sql = "DELETE FROM $table WHERE id_entrant =". $id;
    $query = $pdo->prepare($sql); // подготовка запроса
    $query->execute(); // запрос
    dbCheckError($query); // проверка на ошибку
}

// функция удаления данных
//delete('entrant', 7);
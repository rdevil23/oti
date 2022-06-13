<?php
$driver = 'mysql';
$host = '127.0.0.1:3336';
$db_name = 'otidb';
$db_user = 'root';
$db_pass = 'root';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
global $pdo;

try{
     $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options
    );
}catch (PDOException $i){
    die("Ошибка подключения к базе данных");
}

//    PDO::ATTR_EMULATE_PREPARES   => false,
//    PDO::ATTR_PERSISTENT => true,
//    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET sql_mode=""'
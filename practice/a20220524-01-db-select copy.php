<?php

require __DIR__. '/connect_db.php';
// require_once  不建議使用
// include __DIR__. '/connect_db.php';
// include_once  不建議使用
// 相當於拉進此檔案

// $db_host = 'localhost'; // 主機名稱
// $db_user = 'anmo'; // 資料庫連線的用戶
// $db_pass = '1234'; // 連線用戶的密碼
// $db_name = 'anmo';  // 資料庫名稱

// $dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

// $pdo = new PDO($dsn, $db_user, $db_pass);
// $pdo_options = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
// ];
// try {
//     $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
// }catch (PDOException $ex) {
//     echo $ex->getmessage();
// }



// 方法的多載，過載overload
$stmt = $pdo->query("SELECT * FROM address_book LIMIT 0, 5");

// 會一筆一筆的抓
// $row = $stmt->fetch();

// 以索引式陣列的格式取得資料 
// $row = $stmt->fetch(PDO::FETCH_NUM);


// 取出RecordSet所有資料
// $row = $stmt->fetchAll();
while($r = $stmt->fetch()){
    echo "{$r['name']}";
}
// echo json_encode($row); 


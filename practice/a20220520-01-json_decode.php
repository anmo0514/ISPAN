<?php
header('Content-Type: text/plain'); // 設定檔頭, 告訴用戶端內容為純文字

$str = '{"name":"小新","age":27,"data":[1,3,5]}';

$a = json_decode($str, true); // *** 關聯式陣列
$b = json_decode($str);

var_dump($a);

var_dump($b);


echo $b->name;

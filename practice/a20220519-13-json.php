<?php
// header('Content-Type: text/plain'); // 設定檔頭, 告訴用戶端內容為純文字

$ar = [
    'name' => '小新',
    'age' => 27,
    'data' => [1, 3, 5]
];

echo json_encode($ar, JSON_UNESCAPED_UNICODE);

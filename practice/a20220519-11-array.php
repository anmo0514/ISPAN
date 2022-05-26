<?php
// header('Content-Type: text/plain'); // 設定檔頭, 告訴用戶端內容為純文字

$ar = [];

for ($i = 0; $i < 10; $i++) {
    $ar[] = rand(1, 99);
}

foreach ($ar as $v) {
    echo " $v<br>";
}

<?php
header('Content-Type: text/plain'); // 設定檔頭, 告訴用戶端內容為純文字

// date_default_timezone_set('Asia/Taipei');
echo date("Y-m-d H:i:s") . "\n";
echo time() . "\n";

echo date("Y-m-d H:i:s", time() + 30 * 24 * 60 * 60) . "\n";
$t = strtotime('2022-05-20');
echo strtotime('2022-05-20') . "\n";
echo date("Y-m-d H:i:s", $t) . "\n";

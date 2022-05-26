<?php
$output = [];

$ar1 = [
    'name' => 'Bill',
    'age' => 28,
];

$ar2 = $ar1; // 設定值
$ar3 = &$ar1; // 設定位址(參照)

$ar1['name'] = 'David';

$output['ar1'] = $ar1;
$output['ar2'] = $ar2;
$output['ar3'] = $ar3;

$a = 10;
$b = &$a;

$a = 99;
$output['b'] = $b;


echo json_encode($output, JSON_UNESCAPED_UNICODE);

<?php require __DIR__ . '/part/connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

// TODO: 欄位檢查, 後端的檢查
// if (empty($_POST['actname'])) {
//     $output['error'] = '沒有姓名資料';
//     $output['code'] = 400;
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }


$act_l_name = $_POST['act_l_name'];
$act_l_age = $_POST['act_l_age'] ?? '';
$act_l_mobile= $_POST['act_l_mobile'] ?? '';
$act_l_address = $_POST['act_l_address'] ?? '';
$act_l_license = $_POST['act_l_license'] ?? '';



// if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
//     $output['error'] = 'email 格式錯誤';
//     $output['code'] = 405;
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }
// TODO: 其他欄位檢查



$sql= "INSERT INTO `act_leaders`(`act_l_name`, `act_l_age`, `act_l_mobile`, `act_l_address`, `act_l_license`) VALUES (?,?,?,?,?)";



$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST['act_l_name'],
    $_POST['act_l_age'],
    $_POST['act_l_mobile'],
    $_POST['act_l_address'],
    $_POST['act_l_license'],
]);



if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '資料無法新增';
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
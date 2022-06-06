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


$act_name = $_POST['act_name'];
$act_s_time = $_POST['act_s_time'] ?? '';
$act_e_time= $_POST['act_e_time'] ?? '';
$min_people = $_POST['min_people'] ?? '';
$max_people = $_POST['max_people'] ?? '';
$min_age = $_POST['min_age'] ?? '';
$max_age = $_POST['max_age'] ?? '';
$act_price = $_POST['act_price'] ?? '';
$act_desc = $_POST['act_desc'] ?? '';
$act_notice = $_POST['act_notice'] ?? '';
$act_schedule = $_POST['act_schedule'] ?? '';
$act_prepare = $_POST['act_prepare'] ?? '';


// if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
//     $output['error'] = 'email 格式錯誤';
//     $output['code'] = 405;
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }
// TODO: 其他欄位檢查



$sql= "INSERT INTO `act`(`act_name`, `act_s_time`, `act_e_time`, `min_people`, `max_people`, `min_age`, `max_age`, `act_price`, `act_desc`, `act_notice`, `act_schedule`, `act_prepare`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";



$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST['act_name'],
    $_POST['act_s_time'],
    $_POST['act_e_time'],
    $_POST['min_people'],
    $_POST['max_people'],
    $_POST['min_age'],
    $_POST['max_age'],
    $_POST['act_price'],
    $_POST['act_desc'],
    $_POST['act_notice'],
    $_POST['act_schedule'],
    $_POST['act_prepare'],
]);



if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '資料無法新增';
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
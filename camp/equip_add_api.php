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


$name = $_POST['name'];
$info = $_POST['info'] ?? '';
$img= $_POST['img'] ?? '';
$price = $_POST['price'] ?? '';
$rest = $_POST['rest'] ?? '';



// if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
//     $output['error'] = 'email 格式錯誤';
//     $output['code'] = 405;
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }
// TODO: 其他欄位檢查



$sql= "INSERT INTO `equip`(`name`, `info`, `img`, `price`, `rest`) VALUES (?,?,?,?,?)";



$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST['name'],
    $_POST['info'],
    $_POST['img'],
    $_POST['price'],
    $_POST['rest'],
]);



if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '資料無法新增';
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
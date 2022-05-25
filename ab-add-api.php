<?php 
require __DIR__.'/parts/connect_db.php'; 
header('Content-Type: application/json');

//把傳給前端的資料用陣列包起來
$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => '',
    'code' => 0
];
//TODO: 欄位檢查，後端的檢查
if(empty($_POST['name'])){
    $output['error'] = '請填入姓名';
    $output['code'] = 400; 
    echo json_encode($output, JSON_UNESCAPED_UNICODE); 
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$birthday = empty($_POST['birthday']) ? NULL : $_POST['birthday'];
$address = $_POST['address']?? '';

if(! empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL)=== false){
    $output['error'] = '格式錯誤';
    $output['code'] = 405; 
    echo json_encode($output, JSON_UNESCAPED_UNICODE); 
    exit;
};



$sql = "INSERT INTO `address_book`(`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
VALUES(
    ?, ?, ?,
    ?, ?, NOW()
)";


$stmt = $pdo->prepare($sql);
$stmt->execute([
    $name,
    $email,
    $mobile,
    $birthday,
    $address,
]);

if ($stmt->rowCount()==1) {
    $output['success'] = true;
    //最近新增資料的 primery key
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = '無法新增資料'; 
};

echo json_encode($output, JSON_UNESCAPED_UNICODE);
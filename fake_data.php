<?php require __DIR__.'/parts/connect_db.php'; 

// $sql = "INSERT INTO `address_book`( `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
//     VALUES ('張兆軒', 'anmo0514@gmail.com', '0970500901', '1991-05-14', '台北市', NOW()
// )";

// $stmt = $pdo->query($sql);
// echo $stmt->rowCount(); 

//幾個問號就有幾格個值，若對應不上會出錯
//防止SQL injection(SQL 隱碼攻擊)
// 外來的資料一律用 prepare() execute 匯入
$sql = "INSERT INTO `address_book`( `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
    VALUES (?,?, ?, ?, ?, NOW()
)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    '張兆軒', 
    'anmo0514@gmail.com', 
    '0970500901', 
    '1991-05-14', 
    '台北市'
]);

echo $stmt->rowCount(); 
?>
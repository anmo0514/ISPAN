<?php require __DIR__.'/parts/connect_db.php'; 

$perPage = 20; //每一頁有五筆資料

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1){
    header('Location: ?page=1');
    exit;
}

//總共有幾筆，才知道總共有幾頁
$t_sql = "SELECT COUNT(1) FROM address_book";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];//總比數; 索引式陣列  fetch第一筆 / 0 是第一欄
$totalPages = ceil($totalRows / $perPage);//總共有幾頁 (ceil無條件進位)
// echo $totalRows;
// exit;
$row=[];
if ($totalRows > 0){
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages");
    exit;
    }
    
    $sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

$output = [
    'perPage' => $perPage,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows,

];

echo json_encode($output, JSON_UNESCAPED_UNICODE);
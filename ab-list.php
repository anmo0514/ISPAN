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

?>


<?php include __DIR__.'/parts/html-head.php' ?>
<?php include __DIR__.'/parts/navbar.php' ?>



<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=1">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                    ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                    <?php endif; endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?=$page +1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?=$totalPages ?>">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">手機</th>
                <th scope="col">電郵</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
                <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><a><i class="fa-solid fa-trash-can"></i></a></td>
                    <td><?= $r['sid']?></td>
                    <td><?= $r['name']?></td>
                    <td><?= $r['mobile']?></td>
                    <td><?= $r['email']?></td>
                    <td><?= $r['birthday']?></td>
                    <td><?= $r['address']?></td>
                    <td><a><i class="fa-solid fa-pen-to-square"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__.'/parts/scripts.php' ?>
<?php include __DIR__.'/parts/html-foot.php' ?>
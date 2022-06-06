<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'act_list';
$title = '活動加購';

$perPage = 5; // 每一頁有幾筆

// 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(1) FROM act";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; // 總筆數

$totalPages = ceil($totalRows / $perPage); // 總共有幾頁

$rows = [];

if ($totalRows > 0) {
    // 頁碼若超過總頁數
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages");
        exit;
    }

    $sql = sprintf("SELECT * FROM act ORDER BY act_id LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

?>
<?php include __DIR__ . '/part/html-head.php' ?>
<?php include __DIR__ . '/part/navbar.php' ?>

<div class="container">

    <div class="w-100 d-flex justify-content-end">
        <!-- 新增商品按鈕 -->
        <a class="nav-link text-dark p-3" href="act_add.php">
            <i class="fa-solid fa-plus"></i>
            新增活動
            </a>

        <!-- 前往前台的按鈕 -->
        <a class="nav-link text-dark p-3" href="c_index.php" target="_blank">
        <i class="fa-solid fa-eye"></i>
            View Site
        </a>
    </div>



    <div class="card p-5">
    <div class="row">
        <div class="col-6">
        <a class="nav-link text-dark p-3" href="leader_list.php">
        <i class="fa-solid fa-eye"></i>
            教練資料
        </a>
        </div>
    </div>


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                <th scope="col">#</th>
                <th scope="col">活動名稱</th>
                <th scope="col">活動價格</th>
                <th scope="col">開始時間</th>
                <th scope="col">結束時間</th>
                <th scope="col">開團人數</th>
                <th scope="col">人數限制</th>
                <th scope="col">最小年齡</th>
                <th scope="col">最大年齡</th>
                <th scope="col">詳情介紹</th>
                <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td>
                    <?php /*
                        <a href="ab-delete.php?sid=<?= $r['sid'] ?>" onclick="return confirm('確定要刪除編號為 <?= $r['sid'] ?> 的資料嗎?')">
                        */ ?>

                        <a href="javascript: delete_it(<?= $r['act_id'] ?>)">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                    <td><?= $r['act_id'] ?></td>
                    <td><?= htmlentities($r['act_name']) ?></td>
                    <td><?= $r['act_price'] ?></td>
                    <td><?= $r['act_s_time'] ?></td>
                    <td><?= $r['act_e_time'] ?></td>
                    <td><?= $r['min_people'] ?></td>
                    <td><?= $r['max_people'] ?></td>
                    <td><?= $r['min_age'] ?></td>
                    <td><?= $r['max_age'] ?></td>
                    <td class="p-3">
                    <a  href="act_detail.php?act_id=<?= $r['act_id'] ?>">
                        <i class="fa-solid fa-list"></i>
                    </a>
                    </td>
                    <td>
                    <a href="act_edit.php?act_id=<?= $r['act_id'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
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
                    <?php endif;
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>

    </div>


</div>




<?php include __DIR__ . '/part/scripts.php' ?>

<script>
    function delete_it(act_id) {
        if (confirm(`確定要刪除編號為 ${act_id} 的資料嗎?`)) {
            location.href = `act_delete.php?act_id=${act_id}`;
        }
    }
</script>

<?php include __DIR__ . '/part/html-foot.php' ?>

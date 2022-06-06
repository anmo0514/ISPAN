<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'equip_list';
$title = '裝備租賃';

$perPage = 4; // 每一頁有幾筆

// 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(1) FROM equip";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; // 總筆數

$totalPages = ceil($totalRows / $perPage); // 總共有幾頁

$rows = [];

if ($totalRows > 0) {
    // 頁碼若超過總頁數
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages");
        exit;
    }

    $sql = sprintf("SELECT * FROM equip ORDER BY equip_id  LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

?>
<?php include __DIR__ . '/part/html-head.php' ?>
<?php include __DIR__ . '/part/navbar.php' ?>

<div class="container">

    <div class="w-100 d-flex justify-content-end">
        <!-- 新增商品按鈕 -->
        <a class="nav-link text-dark p-3" href="equip_add.php">
            <i class="fa-solid fa-plus"></i>
            新增租賃裝備
            </a>

        <!-- 前往前台的按鈕 -->
        <a class="nav-link text-dark p-3" href="c_index.php" target="_blank">
        <i class="fa-solid fa-eye"></i>
            View Site
        </a>
    </div>


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                <th scope="col">#</th>
                <th scope="col">裝備名稱</th>
                <th scope="col">裝備介紹</th>
                <th scope="col">裝備照片</th>
                <th scope="col">價錢/天</th>
                <th scope="col">庫存</th>
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

                        <a href="javascript: delete_it(<?= $r['equip_id'] ?>)">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                    <td><?= $r['equip_id'] ?></td>
                    <td><?= htmlentities($r['name']) ?></td>
                    <td><?= $r['info'] ?></td>
                    <td> <img src="./imgs/product/<?= $r['img'] ?>.jpg" alt="" class="card-img" style="width:200px;"></td>
                    <td><?= $r['price'] ?></td>
                    <td><?= $r['rest'] ?></td>
                    <td class="p-3">
                    <a  href="equip_detail.php?equip_id=<?= $r['equip_id'] ?>">
                        <i class="fa-solid fa-list"></i>
                    </a>
                    </td>
                    <td>
                    <a href="equip_edit.php?equip_id=<?= $r['equip_id'] ?>">
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
    function delete_it(equip_id) {
        if (confirm(`確定要刪除編號為 ${equip_id} 的資料嗎?`)) {
            location.href = `equip_delete.php?equip_id=${equip_id}`;
        }
    }
</script>

<?php include __DIR__ . '/part/html-foot.php' ?>

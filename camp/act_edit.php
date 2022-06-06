<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'act_edit';
$title = '編輯商品';


$act_id = isset($_GET['act_id']) ? intval($_GET['act_id']) : 0;
if (empty($act_id)) {
    header('Location:act_list.php');
    exit;
}

$row=$pdo->query("SELECT * FROM act WHERE act_id =$act_id")->fetch();
if(empty($row)){
    header('Location:act_list.php');
    exit;
};

?>

<?php include __DIR__.'/part/html-head.php'?>
<?php include __DIR__.'/part/navbar.php' ?>
<style>
    
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯活動</h5>
                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                        <input type="hidden" name="act_id" value="<?= $row['act_id'] ?>">
                        <div class="mb-3">
                            <label for="act_name" class="form-label">* 活動名稱</label>
                            <input type="text" class="form-control" id="act_name" name="act_name" value="<?= $row['act_name'] ?>" required>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_price" class="form-label">活動價格</label>
                            <input type="number" class="form-control" id="act_price" name="act_price" value="<?= $row['act_price'] ?>">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_s_time" class="form-label">開始時間</label>
                            <input type="datetime" class="form-control" id="act_s_time" name="act_s_time" value="<?= $row['act_s_time'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_e_time" class="form-label">結束時間</label>
                            <input type="datetime" class="form-control" id="act_e_time" name="act_e_time" value="<?= $row['act_e_time'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="min_people" class="form-label">開團人數</label>
                            <input type="number" class="form-control" id="min_people" name="min_people" value="<?= $row['min_people'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="max_people" class="form-label">人數限制</label>
                            <input type="number" class="form-control" id="max_people" name="max_people" value="<?= $row['max_people'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="min_age" class="form-label">最小年齡</label>
                            <input type="number" class="form-control" id="min_age" name="min_age" value="<?= $row['min_age'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="max_age" class="form-label">最大年齡</label>
                            <input type="number" class="form-control" id="max_age" name="max_age" value="<?= $row['max_age'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_desc" class="form-label">活動特色</label>
                            <textarea class="form-control" name="act_desc" id="act_desc" cols="30" rows="3"><?= $row['act_desc'] ?></textarea>
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_notice" class="form-label">注意事項</label>
                            <textarea class="form-control" name="act_notice" id="act_notice" cols="30" rows="3"><?= $row['act_notice'] ?></textarea>
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_schedule" class="form-label">行程安排</label>
                            <textarea class="form-control" name="act_schedule" id="act_schedule" cols="30" rows="3"><?= $row['act_schedule'] ?></textarea>
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_prepare" class="form-label">個人準備事項</label>
                            <textarea class="form-control" name="act_prepare" id="act_prepare" cols="30" rows="3"><?= $row['act_prepare'] ?></textarea>
                            <div class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">修改</button>
                    </form>
                    <div id="info-bar" class="alert alert-success p-2" role="alert" style="display:none;">
                        資料修改成功
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/part/scripts.php' ?>
<script>

    const row = <?= json_encode($row, JSON_UNESCAPED_UNICODE); ?>;
    



    async function sendData() {
        // TODO: 欄位檢查, 前端的檢查
        const fd = new FormData(document.form1);
        const r = await fetch('act_edit_api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);


    }
</script>
<?php include __DIR__.'/part/html-foot.php' ?>
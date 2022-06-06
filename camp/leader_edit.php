<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'leader_edit';
$title = '編輯教練資料';


$act_l_id = isset($_GET['act_l_id']) ? intval($_GET['act_l_id']) : 0;
if (empty($act_l_id)) {
    header('Location:leader_list.php');
    exit;
}

$row=$pdo->query("SELECT * FROM act_leaders WHERE act_l_id =$act_l_id")->fetch();
if(empty($row)){
    header('Location:leader_list.php');
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
                    <h5 class="card-title">編輯教練資料</h5>
                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                        <input type="hidden" name="act_l_id" value="<?= $row['act_l_id'] ?>">
                        <div class="mb-3">
                            <label for="act_l_name" class="form-label">* 教練名稱</label>
                            <input type="text" class="form-control" id="act_l_name" name="act_l_name" value="<?= $row['act_l_name'] ?>" required>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_l_age" class="form-label">教練年齡</label>
                            <input type="number" class="form-control" id="act_l_age" name="act_l_age" value="<?= $row['act_l_age'] ?>">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_l_mobile" class="form-label">教練手機</label>
                            <input type="text" class="form-control" id="act_l_mobile" name="act_l_mobile" value="<?= $row['act_l_mobile'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_l_address" class="form-label">教練住址</label>
                            <input type="text" class="form-control" id="act_l_address" name="act_l_address" value="<?= $row['act_l_address'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_l_license" class="form-label">教練證照</label>
                            <input type="text" class="form-control" id="act_l_license" name="act_l_license" value="<?= $row['act_l_license'] ?>">
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
        const r = await fetch('leader_edit_api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);


    }
</script>
<?php include __DIR__.'/part/html-foot.php' ?>
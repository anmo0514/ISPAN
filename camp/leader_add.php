<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'leader_add';
$title = '新增教練';
?>

<?php include __DIR__ . '/part/html-head.php' ?>
<?php include __DIR__ . '/part/navbar.php' ?>
<style>
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增教練</h5>
                    <form name="form1" onsubmit="sendData(); return false;" novalidate>
                        <div class="mb-3">
                            <label for="act_l_name" class="form-label">* 教練名稱</label>
                            <input type="text" class="form-control" id="act_l_name" name="act_l_name" required>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_l_age" class="form-label">教練年齡</label>
                            <input type="number" class="form-control" id="act_l_age" name="act_l_age">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_l_mobile" class="form-label">教練手機</label>
                            <input type="text" class="form-control" id="act_l_mobile" name="act_l_mobile" pattern="09\d{8}">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_l_address" class="form-label">教練住址</label>
                            <input type="text" class="form-control" id="act_l_address" name="act_l_address">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="act_l_license" class="form-label">教練證照</label>
                            <input type="text" class="form-control" id="act_l_license" name="act_l_license">
                            <div class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">新增</button>
                    </form>
                    <!-- <form action="p_add_upload_api.php" method="post" enctype="multipart/form-data">
                    Select Image File to Upload:
                    <input type="file" name="file" class="form-control my-3">
                    <input type="submit" name="submit" value="Upload" class="btn btn-outline-secondary my-1">
                    </form> -->

                    <div id="info-bar" class="alert alert-success p-2" role="alert" style="display:none;">
                        新增成功
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/part/scripts.php' ?>
<script>
    async function sendData() {
        // TODO: 欄位檢查, 前端的檢查
        const fd = new FormData(document.form1);
        const r = await fetch('leader_add_api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);


    }
</script>
<?php include __DIR__ . '/part/html-foot.php' ?>
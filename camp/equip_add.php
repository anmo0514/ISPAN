<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'equip_add';
$title = '新增租賃裝備';
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
                    <h5 class="card-title">新增租賃裝備</h5>
                    <form name="form1" onsubmit="sendData(); return false;" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">* 裝備名稱</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="info" class="form-label">裝備介紹</label>
                            <input type="text" class="form-control" id="info" name="info">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">裝備照片</label>
                            <input type="text" class="form-control" id="img" name="img">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">價錢/天</label>
                            <input type="number" class="form-control" id="price" name="price">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="rest" class="form-label">庫存</label>
                            <input type="number" class="form-control" id="rest" name="rest">
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
                        資料新增成功
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
        const r = await fetch('act_add_api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);


    }
</script>
<?php include __DIR__.'/part/html-foot.php' ?>
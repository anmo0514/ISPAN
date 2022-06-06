<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'equip_edit';
$title = '編輯租賃裝備';


$equip_id = isset($_GET['equip_id']) ? intval($_GET['equip_id']) : 0;
if (empty($equip_id)) {
    header('Location:equip_list.php');
    exit;
}

$row=$pdo->query("SELECT * FROM equip WHERE equip_id =$equip_id")->fetch();
if(empty($row)){
    header('Location:equip_list.php');
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
                    <h5 class="card-title">編輯租賃裝備</h5>
                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                        <input type="hidden" name="equip_id" value="<?= $row['equip_id'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">* 裝備名稱</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>" required>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="info" class="form-label">裝備介紹</label>
                            <textarea class="form-control" name="info" id="info" cols="30" rows="4"><?= $row['info'] ?></textarea>
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">裝備照片</label>
                            <img src="./imgs/product/<?= $row['img'] ?>.jpg" alt="" class="card-img" style="width:200px;"> 
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">價格/天</label>
                            <input type="datetime" class="form-control" id="price" name="price" value="<?= $row['price'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="rest" class="form-label">庫存</label>
                            <input type="number" class="form-control" id="rest" name="rest" value="<?= $row['rest'] ?>">
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
        const r = await fetch('equip_edit_api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);


    }
</script>
<?php include __DIR__.'/part/html-foot.php' ?>
<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'equip_detail';
$title = '租賃裝備詳情';


$equip_id = isset($_GET['equip_id']) ? intval($_GET['equip_id']) : 0;
if (empty($equip_id)) {
    header('Location:equip_list.php');
    exit;
}

$row = $pdo->query("SELECT * FROM equip WHERE equip_id =$equip_id")->fetch();
if (empty($row)) {
    header('Location:equip_list.php');
    exit;
};


?>

<?php include __DIR__ . '/part/html-head.php' ?>
<?php include __DIR__ . '/part/navbar.php' ?>
<style>
</style>
<div class="container">

    <div class="row m-5">
        <div class="col-md-10">
            <div class="card p-5">
                <div class="card-body">
                    <h5 class="card-title text-secondary border-bottom border-secondary p-2">租賃裝備詳情</h5>
                    <form name="form1">

                        <div class="my-5">
                            <h6 class="m-0">裝備名稱</h6>
                            <?= $row['name'] ?>
                        </div>

                        <div class="my-5">
                            <h6 class="m-0">裝備介紹</h6>
                            <?= $row['info'] ?>
                        </div>

                        <div class="my-5">
                            <h6 class="m-0">裝備照片</h6>
                            <img src="./imgs/product/<?= $row['img'] ?>.jpg" alt="" class="card-img" style="width:200px;"> 
                        </div>

                        <div class="my-4">
                            <h6 class="m-0">價錢/天</h6>
                            <?= $row['price'] ?>
                        </div>


                        <div class="my-4">
                            <h6 class="m-0">庫存</h6>
                            <?= $row['rest'] ?>
                        </div>

                        <div class="my-4">
                            <h6 class="m-0">規格</h6>
                            <?= $row['spec'] ?>
                        </div>
                        <div class="my-4">
                            <h6 class="m-0">附件裝備</h6>
                            <?= $row['include'] ?>
                        </div>
                        <div class="my-4">
                            <h6 class="m-0">照片2</h6>
                            <img src="./imgs/product/<?= $row['img2'] ?>.jpg" alt="" class="card-img" style="width:200px;"> 
                        </div>
                        <div class="my-4">
                            <h6 class="m-0">照片3</h6>
                            <img src="./imgs/product/<?= $row['img3'] ?>.jpg" alt="" class="card-img" style="width:200px;"> 
                        </div>

                    </form>

                    <div class="mt-5">
                        <a class="text-decoration-none" href="equip_list.php">
                            <i class="fa-solid fa-arrow-left"></i> 返回
                        </a>



                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include __DIR__ . '/part/scripts.php' ?>
    <script>
        // const row = <?= json_encode($row, JSON_UNESCAPED_UNICODE); ?>;

        // async function sendData() {

        //     const fd = new FormData(document.form1);
        //     const r = await fetch('p_edit_api.php', {
        //         method: 'POST',
        //         body: fd,
        //     });
        //     const result = await r.json();
        //     console.log(result);


        // }
    </script>
    <?php include __DIR__ . '/part/html-foot.php' ?>
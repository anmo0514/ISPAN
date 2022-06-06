<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'p_detail';
$title = '商品詳情';


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

    <div class="row m-5">
        <div class="col-md-10">
            <div class="card p-5">
                <div class="card-body">
                    <h5 class="card-title text-secondary border-bottom border-secondary p-2">活動詳情</h5>
                    <form name="form1">
            
                        <div class="my-5">
                            <h6 class="m-0">活動名稱</h6>
                            <?= $row['act_name'] ?>   
                        </div>

                        <div class="my-5">
                            <h6 class="m-0">開始時間</h6>
                            <?= $row['act_s_time'] ?>   
                        </div>

                        <div class="my-5">
                            <h6 class="m-0">結束時間</h6>
                            <?= $row['act_e_time'] ?>   
                        </div>

                        <div class="my-4">
                            <h6 class="m-0">開團人數</h6>
                            <?= $row['min_people'] ?>   
                        </div>


                        <div class="my-4">
                            <h6 class="m-0">人數上限</h6>
                            <?= $row['max_people'] ?>   
                        </div>

                        <div class="my-5">
                            <h6 class="m-0">最小年齡限制</h6>
                            <?= $row['min_age'] ?>   
                        </div>

                        <div class="my-5">
                            <h6 class="m-0">最大年齡限制</h6>
                            <?= $row['max_age'] ?>   
                        </div>

                        <div class="my-4">
                            <h6 class="m-0">活動費用</h6>
                            <?= $row['act_price'] ?>   
                        </div>


                        <div class="my-4">
                            <h6 class="m-0">活動特色</h6>
                            <?= $row['act_desc'] ?>   
                        </div>

                        <div class="my-5">
                            <h6 class="m-0">注意事項</h6>
                            <?= $row['act_notice'] ?>   
                        </div>

                        <div class="my-4">
                            <h6 class="m-0">行程安排</h6>
                            <?= $row['act_schedule'] ?>   
                        </div>


                        <div class="my-4">
                            <h6 class="m-0">個人準備事項</h6>
                            <?= $row['act_prepare'] ?>   
                        </div>
                    </form>

                    <div class="mt-5">
                    <a class="text-decoration-none" href="act_list.php">
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
<?php include __DIR__.'/part/html-foot.php' ?>
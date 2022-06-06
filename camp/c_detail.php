<?php require __DIR__ . '/part/connect_db.php';
$pageName = 'p_detail';
$title = '商品詳情';


$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
    header('Location:c_product.php');
    exit;
}

$row=$pdo->query("SELECT * FROM camproduct2 WHERE sid =$sid")->fetch();
if(empty($row)){
    header('Location:c_product.php');
    exit;
};


?>

<?php include __DIR__ . '/c_part/c_head.php' ?>
<?php include __DIR__ . '/c_part/c_nav.php' ?>
    <style>
    body{
                background: url(./imgs/pexels-lumn-167685.jpg);
                background-size: cover;
                background-repeat: no-repeat;
            }
            /* #logo{
                width: 30px;
                filter: invert(1);
            } */
</style>
<div class="container">
    <div class="card m-5 p-5 m-5">
        <div class="row  py-5">
           <div class="col-6">
                <img src="./imgs/product/<?= $row['productimg'] ?>.jpg" alt="" class="card-img">

              <div class="smallpic d-flex mt-3">
                 <div class="col-4">
                        <img src="./imgs/product/<?= $row['productimg2'] ?>.jpg" alt="" class="card-img ">

               </div>
                <div class="col-4 mx-3">
                        <img src="./imgs/product/<?= $row['productimg3'] ?>.jpg" alt="" class="card-img ">
                </div>

               </div>
         
            
          </div>
          <div class="col-6">

          <div class="discrib ">
              <h4> <?= $row['productname'] ?>   </h4>
              
              <h5 class="text-secondary fw-normal" ><?= $row['productcategory'] ?></h5>

              

              <h5 class="border-bottom border-primary py-3 text-primary">商品描述</h5>
              <p class="mt-3"><?= $row['productinfo'] ?></p>


              <h3 class="badge bg-white text-wrap px-4 fs-6 fw-normal border border-dark text-dark" ><?= $row['productcolor'] ?></h3>
              

              <br>
              <br>
                <p class="m-0 ">價格</p>
                <h2 class=" m-0 fw-light">
                NT<?= $row['productprice'] ?>
                </h2>
                <br><br><br>

                 <p class="">數量</p>
                 <input type="number" class="form-control ">
                 <p class="text-secondary "> 尚餘 <span><?= $row['productleft'] ?></span>個</p>

                 <button type="button" class="btn btn-primary mt-2">+加入購物車</button>

         </div>

         
      </div>

    </div>

            <h5 class="border-bottom border-primary py-3 text-primary">商品規格</h5>
              <p class="mt-3"><?= $row['productspec'] ?></p>
            <h5 class="border-bottom border-primary py-3 text-primary">商品包含</h5>
              <p class="mt-3"><?= $row['productinclude'] ?></p>
    </div>
</div>





















    

<?php include __DIR__ . '/c_part/c_scripts.php' ?>
<?php include __DIR__ . '/c_part/c_foot.php' ?>

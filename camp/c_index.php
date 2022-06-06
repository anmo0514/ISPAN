<?php require __DIR__ . '/part/connect_db.php';

$pageName = 'c-index';
$title = '前台首頁';

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
    <div class=" border border-primary p-5 m-5">
        <h2 class="text-white p-5 m-5 text-center">
        <i class="fa-solid fa-robot"></i>
           <br><br>
            這個是前台首頁
            <br><br>
            開始前往你想去的頁面
        </h2>
     </div>
           

        </div>





<?php include __DIR__ . '/c_part/c_scripts.php' ?>

        
<?php include __DIR__ . '/c_part/c_foot.php' ?>

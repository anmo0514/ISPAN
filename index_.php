<?php require __DIR__.'/parts/connect_db.php'; 
$pageName = 'index';
$title = '首頁 - anmo';
?>
<?php include __DIR__.'/parts/html-head.php' ?>
<?php include __DIR__.'/parts/navbar.php' ?>
<div class="container">
    <h2>HOME</h2>
<p><?= $pdo->quote("Alice's cat")?></p>
</div>
<?php include __DIR__.'/parts/scripts.php' ?>
<?php include __DIR__.'/parts/html-foot.php' ?>
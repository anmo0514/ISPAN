<div>
    <?php require __DIR__.'/parts/connect_db.php';
    // 關閉功能怕誤點檔案
    // exit; 
    echo microtime(true) . "<br>";// 查看執行時間
    $lname = ['陳', '林', '張', '吳', '王','李'];
    $fname = ['兆佳', '兆君', '兆軒', '元貞', '元容','元齡'];
    
    $sql = "INSERT INTO `address_book`( `name`, `email`, `mobile`, `birthday`, `address`, `created_at`)
        VALUES (?,?, ?, ?, ?, NOW()
    )";
    
    $stmt = $pdo->prepare($sql);
    
    for($i=0; $i<1000; $i++){
        shuffle($fname);
        shuffle($lname);
        $ts = rand(strtotime('1980-01-01'), strtotime('1995-12-31'));
        $stmt->execute([
            $lname[0] . $fname[0],
            "anmo{$i}@gmail.com",
            '0970'. rand(100000, 999999),
            date('Y-m-d', $ts),
            '台北市'
        ]);
    }
    echo microtime(true) . "<br>";
    // echo $stmt->rowCount();
    ?>
</div>
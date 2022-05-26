<?php
session_start();

$users = [
    'ming' => [
        'password' => '1234',
        'nickname' => '孔明'
    ],
    'no_two' => [
        'password' => '5678',
        'nickname' => '關二哥'
    ],
];

$output = [
    'postData' => $_POST,
];

if (isset($_POST['account'])) {
    // echo json_encode($_POST);
    // exit; // 立刻停止 php 程式執行
    // die();

    // 兩個欄位都要有值
    if (!empty($_POST['account']) and !empty($_POST['password'])) {

        if (!empty($users[$_POST['account']])) {

            if ($_POST['password'] === $users[$_POST['account']]['password']) {
                // 登入成功
                // 把資料設定到 session 裡
                $_SESSION['user'] = [
                    'account' => $_POST['account'],
                    'nickname' => $users[$_POST['account']]['nickname'],
                ];
            }
        }
    }

    if (!isset($_SESSION['user'])) {
        $error_msg = '帳號或密碼錯誤';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_SESSION['user'])) : ?>
        <h2><?= $_SESSION['user']['nickname'] ?> 您好</h2>
        <p><a href="./a20220523-05-logout.php">登出</a></p>
    <?php else : ?>
        <?php if (isset($error_msg)) : ?>
            <div style="color:red;"><?= $error_msg ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="account" placeholder="帳號">
            <br>
            <input type="password" name="password" placeholder="密碼">
            <br>
            <button>登入</button>
        </form>
    <?php endif; ?>

</body>

</html>
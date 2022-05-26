<?php

$account = isset($_POST['account']) ? $_POST['account'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

printf("account: %s<br> password: %s<br>", $account, $password);

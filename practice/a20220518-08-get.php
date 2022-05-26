<?php

$account = isset($_GET['account']) ? $_GET['account'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

printf("account: %s<br> password: %s<br>", $account, $password);

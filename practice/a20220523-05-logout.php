<?php
session_start();
unset($_SESSION['user']);

header('Location: a20220523-04-login.php');

// session_start();

// // session_destroy(); // 清除所有的 session
// unset($_SESSION['user']); // 移除 'user' 對應的值

// // 轉向, redirect
// header('Location: a20220523-04-login.php');
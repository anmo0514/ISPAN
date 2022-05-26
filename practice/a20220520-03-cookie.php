<?php

// 
setcookie('mycookie', 'abcd', time() + 100);

// 讀取
echo $_COOKIE['mycookie'];

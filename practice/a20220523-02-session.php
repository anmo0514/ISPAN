<?php

if (!isset($_SESSION)) {
    session_start();
}

echo $_SESSION['a'];
//session 在不同分頁是可以共享cookie，若是用不同瀏覽器或是無痕模式就不能分享cookie
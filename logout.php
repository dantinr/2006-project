<?php
    session_start();
    //退出登录
    unset($_SESSION['uid']);
    unset($_SESSION['username']);

    header('Refresh:2;url=/index.php');
    echo "已退出";

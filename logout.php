<?php
    //退出登录
    $_SESSION['uid'] = null;
    $_SESSION['name'] = null;

    header('Refresh:2;url=/login.html');
    echo "已退出";

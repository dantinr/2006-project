<?php

include "pdo.php";
session_start();

$pdo = getPdo();
$name = $_POST['username'];     //用户名 Email Mobile
$pass = $_POST['pass'];


// 验证用户名是否存在
$sql = "select * from p_users where user_name='{$name}' or email='{$name}' or mobile='{$name}'";
$res = $pdo->query($sql);
$data = $res->fetch(PDO::FETCH_ASSOC);

if($data)       //查询到用户
{
    //验证密码
    if(password_verify($pass,$data['password'])){       //密码正确 登录成功

        //发送cookie
        setcookie('username',$data['user_name'],time()+86400*7);
        setcookie('uid',$data['user_id'],time()+86400*7);

        //设置session
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['uid'] = $data['user_id'];

        //更新最后登录时间
        $now = time();
        $sql = "update p_users set last_login={$now} where user_id={$data['user_id']}";
        $pdo->exec($sql);

        //跳转至 个人中心 my.html
        header("location:my.html");
        exit;
    }
}

header('Refresh:2;url=login.html');
echo "用户名或密码错误,正在跳转至登录页面";





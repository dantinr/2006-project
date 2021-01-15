<?php
//验证 用户名 eMAIL 手机号

include "pdo.php";

$pdo = getPdo();        //获取 pdo对象

$username = $_GET['name'];

//查询数据库
$sql = "select * from p_users where user_name='{$username}' or mobile='{$username}' or email='{$username}'";
$res = $pdo->query($sql);
$data = $res->fetch(PDO::FETCH_ASSOC);

if($data)       //用户名不可用
{
    $response = [
        'errno' => 400020,
        'msg'   => "已存在"
    ];
}else{
    $response = [
        'errno' => 0,
        'msg'   => "ok"
    ];
}

echo json_encode($response);

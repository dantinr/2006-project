<?php

    include "pdo.php";

    $user_name = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    // 判断 两次密码是否一致
    if($pass1 != $pass2)
    {
        $response = [
            'errno' => 400001,
            'msg'   => '两次输入的密码不一致'
        ];

        die( json_encode($response) );
    }

    // 验证密码长度 > 6
    if( strlen($pass1) < 6)
    {
        $response = [
            'errno' => 400002,
            'msg'   => '密码长度不够'
        ];

        die( json_encode($response) );
    }

    // 验证用户名是否存在
    $pdo = getPdo();
    $sql = "select * from p_users where user_name='$user_name'";
    $res = $pdo->query($sql);
    $data = $res->fetch(PDO::FETCH_ASSOC);

    if($data)
    {
        $response = [
            'errno' => 400003,
            'msg'   => '用户名已存在'
        ];

        die( json_encode($response) );
    }

    // TODO 验证Email

    // TODO 验证 mobile

    // 用户信息入库
    //生成用户密码
    $password = password_hash($pass1,PASSWORD_BCRYPT);
    $now = time();
    $sql = "insert into p_users (user_name,mobile,email,password,reg_time) values ('$user_name','$mobile','$email','$password',$now)";
    $res = $pdo->exec($sql);
    $id = $pdo->lastInsertId();     //获取自增ID
    if($id>0){      //入库成功
        $response = [
            'errno' => 0,
            'msg'   => 'ok'
        ];

    }else{          //入库失败
        $response = [
            'errno' => 500008,
            'msg'   => '注册失败，请重试'
        ];

    }

    echo json_encode($response);





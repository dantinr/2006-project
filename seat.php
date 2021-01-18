<?php
    session_start();

    if(empty($_SESSION['uid'])){            //未登录
        $response = [
            'errno' => 400001,
            'msg'   => "未登录"
        ];

        echo json_encode($response);
        exit;
    }else{          //已登录
        $response = [
            'errno' => 0,
            'msg'   => 'ok'
        ];

        die(json_encode($response));
    }


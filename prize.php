<?php
    $num = mt_rand(1,10);

    if($num==1){
        $response = [
            'errno' => 0,
            'msg'   => "一等奖"
        ];
    }elseif($num==2 || $num==3)
    {
        $response = [
            'errno' => 0,
            'msg'   => "二等奖"
        ];
    }elseif ($num==4|| $num==5 || $num==6){
        $response = [
            'errno' => 0,
            'msg'   => "三等奖"
        ];
    }else{
        $response = [
            'errno' => 0,
            'msg'   => "谢谢参与"
        ];
    }

    echo json_encode($response);

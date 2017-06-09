<?php

//PHP下Unix时间戳与日期互转
//1、Unix时间戳转日期
function unixtime_to_date($unixtime=0,$format="Y-m-d H:i:s" ,$timezone = 'PRC') {

    return  date($format,$unixtime);
    $datetime = new DateTime("@$unixtime"); //DateTime类的bug，加入@可以将Unix时间戳作为参数传入
    $datetime->setTimezone(new DateTimeZone($timezone));
    return $datetime->format("Y-m-d H:i:s");
}

// 导出csv 文件

function export_csv($filename,$data) {
    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=".$filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $data;
    exit;
}



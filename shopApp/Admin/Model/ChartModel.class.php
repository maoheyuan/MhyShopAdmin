<?php
// +----------------------------------------------------------------------
// | MhyShoopAdmin [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://maoheyuan.com All rights reserved.
// +----------------------------------------------------------------------
// | MIT
// +----------------------------------------------------------------------
// | Author: maoheyuan <maoheyuan@qq.com>
// +----------------------------------------------------------------------

namespace Admin\Model;
class ChartModel  {




    public  function  stateFormat($state){

        if($state==self::ENABLE){
            return "启用";
        }
        if($state==self::DISABLE){
            return "禁用";
        }
        return "/";
    }


    public  function  sexFormat($sex){

        if($sex==self::SEX_MAN){
            return "男";
        }
        if($sex==self::SEx_WOMAN){
            return "女";
        }
        return "/";

    }



}
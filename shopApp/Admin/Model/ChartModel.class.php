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


    const  DAYNUM=6;
    const  ONEDAYTIME=36400;
    public  function getList(){

        $returnData=array();
        $returnData["day"]=$this->initData();
        $returnData["orderNum"]=$this->getOrderData();
        $returnData["orderGoodsNum"]=$this->getOrderGoodsData();
        $returnData["goodsNum"]=$this->getGoodsData();
        $returnData["memberNum"]=$this->getMemberData();
        $returnData["categoryNum"]=$this->getCategoryData();
        foreach($returnData as $key=>$value){

            if($key=="day"){
                $returnData[$key]="'".implode("','",$value)."'";
            }
            else{
                $returnData[$key]=implode(",",$value);
            }

        }
        return $returnData;

    }

    public  function  initData(){
        $data=array();
        for($i=self::DAYNUM;$i>=0;$i--){
          $data[]=date("Y-m-d",strtotime("-$i day"));
        }
        return $data;
    }


    public  function  getMemberData(){
        $data=array();
        for($i=self::DAYNUM;$i>=0;$i--){
            $day= strtotime(date("Y-m-d",strtotime("-$i day")));
            $oneDayCount=D("member")->getOneDayCountByTime($day);
            $data[]=$oneDayCount;
        }
        return $data;

    }

    public  function  getOrderData(){
        $data=array();
        for($i=self::DAYNUM;$i>=0;$i--){
            $day= strtotime(date("Y-m-d",strtotime("-$i day")));
            $oneDayCount=D("order")->getOneDayCountByTime($day);
            $data[]=$oneDayCount;
        }
        return $data;
    }


    public  function  getGoodsData(){
        $data=array();
        for($i=self::DAYNUM;$i>=0;$i--){
            $day= strtotime(date("Y-m-d",strtotime("-$i day")));
            $oneDayCount=D("goods")->getOneDayCountByTime($day);
            $data[]=$oneDayCount;
        }
        return $data;
    }

    public  function  getCategoryData(){
        $data=array();
        for($i=self::DAYNUM;$i>=0;$i--){
            $day= strtotime(date("Y-m-d",strtotime("-$i day")));
            $oneDayCount=D("category")->getOneDayCountByTime($day);
            $data[]=$oneDayCount;
        }
        return $data;
    }


    public  function getOrderGoodsData(){

        $data=array();
        for($i=self::DAYNUM;$i>=0;$i--){
            $day= strtotime(date("Y-m-d",strtotime("-$i day")));
            $oneDayCount=D("order_goods")->getOneDayCountByTime($day);
            $data[]=$oneDayCount;
        }
        return $data;
    }
}
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
use Think\Model;
class OrderGoodsModel extends Model {

    protected $tableName = 'order_goods';

    public  function  getList($map,$orderBy="goods_id desc",$limit=25){
        $count      =$this->where($map)->count();
        $page       = new \Think\Page($count,$limit);
        $page->setConfig('theme',C("PAGE_THEME"));
        $show       = $page->show();
        $list = $this
            ->where($map)
            ->order($orderBy)
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        $returnData=array();
        $returnData["list"]=$list;
        $returnData["page"]=$show;
        return $returnData;
    }

    public  function exportList($map=array(),$orderBy="member_id desc"){

        $list = $this->where($map)->order($orderBy)->select();

        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        return $list;
    }

    public  function  stateFormat($state){

        if($state==self::ENABLE){
            return "启用";
        }
        if($state==self::DISABLE){
            return "下架";
        }
        return "/";
    }

    public  function  commendFormat($commend){

        if($commend==self::COMMEND_MAIN){
            return "首页";
        }
        if($commend==self::COMMEND_CATE){
            return "分类页";
        }
        return "/";
    }
    public  function  dataFormat($data=array()){


        if(isset($data["goods_commend"])){
            $data["goods_commend_name"]=$this->commendFormat($data["goods_commend"]);
        }
        if(isset($data["goods_state"])){
            $data["goods_state_name"]=$this->stateFormat($data["goods_state"]);
        }
        if(isset($data["goods_starttime"])){
            $data["goods_starttime_name"]=unixtime_to_date($data["goods_starttime"]);
        }
        if(isset($data["goods_endtime"])){
            $data["goods_endtime_name"]=unixtime_to_date($data["goods_endtime"]);
        }
        if(isset($data["goods_add_time"])){
            $data["goods_add_time_name"]=unixtime_to_date($data["goods_add_time_name"]);
        }
        return $data;
    }
    public  function  getInfoById($id){
        $map=array();
        $map["goods_id"]=$id;
        $goodsInfo=$this->where($map)->find();
        return $goodsInfo;
    }
    public  function  getAllByOrderSn($order_sn="",$orderBy="ogoods_id desc"){

        $returnData=array();
        if($order_sn==""){
            return $returnData;
        }
        $map=array();
        $map["ogoods_order_sn"]=$order_sn;
        $returnData = $this->where($map)->order($orderBy)->select();

        foreach($returnData as $key=>$value){
            $returnData[$key]=$this->dataFormat($value);
        }
        return $returnData;
    }


    public  function  getOneDayCountByTime($day){
        $map=array();

        $map["ogoods_add_time"]=array(array("egt",$day),array("lt",$day+86400));
        $count=$this->where($map)->count();
        return $count;
    }

    public  function  getCountByMap($map=array()){
        $count=$this->where($map)->count();
        return $count;
    }

}
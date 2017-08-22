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
class MemberAddressModel extends Model {

    protected $tableName = 'member_address';
    const ADDRESS_IS_DEFAULT=1;
    const ADDRESS_IS_NOT_DEFAULT=2;
    public  function  getList($map,$orderBy="maddress_id desc",$limit=25){
        $count      =$this->where($map)->count();
        $page       = new \Think\Page($count,$limit);
        $page->setConfig('theme',C("PAGE_THEME"));
        $show       = $page->show();
        $list = $this
            ->where($map)->order($orderBy)->limit($page->firstRow.','.$page->listRows)
            ->select();
        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        $returnData=array();
        $returnData["list"]=$list;
        $returnData["page"]=$show;
        return $returnData;
    }

    public  function exportList($map=array(),$orderBy="maddress_id desc"){

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

    public  function  defaultFormat($default){

        if($default==self::ADDRESS_IS_DEFAULT){
            return "是";
        }
        if($default==self::ADDRESS_IS_NOT_DEFAULT){
            return "否";
        }
        return "/";

    }
    public  function  dataFormat($data=array()){


        if(isset($data["maddress_member_id"])){
            $memberInfo=D("member")->getInfoById($data["maddress_member_id"]);
            if(!$memberInfo["member_name"]){
                $memberInfo["member_name"]="/";
            }
            $data["maddress_member_id_name"]= $memberInfo["member_name"];
        }


        if(isset($data["maddress_default"])){
            $data["maddress_default_name"]=$this->defaultFormat($data["maddress_default"]);
        }
        if(isset($data["maddress_province_id"])){
            $areaInfo=D("area")->getInfoById($data["maddress_province_id"]);
            $data["maddress_province_id_name"]=$areaInfo["area_name"];
        }
        if(isset($data["maddress_city_id"])){
            $areaInfo=D("area")->getInfoById($data["maddress_city_id"]);
            $data["maddress_city_id_name"]=$areaInfo["area_name"];
        }

        if(isset($data["maddress_area_id"])){
            $areaInfo=D("area")->getInfoById($data["maddress_area_id"]);
            $data["maddress_area_id_name"]=$areaInfo["area_name"];
        }

        if(isset($data["maddress_cell_id"])){
            $areaInfo=D("area")->getInfoById($data["maddress_cell_id"]);
            $data["maddress_cell_id_name"]=$areaInfo["area_name"];
        }

        if(isset($data["maddress_edit_time"])){
            $data["maddress_edit_time_name"]=unixtime_to_date($data["maddress_edit_time"]);
        }
        if(isset($data["maddress_add_time"])){
            $data["maddress_add_time_name"]=unixtime_to_date($data["maddress_add_time"]);
        }
        return $data;
    }
    public  function  getInfoById($id){

        $map=array();
        $map["maddress_id"]=$id;
        $goodsInfo=$this->where($map)->find();
        return $goodsInfo;
    }

    public  function  getCountByMap($map=array()){
        $count=$this->where($map)->count();
        return $count;
    }



}
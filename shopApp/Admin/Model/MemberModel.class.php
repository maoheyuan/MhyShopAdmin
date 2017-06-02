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
class MemberModel extends Model {

    protected $tableName = 'member';

    const SEX_MAN=1;
    const SEx_WOMAN=2;
    const ENABLE=1;
    const DISABLE=0;


    public function getInfoByMemberName($memberName){
        $map=array();
        $map["member_name"]=$memberName;
        $memberInfo=$this->where($map)->find();
        return $memberInfo;
    }

    public  function  getList($map,$orderBy="member_id desc",$limit=25){
        $count      =$this->where($map)->count();
        $page       = new \Think\Page($count,$limit);
        $page->setConfig('theme',C("PAGE_THEME"));
        $show       = $page->show();
        $list = $this->where($map)->order($orderBy)->limit($page->firstRow.','.$page->listRows)->select();
        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        $returnData=array();
        $returnData["list"]=$list;
        $returnData["page"]=$show;
        $returnData["allNum"]=$count;
        $returnData["pageNum"]=count($list);
        return $returnData;
    }

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


    public  function  dataFormat($data=array()){

        if(isset($data["member_sex"])){
            $data["member_sex_name"]=$this->sexFormat($data["member_sex"]);
        }
        if(isset($data["member_state"])){
            $data["member_state_name"]=$this->sexFormat($data["member_state"]);
        }

        if(isset($data["member_time"])){


            $data["member_time_name"]=unixtime_to_date($data["member_time"]);

        }
        return $data;
    }







}
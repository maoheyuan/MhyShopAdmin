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

    public  function  getInfoById($id){

        $map=array();
        $map["member_id"]=$id;
        $memberInfo=$this->where($map)->find();
        return $memberInfo;
    }


   public function memberAddOrEditRules(){
       $rules = array(
           array('member_id'      ,  'require'   ,   '会员编号不能为空!', self::MODEL_UPDATE),
           array('member_name'    ,  'require'   ,   '会员名称不能为空!', self::MODEL_BOTH),
           array('member_name'    ,  ''          ,   '会员名称已经存在!', self::MODEL_BOTH,'unique'),
           array('member_truename',  'require'   ,   '真实姓名不能为空!', self::MODEL_BOTH),
           array('member_passwd'  ,  'require'   ,   '会员密码不能为空!', self::MODEL_BOTH),
           array('member_sex'     ,   array(1,2) ,   '值的范围不正确！' , self::MODEL_BOTH,'in'),
           array('member_avatar'  ,  'require'   ,   '会员头像不能为空!', self::MODEL_BOTH),
           array('member_mobile'  ,  'require'   ,   '手机号不能为空!'  , self::MODEL_BOTH ),
           array('member_qq'      ,  'require'   ,   'QQ号不能为空!'   , self::MODEL_BOTH),
           array('member_email'   ,  'require'   ,   '电子邮件不能为空!', self::MODEL_BOTH ),

       );
       return $rules;
   }
    public  function  memberAddOrEditData($type){
        $data = array(
            'member_id'       =>  I("post.member_id",""),
            'member_name'       =>  I("post.member_name",""),
            'member_truename'   =>  I("post.member_truename",""),
            'member_avatar'     =>  I("post.member_avatar",""),
            'member_sex'        =>  I("post.member_sex",""),
            'member_birthday'   =>  I("post.member_birthday",""),
            'member_passwd'     =>  I("post.member_passwd",""),
            'member_mobile'     =>  I("post.member_mobile",""),
            'member_email'      =>  I("post.member_email",""),
            'member_qq'         =>  I("post.member_qq",""),
            'member_time'       =>  I("post.member_time",time()),
            'member_points'     =>  I("post.member_points",0),
            'member_state'      =>  I("post.member_state",1),
            'member_areaid'     =>  I("post.member_areaid",0),
            'member_cityid'     =>  I("post.member_cityid",0),
            'member_provinceid' =>  I("post.member_provinceid",0),
            'member_areainfo'   =>  I("post.member_areainfo",0),
            'member_money'      =>  I("post.member_money",0)
        );
        if($type=="add"){
            unset($data["member_id"]);
        }
        return $data;
    }

    /***
     * 返回新增 修改 删除 操作数据
     * @param $status
     * @param $tip
     * @param $data
     * @return mixed
     */
    public function returnData($status,$tip,$data){
        $returnData=array();
        $returnData["status"]=$status;
        $returnData["tip"]=$tip;
        $returnData["data"]=$data;


        return $returnData;
    }
     public  function memberAdd(){
        $rules=$this->memberAddOrEditRules();
        $data=$this->memberAddOrEditData("add");
        if (!$this->validate($rules)->create($data)){
            return  $this->returnData(0,$this->getError(),"");
        }
        $result=$this->add($data);
        if(!$result){
           return   $this->returnData(0,"新增失败!","");
        }
        return $this->returnData(1,"新增成功!",$result);
    }
    public  function  memberEdit(){
        $rules=$this->memberAddOrEditRules();
        $data=$this->memberAddOrEditData("edit");
        if (!$this->validate($rules)->create($data)){
            return $this->returnData(0,$this->getError(),"");
        }
        $map=array();
        $map["member_id"]=I("post.id");
        $result=$this->where($map)->save($data);
        if($result){
            return $this->returnData(0,"修改失败!","");
        }
        return $this->returnData(1,"修改成功!",I("post.id"));
    }
    public  function  memberDelete(){
        $rules = array(
            array("member_id", "require","会员编号不能为空!")
        );
        $data = array(
            "member_id" => I("get.member_id","")
        );
        if (!$this->validate($rules)->create($data)) {
            return $this->returnData(0,$this->getError(),"");
        }
        $map = array();
        $map["member_id"] = I("get.member_id");
        $result = $this->where($map)->delete();
        if (!$result) {
            return $this->returnData(0,"册除失败!","");
        }
        return $this->returnData(1,"册除成功!",I("get.member_id"));
    }
}
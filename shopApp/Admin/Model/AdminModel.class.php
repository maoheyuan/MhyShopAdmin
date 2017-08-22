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
class AdminModel extends Model {

    protected $tableName = 'admin';
    const  ISSUPER=1;
    const  ISNOTSUPER=0;
    public function adminAddRules(){

        $rules = array(
            array('admin_name' ,  'require', '管理员名称不能为空!'),
            array('admin_permission'    ,  'require'   ,   '管理权限不能为空!'),
            array('admin_password','require', '管理员密码不能为空!'),
            array('admin_login_num' ,'require',   '登录次数不能为空!'),
            array('admin_is_super','require',   '是否超级管理员不能为空!'),
            array('admin_add_time','require',   '新增时间不能为空!'),
        );
        return $rules;
    }

    public function adminEditRules(){
        $rules = array(
            array('admin_id' ,  'require' , '地区编号不能为空!', self::MODEL_UPDATE),
            array('admin_permission'    ,  'require'   ,   '管理权限不能为空!', self::MODEL_BOTH),
            array('admin_name' ,'require', '管理员名称不能为空!', self::MODEL_BOTH),
            array('admin_is_super','require',   '是否超级管理员不能为空!', self::MODEL_BOTH),
            array('admin_eidt_time','require',   '修改时间不能为空!', self::MODEL_UPDATE)
        );
        return $rules;
    }

    public  function  adminAddOrEditData($type){
        $data = array(
            'admin_id'       =>  I("post.admin_id",""),
            'admin_permission'     =>  I("post.admin_permission",""),
            'admin_name'     =>  I("post.admin_name",""),
            'admin_login_num'   =>  I("post.admin_login_num",""),
            'admin_is_super'=>  I("post.admin_is_super",""),
        );
        $data["admin_password"]="";
        if($type=="add"){
            unset($data["admin_id"]);
            $data["admin_add_time"]=time();
            $data["admin_login_num"]=0;
            $data["admin_password"]=I("post.admin_password");
        }
        if($type=="edit"){

            $data["admin_eidt_time"]=time();
        }
        return $data;
    }


    public  function  getList($map,$orderBy="admin_id desc",$limit=25){
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


    public  function  dataFormat($data=array()){

        if(isset($data["admin_login_time"])&&$data["admin_login_time"]>0){
            $data["admin_login_time"]=unixtime_to_date($data["admin_login_time"]);
        }
        else{
            $data["admin_login_time"]="/";
        }
        if(isset($data["admin_eidt_time"])&&$data["admin_eidt_time"]>0){
            $data["admin_eidt_time"]=unixtime_to_date($data["admin_eidt_time"]);
        }
        else{
            $data["admin_eidt_time"]="/";
        }
        if(isset($data["admin_add_time"])&&$data["admin_add_time"]>0){
            $data["admin_add_time"]=unixtime_to_date($data["admin_add_time"]);
        }
        else{
            $data["admin_add_time"]="/";
        }
        $data["admin_is_super"]=$this->isSuperFormat($data["admin_is_super"]);
        return $data;
    }


    public  function  isSuperFormat($state){

        if(intval($state)==self::ISNOTSUPER){
            return "否";
        }
        if(intval($state)==self::ISSUPER){
            return "是";
        }
        return "/";
    }


    public  function  getInfoById($admin_id){
        if(!$admin_id){
            return array();
        }
        $map=array();
        $map["admin_id"]=$admin_id;
        $adminInfo=$this->where($map)->find();
        return $adminInfo;
    }
    public function getInfoByName($adminName){
        $map=array();
        $map["admin_name"]=$adminName;
        $adminInfo=$this->where($map)->find();
        return $adminInfo;
    }

    public  function  getOneDayCountByTime($day){
        $map=array();

        $map["admin_add_time"]=array(array("egt",$day),array("lt",$day+86400));
        $count=$this->where($map)->count();
        return $count;
    }


    public  function  getCountByMap($map=array()){
        $count=$this->where($map)->count();
        return $count;
    }


    public function returnData($status,$tip,$data){
        $returnData=array();
        $returnData["status"]=$status;
        $returnData["tip"]=$tip;
        $returnData["data"]=$data;
        return $returnData;
    }
    public  function adminAdd(){
        $rules=$this->adminAddRules();
        $data=$this->adminAddOrEditData("add");


        if (!$this->validate($rules)->create($data)){
            return  $this->returnData(0,$this->getError(),"");
        }
        $result=$this->add($data);
        if(!$result){
            return   $this->returnData(0,"新增失败!","");
        }
        return $this->returnData(1,"新增成功!",$result);
    }


    public  function  adminEdit(){
        $rules=$this->adminEditRules();



        $data=$this->adminAddOrEditData("edit");

        if (!$this->validate($rules)->create($data)){
            return $this->returnData(0,$this->getError(),"");
        }
        $map=array();
        $map["admin_id"]=I("post.admin_id");
        $result=$this->where($map)->save($data);
        if(!$result){
            return $this->returnData(0,"修改失败!","");
        }
        return $this->returnData(1,"修改成功!",I("post.id"));
    }


    public  function  adminDelete(){
        $rules = array(
            array("admin_id", "require","管理员编号不能为空!")
        );
        $data = array(
            "admin_id" => I("get.admin_id","")
        );
        if (!$this->validate($rules)->create($data)) {
            return $this->returnData(0,$this->getError(),"");
        }
        $map = array();
        $map["admin_id"] = I("get.admin_id");
        $result = $this->where($map)->delete();
        if (!$result) {
            return $this->returnData(0,"册除失败!","");
        }
        return $this->returnData(1,"册除成功!",I("get.admin_id"));
    }

    public  function exportList($map=array(),$orderBy="admin_id desc"){

        $list = $this->where($map)->order($orderBy)->select();
        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        return $list;
    }

}
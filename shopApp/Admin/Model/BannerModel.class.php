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
class BannerModel extends Model {

    protected $tableName = 'banner';

    const ENABLE=1;
    const DISABLE=2;

    public function getInfoByBannerName($memberName){
        $map=array();
        $map["banner_name"]=$memberName;
        $memberInfo=$this->where($map)->find();
        return $memberInfo;
    }

    public  function  getList($map,$orderBy="banner_id desc",$limit=25){
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

    public  function exportList($map=array(),$orderBy="banner_id desc"){

        $list = $this->where($map)->order($orderBy)->select();

        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        return $list;
    }

    public  function  statusFormat($state){

        if($state==self::ENABLE){
            return "启用";
        }
        if($state==self::DISABLE){
            return "禁用";
        }
        return "/";
    }


    public  function  dataFormat($data=array()){


        if(isset($data["banner_status"])){
            $data["banner_status_name"]=$this->statusFormat($data["banner_status"]);
        }

        if(isset($data["banner_start_time"])){
            $data["banner_start_time_name"]=unixtime_to_date($data["banner_start_time"]);

        }
        if(isset($data["banner_end_time"])){
            $data["banner_end_time_name"]=unixtime_to_date($data["banner_end_time"]);

        }
        if(isset($data["banner_add_time"])){
            $data["banner_add_time_name"]=unixtime_to_date($data["banner_add_time"]);

        }
        if(isset($data["banner_edit_time"])){
            $data["banner_edit_time_name"]=unixtime_to_date($data["banner_edit_time"]);

        }


        if(isset($data["banner_category"])){

            $categoryInfo=D("category")->getInfoById($data["banner_category"]);
            if(!$categoryInfo["category_name"]){
                $categoryInfo["category_name"]="/";
            }
            $data["banner_category_name"]=$categoryInfo["category_name"];

        }


        return $data;
    }

    public  function  getInfoById($id){

        $map=array();
        $map["banner_id"]=$id;
        $memberInfo=$this->where($map)->find();

        return $memberInfo;
    }

   public function bannerAddOrEditRules(){
       $rules = array(
           array('banner_id'      ,  'require'   ,   '编号不能为空!', self::MODEL_UPDATE),
           array('banner_name'    ,  'require'   ,   '名称不能为空!', self::MODEL_BOTH),
           array('banner_image'    ,  'require' ,   '图片不能为空!', self::MODEL_BOTH),
           array('banner_status',  'require'   ,   '状态不能为空!', self::MODEL_BOTH),
           array('banner_category'  ,  'require'   ,   '产品分类不能为空!', self::MODEL_BOTH),
           array('banner_start_time'     ,  'require' ,   '有效开始时间不能为空' , self::MODEL_BOTH),
           array('banner_end_time'  ,  'require'   ,   '有效结束时间不能为空!', self::MODEL_BOTH),
       );
       return $rules;
   }
    public  function  bannerAddOrEditData($type){
        $data = array(
            'banner_id'       =>  I("post.banner_id",""),
            'banner_name'       =>  I("post.banner_name",""),
            'banner_image'   =>  I("post.banner_image",""),
            'banner_status'     =>  I("post.banner_status",""),
            'banner_category'        =>  I("post.banner_category",""),
            'banner_start_time'   =>  strtotime(I("post.banner_start_time","")),
            'banner_end_time'     =>   strtotime(I("post.banner_end_time","")),
        );
        if($type=="add"){
            unset($data["banner_id"]);
            $data["banner_add_time"]=time();
        }
        if($type=="edit"){
            $data["banner_edit_time"]=time();
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
     public  function bannerAdd(){
        $rules=$this->bannerAddOrEditRules();
        $data=$this->bannerAddOrEditData("add");
        if (!$this->validate($rules)->create($data)){
            return  $this->returnData(0,$this->getError(),"");
        }
        $result=$this->add($data);
        if(!$result){
           return   $this->returnData(0,"新增失败!","");
        }
        return $this->returnData(1,"新增成功!",$result);
    }
    public  function  bannerEdit(){
        $rules=$this->bannerAddOrEditRules();
        $data=$this->bannerAddOrEditData("edit");
        if (!$this->validate($rules)->create($data)){
            return $this->returnData(0,$this->getError(),"");
        }
        $map=array();
        $map["banner_id"]=I("post.id");
        $result=$this->where($map)->save($data);
        if($result){
            return $this->returnData(0,"修改失败!","");
        }
        return $this->returnData(1,"修改成功!",I("post.id"));
    }
    public  function  bannerDelete(){
        $rules = array(
            array("banner_id", "require","会员编号不能为空!")
        );
        $data = array(
            "banner_id" => I("get.member_id","")
        );
        if (!$this->validate($rules)->create($data)) {
            return $this->returnData(0,$this->getError(),"");
        }
        $map = array();
        $map["banner_id"] = I("get.banner_id");
        $result = $this->where($map)->delete();
        if (!$result) {
            return $this->returnData(0,"册除失败!","");
        }
        return $this->returnData(1,"册除成功!",I("get.banner_id"));
    }
}
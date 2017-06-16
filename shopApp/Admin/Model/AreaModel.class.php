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
class AreaModel extends Model {

    protected $tableName = 'area';



    public  function getList($map=array(),$orderBy="area_id desc"){

        $list = $this->where($map)->order($orderBy)->select();
        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        return $list;
    }



    public  function  dataFormat($data=array()){

        if(isset($data["area_add_time"])){
            $data["area_add_time_name"]=unixtime_to_date($data["area_add_time"]);
        }
        if(isset($data["area_edit_time"])){
            $data["area_edit_time_name"]=unixtime_to_date($data["area_edit_time"]);

        }
        return $data;
    }

    public  function  getInfoById($id){

        $map=array();
        $map["area_id"]=$id;
        $categoryInfo=$this->where($map)->find();
        return $categoryInfo;
    }


    public function areaAddOrEditRules(){
        $rules = array(
            array('area_id'      ,  'require'   ,   '地区编号不能为空!', self::MODEL_UPDATE),
            array('area_name'    ,  'require'   ,   '地区名称不能为空!', self::MODEL_BOTH),
            array('area_parent_id' ,'require', '上级不能为空!', self::MODEL_BOTH),
            array('area_add_id','require',   '创建人不能为空!', self::MODEL_BOTH),
            array('area_sort'  ,'require',   '排序不能为空!', self::MODEL_BOTH),
            array('area_level' ,'require',   '级别不能为空!', self::MODEL_BOTH),
            array('area_edit_time','require',   '修改时间不能为空!', self::MODEL_UPDATE),
            array('area_add_time','require',   '新增时间不能为空!', self::MODEL_BOTH)
        );
        return $rules;
    }
    public  function  areaAddOrEditData($type){

        $adminInfo=session("adminInfo");
        $data = array(
            'area_id'       =>  I("post.area_id",""),
            'area_name'     =>  I("post.area_name",""),
            'area_parent_id'=>  I("post.area_parent_id",0),
            'area_add_id'     =>  $adminInfo["admin_id"]?$adminInfo["admin_id"]:0,
            'area_sort'     =>  I("post.area_sort",10),
            'area_level'   =>  $this->getLevel(I("post.area_level",0)),
        );
        if($type=="add"){
            unset($data["area_id"]);
            $data["area_add_time"]=time();
        }
        if($type=="edit"){
            $data["area_edit_time"]=time();
        }
        return $data;
    }


    public  function getLevel($area_parent_id){
        if($area_parent_id==0){
            return $level="0";
        }
        $map=array();
        $map["area_id"]=$area_parent_id;
        $areaInfo= $this->where($map)->find();
        return $areaInfo["area_level"]+1;

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
    public  function areaAdd(){
        $rules=$this->areaAddOrEditRules();
        $data=$this->areaAddOrEditData("add");
        if (!$this->validate($rules)->create($data)){
            return  $this->returnData(0,$this->getError(),"");
        }
        $result=$this->add($data);
        if(!$result){
            return   $this->returnData(0,"新增失败!","");
        }
        return $this->returnData(1,"新增成功!",$result);
    }


    public  function  areaEdit(){
        $rules=$this->areaAddOrEditRules();
        $data=$this->areaAddOrEditData("edit");
        if (!$this->validate($rules)->create($data)){
            return $this->returnData(0,$this->getError(),"");
        }
        $map=array();
        $map["area_id"]=I("post.area_id");
        $result=$this->where($map)->save($data);
        if(!$result){
            return $this->returnData(0,"修改失败!","");
        }
        return $this->returnData(1,"修改成功!",I("post.id"));
    }
    public  function  areaDelete(){
        $rules = array(
            array("area_id", "require","地区编号不能为空!")
        );
        $data = array(
            "area_id" => I("get.area_id","")
        );
        if (!$this->validate($rules)->create($data)) {
            return $this->returnData(0,$this->getError(),"");
        }
        $map = array();
        $map["area_id"] = I("get.area_id");
        $result = $this->where($map)->delete();
        if (!$result) {
            return $this->returnData(0,"册除失败!","");
        }
        return $this->returnData(1,"册除成功!",I("get.area_id"));
    }
    public  function  getOneDayCountByTime($day){
        $map=array();

        $map["area_add_time"]=array(array("egt",$day),array("lt",$day+86400));
        $count=$this->where($map)->count();
        return $count;
    }


    public  function  getCountByMap($map=array()){
        $count=$this->where($map)->count();
        return $count;
    }

}
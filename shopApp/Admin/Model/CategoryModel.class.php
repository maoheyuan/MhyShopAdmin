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
class CategoryModel extends Model {

    protected $tableName = 'category';

    const ENABLE=1;
    const DISABLE=2;

    public  function getList($map=array(),$orderBy="category_sort desc"){

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



    public  function  dataFormat($data=array()){

        if(isset($data["category_status"])){
            $data["category_status_name"]=$this->stateFormat($data["category_status"]);
        }
        if(isset($data["category_add_time"])){
            $data["category_add_time_name"]=unixtime_to_date($data["category_add_time"]);

        }
        return $data;
    }

    public  function  getInfoById($id){

        $map=array();
        $map["category_id"]=$id;
        $categoryInfo=$this->where($map)->find();
        return $categoryInfo;
    }


    public function categoryAddOrEditRules(){
        $rules = array(
            array('category_id'      ,  'require'   ,   '分类编号不能为空!', self::MODEL_UPDATE),
            array('category_name'    ,  'require'   ,   '分类名称不能为空!', self::MODEL_BOTH),
            array('category_name'    ,  ''          ,   '分类名称已经存在!', self::MODEL_BOTH,'unique'),
            array('category_parent_id',  'require'   ,   '父级不能为空!', self::MODEL_BOTH),
            array('category_sort'  ,  'require'   ,   '排序不能为空!', self::MODEL_BOTH),
            array('category_status'  ,  'require'   ,   '状态不能为空!', self::MODEL_BOTH)
        );
        return $rules;
    }
    public  function  categoryAddOrEditData($type){
        $data = array(
            'category_id'       =>  I("post.category_id",""),
            'category_name'     =>  I("post.category_name",""),
            'category_name'     =>  I("post.category_name",""),
            'category_parent_id'=>  I("post.category_parent_id",""),
            'category_sort'     =>  I("post.category_sort",""),
            'category_status'   =>  I("post.category_status",""),
        );
        if($type=="add"){
            unset($data["member_id"]);
            $data["category_add_time"]=time();
        }
        if($type=="edit"){
            $data["category_edit_time"]=time();
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
    public  function categoryAdd(){
        $rules=$this->categoryAddOrEditRules();
        $data=$this->categoryAddOrEditData("add");
        if (!$this->validate($rules)->create($data)){
            return  $this->returnData(0,$this->getError(),"");
        }
        $result=$this->add($data);
        if(!$result){
            return   $this->returnData(0,"新增失败!","");
        }
        return $this->returnData(1,"新增成功!",$result);
    }


    public  function  categoryEdit(){
        $rules=$this->categoryAddOrEditRules();
        $data=$this->categoryAddOrEditData("edit");
        if (!$this->validate($rules)->create($data)){
            return $this->returnData(0,$this->getError(),"");
        }
        $map=array();
        $map["category_id"]=I("post.category_id");
        $result=$this->where($map)->save($data);
        if(!$result){
            return $this->returnData(0,"修改失败!","");
        }
        return $this->returnData(1,"修改成功!",I("post.id"));
    }
    public  function  categoryDelete(){
        $rules = array(
            array("category_id", "require","分类编号不能为空!")
        );
        $data = array(
            "category_id" => I("get.category_id","")
        );
        if (!$this->validate($rules)->create($data)) {
            return $this->returnData(0,$this->getError(),"");
        }
        $map = array();
        $map["category_id"] = I("get.category_id");
        $result = $this->where($map)->delete();
        if (!$result) {
            return $this->returnData(0,"册除失败!","");
        }
        return $this->returnData(1,"册除成功!",I("get.category_id"));
    }

}
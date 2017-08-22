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
class GoodsModel extends Model {

    protected $tableName = 'goods';

    const SEX_MAN=1;
    const SEx_WOMAN=2;
    const ENABLE=0;
    const DISABLE=1;
    const  COMMEND_MAIN=1;
    const  COMMEND_CATE=2;

    public function getInfoByMemberName($memberName){
        $map=array();
        $map["goods_name"]=$memberName;
        $goodsInfo=$this->where($map)->find();
        return $goodsInfo;
    }
    public  function  getList($map,$orderBy="goods_id desc",$limit=25){
        $count      =$this->where($map)->count();
        $page       = new \Think\Page($count,$limit);
        $page->setConfig('theme',C("PAGE_THEME"));
        $show       = $page->show();
        $list = $this
            ->where($map)
            ->join(C('DB_PREFIX').'category  ON '.C('DB_PREFIX').'goods.category_id='.C('DB_PREFIX').'category.category_id','LEFT')
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


   public function goodsAddOrEditRules(){
       $rules = array(
           array('goods_id'      ,  'require'   ,   '商品编号不能为空!', self::MODEL_UPDATE),
           array('goods_name'    ,  'require'   ,   '商品名称不能为空!', self::MODEL_BOTH),
           array('category_id',  'require'   ,   '商品分类不能为空!', self::MODEL_BOTH),
           array('spec_name'  ,  'require'   ,   '商品规格名称不能为空!', self::MODEL_BOTH),
           array('goods_image'      ,  'require'   ,   '商品封面图片不能为空!'   , self::MODEL_BOTH),
           array('goods_serial'      ,  'require'   ,   '商品货号不能为空!', self::MODEL_UPDATE),
           array('goods_state'    ,  'require'   ,   '商品状态不能为空!', self::MODEL_BOTH),
           array('goods_body'  ,  'require'   ,   '商品详细内容不能为空!', self::MODEL_BOTH),
       );
       return $rules;
   }
    public  function  goodsAddOrEditData($type){
        $data = array(
            'goods_id'       =>  I("post.goods_id",""),
            'goods_name'       =>  I("post.goods_name",""),
            'category_id'   =>  I("post.category_id",""),
            'gc_name'     =>  I("post.gc_name",""),
            'spec_name'        =>  I("post.spec_name",""),
            //'goods_image'   =>  I("post.goods_image",""),
            //'goods_image_more'     =>  I("post.goods_image_more",""),
            'goods_serial'     =>  I("post.goods_serial",""),
            'goods_state'      =>  I("post.goods_state",""),
            'goods_commend'         =>  I("post.goods_commend",""),
            'goods_body'     =>  I("post.goods_body",0),
            'goods_spec'      =>  I("post.goods_spec",1),
            'goods_starttime'     =>  I("post.goods_starttime",0),
            'goods_endtime'     =>  I("post.goods_endtime",0),
            'goods_close_reason' =>  I("post.goods_close_reason",0)
        );
        if($type=="add"){
            unset($data["goods_id"]);
            $data["goods_add_time"]=time();
        }
        if($type=="edit"){
            $data["goods_edit_time"]=time();
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
     public  function goodsAdd(){
        $rules=$this->goodsAddOrEditRules();
        $data=$this->goodsAddOrEditData("add");

       /*  var_dump($data);

         exit;*/
        if (!$this->validate($rules)->create($data)){
            return  $this->returnData(0,$this->getError(),"");
        }
        $result=$this->add($data);
        if(!$result){
           return   $this->returnData(0,"新增失败!","");
        }
        return $this->returnData(1,"新增成功!",$result);
    }
    public  function  goodsEdit(){
        $rules=$this->goodsAddOrEditRules();
        $data=$this->goodsAddOrEditData("edit");
        if (!$this->validate($rules)->create($data)){
            return $this->returnData(0,$this->getError(),"");
        }
        $map=array();
        $map["goods_id"]=I("post.goods_id");
        $result=$this->where($map)->save($data);
        if(!$result){
            return $this->returnData(0,"修改失败!","");
        }
        return $this->returnData(1,"修改成功!",I("post.id"));
    }
    public  function  goodsDelete(){
        $rules = array(
            array("goods_id", "require","会员编号不能为空!")
        );
        $data = array(
            "goods_id" => I("get.goods_id","")
        );
        if (!$this->validate($rules)->create($data)) {
            return $this->returnData(0,$this->getError(),"");
        }
        $map = array();
        $map["goods_id"] = I("get.goods_id");
        $result = $this->where($map)->delete();
        if (!$result) {
            return $this->returnData(0,"册除失败!","");
        }
        return $this->returnData(1,"册除成功!",I("get.member_id"));
    }


    public  function  getOneDayCountByTime($day){
        $map=array();

        $map["goods_add_time"]=array(array("egt",$day),array("lt",$day+86400));
        $count=$this->where($map)->count();
        return $count;
    }

    public  function  getCountByMap($map=array()){
        $count=$this->where($map)->count();
        return $count;
    }

}
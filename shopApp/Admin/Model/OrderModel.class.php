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
class OrderModel extends Model {

    protected $tableName = 'order';

    const ENABLE=0;
    const DISABLE=1;
    const  ORDER_PAY_TYPE_ALIPAY=1;
    const  ORDER_PAY_TYPE_WEIXIN=2;
    const  ORDER_PAY_TYPE_HUODAOFUKUANG=3;

    const  ORDER_PAY_STATUS_NOPAY=1;
    const  ORDER_PAY_STATUS_SUCESS=2;
    const  ORDER_PAY_STATUS_FAIL=3;


    const  ORDER_STATUS_NOPAY=1;
    const  ORDER_STATUS_CANCEL=2;
    const  ORDER_STATUS_OKPAY=3;
    const  ORDER_STATUS_SORTING=4;
    const  ORDER_STATUS_SEND=5;
    const  ORDER_STATUS_OVER=6;

    const  ORDER_RETURN_STATUS_NO=0;
    const  ORDER_RETURN_STATUS_PART=1;
    const  ORDER_RETURN_STATUS_ALL=2;



    public  function  getList($map,$orderBy="order_id desc",$limit=25){
        $count      =$this->where($map)->count();
        $page       = new \Think\Page($count,$limit);
        $page->setConfig('theme',C("PAGE_THEME"));
        $show       = $page->show();
        $list = $this
            ->where($map)->order($orderBy)->limit($page->firstRow.','.$page->listRows)->select();
        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        $returnData=array();
        $returnData["list"]=$list;
        $returnData["page"]=$show;
        return $returnData;
    }

    public  function exportList($map=array(),$orderBy="order_id desc"){

        $list = $this->where($map)->order($orderBy)->select();

        foreach($list as $key=>$value){
            $list[$key]=$this->dataFormat($value);
        }
        return $list;
    }



    public  function  returnStatusFormat($returnStatus){

        if($returnStatus==self::ORDER_RETURN_STATUS_NO){
            return "未退货";
        }

        if($returnStatus==self::ORDER_RETURN_STATUS_PART){
            return "部分退货";
        }
        if($returnStatus==self::ORDER_RETURN_STATUS_ALL){
            return "完全退货";
        }
        return "/";
    }

    public  function  payTypeFormat($payType){

        if($payType==self::ORDER_PAY_TYPE_ALIPAY){
            return "支付包";
        }

        if($payType==self::ORDER_PAY_TYPE_WEIXIN){
            return "微信";
        }
        if($payType==self::ORDER_PAY_TYPE_HUODAOFUKUANG){
            return "货到付款";
        }
        return "/";
    }


    public  function  payStatusFormat($payStatus){

        if($payStatus==self::ORDER_PAY_STATUS_NOPAY){
            return "等待支付";
        }

        if($payStatus==self::ORDER_PAY_STATUS_SUCESS){
            return "已支付";
        }
        if($payStatus==self::ORDER_PAY_STATUS_FAIL){
            return "支付失败";
        }
        return "/";
    }

    public  function  orderStatusFormat($orderStatus){

        if($orderStatus==self::ORDER_STATUS_NOPAY){
            return "未支付";
        }

        if($orderStatus==self::ORDER_STATUS_CANCEL){
            return "取消";
        }
        if($orderStatus==self::ORDER_STATUS_OKPAY){
            return "已支付";
        }
        if($orderStatus==self::ORDER_STATUS_SORTING){
            return "已分拣";
        }
        if($orderStatus==self::ORDER_STATUS_SEND){
            return "已配送";
        }
        if($orderStatus==self::ORDER_STATUS_OVER){
            return "已完成";
        }
        return "/";

    }
    public  function  dataFormat($data=array()){

        if(isset($data["order_pay_type"])){
            $data["order_pay_type_name"]=$this->payTypeFormat($data["order_pay_type"]);
        }
        if(isset($data["order_pay_status"])){
            $data["order_pay_status_name"]=$this->payStatusFormat($data["order_pay_status"]);
        }
        if(isset($data["order_status"])){
            $data["order_status_name"]=$this->orderStatusFormat($data["order_status"]);
        }


        if(isset($data["order_pay_time"])){
            $data["order_pay_time_name"]=unixtime_to_date($data["order_pay_time"]);
        }

        if(isset($data["order_add_time"])){
            $data["order_add_time_name"]=unixtime_to_date($data["order_add_time"]);
        }

        if(isset($data["order_pay_time"])){
            $data["order_pay_time_name"]=unixtime_to_date($data["order_pay_time"]);
        }

        if(isset($data["order_distribution_start_time_period"])){
            $data["order_distribution_start_time_period_name"]=unixtime_to_date($data["order_distribution_start_time_period"]);
        }

        if(isset($data["order_distribution_end_time_period"])){
            $data["order_distribution_end_time_period_name"]=unixtime_to_date($data["order_distribution_end_time_period"]);
        }

        if(isset($data["order_return_status"])){
            $data["order_return_status_name"]=$this->returnStatusFormat($data["order_return_status"]);
        }

        if(isset($data["order_delivery_time"])){
            $data["order_delivery_time_name"]=unixtime_to_date($data["order_delivery_time"]);
        }
        return $data;
    }



    public  function  getInfoById($id){

        $map=array();
        $map["order_id"]=$id;
        $goodsInfo=$this->where($map)->find();

        $goodsInfo=$this->dataFormat($goodsInfo);
        return $goodsInfo;
    }


   public function goodsAddOrEditRules(){
       $rules = array(
           array('order_id'      ,  'require'   ,   '商品编号不能为空!', self::MODEL_UPDATE),
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
            'order_id'       =>  I("post.goods_id",""),
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
        $map["order_id"]=I("post.order_id");
        $result=$this->where($map)->save($data);
        if(!$result){
            return $this->returnData(0,"修改失败!","");
        }
        return $this->returnData(1,"修改成功!",I("post.id"));
    }
    public  function  goodsDelete(){
        $rules = array(
            array("order_id", "require","会员编号不能为空!")
        );
        $data = array(
            "order_id" => I("get.order_id","")
        );
        if (!$this->validate($rules)->create($data)) {
            return $this->returnData(0,$this->getError(),"");
        }
        $map = array();
        $map["order_id"] = I("get.order_id");
        $result = $this->where($map)->delete();
        if (!$result) {
            return $this->returnData(0,"册除失败!","");
        }
        return $this->returnData(1,"册除成功!",I("get.order_id"));
    }

    public  function  getOneDayCountByTime($day){
        $map=array();

        $map["order_add_time"]=array(array("egt",$day),array("lt",$day+86400));
        $count=$this->where($map)->count();
        return $count;
    }
}
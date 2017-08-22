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


   public function goodsAddRules(){
       $rules = array(
           array('order_sn'      ,  'require'   ,   '订单编号不能为空!'),
           array('order_member_id'    ,  'require'   ,   '会员编号不能为空!'),
           array('order_money',  'require'   ,   '订单价格不能为空!'),
           array('order_pay_type'  ,  'require'   ,   '支付类型不能为空!'),
           array('order_pay_status'  ,  'require'   ,   '支付状态不能为空!'),
           array('order_pay_time'  ,  'require'   ,   '支付时间不能为空!'),
           array('order_status'  ,  'require'   ,   '订单状态不能为空!'),
           array('order_add_time'  ,  'require'   ,   '新增时间不能为空!'),
           array('order_preferential_privilege'  ,  'require'   ,   '优惠价格不能为空!'),
           array('order_coupon_money'  ,  'require'   ,   '优惠券金额不能为空!'),
           array('order_account_money'  ,  'require'   ,   '账户金额不能为空!'),
           array('order_pay_type_money'  ,  'require'   ,   '支付类型金额不能为空!'),
           array('order_freight'  ,  'require'   ,   '运费不能为空!'),
           array('order_return_status'  ,  'require'   ,   '退货状态不能为空!'),
           array('order_distribution_start_time_period'  ,  'require'   ,   '配送开始时间不能为空!'),
           array('order_distribution_end_time_period'  ,  'require'   ,   '配送结束时间不能为空!'),
           array('order_transaction_id'  ,  'require'   ,   '支付流水号不能为空!'),
           array('order_out_trade_no'  ,  'require'   ,   '支付客户单号不能为空!'),
           array('order_notes'  ,  'require'   ,   '客户下单备注信息不能为空!'),
           array('order_consignee_mobile'  ,  'require'   ,   '收货人手机号不能为空!'),
           array('order_consignee_name'  ,  'require'   ,   '收货人姓名不能为空!'),
           array('order_consignee_province_id'      ,  'require'   ,   '收货人所在省不能为空!'),
           array('order_consignee_city_id'      ,  'require'   ,   '收货人所在市不能为空!'),
           array('order_consignee_area_id'    ,  'require'   ,   '收货人所在区不能为空!'),
           array('order_consignee_cell_id'  ,  'require'   ,   '收货人小区不能为空!'),
           array('order_consignee_address'  ,  'require'   ,   '收货人地址不能为空!'),
           array('order_delivery_time'  ,  'require'   ,   '配送时间不能为空!'),
       );
       return $rules;
   }


    public function goodsEditRules(){
        $rules = array(
            array('order_id'      ,  'require'   ,   '订单ID不能为空!'),
            array('order_sn'      ,  'require'   ,   '订单编号不能为空!'),
            array('order_member_id'    ,  'require'   ,   '会员编号不能为空!'),
            array('order_money',  'require'   ,   '订单价格不能为空!'),
            array('order_pay_type'  ,  'require'   ,   '支付类型不能为空!'),
            array('order_pay_status'  ,  'require'   ,   '支付状态不能为空!'),
            array('order_pay_time'  ,  'require'   ,   '支付时间不能为空!'),
            array('order_status'  ,  'require'   ,   '订单状态不能为空!'),
            array('order_add_time'  ,  'require'   ,   '新增时间不能为空!'),
            array('order_preferential_privilege'  ,  'require'   ,   '优惠价格不能为空!'),
            array('order_coupon_money'  ,  'require'   ,   '优惠券金额不能为空!'),
            array('order_account_money'  ,  'require'   ,   '账户金额不能为空!'),
            array('order_pay_type_money'  ,  'require'   ,   '支付类型金额不能为空!'),
            array('order_freight'  ,  'require'   ,   '运费不能为空!'),
            array('order_return_status'  ,  'require'   ,   '退货状态不能为空!'),
            array('order_distribution_start_time_period'  ,  'require'   ,   '配送开始时间不能为空!'),
            array('order_distribution_end_time_period'  ,  'require'   ,   '配送结束时间不能为空!'),
            array('order_transaction_id'  ,  'require'   ,   '支付流水号不能为空!'),
            array('order_out_trade_no'  ,  'require'   ,   '支付客户单号不能为空!'),
            array('order_notes'  ,  'require'   ,   '客户下单备注信息不能为空!'),
            array('order_consignee_mobile'  ,  'require'   ,   '收货人手机号不能为空!'),
            array('order_consignee_name'  ,  'require'   ,   '收货人姓名不能为空!'),
            array('order_consignee_province_id'      ,  'require'   ,   '收货人所在省不能为空!'),
            array('order_consignee_city_id'      ,  'require'   ,   '收货人所在市不能为空!'),
            array('order_consignee_area_id'    ,  'require'   ,   '收货人所在区不能为空!'),
            array('order_consignee_cell_id'  ,  'require'   ,   '收货人小区不能为空!'),
            array('order_consignee_address'  ,  'require'   ,   '收货人地址不能为空!'),
            array('order_delivery_time'  ,  'require'   ,   '配送时间不能为空!'),
        );
        return $rules;
    }


    public  function  goodsAddOrEditData($type){
        $data = array(
            'order_sn'       =>  I("post.order_sn",""),
            'order_member_id'       =>  I("post.order_member_id",""),
            'order_money'   =>  I("post.order_money",""),
            'order_pay_type'     =>  I("post.order_pay_type",""),
            'order_pay_status'        =>  I("post.order_pay_status",""),
            'order_pay_time'     =>  I("post.order_pay_time",""),
            'order_status'      =>  I("post.order_status",""),
            'order_add_time'         =>  I("post.order_add_time",""),
            'order_preferential_privilege'     =>  I("post.order_preferential_privilege",0),
            'order_coupon_money'      =>  I("post.order_coupon_money",1),
            'order_account_money'     =>  I("post.order_account_money",0),
            'order_pay_type_money'     =>  I("post.order_pay_type_money",0),
            'order_freight' =>  I("post.order_freight",0),
            'order_distribution_start_time_period'      =>  I("post.order_distribution_start_time_period",""),
            'order_distribution_end_time_period'         =>  I("post.order_distribution_end_time_period",""),
            'order_transaction_id'     =>  I("post.order_transaction_id",0),
            'order_out_trade_no'      =>  I("post.order_out_trade_no",1),
            'order_notes'     =>  I("post.order_notes",0),
            'order_consignee_mobile'     =>  I("post.order_consignee_mobile",0),
            'order_consignee_name' =>  I("post.order_consignee_name",0),
            'order_consignee_province_id'      =>  I("post.order_consignee_province_id",1),
            'order_consignee_city_id'     =>  I("post.order_consignee_city_id",0),
            'order_consignee_area_id'     =>  I("post.order_consignee_area_id",0),
            'order_consignee_cell_id' =>  I("post.order_consignee_cell_id",0),
            'order_consignee_address'     =>  I("post.order_consignee_address",0),
            'order_delivery_time'     =>  I("post.order_delivery_time",0),
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
        $rules=$this->goodsAddRules();
        $data=$this->goodsAddOrEditData("add");
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
        $rules=$this->goodsEditRules();
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

    public  function  getCountByMap($map=array()){
        $count=$this->where($map)->count();
        return $count;
    }


}

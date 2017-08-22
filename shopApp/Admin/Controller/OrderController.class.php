<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class OrderController extends BaseController {
    public function index(){

        $request=I("request.");
        $map=array();
        $starTime=trim($request["startTime"]);
        $endTime=trim($request["endTime"]);
        if($starTime&&$endTime){
            $starTime=strtotime($starTime);
            $endTime=strtotime($endTime);
            $map["goods_add_time"]=array(array("egt",$starTime),array("elt",$endTime));
        }
        if($starTime&&!$endTime){
            $starTime=strtotime($starTime);
            $map["goods_add_time"]=array("egt",$starTime);
        }
        if($endTime &&!$starTime){
            $endTime=strtotime($endTime);
            $map["goods_add_time"]=array("elt",$endTime);
        }
        $order_status=trim($request["order_status"]);
        if($order_status){
            $map["order_status"]=$order_status;
        }
        $content=trim($request["content"]);
        if($content){
            if($request["key"]=="order_id"){
                $map[$request["key"]]=$content;
            }
            else{
                $map[$request["key"]]=array("like","%".$content."%");
            }
        }

        if($request["submit"]=="export"){
            $this->export($map);
        }
        else{
            $limit=trim($request["limit"])?trim($request["limit"]):20;
            $returnList=D("order")->getList($map,"order_id desc",$limit);
            $this->assign("list",$returnList["list"]);
            $this->assign("page",$returnList["page"]);
            $this->assign("request",$request);
            C('TOKEN_ON',false);
            $this->display();
        }

    }


    public function  export($map){
        $exportList=D("order")->exportList($map);
        $orderTitle=array(
            "订单编号",
            "会员名称",
            "订单价格",
            "支付类型",
            "支付状态",
            "支付时间",
            "订单状态",
            "新增时间",
            "优惠价格",
            "使用优惠券金额",
            "使用账户金额",
            "支付类型金额",
            "运费",
            "退货状态",
            "配送开始时间段",
            "配送结束时间段",
            "支付流水号",
            "客户下单备注信息",
            "收货人手机号",
            "收货人姓名",
            "收货人所在省",
            "收货人所在市",
            "收货人所在区",
            "收货人小区",
            "订单收货人地址",
            "配送时间"

        );
        $rowHeader = implode(",",$orderTitle)."\n";
        $data = iconv('utf-8','gb2312',$rowHeader);
        foreach($exportList as $key=>$value){
            $rowData=array();
            $rowData[]=$value["order_sn"];
            $rowData[]=$value["order_member_id_name"];
            $rowData[]=$value["order_money"];
            $rowData[]=$value["order_pay_type"];
            $rowData[]=$value["order_pay_status_name"];
            $rowData[]=$value["order_pay_time_name"];
            $rowData[]=$value["order_status_name"];
            $rowData[]=$value["order_add_time_name"];
            $rowData[]=$value["order_preferential_privilege"];
            $rowData[]=$value["order_coupon_money"];
            $rowData[]=$value["order_account_money"];
            $rowData[]=$value["order_pay_type_money"];
            $rowData[]=$value["order_freight"];
            $rowData[]=$value["order_return_status_name"];
            $rowData[]=$value["order_distribution_start_time_period_name"];
            $rowData[]=$value["order_distribution_end_time_period_name"];
            $rowData[]=$value["order_transaction_id"];
            $rowData[]=$value["order_notes"];
            $rowData[]=$value["order_consignee_mobile"];
            $rowData[]=$value["order_consignee_name"];
            $rowData[]=$value["order_consignee_province_id_name"];
            $rowData[]=$value["order_consignee_city_id_name"];
            $rowData[]=$value["order_consignee_area_id_name"];
            $rowData[]=$value["order_consignee_cell_id_name"];
            $rowData[]=$value["order_consignee_address"];
            $rowData[]=$value["order_delivery_time_name"];
            $rowString="";
            $rowString=implode(",",$rowData)."\n";
            $rowString=iconv('utf-8','gb2312',$rowString);
            $data.=$rowString;
        }
        $filename = "订单数据".date('YmdHis').'.csv'; //设置文件名
        export_csv($filename,$data); //导出
    }



    public  function  info(){
        C('TOKEN_ON',false);
        try{
            if(!I("request.order_id")){
                E("订单编号不能为空!");
            }
            $orderInfo=D("order")->getInfoById(I("request.order_id"));
            if(!$orderInfo){
                E("订单不存在!");
            }
            $orderGoodsList=D("order_goods")->getAllByOrderSn($orderInfo["order_sn"]);
            $this->assign("orderInfo",$orderInfo);
            $this->assign("orderGoodsList",$orderGoodsList);
            $this->display();
        }
        catch(\Exception $e){
            $this->error($e->getMessage());
        }

    }



    public  function  add(){

        C('TOKEN_ON',false);
        if(IS_POST){
            try{
                $returnData=D("goods")->goodsAdd();
                if($returnData["status"]==1){
                    $this->success("新增成功!");
                }
                else{
                    E($returnData["tip"]);
                }
            }
            catch(\Exception $e){
                $this->error($e->getMessage());
            }
        }
        else{

            $categoryList=D("category")->getList();
            foreach($categoryList as $key=>$value){
                if($value["category_parent_id"]==0){
                    unset($categoryList[$key]);
                }
            }
            $this->assign("categoryList",$categoryList);
            $this->display();
        }
    }

    public  function  update(){

        C('TOKEN_ON',false);
        try{
            if(IS_POST){
                $returnData=D("order")->goodsEdit();
                if($returnData["status"]==1){
                    $this->success("修改成功!");
                }
                else{
                    E($returnData["tip"]);
                }
            }
            else{
                if(!I("get.goods_id",0)){
                    E("修改的编号不存在!");
                }
                $goodsInfo=D("order")->getInfoById(I("get.order_id"));
                $this->assign("goodsInfo",$goodsInfo);


                $categoryList=D("category")->getList();
                foreach($categoryList as $key=>$value){
                    if($value["category_parent_id"]==0){
                        unset($categoryList[$key]);
                    }
                }

                $this->assign("categoryList",$categoryList);
                $this->display();
            }
        }
        catch(\Exception $e){
            $this->error($e->getMessage());
        }
    }

    public  function  delete(){
        C('TOKEN_ON',false);
        try {
            $returnData=D("order")->memberDelete();
            if($returnData["status"]==1){
                $this->success("册除成功!");
            }
            else{
                E($returnData["tip"]);
            }
        }
        catch(\Exception $e){
            $this->error($e->getMessage());
        }
    }




}
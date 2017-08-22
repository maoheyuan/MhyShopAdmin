<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class MemberAddressController extends BaseController {

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
            $returnList=D("member_address")->getList($map,"maddress_id desc",$limit);
            //echo M()->_sql();
            //print_r($returnList["list"]);
            $this->assign("list",$returnList["list"]);
            $this->assign("page",$returnList["page"]);
            $this->assign("request",$request);
            C('TOKEN_ON',false);
            $this->display();
        }

    }


    public function  export($map){
        $exportList=D("member_address")->exportList($map);
        $memberTitle=array(
            "地址编号",
            "会员名称",
            "省",
            "市",
            "区/县",
            "小区",
            "自提点",
            "详细地址",
            "收货人",
            "收货人手机",
            "默认地址",
            "新增时间",
            "修改时间",
        );
        $rowHeader = implode(",",$memberTitle)."\n";
        $data = iconv('utf-8','gb2312',$rowHeader);
        foreach($exportList as $key=>$value){
            $rowData=array();
            $rowData[]=$value["maddress_id"];
            $rowData[]=$value["maddress_member_id_name"];
            $rowData[]=$value["maddress_province_id_name"];
            $rowData[]=$value["maddress_city_id_name"];
            $rowData[]=$value["maddress_area_id_name"];
            $rowData[]=$value["maddress_cell_id_name"];
            $rowData[]=$value["maddress_pickup_id"];
            $rowData[]=$value["maddress_consignee_address"];

            $rowData[]=$value["maddress_consignee_name"];
            $rowData[]=$value["maddress_consignee_mobile"];
            $rowData[]=$value["maddress_default_name"];
            $rowData[]=$value["maddress_edit_time_name"];
            $rowData[]=$value["maddress_add_time_name"];


            $rowString="";
            $rowString=implode(",",$rowData)."\n";
            $rowString=iconv('utf-8','gb2312',$rowString);
            $data.=$rowString;
        }
        $filename = "会员数据".date('YmdHis').'.csv'; //设置文件名
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
                $returnData=D("goods")->goodsEdit();
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
                $goodsInfo=D("goods")->getInfoById(I("get.goods_id"));
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
            $returnData=D("goods")->memberDelete();
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
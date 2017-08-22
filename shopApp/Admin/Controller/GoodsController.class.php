<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class GoodsController extends BaseController {
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
        $content=trim($request["content"]);
        if($content){
            if($request["key"]=="goods_id"){
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
            $returnList=D("goods")->getList($map,"goods_id desc",$limit);
            $this->assign("list",$returnList["list"]);
            $this->assign("page",$returnList["page"]);
            $this->assign("allNum",$returnList["allNum"]);
            $this->assign("pageNum",$returnList["pageNum"]);
            $this->assign("request",$request);
            C('TOKEN_ON',false);
            $this->display();
        }

    }


    public function  export($map){
        $exportList=D("goods")->exportList($map);
        $memberTitle=array(
            "商品编号",
            "商品分类id",
            "商品名称",
            "规格名称",
            "商品规格",
            "封面图片",
            "商品货号",
            "商品状态",
            "商品推荐",
            "发布开始时间",
            "发布结束时间",
            "下架原因",
            "添加时间",
            "修改时间",
            "排序",
        );
        $rowHeader = implode(",",$memberTitle)."\n";
        $data = iconv('utf-8','gb2312',$rowHeader);
        foreach($exportList as $key=>$value){
            $rowData=array();
            $rowData[]=$value["goods_id"];
            $rowData[]=$value["category_id"];
            $rowData[]=$value["goods_name"];
            $rowData[]=$value["spec_name"];
            $rowData[]=$value["goods_spec"];
            $rowData[]=$value["goods_image"];
            $rowData[]=$value["goods_serial"];
            $rowData[]=$value["goods_state_name"];
            $rowData[]=$value["goods_commend_name"];
            $rowData[]=$value["goods_starttime_name"];
            $rowData[]=$value["goods_endtime_name"];
            $rowData[]=$value["goods_close_reason"];
            $rowData[]=$value["goods_add_time_name"];
            $rowData[]=$value["goods_add_edit_name"];
            $rowData[]=$value["goods_sort"];
            $rowString="";
            $rowString=implode(",",$rowData)."\n";
            $rowString=iconv('utf-8','gb2312',$rowString);
            $data.=$rowString;
        }
        $filename = "商品数据".date('YmdHis').'.csv'; //设置文件名
        export_csv($filename,$data); //导出
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
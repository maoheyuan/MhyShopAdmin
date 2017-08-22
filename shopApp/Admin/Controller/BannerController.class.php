<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class BannerController extends BaseController {
    public function index(){

        $request=I("request.");
        $map=array();
        $starTime=trim($request["startTime"]);
        $endTime=trim($request["endTime"]);
        if($starTime&&$endTime){
            $starTime=strtotime($starTime);
            $endTime=strtotime($endTime);
            $map["banner_add_time"]=array(array("egt",$starTime),array("elt",$endTime));
        }
        if($starTime&&!$endTime){
            $starTime=strtotime($starTime);
            $map["banner_add_time"]=array("egt",$starTime);
        }
        if($endTime &&!$starTime){
            $endTime=strtotime($endTime);
            $map["banner_add_time"]=array("elt",$endTime);
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
            $returnList=D("banner")->getList($map,"banner_id desc",$limit);
            $this->assign("list",$returnList["list"]);
            $this->assign("page",$returnList["page"]);
            $this->assign("request",$request);
            C('TOKEN_ON',false);
            $this->display();
        }

    }


    public function  export($map){
        $exportList=D("banner")->exportList($map);
        $memberTitle=array("广告编号","广告名称","广告图片","广告状态","产品分类","有效开始时间","有效结束时间","新增时间","修改时间");
        $rowHeader = implode(",",$memberTitle)."\n";
        $data = iconv('utf-8','gb2312',$rowHeader);
        foreach($exportList as $key=>$value){
            $rowData=array();
            $rowData[]=$value["banner_id"];
            $rowData[]=$value["banner_name"];
            $rowData[]=$value["banner_image"];
            $rowData[]=$value["banner_status_name"];
            $rowData[]=$value["banner_category_name"];
            $rowData[]=$value["banner_start_time_name"];
            $rowData[]=$value["banner_end_time_name"];
            $rowData[]=$value["banner_add_time_name"];
            $rowData[]=$value["banner_edit_time_name"];
            $rowString="";
            $rowString=implode(",",$rowData)."\n";
            $rowString=iconv('utf-8','gb2312',$rowString);
            $data.=$rowString;
        }
        $filename = "广告数据".date('YmdHis').'.csv'; //设置文件名
        export_csv($filename,$data); //导出
    }

    public  function  add(){

        C('TOKEN_ON',false);
        if(IS_POST){
            try{
                $returnData=D("banner")->bannerAdd();
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
            $categoryList=D("category")->getTopCategory();
            $this->assign("categoryList",$categoryList);
            $this->display();
        }
    }

    public  function  update(){

        C('TOKEN_ON',false);
        try{
            if(IS_POST){
                $returnData=D("banner")->bannerEdit();
                if($returnData["status"]==1){
                    $this->success("修改成功!");
                }
                else{
                    E($returnData["tip"]);
                }
            }
            else{
                if(!I("get.banner_id",0)){
                    E("修改的编号不存在!");
                }
                $bannerInfo=D("banner")->getInfoById(I("get.banner_id"));
                $this->assign("bannerInfo",$bannerInfo);
                $categoryList=D("category")->getTopCategory();
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
            $returnData=D("banner")->bannerDelete();
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
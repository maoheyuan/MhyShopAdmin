<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class AdminController extends BaseController {
    public function index(){
        $request=I("request.");
        $map=array();
        $starTime=trim($request["startTime"]);
        $endTime=trim($request["endTime"]);
        if($starTime&&$endTime){
            $starTime=strtotime($starTime);
            $endTime=strtotime($endTime);
            $map["admin_time"]=array(array("egt",$starTime),array("elt",$endTime));
        }
        if($starTime&&!$endTime){
            $starTime=strtotime($starTime);
            $map["admin_time"]=array("egt",$starTime);
        }
        if($endTime &&!$starTime){
            $endTime=strtotime($endTime);
            $map["admin_time"]=array("elt",$endTime);
        }
        $content=trim($request["content"]);
        if($content){
            if($request["key"]=="admin_id"){
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
            $returnList=D("admin")->getList($map,"admin_id desc",$limit);
            $this->assign("list",$returnList["list"]);
            $this->assign("page",$returnList["page"]);
            $this->assign("request",$request);
            C('TOKEN_ON',false);
            $this->display();
        }
    }


    public function  export($map){
        $exportList=D("admin")->exportList($map);
        $memberTitle=array("管理员编号","管理员名称","登录时间","登录次数","超级管理员","新增时间","修改时间");
        $rowHeader = implode(",",$memberTitle)."\n";
        $data = iconv('utf-8','gb2312',$rowHeader);
        foreach($exportList as $key=>$value){
            $rowData=array();
            $rowData[]=$value["admin_id"];
            $rowData[]=$value["admin_name"];
            $rowData[]=$value["admin_login_time"];
            $rowData[]=$value["admin_login_num"];
            $rowData[]=$value["admin_is_super"];
            $rowData[]=$value["admin_add_time"];
            $rowData[]=$value["admin_eidt_time"];
            $rowString="";
            $rowString=implode(",",$rowData)."\n";
            $rowString=iconv('utf-8','gb2312',$rowString);
            $data.=$rowString;
        }
        $filename = "管理员数据".date('YmdHis').'.csv'; //设置文件名
        export_csv($filename,$data); //导出
    }

    public  function  add(){

        C('TOKEN_ON',false);
        if(IS_POST){
            try{
                $returnData=D("admin")->adminAdd();
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
            $this->display();
        }
    }

    public  function  update(){

        C('TOKEN_ON',false);
        try{
            if(IS_POST){
                $returnData=D("admin")->adminEdit();
                if($returnData["status"]==1){
                    $this->success("修改成功!");
                }
                else{
                    E($returnData["tip"]);
                }
            }
            else{
                if(!I("get.admin_id",0)){
                    E("修改的编号不存在!");
                }
                $adminInfo=D("admin")->getInfoById(I("get.admin_id"));
                $this->assign("adminInfo",$adminInfo);
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
            $returnData=D("admin")->adminDelete();
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

    public  function self(){
        $adminInfo=session("adminInfo");
        $this->assign("adminInfo",$adminInfo);
        $this->display();
    }

}
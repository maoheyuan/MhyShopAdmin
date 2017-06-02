<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {
    public function index(){

        $request=I("request.");

        $map=array();
        $starTime=trim($request["startTime"]);
        if($starTime){
            $starTime=strtotime($starTime);
            $map["member_time"]=array("gt",$starTime);
        }
        $endTime=trim($request["endTime"]);
        if($request["endTime"]){
            $endTime=strtotime($endTime);
            $map["member_time"]=array("lt",$endTime);
        }
        if($request["content"]){
            if($request["key"]=="member_id"){
                $map[$request["key"]]=$request["content"];
            }
            else{
                $map[$request["key"]]=array("like","%".$request["content"]."%");
            }
        }
        $limit=$request["limit"]?$request["limit"]:20;
        $returnList=D("member")->getList($map,"member_id desc",$limit);
        //print_r($returnList["list"]);
        $this->assign("list",$returnList["list"]);
        $this->assign("page",$returnList["page"]);
        $this->assign("allNum",$returnList["allNum"]);
        $this->assign("pageNum",$returnList["pageNum"]);
        $this->display();
    }


}
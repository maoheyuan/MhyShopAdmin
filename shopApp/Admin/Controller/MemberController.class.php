<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {
    public function index(){

        $request=I("request.");
        $map=array();
        $starTime=trim($request["startTime"]);
        $endTime=trim($request["endTime"]);
        if($starTime&&$endTime){
            $starTime=strtotime($starTime);
            $endTime=strtotime($endTime);
            $map["member_time"]=array(array("egt",$starTime),array("elt",$endTime));
        }
        if($starTime&&!$endTime){
            $starTime=strtotime($starTime);
            $map["member_time"]=array("egt",$starTime);
        }
        if($endTime &&!$starTime){
            $endTime=strtotime($endTime);
            $map["member_time"]=array("elt",$endTime);
        }
        $content=trim($request["content"]);
        if($content){
            if($request["key"]=="member_id"){
                $map[$request["key"]]=$content;
            }
            else{
                $map[$request["key"]]=array("like","%".$content."%");
            }
        }
        $limit=trim($request["limit"])?trim($request["limit"]):20;
        $returnList=D("member")->getList($map,"member_id desc",$limit);
        //echo M()->_sql();
        //print_r($returnList["list"]);
        $this->assign("list",$returnList["list"]);
        $this->assign("page",$returnList["page"]);
        $this->assign("allNum",$returnList["allNum"]);
        $this->assign("pageNum",$returnList["pageNum"]);
        $this->assign("request",$request);

        C('TOKEN_ON',false);
        $this->display();
    }


}
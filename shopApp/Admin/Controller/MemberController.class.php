<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {
    public function index(){

        $request=I("request.");

        $map=array();
        $starTime=$request["startTime"];
        if($request["startTime"]){
            $map["member_time"]=array("gt",$request["startTime"]);
        }
        if($request["endTime"]){
            $map["member_time"]=array("lt",$request["member_time"]);
        }
        if($request["content"]){
            $map[$request["key"]]=array("like","%".$request["content"]."%");
        }
        $limit=$request["limit"]?$request["limit"]:null;
        $returnList=D("member")->getList($map,"member_id desc",$limit);

        $this->assign("list",$returnList["list"]);
        $this->assign("page",$returnList["page"]);
        $this->assign("allNum",$returnList["allNum"]);
        $this->assign("pageNum",$returnList["pageNum"]);
        $this->display();
    }

}
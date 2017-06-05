<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class MemberController extends BaseController {
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
        if($request["submit"]=="export"){
            $this->export($map);
        }
        else{
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


    public function  export($map){
        $exportList=D("member")->exportList($map);
        $memberTitle=array("会员编号","会员名称","真实姓名","会员性别","手机号","QQ","账户金额","新增时间");
        $rowHeader = implode(",",$memberTitle)."\n";
        $data = iconv('utf-8','gb2312',$rowHeader);
        foreach($exportList as $key=>$value){
            $rowData=array();
            $rowData[]=$value["member_id"];
            $rowData[]=$value["member_name"];
            $rowData[]=$value["member_truename"];
            $rowData[]=$value["member_sex_name"];
            $rowData[]=$value["member_mobile"];
            $rowData[]=$value["member_qq"];
            $rowData[]=$value["member_money"];
            $rowData[]=$value["member_time_name"];
            $rowString="";
            $rowString=implode(",",$rowData)."\n";
            $rowString=iconv('utf-8','gb2312',$rowString);
            $data.=$rowString;
        }
        $filename = "会员数据".date('YmdHis').'.csv'; //设置文件名
        export_csv($filename,$data); //导出
    }




    public  function  add(){

        C('TOKEN_ON',false);
        if(IS_POST){
            try{
                $post=I("post.");
                $rules = array(
                    array('member_name'    ,  'require'  ,   '会员名称不能为空!' ),
                    array('member_name'    ,  ''         ,   '会员名称已经存在!',1,'unique'),
                    array('member_truename',  'require'  ,   '真实姓名不能为空!' ),
                   // array('member_avatar'  ,  'require'  ,   '会员头像不能为空!' ),
                    array('member_passwd'  ,  'require'  ,   '会员密码不能为空!' ),
                    array('member_sex'     ,  array(1,2) ,   '值的范围不正确！' ,2,'in'),

                    array('member_mobile'  ,  'require'  ,   '手机号不能为空!' ),
                    array('member_email'  ,  'require'  ,   '电子邮件不能为空!' ),
                    array('member_qq'  ,  'require'  ,   'QQ号不能为空!' ),
                );
                $data = array(
                    'member_name'       =>  $post["member_name"]      ? $post["member_name"]       : "",
                    'member_truename'   =>  $post["member_truename"]  ? $post["member_truename"]   : "",
                    'member_avatar'     =>  $post["member_avatar"]    ? $post["member_avatar"]     : "",
                    'member_sex'        =>  $post["member_sex"]       ? $post["member_sex"]        : 1,
                    'member_birthday'   =>  $post["member_birthday"]  ? $post["member_birthday"]   : "",
                    'member_passwd'     =>  $post["member_passwd"]    ? $post["member_passwd"]     : "",
                    'member_mobile'     =>  $post["member_mobile"]    ? $post["member_mobile"]     : "",
                    'member_email'      =>  $post["member_email"]     ? $post["member_email"]      : "",
                    'member_qq'         =>  $post["member_qq"]        ? $post["member_qq"]         : "",
                    'member_time'       =>  $post["member_time"]      ? $post["member_time"]       : time(),
                    'member_points'     =>  $post["member_points"]    ? $post["member_points"]     : 0,
                    'member_state'      =>  $post["member_state"]     ? $post["member_state"]      : 1,
                    'member_areaid'     =>  $post["member_areaid"]    ? $post["member_areaid"]     : 0,
                    'member_cityid'     =>  $post["member_cityid"]    ? $post["member_cityid"]     : 0,
                    'member_provinceid' =>  $post["member_provinceid"]? $post["member_provinceid"] : 0,
                    'member_areainfo'   =>  $post["member_areainfo"]  ? $post["member_areainfo"]   : 0,
                    'member_money'      =>  $post["member_money"]     ? $post["member_money"]      : 0,
                );
                if (!M("member")->validate($rules)->create($data)){

                    E(M("member")->getError());
                }
                $result=D("member")->add($data);
                if($result){
                    $this->success("新增成功!");
                }
                else{
                    E(D("member")->getError());
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




}
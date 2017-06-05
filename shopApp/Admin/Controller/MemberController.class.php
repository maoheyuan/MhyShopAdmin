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
        if(IS_POST){

            try{



                $rules = array(
                    array('verify','require','验证码必须！'), //默认情况下用正则进行验证
                    array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
                    array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
                    array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
                    array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
                );


                $User = M("User"); // 实例化User对象
                if (!$User->validate($rules)->create()){
                    // 如果创建失败 表示验证没有通过 输出错误提示信息
                    exit($User->getError());
                }else{
                    // 验证通过 可以进行其他数据操作
                }

                $rule = [
                    'name'  => 'require|max:25',
                    'age'   => 'number|between:1,120',
                    'email' => 'email',
                ];
                $msg = [
                    'name.require' => '名称必须',
                    'name.max'     => '名称最多不能超过25个字符',
                    'age.number'   => '年龄必须是数字',
                    'age.between'  => '年龄只能在1-120之间',
                    'email'        => '邮箱格式错误',
                ];
                $data = [
                    'name'  => 'thinkphp',
                    'age'   => 10,
                    'email' => 'thinkphp@qq.com',
                ];
                $validate = new Validate($rule, $msg);
                if(!$validate->check($data)){
                    E($validate->getError());
                }
                $result=D("member")->add($data);
                if($result){
                    $this->success("新增成功!");
                }
                else{
                    E($validate->getError());
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
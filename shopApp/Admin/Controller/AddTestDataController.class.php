<?php
namespace Admin\Controller;
use Think\Controller;
class AddTestDataController extends Controller {
    public function index(){


    }



    public  function  memberAdd($member=100){

        for($i=0;$i<=$member;$i++){
            $data=array();
            $data["member_name"]=$this->_string(4);
            $data["member_truename"]=$this->_string(5);
            $data["member_avatar"]=$this->_string(5)."png";
            $data["member_sex"]=mt_rand(1,2);
            $data["member_birthday"]=mt_rand(1000000000,1119999999);
            $data["member_passwd"]=md5(123456);
            $data["member_mobile"]="1354820358".mt_rand(0,9);
            $data["member_email"]=mt_rand(1000,9000000)."@qq.com";
            $data["member_qq"]=mt_rand(1000,9000000);
            $data["member_state"]=mt_rand(0,1);
            $data["member_money"]=mt_rand(0,100.00);
            $data["member_time"]=time();
            D("member")->add($data);
        }
    }


    public  function _string( $length = 5 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $string = "";
        for ( $i = 0; $i < $length; $i++ )
        {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
            $string .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $string;
    }
}
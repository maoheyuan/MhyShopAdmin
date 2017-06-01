<?php
// +----------------------------------------------------------------------
// | MhyShoopAdmin [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://maoheyuan.com All rights reserved.
// +----------------------------------------------------------------------
// | MIT
// +----------------------------------------------------------------------
// | Author: maoheyuan <maoheyuan@qq.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class PublicController extends Controller {

    public function login(){
        if(IS_POST){
            try{
                $post=I("post.");
                $userName=trim($post["adminName"]);
                if(!$userName){
                    E("用户名不能为空!");
                }
                $password=trim($post["password"]);
                if(!$password){
                    E("密码不能为空!");
                }
                $adminInfo=D("admin")->getInfoByUserName($userName);
                if(!$adminInfo){
                    E("用户不存在!");
                }
                if($adminInfo["admin_password"]!=md5($password)){
                    E("密码不正确!");
                }
                session("adminInfo",$adminInfo);
                //权限管理暂时没有开发
                $this->success("登录成功!",U('Index/index'));
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
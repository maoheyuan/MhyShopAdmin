<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class ConfigController extends BaseController {
    public function index(){
        C('TOKEN_ON',false);
            $tip="";
            if(IS_POST){
                $returnData=D("config")->configAdd();
                if($returnData["status"]==1){
                    $tip="更新成功!";
                }
                else{
                    $tip=$returnData["tip"];
                }
            }
            $returnList=D("config")->getList();
            $this->assign("list",$returnList);

            $this->assign("tip",$tip);
            $this->display();
        }









}
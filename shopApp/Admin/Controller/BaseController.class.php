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

class BaseController extends Controller {

    public  function _initialize(){

        if(!session('adminInfo')){
           $this->redirect(U("Public/login"));
        }



        
    }



    public function JqueryAjaxUpLoad(){

        C('TOKEN_ON',false);
        $returnData=array();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $returnData=array();
            $returnData["status"]=0;
            $returnData["msg"]="上传出错!".$upload->getError();
        }else{// 上传成功
            $returnData=array();
            $returnData["status"]=1;
            $returnData["msg"]="上传成功!";
            $returnData["fileName"]=$info["upfile"]["savepath"].$info["upfile"]["savename"];
        }

        header('Content-type: application/json');
        echo json_encode($returnData);
        exit;
    }

}
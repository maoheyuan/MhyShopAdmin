<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class ChartController extends BaseController {
    public function index(){
        $chartList=D("Chart")->getList();
        $this->assign("charList",$chartList);
        $this->display();
    }




}
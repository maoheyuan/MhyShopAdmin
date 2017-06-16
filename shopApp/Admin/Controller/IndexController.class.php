<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){


        $memberCount=D("member")->getCountByMap();
        $orderCount=D("order")->getCountByMap();
        $goodsCount=D("goods")->getCountByMap();
        $categoryCount=D("category")->getCountByMap();
        $orderGoodsCount=D("order_goods")->getCountByMap();
        $adminCount=D("admin")->getCountByMap();
        $this->assign("memberCount",$memberCount);
        $this->assign("orderCount",$orderCount);
        $this->assign("goodsCount",$goodsCount);
        $this->assign("categoryCount",$categoryCount);
        $this->assign("orderGoodsCount",$orderGoodsCount);
        $this->assign("adminCount",$adminCount);
        $this->display();
    }


}
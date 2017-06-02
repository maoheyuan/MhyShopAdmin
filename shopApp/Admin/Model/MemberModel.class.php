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

namespace Admin\Model;
use Think\Model;
class MemberModel extends Model {

    protected $tableName = 'member';


    public function getInfoByMemberName($memberName){
        $map=array();
        $map["member_name"]=$memberName;
        $memberInfo=$this->where($map)->find();
        return $memberInfo;
    }

    public  function  getList($map,$orderBy="member_id desc",$limit=25){
        $count      =$this->where($map)->count();
        $page       = new \Think\Page($count,$limit);
        $page->setConfig('theme',C("PAGE_THEME"));
        $show       = $page->show();
        $list = $this->where($map)->order($orderBy)->limit($page->firstRow.','.$page->listRows)->select();
        $returnData=array();
        $returnData["list"]=$list;
        $returnData["page"]=$show;
        $returnData["allNum"]=$count;
        $returnData["pageNum"]=count($list);
        return $returnData;
    }
}
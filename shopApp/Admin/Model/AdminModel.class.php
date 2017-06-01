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
class AdminModel extends Model {

    protected $tableName = 'admin';


    public function getInfoByUserName($adminName){
        $map=array();
        $map["admin_name"]=$adminName;
        $adminInfo=$this->where($map)->find();
        return $adminInfo;
    }


}
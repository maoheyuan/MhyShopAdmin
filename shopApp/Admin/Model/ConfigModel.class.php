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
class ConfigModel extends Model {

    protected $tableName = 'config';


    public  function  getList($map=array(),$orderBy="config_sort desc"){
        $configList = $this->where($map)->order($orderBy)->select();
        return $configList;
    }

    public  function  configAdd(){
        $configData=I("post.config","");
        if($configData==""){
            $this->returnData(0,"没有更新数据","");
        }

        foreach ($configData as $key=>$value){
            $updateMap=array();
            $updateMap["config_id"]=$key;
            $updateData=array();
            $updateData["config_value"]=$value;
            $result=$this->where($updateMap)->save($updateData);
            if($result===false){
                return $this->returnData(0,"修改失败!","");
            }
        }
        return $this->returnData(1,"修改成功!",array());
    }
    /***
     * 返回新增 修改 删除 操作数据
     * @param $status
     * @param $tip
     * @param $data
     * @return mixed
     */
    public function returnData($status,$tip,$data){
        $returnData=array();
        $returnData["status"]=$status;
        $returnData["tip"]=$tip;
        $returnData["data"]=$data;
        return $returnData;
    }
}
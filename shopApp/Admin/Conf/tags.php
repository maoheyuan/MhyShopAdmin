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

return array(
    //'view_filter' => array('Behavior\TokenBuild'),// 如果是3.2.1以下版本 令牌验证配置
    'view_filter' => array('Behavior\TokenBuildBehavior'), // 如果是3.2.1以上版本 令牌验证配置
);
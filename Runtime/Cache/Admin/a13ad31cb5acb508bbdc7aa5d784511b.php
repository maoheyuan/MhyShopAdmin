<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>mhy电商系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="/MhyShopAdmin/Public/Admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/MhyShopAdmin/Public/Admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/MhyShopAdmin/Public/Admin/css/base.css">
    <script src="/MhyShopAdmin/Public/Admin/js/jquery.min.js"></script>
    <script src="/MhyShopAdmin/Public/Admin/plug/laydate/laydate.js"></script>
    <script src="/MhyShopAdmin/Public/Admin/plug/layer/layer.js"></script>
    <script  src="/MhyShopAdmin/Public/Admin/plug/My97DatePicker/WdatePicker.js"></script>
    <script src="/MhyShopAdmin/Public/Admin/js/base.js"></script>

    <style type="text/css">
        .laydate_box, .laydate_box * {
            box-sizing:content-box;
        }
        .laydate-icon{
            height: 34px;
            line-height: 34px;
        }

        .Wdate {
            border: 1px solid #ccc !important;
        }
    </style>
</head>

<body id="body">


<!--

<div  class="navLeftBar">
    <div  class="list-group ">
        <a class="list-group-item  web_log"><img src="/MhyShopAdmin/Public/Admin/image/web_login.png" width="400%"></a>
    </div>
    <div  class="list-group">
   &lt;!&ndash;     <a class="list-group-item part-line " href="<?php echo U('Index/index');?>">
            <i class="fa fa-reorder pd5" aria-hidden="true"></i> 仪表盘
        </a>&ndash;&gt;

        <a class="list-group-item part-line" href="<?php echo U('Member/index');?>">
            <i class="fa fa-user pd5" aria-hidden="true"></i>会员管理
        </a>

        <a class="list-group-item " href="<?php echo U('Order/index');?>">
            <i class="fa fa-reorder pd5" aria-hidden="true"></i>订单管理
        </a>
        <a class="list-group-item" href="<?php echo U('gCate/index');?>">
            <i class="fa fa-tasks pd5" aria-hidden="true"></i>商品分类
        </a>
        <a class="list-group-item" href="<?php echo U('Goods/index');?>">
            <i class="fa fa-tasks pd5" aria-hidden="true"></i>商品管理
        </a>

        <a class="list-group-item" href="<?php echo U('Order/index');?>">
            <i class="fa fa-user pd5" aria-hidden="true"></i>统计管理
        </a>

        <a class="list-group-item" href="<?php echo U('Address/index');?>">
            <i class="fa fa-user pd5" aria-hidden="true"></i>地址管理
        </a>
    </div >

    <ul class="list-group">
        <li class="list-group-item ">
            <i class="fa fa-user" aria-hidden="true"></i> 会员中心
        </li>
    </ul>

</div>
-->

<form class="form-horizontal mt20" enctype="multipart/form-data" method="post" action="<?php echo U('admin/add');?>">

    <div class="form-group">
        <label for="admin_name" class="col-sm-2 control-label"><span aria-hidden="true">&times;</span>管理员名称：</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="管理员名称">
        </div>
    </div>


    <div class="form-group">
        <label for="admin_permission" class="col-sm-2 control-label ">管理员权限：</label>
        <div class="col-sm-8">
            <textarea  class="form-control" id="admin_permission"   name="admin_permission" placeholder="管理权限" rows="20"></textarea>

        </div>
    </div>


    <div class="form-group">
        <label for="admin_password" class="col-sm-2 control-label">管理员密码：</label>
        <div class="col-sm-8">
            <input  class="form-control" id="admin_password" name="admin_password" placeholder="管理员密码">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">超级管理员：</label>
        <div class="col-sm-8">
            <label class="radio-inline">
                <input type="radio" name="admin_is_super"  value="1" checked> 是
            </label>
            <label class="radio-inline">
                <input type="radio" name="admin_is_super"  value="0"> 否
            </label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class=" col-sm-8">
            <button type="submit" class="btn btn-primary">提交</button>
            <button type="reset" class="btn btn-default">重置</button>
        </div>
    </div>
</form>

<script src="/MhyShopAdmin/Public/admin/js/ajaxfileupload.js"></script>
<script type="text/javascript">
    $("#body").addClass("create-page");
</script>
</body>

</html>
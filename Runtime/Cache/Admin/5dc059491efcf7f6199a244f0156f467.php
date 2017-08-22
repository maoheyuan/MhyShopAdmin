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


<div  class="navLeftBar">
    <div  class="list-group ">
        <a class="list-group-item  web_log"><img src="/MhyShopAdmin/Public/Admin/image/web_login.png" width="400%"></a>
    </div>
    <div  class="list-group">
   <!--     <a class="list-group-item part-line " href="<?php echo U('Index/index');?>">
            <i class="fa fa-reorder pd5" aria-hidden="true"></i> 仪表盘
        </a>-->


        <a class="list-group-item part-line" href="<?php echo U('Index/index');?>">
            <i class="fa fa-user pd5" aria-hidden="true"></i>我的首页
        </a>

        <a class="list-group-item " href="<?php echo U('Admin/index');?>">
            <i class="fa fa-user pd5" aria-hidden="true"></i>管理员管理
        </a>
        <a class="list-group-item " href="<?php echo U('Member/index');?>">
            <i class="fa fa-user pd5" aria-hidden="true"></i>会员管理
        </a>

        <a class="list-group-item " href="<?php echo U('Order/index');?>">
            <i class="fa fa-reorder pd5" aria-hidden="true"></i>订单管理
        </a>
        <a class="list-group-item" href="<?php echo U('Category/index');?>">
            <i class="fa fa-database pd5" aria-hidden="true"></i>商品分类
        </a>
        <a class="list-group-item" href="<?php echo U('Goods/index');?>">
            <i class="fa fa-recycle pd5" aria-hidden="true"></i>商品管理
        </a>


        <a class="list-group-item" href="<?php echo U('Area/index');?>">
            <i class="fa fa-area-chart pd5" aria-hidden="true"></i>地区管理
        </a>
        <a class="list-group-item" href="<?php echo U('MemberAddress/index');?>">
            <i class="fa fa-university pd5" aria-hidden="true"></i>地址管理
        </a>
        <a class="list-group-item" href="<?php echo U('Banner/index');?>">
            <i class="fa fa-history pd5" aria-hidden="true"></i>轮播管理
        </a>

        <a class="list-group-item" href="<?php echo U('Config/index');?>">
            <i class="fa fa-cog fa-fw pd5" aria-hidden="true"></i>常用设置
        </a>
        <a class="list-group-item" href="<?php echo U('chart/index');?>">
            <i class="fa fa-calendar pd5" aria-hidden="true"></i>统计管理
        </a>

        <a class="list-group-item " href="<?php echo U('Admin/self');?>">
            <i class="fa fa-user pd5" aria-hidden="true"></i> 我的中心
        </a>

    </div >

</div>

<ol class="breadcrumb">
    <li>主页</li>
    <li>常用设置</li>
    <li class="active">常用设置列表</li>
    <div class="quit">
        <span type="button" >管理员:毛何远</span>
        <a href="#">[退出]</a>
    </div>
</ol>

<div style="background-color: #f8f8f8;border:1px solid #e7e7e7; text-align: right;padding-right:10px; ">

    <a  href="" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
</div>



<form class="form-horizontal  ml10" style="width: auto" enctype="multipart/form-data" method="post" action="<?php echo U('Admin/self');?>">

    <fieldset>
        <legend>基本设置</legend>
        <table class="table   ">

            <tbody><tr>
                <td width="120">角色<span aria-hidden="true">×</span></td>
                <td>
                    <input class="form-control" id="admin_role" name="admin_role" placeholder="角色" value="<?php echo ($adminInfo['admin_role']); ?>">

                </td>
            </tr><tr>
                <td width="120">名称<span aria-hidden="true">×</span></td>
                <td>
                    <input class="form-control" id="admin_name" name="admin_name" placeholder="名称" value="<?php echo ($adminInfo['admin_name']); ?>">

                </td>
            </tr><tr>
                <td width="120">手机号<span aria-hidden="true">×</span></td>
                <td>
                    <input class="form-control" id="admin_mobile" name="admin_mobile" placeholder="手机号" value="<?php echo ($adminInfo['admin_mobile']); ?>">

                </td>
            </tr><tr>
                <td width="120">QQ<span aria-hidden="true">×</span></td>
                <td>
                    <input class="form-control" id="admin_qq" name="admin_qq" placeholder="QQ" value="<?php echo ($adminInfo['admin_qq']); ?>">

                </td>
            </tr>

            </tbody></table>
    </fieldset>


    <fieldset>
        <legend>密码修改</legend>
        <table class="table   ">

            <tbody><tr>
                <td width="120">原密码<span aria-hidden="true">×</span></td>
                <td>
                    <input class="form-control" id="admin_password" name="admin_password" placeholder="原密码" >

                </td>
            </tr><tr>
                <td width="120">新秘密码<span aria-hidden="true">×</span></td>
                <td>
                    <input class="form-control" id="new_password" name="new_password" placeholder="新秘密码" >

                </td>
            </tr><tr>
                <td width="120">确认密码<span aria-hidden="true">×</span></td>
                <td>
                    <input class="form-control" id="r_new_password" name="r_new_password" placeholder="确认密码" >

                </td>
            </tr>   </tbody></table>
    </fieldset>

    <div style="background-color: #f5f5f5; text-align: right;padding-right:10px ">

        <button type="submit" class="btn btn-primary">提交</button>
        <button type="reset" class="btn btn-default">重置</button>
    </div>


</form>

</body>

</html>
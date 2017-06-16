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
    <script src="/MhyShopAdmin/Public/Admin/js/base.js"></script>
    <style type="text/css">
        .laydate_box, .laydate_box * {
            box-sizing:content-box;
        }
        .laydate-icon{
            height: 34px;
            line-height: 34px;
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

    </div >

    <ul class="list-group">
        <li class="list-group-item ">
            <i class="fa fa-user" aria-hidden="true"></i> 我的中心
        </li>
    </ul>
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


<form class="form-horizontal  ml10" style="width: auto" enctype="multipart/form-data" method="post" action="<?php echo U('Category/add');?>">

<fieldset>
        <legend>基本设置</legend>
        <table class="table   ">

            <tr>
                <td width="120">底部版权信息:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td width="120">备案号:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td width="120">统计代码:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td width="120">排序:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td>排序:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td>排序:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
        </table>
</fieldset>


    <fieldset>
        <legend>邮件设置</legend>
        <table class="table   ">

            <tr>
                <td width="120">邮件发送模式:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td width="120">SMTP服务器:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td width="120">SMTP 端口:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td width="120">邮箱帐号:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td width="120">邮箱密码:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
            <tr>
                <td width="120">收件邮箱地址:<span aria-hidden="true">&times;</span></td>
                <td>
                    <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">

                </td>
            </tr>
        </table>
    </fieldset>

    <div style="background-color: #f5f5f5; text-align: right;padding-right:10px ">

        <button type="submit" class="btn btn-primary">提交</button>
        <button type="reset" class="btn btn-default">重置</button>
    </div>


</form>

</body>

</html>
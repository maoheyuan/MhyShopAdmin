<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="height: 100%">
<head>
    <meta charset="utf-8">
    <title>主页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="/MhyShopAdmin/Public/Admin/css/bootstrap.min.css">

    <link rel="stylesheet" href="/MhyShopAdmin/Public/Admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/MhyShopAdmin/Public/Admin/css/base.css">
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
<body style="height: 100%; margin: 0">

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
    <li ><a href="<?php echo U('Index/index');?>">主页</a></li>
    <li class="active">首页统计</li>
    <div class="quit">
        <span type="button" >管理员:毛何远</span>
        <a href="#">[退出]</a>
    </div>
</ol>

<div style="background-color: #f8f8f8;border:1px solid #e7e7e7; text-align: right;padding-right:10px; ">

    <a  href="" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
</div>

<div id="container" style="height: 80%;width: 80%;margin: 10px auto;"></div>
<script src="/MhyShopAdmin/Public/Admin/plug/echarts/echarts.min.js"></script>
<script type="text/javascript">

    var dom = document.getElementById("container");
    var myChart = echarts.init(dom);
    var app = {};
    option = null;
    option = {
        title: {
            text: ''
        },
        tooltip: {},
        legend: {
            data:['常用功能统计']
        },
        xAxis: {
            data: ["会员","订单","分类","商品","管理员","订单商品"]
        },
        yAxis: {},
        series: [{
            name: '常用功能统计',
            type: 'bar',
            data: [<?php echo ($memberCount); ?>, <?php echo ($orderCount); ?>, <?php echo ($categoryCount); ?>, <?php echo ($goodsCount); ?>, <?php echo ($adminCount); ?>, <?php echo ($orderGoodsCount); ?>]
        }]
    };;
    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }

</script>
</body>

</html>
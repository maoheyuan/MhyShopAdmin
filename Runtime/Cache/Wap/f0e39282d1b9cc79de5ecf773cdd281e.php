<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>mhy商城-订单列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script src="/MhyShopAdmin/Public/Wap/plug/mui-master/dist/js/mui.min.js"></script>
    <!--标准mui.css-->
    <link rel="stylesheet" href="/MhyShopAdmin/Public/Wap/plug/mui-master/dist/css/mui.min.css">
    <!--App自定义的css-->
    <link rel="stylesheet" type="text/css" href="/MhyShopAdmin/Public/Wap/plug/mui-master/dist/css/app.css"/>
    <style>
        .mui-table h4,.mui-table h5,.mui-table .mui-h5,.mui-table .mui-h6,.mui-table p{
            margin-top: 0;
        }
        .mui-table h4{
            line-height: 21px;
            font-weight: 500;
        }

        .mui-table .oa-icon{
            position: absolute;
            right:0;
            bottom: 0;
        }
        .mui-table .oa-icon-star-filled{
            color:#f14e41;
        }

        .mui-checkbox.mui-left input[type=checkbox]{
            left:0 !important;
        }
        .mui-checkbox.mui-left label{

            padding-left: 32px;

        }

        .mui-input-group .mui-input-row:after {

            background-color: #ffffff !important;
        }


    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">mhy商城-订单列表</h1>
</header>

<div class="mui-content">
    <form class="mui-input-group">
    <ul class="mui-table-view  ">

        <li class="mui-table-view-cell">
            <div class="mui-table">
                <div class="mui-table-cell mui-col-xs-4">
                    <h4 class="mui-ellipsis-2">毛何远</h4>

                </div>
                <div class="mui-table-cell mui-col-xs-8 mui-text-right">
                    <h4 class="mui-ellipsis-2">13978021294</h4>

                </div>
            </div>
            <div class="mui-table">
                <div class="mui-table-cell mui-col-xs-12">
                    <h4 class="mui-ellipsis-2">收货地址:广东省深圳市龙岗区李郎29号</h4>
                </div>
            </div>


            <div class="mui-table">

                <div class="mui-table-cell mui-col-xs-4">

                    <div class="mui-input-row mui-checkbox mui-left">
                        <label>默认</label>
                        <input name="checkbox" value="Item 2" type="checkbox" checked="">
                    </div>
                </div>
           
                <div class="mui-table-cell mui-col-xs-4">
                    <span class="mui-icon mui-icon-compose" ></span>编辑
                </div>
                <div class="mui-table-cell mui-col-xs-4">
                    <span class="mui-icon mui-icon-close "  ></span>删除
                </div>


            </div>
        </li>


        <li class="mui-table-view-cell">
            <div class="mui-table">
                <div class="mui-table-cell mui-col-xs-4">
                    <h4 class="mui-ellipsis-2">毛何远</h4>

                </div>
                <div class="mui-table-cell mui-col-xs-8 mui-text-right">
                    <h4 class="mui-ellipsis-2">13978021294</h4>

                </div>
            </div>
            <div class="mui-table">
                <div class="mui-table-cell mui-col-xs-12">
                    <h4 class="mui-ellipsis-2">收货地址:广东省深圳市龙岗区李郎29号</h4>
                </div>
            </div>


            <div class="mui-table">

                <div class="mui-table-cell mui-col-xs-4">

                </div>

                <div class="mui-table-cell mui-col-xs-4">
                    <span class="mui-icon mui-icon-compose" ></span>编辑
                </div>
                <div class="mui-table-cell mui-col-xs-4">
                    <span class="mui-icon mui-icon-close "  ></span>删除
                </div>

            </div>
        </li>

        <li class="mui-table-view-cell">
            <div class="mui-table">
                <div class="mui-table-cell mui-col-xs-10">
                    <h4 class="mui-ellipsis-2">信息化推进办公室张彦合同付款信息化推进办公室张彦合同付款信息化推进办公室张彦合同付款</h4>
                    <h5>申请人：李四</h5>
                    <p class="mui-h6 mui-ellipsis">Hi，李明明，申请交行信息卡，100元等你拿，李明明，申请交行信息卡，100元等你拿，</p>
                </div>
                <div class="mui-table-cell mui-col-xs-2 mui-text-right">
                    <span class="mui-h5">12:25</span>

                </div>
            </div>
        </li>
    </ul>

    </form></div>

</body>

<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</html>
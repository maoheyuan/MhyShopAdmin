<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>mhy商城-主页</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
        <script src="/MhyShopAdmin/Public/Wap/plug/mui-master/dist/js/mui.min.js"></script>
		<!--标准mui.css-->
		<link rel="stylesheet" href="/MhyShopAdmin/Public/Wap/plug/mui-master/dist/css/mui.min.css">
		<!--App自定义的css-->
		<link rel="stylesheet" type="text/css" href="/MhyShopAdmin/Public/Wap/plug/mui-master/dist/css/app.css"/>


		<style>

            .mui-table-view .mui-media-object {
                line-height: 80px;
                max-width: 80px;
                height: 80px;
            }

            .mui-table-view-cell {
                padding: 11px 0px;

            }

            .mui-table-view-cell>a:not(.mui-btn) {
                margin: -11px 0px;

            }
            .mui-table-view-cell:after {
                left: 1px;
            }

            .mui-table-view-margin-top0 {
                margin-top: 0px !important;
                padding-top: 0px !important;
            }





		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">mhy商城-主页</h1>
		</header>





		<div class="mui-content">



            <ul class="mui-table-view mui-table-view-margin-top0"  >
                <li class="mui-table-view-cell mui-media mui-table-view-margin-top0">

                    <div id="slider" class="mui-slider" >
                        <div class="mui-slider-group mui-slider-loop">
                            <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
                            <div class="mui-slider-item mui-slider-item-duplicate">
                                <a href="#">
                                    <img src="../images/yuantiao.jpg">
                                </a>
                            </div>
                            <!-- 第一张 -->
                            <div class="mui-slider-item">
                                <a href="#">
                                    <img src="/MhyShopAdmin/Public/Wap/images/shuijiao.jpg">
                                </a>
                            </div>
                            <!-- 第二张 -->
                            <div class="mui-slider-item">
                                <a href="#">
                                    <img src="/MhyShopAdmin/Public/Wap/images/muwu.jpg">
                                </a>
                            </div>
                            <!-- 第三张 -->
                            <div class="mui-slider-item">
                                <a href="#">
                                    <img src="/MhyShopAdmin/Public/Wap/images/cbd.jpg">
                                </a>
                            </div>
                            <!-- 第四张 -->
                            <div class="mui-slider-item">
                                <a href="#">
                                    <img src="/MhyShopAdmin/Public/Wap/images/yuantiao.jpg">
                                </a>
                            </div>
                            <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
                            <div class="mui-slider-item mui-slider-item-duplicate">
                                <a href="#">
                                    <img src="/MhyShopAdmin/Public/Wap/images/shuijiao.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="mui-slider-indicator">
                            <div class="mui-indicator mui-active"></div>
                            <div class="mui-indicator"></div>
                            <div class="mui-indicator"></div>
                            <div class="mui-indicator"></div>
                        </div>
                    </div>



                </li>

                <li class="mui-table-view-cell">
                    <a href="#account" >派鲜优选生态放养土鸡蛋 8个装</a>
                </li>
                <li class="mui-table-view-cell mui-media">
                    <ul class="mui-table-view mui-grid-view mui-grid-9">
                        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">


                            <div class="mui-media-body">售价￥4.00</div>
                        </li>
                        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                            <div class="mui-media-body">库存100</div>
                        </li>
                        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                          <!--  <span class="mui-icon mui-icon-plusempty"></span>-->
                            <img src="/MhyShopAdmin/Public/Wap/images/cart.png" width="30px" height="30px"/>

                        </li>


                    </ul>
                </li>

                <li class="mui-table-view-cell">
                    <a href="#account" >内容介绍
                        <span class="mui-badge mui-badge-warning mui-badge-inverted">￥4.00</span>
                    </a>
                </li>

                <li class="mui-table-view-cell mui-media">
                    <img class="" src="/MhyShopAdmin/Public/Wap/images/cbd.jpg">
                    <img class="" src="/MhyShopAdmin/Public/Wap/images/cbd.jpg">
                    <img class="" src="/MhyShopAdmin/Public/Wap/images/cbd.jpg">
                    <img class="" src="/MhyShopAdmin/Public/Wap/images/cbd.jpg">
                    <img class="" src="/MhyShopAdmin/Public/Wap/images/cbd.jpg">
                    <img class="" src="/MhyShopAdmin/Public/Wap/images/cbd.jpg">
                    <img class="" src="/MhyShopAdmin/Public/Wap/images/cbd.jpg">
                </li>


            </ul>


        </div>


        <nav class="mui-bar mui-bar-tab" id="bottom-bar">
            <a class="mui-tab-item mui-active" href="<?php echo U('Index/index');?>">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item" href="<?php echo U('Category/index');?>">
                <span class="mui-icon mui-icon-email"></span>
                <span class="mui-tab-label">分类</span>
            </a>
            <a class="mui-tab-item" href="<?php echo U('Cart/index');?>">
                <span class="mui-icon mui-icon-contact"><span class="mui-badge">9</span></span>
                <span class="mui-tab-label">购物车</span>
            </a>
            <a class="mui-tab-item" href="<?php echo U('Member/index');?>">
                <span class="mui-icon mui-icon-gear"></span>
                <span class="mui-tab-label">我的</span>
            </a>
        </nav>

	</body>

	<script>

        mui('#bottom-bar').on('tap','a',function(){
            window.top.location.href=this.href;
        });
	</script>
</html>
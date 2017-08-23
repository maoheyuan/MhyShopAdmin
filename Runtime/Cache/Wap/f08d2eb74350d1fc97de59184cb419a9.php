<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>mhy商城-我的</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
        <script src="/MhyShopAdmin/Public/Wap/plug/mui-master/dist/js/mui.min.js "></script>

		<link rel="stylesheet" href="/MhyShopAdmin/Public/Wap/plug/mui-master/dist/css/mui.min.css">
		<style>
			html,
			body {
				background-color: #efeff4;
			}
			.mui-views,
			.mui-view,
			.mui-pages,
			.mui-page,
			.mui-page-content {
				position: absolute;
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
				width: 100%;
				height: 100%;
				background-color: #efeff4;
			}
			.mui-pages {
				top: 46px;
				height: auto;
			}
			.mui-scroll-wrapper,
			.mui-scroll {
				background-color: #efeff4;
			}
			.mui-page.mui-transitioning {
				-webkit-transition: -webkit-transform 300ms ease;
				transition: transform 300ms ease;
			}
			.mui-page-left {
				-webkit-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
			.mui-ios .mui-page-left {
				-webkit-transform: translate3d(-20%, 0, 0);
				transform: translate3d(-20%, 0, 0);
			}
			.mui-navbar {
				position: fixed;
				right: 0;
				left: 0;
				z-index: 10;
				height: 44px;
				background-color: #f7f7f8;
			}
			.mui-navbar .mui-bar {
				position: absolute;
				background: transparent;
				text-align: center;
			}
			.mui-android .mui-navbar-inner.mui-navbar-left {
				opacity: 0;
			}
			.mui-ios .mui-navbar-left .mui-left,
			.mui-ios .mui-navbar-left .mui-center,
			.mui-ios .mui-navbar-left .mui-right {
				opacity: 0;
			}
			.mui-navbar .mui-btn-nav {
				-webkit-transition: none;
				transition: none;
				-webkit-transition-duration: .0s;
				transition-duration: .0s;
			}
			.mui-navbar .mui-bar .mui-title {
				display: inline-block;
				width: auto;
			}
			.mui-page-shadow {
				position: absolute;
				right: 100%;
				top: 0;
				width: 16px;
				height: 100%;
				z-index: -1;
				content: '';
			}
			.mui-page-shadow {
				background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
				background: linear-gradient(to right, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
			}
			.mui-navbar-inner.mui-transitioning,
			.mui-navbar-inner .mui-transitioning {
				-webkit-transition: opacity 300ms ease, -webkit-transform 300ms ease;
				transition: opacity 300ms ease, transform 300ms ease;
			}
			.mui-page {
				display: none;
			}
			.mui-pages .mui-page {
				display: block;
			}
			.mui-page .mui-table-view:first-child {
				margin-top: 15px;
			}
			.mui-page .mui-table-view:last-child {
				margin-bottom: 30px;
			}
			.mui-table-view {
				margin-top: 20px;
			}
			
			.mui-table-view span.mui-pull-right {
				color: #999;
			}
			.mui-table-view-divider {
				background-color: #efeff4;
				font-size: 14px;
			}
			.mui-table-view-divider:before,
			.mui-table-view-divider:after {
				height: 0;
			}
			.head {
				height: 40px;
			}
			#head {
				line-height: 40px;
			}
			.head-img {
				width: 40px;
				height: 40px;
			}
			#head-img1 {
				position: absolute;
				bottom: 10px;
				right: 40px;
				width: 40px;
				height: 40px;
			}
			.update {
				font-style: normal;
				color: #999999;
				margin-right: -25px;
				font-size: 15px
			}
			.mui-fullscreen {
				position: fixed;
				z-index: 20;
				background-color: #000;
			}
			.mui-ios .mui-navbar .mui-bar .mui-title {
				position: static;
			}
			/*问题反馈在setting页面单独的css*/
			#feedback .mui-popover{
				position: fixed;
			}
			#feedback .mui-table-view:last-child {
			    margin-bottom: 0px;
			}
			#feedback .mui-table-view:first-child {
			    margin-top: 0px;
			}
			
			.mui-plus.mui-plus-stream .mui-stream-hidden{
				display: none !important;
			}
			
			/*问题反馈在setting页面单独的css==end*/
			
		</style>
		<link rel="stylesheet" type="text/css" href="../css/feedback.css" />
	</head>

	<body class="mui-fullscreen">
		<!--页面主结构开始-->
		<div id="app" class="mui-views">
			<div class="mui-view">
				<div class="mui-navbar">
				</div>
				<div class="mui-pages">

                    <!--页面标题栏开始-->
                    <div class="mui-navbar-inner mui-bar mui-bar-nav">
                        <button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
                            <span class="mui-icon mui-icon-left-nav"></span>
                        </button>
                        <h1 class="mui-center mui-title">mhy商城-我的</h1>
                    </div>
                    <!--页面标题栏结束-->
                    <!--页面主内容区开始-->
                    <div class="mui-page-content">
                        <div class="mui-scroll-wrapper">
                            <div class="mui-scroll">
                                <ul class="mui-table-view mui-table-view-chevron">
                                    <li class="mui-table-view-cell mui-media">
                                        <a class="mui-navigate-right" href="#account">
                                            <img class="mui-media-object mui-pull-left head-img" id="head-img" src="/MhyShopAdmin/Public/Wap/images/logo.png">
                                            <div class="mui-media-body">
                                                Hello MUI
                                                <p class='mui-ellipsis'>账号:maoheyuan</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="mui-table-view mui-table-view-chevron">
                                    <li class="mui-table-view-cell">
                                        <a href="#account" >我的余额
                                            <span class="mui-badge mui-badge-warning mui-badge-inverted">￥4.00</span>
                                        </a>
                                    </li>

                                </ul>


                                <ul class="mui-table-view mui-table-view-chevron">
                                    <li class="mui-table-view-cell">
                                        <a href="<?php echo U('Order/index');?>" class="mui-navigate-right">我的订单</a>
                                    </li>
                                    <li class="mui-table-view-cell">
                                        <a href="#notifications" class="mui-navigate-right">我的券卡</a>
                                    </li>
                                </ul>


                                <ul class="mui-table-view mui-table-view-chevron">
                                    <li class="mui-table-view-cell">
                                        <a href="<?php echo U('Address/index');?>" class="mui-navigate-right">我的地址</a>
                                    </li>
                                    <li class="mui-table-view-cell">
                                        <a href="#privacy" class="mui-navigate-right">我的收藏</a>
                                    </li>

                                    <li class="mui-table-view-cell">
                                        <a href="#general" class="mui-navigate-right">我的消息</a>
                                    </li>
                                </ul>
                                <ul class="mui-table-view mui-table-view-chevron">
                                    <li class="mui-table-view-cell">
                                        <a href="#about" class="mui-navigate-right">关于MUI <i class="mui-pull-right update">V3.1.0</i></a>
                                    </li>
                                </ul>
                                <ul class="mui-table-view">
                                    <li class="mui-table-view-cell" style="text-align: center;">
                                        <a>退出登录</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--页面主内容区结束-->
				</div>
			</div>
		</div>
		<!--页面主结构结束-->


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
        <script>
            mui('#bottom-bar').on('tap','a',function(){
                window.top.location.href=this.href;
            });
        </script>
	</body>
	<script>
		//初始化单页的区域滚动
		mui('.mui-scroll-wrapper').scroll();
		//分享操作
	</script>

</html>
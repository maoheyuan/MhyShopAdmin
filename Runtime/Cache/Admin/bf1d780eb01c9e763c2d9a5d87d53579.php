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
    <li>商品管理</li>
    <li class="active">商品列表</li>
    <div class="quit">
        <span type="button" >管理员:毛何远</span>
        <a href="#">[退出]</a>

    </div>
</ol>

<nav class="navbar navbar-default">
    <div class="container-fluid pdl0">
        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pdl0" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left pdl2">

                <div class="btn-group form-group" >
                    <!-- Standard button -->
                    <button type="button" class="btn btn-primary create" title="商品新增" data-url="<?php echo U('Goods/add');?>"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <!-- <button type="button" class="btn btn-warning edit"><i class="fa fa-edit" aria-hidden="true"></i></button>
                     &lt;!&ndash; Indicates a successful or positive action &ndash;&gt;
                     <button type="button" class="btn btn-danger"> <i class="fa fa-trash-o fa-lg"></i></button>-->


                </div>

           <!--     <div class="form-group">
                    <select name="timeType" class="form-control">
                        <option value="add_time"     <?php if($request['key'] == 'add_time' ): ?>selected<?php endif; ?>  >新增时间</option>
                        <option value="send_time"   <?php if($request['key'] == 'send_time' ): ?>selected<?php endif; ?> >发布时间</option>
                    </select>

                </div>-->
                <div class="form-group">
                    <input type="text" class="Wdate form-control  laydate-icon " placeholder="开始时间"
                           onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" name="startTime" value="<?php echo ($request['startTime']); ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="Wdate form-control  laydate-icon " placeholder="结束时间"
                           onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" name="endTime" value="<?php echo ($request['endTime']); ?>">
                </div>
                <div class="form-group">
                    <select name="limit" class="form-control">
                        <option value=""  >请选择</option>
                        <option value="20" <?php if($request['limit'] == 20 ): ?>selected<?php endif; ?> >20条</option>
                        <option value="30" <?php if($request['limit'] == 30 ): ?>selected<?php endif; ?> >30条</option>
                        <option value="50" <?php if($request['limit'] == 50 ): ?>selected<?php endif; ?> >50条</option>
                    </select>

                </div>
                <div class="form-group">
                    <select name="key" class="form-control">
                        <option value="">请选择</option>
                        <option value="goods_id"     <?php if($request['key'] == 'goods_id' ): ?>selected<?php endif; ?>  >商品编号</option>
                        <option value="goods_name"   <?php if($request['key'] == 'goods_name' ): ?>selected<?php endif; ?> >商品名称</option>
                        <option value="category_name" <?php if($request['key'] == 'category_name' ): ?>selected<?php endif; ?>>分类名称</option>
                    </select>

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="content" placeholder="内容" value="<?php echo ($request['content']); ?>">
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">查找</button>
                <button id="reset" type="button" class="btn btn-default">重置</button>
                <button type="submit" name="submit" value="export" class="btn btn-default">导出</button>
                <a  href="" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
            </form>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="ml5">
    <table class="table table-bordered table-hover ">
        <thead>
        <tr class="info">
            <th >编号</th>
            <th>商品名称</th>
            <th>分类名称</th>
            <th >规格名称</th>
            <th >默认图片</th>
            <th >商品货号</th>
            <th>商品状态</th>
            <th>商品推荐</th>
            <th>发布时间</th>
            <th>新增时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="row<?php echo ($vo['goods_id']); ?>">
                    <td><?php echo ($vo["goods_id"]); ?></td>
                    <td><?php echo ($vo["goods_name"]); ?></td>
                    <td><?php echo ($vo["category_name"]); ?></td>
                    <td><?php echo ($vo["spec_name"]); ?></td>
                    <td><?php echo ($vo["goods_image"]); ?></td>
                    <td><?php echo ($vo["goods_serial"]); ?></td>
                    <td><?php echo ($vo["goods_state_name"]); ?></td>
                    <td><?php echo ($vo["goods_commend_name"]); ?></td>
                    <td><?php echo ($vo["goods_starttime_name"]); ?>-<?php echo ($vo["goods_endtime_name"]); ?></td>
                    <td><?php echo ($vo["goods_add_time_name"]); ?></td>
                    <td>
                        <a  class="btn btn-warning  btn-sm update" title="商品修改" data-url="<?php echo U('Goods/update');?>?goods_id=<?php echo ($vo['goods_id']); ?>"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                        <a  class="btn btn-danger   btn-sm delete"  title="商品删除" data-id="<?php echo ($vo['goods_id']); ?>" data-url="<?php echo U('Goods/delete');?>?goods_id=<?php echo ($vo['goods_id']); ?>"> <i class="fa fa-trash-o fa-lg"></i></a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <nav class="Page textRight" aria-label="Page navigation">
        <?php echo ($page); ?>
    </nav>
</div>
<script type="application/javascript">
    (function($){
        $("#reset").click(function(){
            $('select[name="timeType"] option').each(function(){
                $(this).removeAttr("selected");
            });
            $('input[name="startTime"]').attr('value',"");
            $('input[name="endTime"]').attr('value',"");
            $('select[name="limit"] option').each(function(){
                    $(this).removeAttr("selected");
            });
            $('select[name="key"] option').each(function(){
                    $(this).removeAttr("selected");
            });
            $('input[name="content"]').attr('value',"");
        });
    })(jQuery)
</script>
</body>

</html>
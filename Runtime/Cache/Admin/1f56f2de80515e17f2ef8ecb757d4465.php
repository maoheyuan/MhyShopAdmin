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

        <a class="list-group-item part-line" href="<?php echo U('Member/index');?>">
            <i class="fa fa-user pd5" aria-hidden="true"></i>会员管理
        </a>

        <a class="list-group-item " href="<?php echo U('Order/index');?>">
            <i class="fa fa-reorder pd5" aria-hidden="true"></i>订单管理
        </a>
        <a class="list-group-item" href="<?php echo U('Category/index');?>">
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

<ol class="breadcrumb">
    <li><a href="<?php echo U('Index/index');?>">主页</a></li>
    <li>订单管理</li>
    <li class="active">订单列表</li>
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

                <div class="form-group">
                    <input type="text" class="form-control laydate-icon" placeholder="开始时间"
                           onclick="laydate({istime: true, format: 'YYYY-MM-DD'})" name="startTime" value="<?php echo ($request['startTime']); ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control laydate-icon" placeholder="结束时间"
                           onclick="laydate({istime: true, format: 'YYYY-MM-DD'})" name="endTime" value="<?php echo ($request['endTime']); ?>">
                </div>

                <div class="form-group">
                    <select name="order_status" class="form-control">
                        <option value=""  >请选择</option>
                        <option value="1" <?php if($request['order_status'] == 1 ): ?>selected<?php endif; ?> >未支付</option>
                        <option value="2" <?php if($request['order_status'] == 2 ): ?>selected<?php endif; ?> >已取消</option>
                        <option value="3" <?php if($request['order_status'] == 3 ): ?>selected<?php endif; ?> >已支付</option>

                        <option value="4" <?php if($request['order_status'] == 4 ): ?>selected<?php endif; ?> >已分拣</option>
                        <option value="5" <?php if($request['order_status'] == 5 ): ?>selected<?php endif; ?> >已配送</option>
                        <option value="6" <?php if($request['order_status'] == 6 ): ?>selected<?php endif; ?> >已完成</option>
                    </select>

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
                        <option value="order_sn"     <?php if($request['key'] == 'order_sn' ): ?>selected<?php endif; ?>  >订单编号</option>
                        <option value="order_consignee_mobile"   <?php if($request['key'] == 'order_consignee_mobile' ): ?>selected<?php endif; ?> >收货人手机号</option>
                        <option value="order_consignee_name" <?php if($request['key'] == 'order_consignee_name' ): ?>selected<?php endif; ?>>收货人姓名</option>
                        <option value="order_consignee_address" <?php if($request['key'] == 'order_consignee_address' ): ?>selected<?php endif; ?>>收货人地址</option>
                    </select>

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="content" placeholder="内容" value="<?php echo ($request['content']); ?>">
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">查找</button>
                <button id="reset" type="button" class="btn btn-default">重置</button>
                <button type="submit" name="submit" value="export" class="btn btn-default">导出</button>
            </form>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="ml5">
    <table class="table table-bordered table-hover ">
        <thead>
        <tr class="info">
            <th >编号ID</th>
            <th>订单编号</th>
            <th>订单价格</th>
            <th >支付类型</th>
            <th >支付状态</th>
            <th >订单状态</th>
            <th>优惠价格</th>
            <th>优惠券金额</th>
            <th>账户金额</th>
            <th>运费</th>
            <th>支付类型金额</th>

            <th>退货状态</th>
            <th>配送时间</th>
            <th>账户金额</th>
            <th>优惠价格</th>
            <th>收货人地址</th>
            <th>收货人手机</th>
            <th>收货人名称</th>
            <th>下单时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="row<?php echo ($vo['member_id']); ?>">

                    <td><?php echo ($vo["order_id"]); ?></td>
                    <td><?php echo ($vo["order_sn"]); ?></td>
                    <td><?php echo ($vo["order_money"]); ?></td>
                    <td><?php echo ($vo["order_pay_type_name"]); ?></td>
                    <td><?php echo ($vo["order_pay_status_name"]); ?></td>
                    <td><?php echo ($vo["order_status_name"]); ?></td>
                    <td><?php echo ($vo["order_preferential_privilege"]); ?></td>
                    <td><?php echo ($vo["order_coupon_money"]); ?></td>
                    <td><?php echo ($vo["order_account_money"]); ?></td>
                    <td><?php echo ($vo["order_freight"]); ?></td>
                    <td><?php echo ($vo["order_pay_type_money"]); ?></td>
                    <td><?php echo ($vo["order_return_status_name"]); ?></td>
                    <td><?php echo ($vo["order_delivery_time_name"]); ?></td>
                    <td><?php echo ($vo["order_account_money"]); ?></td>
                    <td><?php echo ($vo["order_preferential_privilege"]); ?></td>
                    <td><?php echo ($vo["order_consignee_address"]); ?></td>
                    <td><?php echo ($vo["order_consignee_mobile"]); ?></td>
                    <td><?php echo ($vo["order_consignee_name"]); ?></td>
                    <td><?php echo ($vo["order_add_time_name"]); ?></td>
                    <td>
                        <a  class="btn btn-warning  btn-sm update" title="会员修改" data-url="<?php echo U('member/update');?>?member_id=<?php echo ($vo['member_id']); ?>"><i class="fa fa-book" aria-hidden="true"></i> </a>
<!--                        <a  class="btn btn-danger   btn-sm delete"  title="会员删除" data-id="<?php echo ($vo['member_id']); ?>" data-url="<?php echo U('member/delete');?>?member_id=<?php echo ($vo['member_id']); ?>"> <i class="fa fa-trash-o fa-lg"></i></a>
                    --></td>
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
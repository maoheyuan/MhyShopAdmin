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

        </tr>
        </thead>
        <tbody>

                <tr id="row<?php echo ($orderInfo['order_id']); ?>">

                    <td><?php echo ($orderInfo["order_id"]); ?></td>
                    <td><?php echo ($orderInfo["order_sn"]); ?></td>
                    <td><?php echo ($orderInfo["order_money"]); ?></td>
                    <td><?php echo ($orderInfo["order_pay_type_name"]); ?></td>
                    <td><?php echo ($orderInfo["order_pay_status_name"]); ?></td>
                    <td><?php echo ($orderInfo["order_status_name"]); ?></td>
                    <td><?php echo ($orderInfo["order_preferential_privilege"]); ?></td>
                    <td><?php echo ($orderInfo["order_coupon_money"]); ?></td>
                    <td><?php echo ($orderInfo["order_account_money"]); ?></td>
                    <td><?php echo ($orderInfo["order_freight"]); ?></td>
                    <td><?php echo ($orderInfo["order_pay_type_money"]); ?></td>
                    <td><?php echo ($orderInfo["order_return_status_name"]); ?></td>
                    <td><?php echo ($orderInfo["order_delivery_time_name"]); ?></td>
                    <td><?php echo ($orderInfo["order_account_money"]); ?></td>
                    <td><?php echo ($orderInfo["order_preferential_privilege"]); ?></td>
                    <td><?php echo ($orderInfo["order_consignee_address"]); ?></td>
                    <td><?php echo ($orderInfo["order_consignee_mobile"]); ?></td>
                    <td><?php echo ($orderInfo["order_consignee_name"]); ?></td>
                    <td><?php echo ($orderInfo["order_add_time_name"]); ?></td>
                    <td>
                </tr>

        </tbody>
    </table>



    <table class="table table-bordered table-hover ">
        <thead>
        <tr class="info">
            <th >编号ID</th>
            <th>商品名称</th>
            <th>商品数量</th>
            <th >下单时间</th>
            <th >会员名称</th>
            <th >规格/单位</th>
            <th>已退货数量</th>
            <th>优惠价格</th>
            <th>实付金额</th>
            <th>进货价</th>
        </tr>
        </thead>
        <tbody>


        <?php if(is_array($orderGoodsList)): $i = 0; $__LIST__ = $orderGoodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="row1<?php echo ($orderInfo['order_id']); ?>">

                <td><?php echo ($vo["ogoods_id"]); ?></td>
                <td><?php echo ($vo["ogoods_goods_name"]); ?></td>
                <td><?php echo ($vo["ogoods_num"]); ?></td>
                <td><?php echo ($vo["ogoods_add_time"]); ?></td>
                <td><?php echo ($vo["ogoods_member_id"]); ?></td>
                <td><?php echo ($vo["ogoods_unit"]); ?></td>
                <td><?php echo ($vo["ogoods_return_num"]); ?></td>
                <td><?php echo ($vo["ogoods__money"]); ?></td>
                <td><?php echo ($vo["ogoods_real_pay_money"]); ?></td>
                <td><?php echo ($vo["ogoods_buying_price"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>


        </tbody>
    </table>
</div>
<script type="application/javascript">
    $("#body").addClass("create-page");
    (function($){
        $("#reset").click(function(){
            $('input[name="startTime"]').attr('value',"");
            $('input[name="endTime"]').attr('value',"");

            $('select[name="order_status"] option').each(function(){
                $(this).removeAttr("selected");
            });

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
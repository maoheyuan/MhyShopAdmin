<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Hello MUI</title>
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
    <li>主页</li>
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

                <div class="btn-group form-group" >
                    <!-- Standard button -->
                    <button type="button" class="btn btn-primary create" title="订单新增" data-url="./add.html"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <!-- <button type="button" class="btn btn-warning edit"><i class="fa fa-edit" aria-hidden="true"></i></button>
                     &lt;!&ndash; Indicates a successful or positive action &ndash;&gt;
                     <button type="button" class="btn btn-danger"> <i class="fa fa-trash-o fa-lg"></i></button>-->

                </div>
                <div class="form-group">
                    <input type="text" class="form-control laydate-icon" placeholder="开始时间" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                </div>
                <div class="form-group">

                    <input type="text" class="form-control laydate-icon" placeholder="结束时间" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                </div>
                <div class="form-group">
                    <select name="key" class="form-control">
                        <option value="orderSn">订单编号</option>
                        <option value="memberId">会员编号</option>
                        <option value="name">收货人名称</option>
                        <option value="mobile">收货人手机号</option>
                    </select>

                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="内容">
                </div>
                <button type="submit" class="btn btn-primary">查找</button>
                <button type="submit" class="btn btn-default">导出</button>
            </form>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="ml5">
    <table class="table table-bordered table-hover ">
        <thead>
        <tr class="info">
            <th><input id="select-all" type="checkbox"></th>
            <th >编号</th>
            <th>标题</th>
            <th>类型</th>
            <th > 流程状态</th>
            <th >负责人</th>
            <th >创建时间</th>
            <th>创建人</th>
            <th>最后修改人</th>
            <th>最后修改时间</th>
            <th>上级卡片</th>
            <th>解决时间</th>
            <th>操作</th>
        </tr>
        </thead>



        <tbody>
        <tr>
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm update" title="分类修改" data-url="./update.html?id="><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger   btn-sm delete"  title="分类删除"  data-url="./delete.html?id="> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>


        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>            <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        <tr >
            <td><input  type="checkbox"></td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>快速新建卡片</td>
            <td>
                <a  class="btn btn-warning  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                <a  class="btn btn-danger  btn-sm"> <i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
    <nav class="Page" aria-label="Page navigation ">


        <ul class="pagination pull-right">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">上页</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">下页</span>
                </a>
            </li>
        </ul>
        <span class="row-num">本页100条，总数500条</span>
    </nav>


</div>

</body>

</html>
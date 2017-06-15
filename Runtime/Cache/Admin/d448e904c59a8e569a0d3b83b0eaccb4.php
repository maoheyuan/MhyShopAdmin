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

<form class="form-horizontal mt20" enctype="multipart/form-data" method="post" action="<?php echo U('Banner/add');?>">
    <div class="form-group">
        <label for="banner_category" class="col-sm-2 control-label">所属产品分类：<span aria-hidden="true">&times;</span></label>
        <div class="col-sm-8">
            <select class="form-control" name="banner_category" id="banner_category">
                <option value="0">请选择分类</option>
                <?php if(is_array($categoryList)): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['category_id']); ?>" <?php if($bannerInfo['banner_category'] == $vo['category_id']): ?>selected<?php endif; ?> ><?php echo ($vo['category_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="banner_name" class="col-sm-2 control-label">名称：<span aria-hidden="true">&times;</span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="banner_name" name="banner_name" placeholder="名称" value="<?php echo ($bannerInfo['banner_name']); ?>">
        </div>
    </div>


    <div class="form-group">
        <label  class="col-sm-2 control-label">分类图片：</label>
        <div class="col-sm-8">
            <button type="button" class="btn btn-primary" id="upload">上传</button>
            <input id="fileToUpload" style="display: none" type="file" name="upfile">
            <input id="banner_image"  type="hidden" name="banner_image"  value="<?php echo ($bannerInfo['banner_image']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label  class="col-sm-2 control-label"></label>
        <div class="col-sm-8">
            <img id="uploadImage" class="img-rounded" alt="140x140" src="/MhyShopAdmin/Public/Uploads/<?php echo ($bannerInfo['banner_image']); ?>" style="width: 140px;height: 140px;">
        </div>
    </div>
    <div class="form-group">

        <label for="banner_start_time" class="col-sm-2 control-label">发布开始时间：</label>
        <div class="col-sm-8">
            <input type="text" value="<?php echo ($bannerInfo['banner_start_time']); ?>" id="banner_start_time" name="banner_start_time" class="col-sm-3 form-control laydate-icon" placeholder="发布开始时间" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
        </div>

    </div>


    <div class="form-group">

        <label for="banner_end_time" class="col-sm-2 control-label">发布结束时间：</label>

        <div class="col-sm-8">
            <input type="text"  value="<?php echo ($bannerInfo['banner_end_time']); ?>" id="banner_end_time" name="banner_end_time" class="col-sm-3 form-control laydate-icon" placeholder="发布结束时间" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
        </div>
    </div>

    <div class="form-group">
        <label  class="col-sm-2 control-label">状态：</label>
        <div class="col-sm-8">
            <label class="radio-inline">
                <input type="radio" name="banner_status"  value="1" <?php if($bannerInfo['banner_status'] == 1): ?>checked<?php endif; ?>> 启用
            </label>
            <label class="radio-inline">
                <input type="radio" name="banner_status"  value="2" <?php if($bannerInfo['banner_status'] == 2): ?>checked<?php endif; ?>> 禁用
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="banner_sort" class="col-sm-2 control-label">排序：</label>
        <div class="col-sm-8">
            <input  class="form-control" id="banner_sort" name="banner_sort" placeholder="排序" value="<?php echo ($bannerInfo['banner_sort']); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class=" col-sm-8">
            <button type="submit" class="btn btn-primary">提交</button>
            <button type="reset" class="btn btn-default">重置</button>
        </div>
    </div>
</form>

<script src="/MhyShopAdmin/Public/admin/js/ajaxfileupload.js"></script>
<script type="text/javascript">
    $("#body").addClass("create-page");
    $(function(){
        //点击打开文件选择器
        $("#upload").on('click', function() {
            $('#fileToUpload').click();
        });
        //选择文件之后执行上传
        $('#fileToUpload').live('change', function() {
            $.ajaxFileUpload({
                url:'<?php echo U("Member/JqueryAjaxUpload");?>',
                secureuri:false,
                fileElementId:'fileToUpload',//file标签的id
                dataType: 'json',//返回数据的类型
                data:{name:'logan'},//一同上传的数据
                success: function (data, status) {
                    //把图片替换
                    if(data.status==1){
                        $("#uploadImage").attr("src", "/MhyShopAdmin/Public/Uploads/"+data.fileName);
                        $("#banner_image").val(data.fileName);
                    }
                    else{
                        alert(data.msg);
                    }
                },
                error: function (data, status, e) {
                    alert(e);
                }
            });
        });
    });
</script>
</body>

</html>
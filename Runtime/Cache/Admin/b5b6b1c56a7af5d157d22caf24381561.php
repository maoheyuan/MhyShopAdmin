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

<form class="form-horizontal mt20" enctype="multipart/form-data" method="post" action="<?php echo U('Category/add');?>">


    <div class="form-group">
        <label for="category_parent_id" class="col-sm-2 control-label">上级分类：<span aria-hidden="true">&times;</span></label>
        <div class="col-sm-8">
            <select class="form-control" name="category_parent_id" id="category_parent_id">
                <?php if($categoryInfo != '' ): ?><option value="<?php echo ($categoryInfo['category_id']); ?>"><?php echo ($categoryInfo["category_name"]); ?></option>
                <?php else: ?>
                    <option value="0">一级分类</option><?php endif; ?>



            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="category_name" class="col-sm-2 control-label">分类名称：<span aria-hidden="true">&times;</span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="名称">
        </div>
    </div>





    <div class="form-group">
        <label  class="col-sm-2 control-label">分类图片：</label>
        <div class="col-sm-8">
            <button type="button" class="btn btn-primary" id="upload">上传</button>
            <input id="fileToUpload" style="display: none" type="file" name="upfile">
            <input id="member_avatar" style="display: none" type="hidden" name="category_image_path">
        </div>
    </div>

    <div class="form-group">
        <label  class="col-sm-2 control-label"></label>
        <div class="col-sm-8">
            <img    id="uploadImage"
                    class="img-rounded" alt="140x140"
                    src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNWMxZjlmNGQzNiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1YzFmOWY0ZDM2Ij48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3NC44Ij4xNDB4MTQwPC90ZXh0PjwvZz48L2c+PC9zdmc+"
                    data-holder-rendered="true"
                    style="width: 140px;height: 140px;">
        </div>
    </div>


    <div class="form-group">
        <label for="category_sort" class="col-sm-2 control-label">排序：</label>
        <div class="col-sm-8">
            <input  class="form-control" id="category_sort" name="category_sort" placeholder="排序" value="10">
        </div>
    </div>

    <div class="form-group">
        <label  class="col-sm-2 control-label">状态：</label>
        <div class="col-sm-8">
            <label class="radio-inline">
                <input type="radio" name="category_status"  value="1" checked> 启用
            </label>
            <label class="radio-inline">
                <input type="radio" name="category_status"  value="2"> 禁用
            </label>
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
                        $("#member_avatar").val(data.fileName);
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
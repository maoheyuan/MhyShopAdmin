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

<form class="form-horizontal mt20" enctype="multipart/form-data" method="post" action="<?php echo U('Member/update');?>">

    <div class="form-group">
        <label for="member_name" class="col-sm-2 control-label"><span aria-hidden="true">&times;</span>名称：</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="member_name" name="member_name" placeholder="名称" value="<?php echo ($memberInfo['member_name']); ?>">
        </div>
    </div>


    <div class="form-group">
        <label for="member_truename" class="col-sm-2 control-label text-muted">真实姓名：</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="member_truename"  name="member_truename" placeholder="真实姓名" value="<?php echo ($memberInfo['member_truename']); ?>">
        </div>
    </div>


    <div class="form-group">
        <label for="member_money" class="col-sm-2 control-label">会员密码：</label>
        <div class="col-sm-8">
            <input  class="form-control" type="password" id="member_passwd" name="member_passwd" placeholder="会员密码"  value="<?php echo ($memberInfo['member_passwd']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">性别：</label>
        <div class="col-sm-8">
            <label class="radio-inline">
                <input type="radio" name="member_sex"  value="1" <?php if($memberInfo['member_sex'] == 1): ?>checked<?php endif; ?> > 女
            </label>
            <label class="radio-inline">
                <input type="radio" name="member_sex"  value="2" <?php if($memberInfo['member_sex'] == 2): ?>checked<?php endif; ?>> 男
            </label>
        </div>
    </div>


    <div class="form-group">
        <label  class="col-sm-2 control-label">图片：</label>
        <div class="col-sm-8">
            <button type="button" class="btn btn-primary" id="upload">上传</button>
            <input id="fileToUpload" style="display: none" type="file" name="upfile">
            <input id="member_avatar"  type="hidden" name="member_avatar" value="<?php echo ($memberInfo['member_avatar']); ?>">
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
        <label for="member_mobile" class="col-sm-2 control-label">手机号：</label>
        <div class="col-sm-8">
            <input  class="form-control" id="member_mobile" name="member_mobile" placeholder="手机号" value="<?php echo ($memberInfo['member_mobile']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="member_qq" class="col-sm-2 control-label"> 	QQ：</label>
        <div class="col-sm-8">
            <input  class="form-control" id="member_qq"  name="member_qq" placeholder="QQ"  value="<?php echo ($memberInfo['member_qq']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="member_mobile" class="col-sm-2 control-label">Email：</label>
        <div class="col-sm-8">
            <input  class="form-control" id="member_email" name="member_email" placeholder="Email"  value="<?php echo ($memberInfo['member_email']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="member_money" class="col-sm-2 control-label">金额：</label>
        <div class="col-sm-8">
            <input  class="form-control" id="member_money" name="member_money" placeholder="金额" value="<?php echo ($memberInfo['member_money']); ?>" >
        </div>
    </div>

    <div class="form-group">
        <label  class="col-sm-2 control-label">状态：</label>
        <div class="col-sm-8">
            <label class="radio-inline">
                <input type="radio" name="member_state"  value="0" <?php if($memberInfo['member_state'] == 0): ?>checked<?php endif; ?> > 启用
            </label>
            <label class="radio-inline">
                <input type="radio" name="member_state"  value="1" <?php if($memberInfo['member_state'] == 1): ?>checked<?php endif; ?> > 禁用
            </label>
        </div>
    </div>

    <input type="hidden" name="member_id" value="<?php echo ($memberInfo['member_id']); ?>">
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
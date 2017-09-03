<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加权限 - 权限节点管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<center>
<article class="page-container">
	<input type="hidden" value="{{$admin_id}}" id="admin_id"/>
	<div class="formControls col-xs-8 col-sm-9">
		<dl class="permission-list">
			<dt>
				<label>已分配角色</label>
			</dt>
			<dd>
				<dl class="cl permission-list2">
					<dt id="have">
					@foreach($nodeData['has'] as $val)
						<label class="">
							<input type="checkbox" value="{{$val['role_id']}}" name="has" id="user-Character-0-0" checked="checked">
							{{$val['role_name']}}</label>
					@endforeach
					</dt>
				</dl>
			</dd>
		</dl>
		<dl class="permission-list">
			<dt>
				<label>未分配角色</label>
			</dt>
			<dd>
				<dl class="cl permission-list2">
					<dt id="none">
					@foreach($nodeData['no'] as $val)
						<label class="">
							<input type="checkbox" value="{{$val['role_id']}}" name="no" id="user-Character-1-0">
							{{$val['role_name']}}</label>
					@endforeach
					</dt>		
				</dl>
			</dd>
		</dl>
	</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="button" class="btn btn-success radius" id="link"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
</article>
</center>


<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:4,
				maxlength:16
			},
			password:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			sex:{
				required:true,
			},
			phone:{
				required:true,
				isPhone:true,
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "xxxxxxx" ,
				success: function(data){
					layer.msg('添加成功!',{icon:1,time:1000});
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<script type="text/javascript">
	$(function(){
		$("#link").click(function(){
			var admin_id = $("#admin_id").val();
			
			var has = '';
			var no = '';
			$("input[name='has']:checked").each(function(){
				has = has+','+$(this).val();
			});
			$("input[name='no']:checked").each(function(){
				no = no+','+$(this).val();
			});
			has = has.substr(1);
			no = no.substr(1);
			$.ajax({
				type: 'get',
				url: 'setrole',
				data: {has:has,no:no,admin_id:admin_id},
				dataType: 'json',
				success: function(result){
					if(result == 0){
						alert("分配权限失败");
						return false;
					}else{
						var have = '';
						var none = '';
						$.each(result.has,function(k,v){
							have = have+'<span> <input type="checkbox" name="has" value="'+v.role_id+'" checked="checked"> '+v.role_name+'</span>';
						})
						$.each(result.no,function(kk,vv){
							none = none+'<span> <input type="checkbox" name="no" value="'+vv.role_id+'"> '+vv.role_name+'</span>'
						})
						$("#none").html(none);
						$("#have").html(have);	
					}
				}
			});
		});
	})
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
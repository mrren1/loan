<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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
<!--/meta 作为公共模版分离出去-->

<div class="page-container">
	</div>
	
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">	
				<th width="100">用户名</th>
				<th width="40">用户照片</th>
				<th width="40">身份证照片</th>
				<th width="40">驾驶证</th>
				<th width="40">房产证</th>
				<th width="40">私人照片</th>
			</tr>
		</thead>
		<tbody>
		<div class="container">

<?php //var_dump($member_msg);die; ?>
		@foreach ($member_msg as $member_msg)
			<tr class="text-c">
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">{{ $member_msg->message_name  }}</u></td>
				<td>
				@if($member_msg->message_idcard!='')
					<img src="uploads/{{ $member_msg->message_idcard }}" height="90" alt="">
				@else
					未上传
				@endif
				</td>
				<td>
				@if($member_msg->message_photo!='')
					<img src="uploads/{{ $member_msg->message_photo }}" height="90" alt="">
				@else
					未上传
				@endif
				</td>
				<td>
				@if($member_msg->message_jiacard!='')
					<img src="uploads/{{ $member_msg->message_jiacard }}" height="90" alt="">
				@else
					未上传
				@endif
				</td>
				<td>
				@if($member_msg->message_fangcard!='')
					<img src="uploads/{{ $member_msg->message_fangcard }}" height="90" alt="">
				@else
					未上传
				@endif
				</td>
				<td>
				@if($member_msg->private_photo!='')
					<img src="uploads/{{ $member_msg->private_photo }}" height="90" alt="">
				@else
					未上传
				@endif
				</td>
				
			</tr>
		 @endforeach
		 <tr>
		 	<td>照片审核状态：</td>
		 	<td><input type="text" class="input-text" placeholder="1通过 || 0未通过" class="mpm_status" id="mpm_status"   value="" ></td>
		 	<td><input type="text" class="input-text" placeholder="1通过 || 0未通过" class="mpm_status" id="mpm_status1"  value="" ></td>
		 	<td><input type="text" class="input-text" placeholder="1通过 || 0未通过" class="mpm_status" id="mpm_status2"  value="" ></td>
		 	<td><input type="text" class="input-text" placeholder="1通过 || 0未通过" class="mpm_status" id="mpm_status3"  value="" ></td>
		 	<td><input type="text" class="input-text" placeholder="1通过 || 0未通过" class="mpm_status" id="mpm_status4"  value="" ></td>
		 </tr>
		</div>

		</tbody>	
	</table>
	</div>
</div>

</head>
<body>
<article class="page-container">
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<a href="javascript:;" ><input class="btn btn-primary radius" type="button"  onclick="admin_mpm_status_do(this,{{$_GET['message_id']}})" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"></a>
			</div>
		</div>
	<!-- </form> -->
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
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
	
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
			uploadfile:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
var a = "<font color=red>提示:30秒之内不点击提交按钮或打开审核页面30秒之后页面将自动刷新!!!</font>";
	alert(a);
/*填写用户照片--审核状态-- 1pass ,0 out*/
function admin_mpm_status_do(obj,id){
	var mpm_status = document.getElementById("mpm_status").value;
	var mpm_status1 = document.getElementById("mpm_status1").value;
	var mpm_status2 = document.getElementById("mpm_status2").value;
	var mpm_status3 = document.getElementById("mpm_status3").value;
	var mpm_status4 = document.getElementById("mpm_status4").value;
	
	console.log(mpm_status)
	layer.confirm("确认要修改---<font color=red>审核状态</font>---吗？",function(index){
		$.ajax({
			type: 'GET',
			data:"id="+id+"&mpm_status="+mpm_status+"&mpm_status1="+mpm_status1+"&mpm_status2="+mpm_status2+"&mpm_status3="+mpm_status3+"&mpm_status4="+mpm_status4,
			url: 'admin_mpm_status_do',
			dataType: 'json',
			success: function(data){

				layer.msg('修改完成！！！',{icon: 3,time:1000});
				
			},
			error:function(data) {
				// .msg
				console.log(data);
			},
		});		
	});
}
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
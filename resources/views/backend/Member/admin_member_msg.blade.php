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
<title>会员管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 积分列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加积分','sign_add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加积分</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="100">用户名</th>
				<th width="40">用户照片</th>
				<th width="40">身份证照片</th>
				<th width="40">驾驶证</th>
				<th width="40">房产证</th>
				<th width="40">私人照片</th>
				<th width="100">审核照片</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<div class="container">

<?php //var_dump($member_msg);die; ?>
		@foreach ($member_msg as $member_msg)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
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
				<td>
				<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a title="审核照片请按顺序填写照片的状态，1为通过，0为不通过" href="javascript:;" onclick="member_redact('编辑照片状态','admin_mpm_status?message_id={{ $member_msg->message_id }}','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 编辑照片状态</a></span></div></td>
				<td class="td-status"><span class="label label-success radius">@if ( $member_msg->message_stars === '1,1,1,1,1' ) 审核通过 @elseif( strpos( $member_msg->message_stars,"0" ) !== false )<span class="label label-defaunt radius">审核未通过 </span> @else 未审核 @endif</span></td>
				<td class="td-manage">@if( $member_msg->message_stars == '1,1,1,1,1' )<a class="manage" style="text-decoration:none" onClick="member_stop(this,'{{ $member_msg->message_id }}')" href="javascript:;" title="点击改为审核未通过">@elseif( strpos( $member_msg->message_stars,"0" ) !== false )<a class="manage" style="text-decoration:none" onClick="member_start(this,'{{ $member_msg->message_id }}')" href="javascript:;" title="点击改为审核通过">@else<a class="manage" style="text-decoration:none" onClick="member_start(this,'{{ $member_msg->message_id }}')" href="javascript:;" title="点击改为审核通过">@endif<i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		 @endforeach
		</div>
		 

		</tbody>	
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
	
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-照片审核编辑*/
function member_redact(title,url,w,h){
	layer_show(title,url,w,h);
	setTimeout(reload,1000*20);// 设定 20秒后 执行 刷新当前页面
}
function reload(){
	window.location.reload();//刷新当前页面
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-改为未审核状态*/
function member_stop(obj,id){
	layer.confirm("确认要改为---<font color=red>审核未通过</font>---吗？",function(index){
		$.ajax({
			type: 'POST',
			data:"id="+id,
			url: 'admin_member_stop',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,'+id+')" href="javascript:;" title="点击改为审核通过"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">审核未通过</span>');
				$(obj).remove();
				layer.msg('审核未通过!！',{icon: 5,time:1000});
			},
			error:function(data) {
				// .msg
				console.log(data);
			},
		});		
	});
}

/*用户-通过审核*/
function member_start(obj,id){
	layer.confirm('确认要改为---<font color=red>审核通过!!!</font>---吗？',function(index){
		$.ajax({
			type: 'POST',
			data:"id="+id,
			url: 'admin_member_start',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,'+id+')" href="javascript:;" title="点击改为审核未通过"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">审核通过</span>');
				$(obj).remove();
				layer.msg('审核通过！',{icon: 6,time:1000});
			},
			error:function(data) {
				// .msg
				console.log(data);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script> 
</body>
</html>

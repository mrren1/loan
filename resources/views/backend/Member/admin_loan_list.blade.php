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
<title>贷款管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 贷款管理 <span class="c-gray en">&gt;</span> 贷款列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加积分','sign_add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加积分</a></span> <span class="r">共有数据：<strong>{{$setloancount}}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th>贷款ID</th>
				<th>用户ID</th>
				<th>贷款截止时间</th>
				<th>贷款金额</th>
				<th>贷款利息</th>
				<th>贷款最低额度</th>
				<th>借款金额</th>
				<th>贷款类型</th>
				<th>联系人</th>
				<th>联系电话</th>
				<th>贷款状态</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<div class="container">
		@foreach($setloanData as $key => $val)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$val['lend_id']}}</td>
				<td>{{$val['user_id']}}</td>
				<td>{{$val['lend_time']}}</td>
				<td>{{$val['lend_money']}}</td>
				<td>{{$val['lend_interest']}}</td>
				<td>{{$val['lend_lack']}}</td>
				<td>{{$val['lend_used']}}</td>
				<td>{{$val['lend_type']}}</td>
				<td>{{$val['lend_person']}}</td>
				<td>{{$val['lend_phone']}}</td>
				<td class="td-status">
					@if ($val['lend_status'] == 1 ) 
						<span class="label label-success radius">审核通过</span> 
					@elseif($val['lend_status'] == 2 )
						<span class="label radius" style="background:red">审核未通过</span> 
					@else 
						<span class="label label-defaunt radius">未审核</span> 
					@endif</span>
				</td>
				<td class="td-manage">
					<a class="manage" style="text-decoration:none" onClick="admin_loan_list_start(this,'')" href="javascript:;" title="点击改为审核通过"><i class="Hui-iconfont">&#xe6e1;</i></a>&nbsp;&nbsp;&nbsp; 
					<a class="manage" style="text-decoration:none" onClick="loan_list_stop(this,'')" href="javascript:;" title="点击改为审核未通过"><i class="Hui-iconfont">&#xe631;</i></a>&nbsp;&nbsp;&nbsp; 
					<!-- <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a> -->
				</td>
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
/*贷款-改为未审核状态*/
function loan_list_stop(obj,id){
	layer.confirm("确认要改为---<font color=red>审核未通过</font>---吗？",function(index){
		$.ajax({
			type: 'POST',
			data:"id="+id,
			url: 'admin_loan_list_stop',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_loan_list_start(this,'+id+')" href="javascript:;" title="点击改为审核通过"><i class="Hui-iconfont">&#xe6e1;</i></a>');
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

/*贷款-通过审核*/
function admin_loan_list_start(obj,id){
	layer.confirm('确认要改为---<font color=red>审核通过!!!</font>---吗？',function(index){
		$.ajax({
			type: 'POST',
			data:"id="+id,
			url: 'admin_loan_list_start',
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

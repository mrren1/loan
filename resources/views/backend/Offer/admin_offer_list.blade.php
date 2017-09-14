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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 贷款管理 <span class="c-gray en">&gt;</span> 借款列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加积分','sign_add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加积分</a></span> <span class="r">共有数据：<strong>{{$offercount}}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th>借款ID</th>
				<th>用户ID</th>
				<th>借款金额</th>
				<th>借款时间</th>
				<th>还款时间</th>
				<th>贷款ID</th>
				<th>借款状态</th>
				<th width="150">操作</th>
			</tr>
		</thead>
		<tbody>
		<div class="container">
		@foreach($offerData as $key => $val)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$val['debt_id']}}</td>
				<td>{{$val['user_id']}}</td>
				<td>{{$val['debt_money']}}</td>
				<td>{{$val['debt_btime']}}</td>
				<td>{{$val['debt_stime']}}</td>
				<td>{{$val['from_id']}}</td>
				<td class="td-status{{$val['debt_id']}}">
					@if($val['debt_status'] == 1)
					<span class="label label-success radius">审核通过</span>  
					@elseif($val['debt_status'] == 2)
					<span class="label radius" style="background:red">审核未通过</span>
					@else
					<span class="label label-defaunt radius">未审核</span> 
					@endif
				</td>
				<td class="td-manage{{$val['debt_id']}}">
				<?php if($val['debt_status']==0){?>
					<a class="manage" style="text-decoration:none" data-biao="1" data-id="{{$val['debt_id']}}" value="{{$val['user_id']}}" href="javascript:;" title="点击改为审核通过">通过审核</a>&nbsp;&nbsp;&nbsp;
					<a class="manage" style="text-decoration:none" data-biao='2' data-id="{{$val['debt_id']}}" value="{{$val['user_id']}}" href="javascript:;" title="点击改为审核未通过">取消审核</a>&nbsp;&nbsp;&nbsp; 
				<?php }else{?>
					<font color="green">已处理</font>
				<?php }?>
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
		  {"orderable":false,"aTargets":[0,8,8]}// 制定列不参与排序
		]
	});
	
});
</script> 
</body>
</html>
<script>
	$(document).delegate('.manage','click',function(){
	//$('.manage').click(function(){
		var status=$(this).data('biao');
		var debt_id=$(this).data('id');
		var user_id = $(this).attr('value');
		var obj=$(this).parent();
		var td=$('.td-status'+debt_id);
		$.ajax({
			type:'get',
			url:"changeDebtStatus",
			//async:false,
			data:{status:status,debt_id:debt_id,user_id:user_id},
			success:function(result){
				if(result==1){
					if(status/1==1){
						td.html('<span class="label label-success radius">审核通过</span> ');
						obj.html('<font color="green">已处理</front>');
					}else if(status/1==2){
						td.html('<span class="label radius" style="background:red">审核未通过</span>');
						obj.html('<font color="green">已处理</front>');
					}
					return false;
				}else if(result==2){
					alert('当前用户额度不够！');
					return false;
				}else if(result==0){
					alert('审核失败！');
					return false;
				}
			}
		});
	});
</script>

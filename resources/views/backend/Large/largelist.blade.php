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
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加积分','sign_add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加积分</a></span> <span class="r">共有数据：<strong></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th>申请人</th>
				<th>申请金额</th>
				<th>申请时间</th>
				<th>还款时间</th>
				<th>联系电话</th>
				<th>邮寄状态</th>
				<th>平台状态</th>
				<th>查看</th>
				<th>评估信息</th>
				<th width="150">状态</th>
			</tr>
		</thead>
		<tbody>
		<div class="container">
		@foreach($largeArr as $large)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td title="点击申请人详细信息"><a href="javascript:" onclick="member_add('查看用户信息','showUserInfo?user_id={{$large['user_id']}}','','510')">{{$large['user_name']}}</a></td>
				<td>{{$large['large_money']}}</td>
				<td>{{date('Y-m-d',$large['begin_time'])}}</td>
				<td>{{date('Y-m-d',$large['end_time'])}}</td>
				<td>{{$large['large_phone']}}</td>
				<td>
					@if($large['post_status']==0)
					未邮寄
					@else
					<a href="javascript:" class="postNum" onclick="" title="{{$large['post_num']}}">已邮寄</a>
					@endif		
				</td>
				<td>
					@if($large['large_status']==0)
					<span class="norec">平台未收货</span>
					<input type="text" class="recinput" style="width:100px;display:none;" data-uid="{{$large['user_id']}}" data-id="{{$large['large_id']}}" placeholder="评估价格">
					@elseif($large['large_status']==1)
					平台已评估
					@endif
				</td>
				<td>
					<a href="javascript:" onclick="member_add('添加积分','showLargeInfo?large_id={{$large['large_id']}}','','510')">查看详情</a>
				</td>
				<td class="td{{$large['large_id']}}">
					@if($large['large_status']==1)
					评估价格：{{$large['large_limit']}}
					@else
					未评估
					@endif
				</td>
				<td class="td-manage endtd{{$large['large_id']}}">
					@if($large['status']==2)
					<span class="label label-success radius">交易完成</span>  
					@elseif($large['status']==1)
					<span class="label radius" style="background:red">待申请人确认</span>
					@elseif($large['status']==0)
					<span class="label label-defaunt radius">待评估</span> 
					@endif
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
/*用户-添加*/
function member_add(title,url,w,h){
  layer_show(title,url,w,h);
}
$('.postNum').click(function(){
	alert($(this).attr('title'))
});
$('.norec').click(function(){
	$(this).hide();
	$(this).next().show().focus();
});
$('.recinput').blur(function(){
	var large_id=$(this).data('id');
	var limit=$(this).val();
	var user_id=$(this).data('uid');
	if(limit==''){
		alert('请填写数据！');
		$(this).hide().prev().show();
		return false;
	}
	var obj=$(this);
	$.ajax({
		type:'get',
		url:'changelimit',
		data:{large_id:large_id,limit:limit,user_id:user_id},
		success:function(result){
			if(result==1){
				obj.val('').hide();
				obj.parent().html('平台已评估').show();
				$('.td'+large_id).html('评估价格：'+limit);
				$('.endtd'+large_id).html('<span class="label radius" style="background:red">待申请人确认</span>');
			}else{
				alert('评估填写失败！')
			}
			
		}
	});
});
</script> 
</body>
</html>
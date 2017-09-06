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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 用户会员相关--详细信息 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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
		  // {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
	
});





</script> 
</body>
</html>

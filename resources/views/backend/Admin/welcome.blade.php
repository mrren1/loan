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
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎进入<span class="f-14">OUR</span>后台管理</p>
<!-- 	<p>登录次数：18 </p>
	<p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p> -->
	
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName">{{$data['APP_URL']}}</span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td>{{GetHostByName($_SERVER['SERVER_NAME'])}}</td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td>{{$data['HTTP_HOST']}}</td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td>{{$data['SERVER_PORT']}}</td>
			</tr>

			<tr>
				<td>本文件所在文件夹 </td>
				<td>{{$data['DOCUMENT_ROOT']}}</td>
			</tr>
			
			<tr>
				<td>系统所在文件夹 </td>
				<td>{{$data['SYSTEMROOT']}}</td>
			</tr>

			<tr>
				<td>服务器的语言种类 </td>
				<td>{{$data['HTTP_ACCEPT_LANGUAGE']}}</td>
			</tr>

			<tr>
				<td>服务器当前时间 </td>
				<td>{{date('Y-m-d H:i:s',time())}}</td>
			</tr>

			<tr>
				<td>当前系统用户名 </td>
				<td>{{php_uname()}}</td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
	    <p>团队:一组</p>
		<p>项目经理:任胜利</p>
	    <p>团队成员:yxl,znp,wyy,cj,djy,gjw,ww</p>
		<p>感谢一组所有成员的共同努力</p>
	</div>
</footer>
<script type="text/javascript" src="admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="admin/static/h-ui/js/H-ui.min.js"></script> 
<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>
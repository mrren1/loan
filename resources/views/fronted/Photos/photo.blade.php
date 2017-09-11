@extends('layouts.public')

@section('title', '基本信息')

<style type="text/css">
*{padding:0; margin:0;}
ul,li{list-style:none;}
body{font:12px/20px "Microsoft Yahei","SimSun",Arial,sans-serif; background:#CCC;}

.padDiv{width:1000px; height:100px; margin:0 auto;}

.heartPic{width:749px; height:1000px; margin:0 auto;}
.heartPic ul{float:left; width:749px;}
.heartPic ul li{float:left; width:100px; height:100px; padding:2px; cursor:pointer;}
ul li.on{z-index:99;}
ul li.on .in{position:relative;left:-50px; top:-50px; padding:5px; background:#000;}
</style>

@section('content')
<div class="padDiv"></div>
<div class="heartPic">
	<ul>
		<li></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_01.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_02.jpg" /></li>
		<li></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_03.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_04.jpg" /></li>
		<li></li>
	</ul>
	<ul>
		<li><img class="in" width="100" height="100" src="imgimg/index_05.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_06.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_07.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_08.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_09.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_10.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_11.jpg" /></li>
	</ul>
	<ul>
		<li><img class="in" width="100" height="100" src="imgimg/index_12.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_13.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_14.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_15.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_16.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_17.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_18.jpg" /></li>
	</ul>
	<ul>
		<li></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_19.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_20.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_21.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_22.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_23.jpg" /></li>
		<li></li>
	</ul>
	<ul>
		<li></li>
		<li></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_24.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_25.jpg" /></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_26.jpg" /></li>
		<li></li>
		<li></li>
	</ul>
	<ul>
		<li></li>
		<li></li>
		<li></li>
		<li><img class="in" width="100" height="100" src="imgimg/index_27.jpg" /></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
@endsection
<script type="text/javascript" src="imgjs/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$("li").hover(function(){
		$(this).addClass("on");
		$(this).find("img").animate({"width":"200px","height":"200px"});
	},function(){
		$(this).animate({height:"100px"},100).removeClass("on");
		$(this).find("img").stop(true,true).animate({"width":"100px","height":"100px"});
	});
})
</script>


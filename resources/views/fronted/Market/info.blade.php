<link href="style/shopdetail.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/common.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	  var showproduct = {
		  "boxid":"showbox",
		  "sumid":"showsum",
		  "boxw":400,
		  "boxh":550,
		  "sumw":60,//列表每个宽度,该版本中请把宽高填写成一样
		  "sumh":60,//列表每个高度,该版本中请把宽高填写成一样
		  "sumi":7,//列表间隔
		  "sums":5,//列表显示个数
		  "sumsel":"sel",
		  "sumborder":1,//列表边框，没有边框填写0，边框在css中修改
		  "lastid":"showlast",
		  "nextid":"shownext"
		  };//参数定义	  
	 $.ljsGlasses.pcGlasses(showproduct);//方法调用，务必在加载完后执行
	 
	 $(function(){
		$('.tabs a').click(function(){	
			var $this=$(this);
			$('.panel').hide();
			$('.tabs a.active').removeClass('active');
			$this.addClass('active').blur();
			var panel=$this.attr("href");
			$(panel).show();				
			return fasle;  //告诉浏览器  不要纸箱这个链接
			})//end click
			
			$(".tabs li:first a").click()   //web 浏览器，单击第一个标签吧
		
		})//end ready
		
		$(".centerbox li").click(function(){
			$("li").removeClass("now");
			$(this).addClass("now")
			
			});		
});		
</script>
@extends('layouts.public')

@section('title', '我要投资')
<!-----商品详情部分------->

@section('content')
<div class="shopdetails">
	<!-------放大镜-------->
	<div id="leftbox">
	<div id="showbox">
  <img src="uploads/{{$lendData['user_photo']}}" width="400" height="550" />
	</div><!--展示图片盒子-->
		<div id="showsum"></div><!--展示图片里边--> 
	</div>
    <!----中间----->

    <div class="centerbox">
    	<p class="imgname">贷款基本信息</p>
    	<p class="Aprice">贷款金额：<span class="styles">￥{{$lendData['lend_money']}}<span></p>
    	<p class="price">贷款利息：<samp>{{$lendData['lend_interest']*100}} %</samp></p>
    	<p class="youhui">最低贷款金额：<span class="styles">￥{{$lendData['lend_lack']}}</span></p>
    	<p class="youhui">贷款时间：<span class="styles">{{$lendData['lend_time']}}</span></p>
    	<p class="youhui">贷款类型：<span class="styles">{{$lendData['lend_type']}}</span></p>
    	<p class="youhui">联系电话：<span class="styles">{{$lendData['lend_person']}}</span></p>
    	<p class="youhui">联系人：<span class="styles">{{$lendData['lend_phone']}}</span></p>
    	<p class="youhui">贷款描述：<span class="styles">{{$lendData['lend_desc']}}</span></p>
        <div class="clear"></div>
        <p class="buy"><a href="debt?lend_id={{$lendData['lend_id']}}" id="firstbuy">立即借款</a></p>
    </div>
        
</div>
<!-----商品详情部分结束------->

@endsection

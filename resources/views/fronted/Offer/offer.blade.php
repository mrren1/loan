@extends('layouts.public')

@section('title', '借款')
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <link rel="stylesheet/less" type="text/css" href="css/style.less" /> -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/all.js"></script>

<!-- end banner -->
@section('content') 
<div class="bor_con_wper">
	  <div class="bor_con px1000">
	  	    <div class="bor_detail">
	  	    	   <div class="bor_detail_box">
	  	    	   	    <div class="bor_det_one clearfix pt30 pb30">
	  	    	   	    	  <div class="bor_det_onel fl">
	  	    	   	    	  	       <p class="bor_p1">速贷网专注于快速贷款，优质挑选最快速的互联网金融，把您空闲的钱放上去就能升值，同时别人也可以拿来救急。</p>
										<h3 class="bor_onel_tit"><span>贷款人详情</span></h3>
										尊敬的用户：<font color="red">{{$userInfo['message_name']}}</font><br>
										<ul class="bor_onel_ul">
											 <li>您的贷款额度为：<font color="red">{{$userInfo['message_limit']}}</font></li>
										</ul>
										<h4 class="bor_onel_tit"><span>此贷款详情</span></h4>
										<ul class="bor_onel_ul">
											 <li>贷款总金额：<font color="red">{{$lendInfo['lend_money']}}</font></li>
											<li>目前剩余金额：<font color="red">{{$lendInfo['lend_money']-$lendInfo['lend_used']}}</font></li>
											<li>贷款利率为：<font color="red">{{$lendInfo['lend_interest']*100}}%</font></li>
											<li>已借款人数：<font color="red">{{$lendNum}}</font></li>
										</ul>
	  	    	   	    	  </div>  
	  	    	   	    	  <input type="hidden" value="{{$lendInfo['lend_interest']}}" id="lend">
	  	    	   	    	  <!-- end l -->
	    	  <div class="bor_det_oner fl">
	    	  	     <form>
	    	  	     	  <fieldset>
	    	  	     	  	   <div class="mt15">
	    	  	     	  	   	   <label>*借款金额</label>
	    	  	     	  	   	   <input type="text" id="borrowMoney" class="bor_inputbg01">
	    	  	     	  	   </div>
                       <div class="mt15">
	    	  	     	  	   	   <label>*借款时间</label>
	    	  	     	  	   	   <input type="text" id="time1" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="bor_inputbg02">
	    	  	     	  	   </div>
	    	  	     	  	   
                        <div class="mt15">
	    	  	     	  	   	   <label>*还款时间</label>
	    	  	     	  	   	   <input type="text" id="time2" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="bor_inputbg02">
	    	  	     	  	   </div>
	    	  	     	  	    <div class="mt15">
	    	  	     	  	   	   <label>*借款描述</label> 
	    	  	     	  	   	   <textarea  id="jisuan"></textarea>
	    	  	     	  	   	 
	    	  	     	  	   </div>
	    	  	     	  	   <div class="mt30">
	    	  	     	  	   	   <label></label>
	    	  	     	  	   	   <a href="#" class="bor_btn">申请借款</a>
	    	  	     	  	   </div>
	    	  	     	  </fieldset>
	    	  	     </form>
	    	  </div>
	  	    	   	    </div>
	  	    	   </div>
	  	    </div>
	  </div>
</div>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script src="./public/js/jquery.js"></script>
<script>
	$('#jisuan').blur(function(){
		var money=$('#borrowMoney').val();
		var lend=$('#lend').val();
		var time1=$('#time1').val();
		var time2=$('#time2').val();
		//发送ajax后台计算利息
		$.ajax({
			type:'get',
			url:"{{url('arithmetic')}}",
			data:{money:money,time1:time1,time2:time2,lend:lend},
			dataType:'json',
			success:function(result){
				alert('利息为：'+result.interest);
			}
		});
	});
</script>
 @endsection
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
											 <li>您的贷款额度为：<font color="red" id="limit">{{$userInfo['message_limit']}}</font></li>
										</ul>
										<h4 class="bor_onel_tit"><span>此贷款详情</span></h4>
										<ul class="bor_onel_ul">
											 <li>贷款总金额：<font color="red">{{$lendInfo['lend_money']}}</font></li>
											<li>目前剩余金额：<font color="red" id="sheng">{{$lendInfo['lend_money']-$lendInfo['lend_used']}}</font></li>
											<li>贷款利率为：<font color="red">{{$lendInfo['lend_interest']*100}}%</font></li>
											<li>最少贷款金额：<font color="red">{{$lendInfo['lend_lack']}}</font></li>
											<li>已借款人数：<font color="red">{{$lendNum}}</font></li>
										</ul>
	  	    	   	    	  </div>  

	  	    	   	    	  <input type="hidden" value="{{$lendInfo['lend_interest']}}" id="lend">
	  	    	   	    	  <input type="hidden" value="{{$lendInfo['lend_lack']}}" id="lack">
	  	    	   	    	  <!-- end l -->
	    	  <div class="bor_det_oner fl">
	    	  	     <form action="{{url('adddebt')}}" method="post">
	    	  	     	  <fieldset>
	    	  	     	  	   <div class="mt15">
	    	  	     	  	   	   <label>*借款金额</label>
	    	  	     	  	   	   <input type="text" id="borrowMoney" name="debt_money" class="bor_inputbg01">
	    	  	     	  	   			<span id="li"></span>
	    	  	     	  	   </div>
                        <div class="mt15">
	    	  	     	  	   	   <label>*还款时间</label>
	    	  	     	  	   	   <input type="text" id="time2" name="debt_stime" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="bor_inputbg02">
	    	  	     	  	   </div>
	    	  	     	  	    <div class="mt15">
	    	  	     	  	   	   <label>*借款描述</label> 
	    	  	     	  	   	   <textarea  id="jisuan" name="debt_desc"></textarea>
	    	  	     	  	   	 	<input type="hidden" value="{{$from_id}}" name="from_id">
	    	  	     	  	   </div>
	    	  	     	  	   <div class="mt30">
	    	  	     	  	   	   <label></label>
	    	  	     	  	   	   <input type="submit" class="" onclick="return borrow();" value="申请借款">
	    	  	     	  	   </div>
	    	  	     	  </fieldset>
	    	  	     	   <input type="hidden" value="{{$from_id}}" name="lend_id">
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
		var time2=$('#time2').val();
		//发送ajax后台计算利息
		$.ajax({
			type:'get',
			url:"{{url('arithmetic')}}",
			data:{money:money,time2:time2,lend:lend},
			dataType:'json',
			success:function(result){
				if(result==0){
					alert('时间小于当前时间，请重新选择。');
					$('#time2').val('');
					$('#jisuan').val('');
					return false;
				}
				$('#li').html('利息：<font color="red">'+result.interest+'</font>');
			}
		});
	});
	function borrow()
	{
		//return false;
		var money=$('#borrowMoney').val();
		var time2=$('#time2').val();
		var desc=$('#jisuan').val();
		var lack=$('#lack').val();
		if(money==''){
			alert('请填写金额！');return false;
		}
		if(time2==''){
			alert('请填写时间！');return false;
		}
		if(desc==''){
			alert('请填写借款描述！');return false;
		}
		var limit=$('#limit').text();
		var sheng=$('#sheng').text();
		if((money/1)>(limit/1)){
			alert('您最大贷款金额为：'+limit+'，请重新输入金额！');
			return false;
		}
		if((money/1)>(sheng/1)){
			alert('当前贷款剩余金额为：'+sheng+'，请输入合理金额！');
			return false;
		}
		if((money/1)<lack/1){
			alert('最低贷款金额为：'+lack+'，请重新填写！');
			return false;
		}
		return true;
	}
</script>
 @endsection
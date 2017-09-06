@extends('layouts.public')

@section('title', '贷款')
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <link rel="stylesheet/less" type="text/css" href="css/style.less" /> -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/all.js"></script>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>

<!-- end banner -->
@section('content') 
<div class="bor_con_wper">
    <div class="bor_con px1000">
          <div class="bor_detail">
               <div class="bor_detail_box">
                    <div class="bor_det_one clearfix pt30 pb30">
                        <div class="bor_det_onel fl">
                                 <p class="bor_p1">
                    <ul class="bor_onel_ul">
                    </ul>
                    <ul class="bor_onel_ul">
                       <h2>大额贷款申请</h2>
                       <h4><font color="red">注意事项</font></h4>
                       <p>您选择大额贷款后将是从平台直接放款，跟个人额度没有关系，
                        所以您必须有抵押的东西，邮寄或者是送到平台指定地点，我们将安排工作人员进行审核和评估，最终会告知您能抵押多少钱。
                       </p>
                       <h4><font color="red">请先阅读注意事项</font></h4>
                    </ul>
                        </div>  
                        <!-- end l -->
                        <div class="bor_det_oner fl">
       <form method="post" action="large">
<!--  <input type="hidden" value="{{ Session::token() }}" name="_token"> -->
          <fieldset>
               <div class="mt15">
                   <label>期望金额</label>
                   <input type="text" class="bor_inputbg01" name="large_money" id="lend_money">
                   <span style="color:red" id="money"></span>
               </div>
                       <div class="mt15">
                   <label>还款时间</label>
                   <input class="Wdate" type="text" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" name="end_time">
                   <span style="color:red" id="time"></span>
               </div>
               <div class="mt15">
                   <label>联系电话</label>
                   <input type="text" name="large_phone" id="phone">
                   <span style="color:red" id="telephone"></span>
               </div>
               <div class="mt15">
                   <label>抵押货物</label> 
                   <textarea name="pawn_goods" placeholder="请填写抵押的货物以及货物描述" id="desc"></textarea>
               </div>
                <div class="mt15">
                   <label>贷款描述</label> 
                   <textarea name="large_desc" placeholder="请描述您的贷款申请……" id="desc"></textarea>
               </div>
               <div class="mt15">
               <label>邮寄状态</label>
                    <input type="radio" style="width:20px;" value="0" checked id="nopost" name="post">未邮寄
                    <input type="radio" style="width:20px;" value="1" id="alreadpost" name="post">已经邮寄
               </div>
               <div class="mt15" id="postInfo" style="display:none;">
                  <label>快递信息</label>
                  <input type="text" id="postId" placeholder="快递名称：快递单号" name="post_num">
               </div>
               <div class="mt30">
                   <label></label>
                   <button type="submit" class="bor_btn" style="border:none;">提交材料</button>
               </div>
          </fieldset>
       </form>
                        </div>
                    </div>
               </div>
          </div>
    </div>
</div>


<script src="jquery.min.js"></script>
<script type="text/javascript">
  $('#alreadpost').click(function(){
    $('#postInfo').show();
  });
  $('#nopost').click(function(){
    $('#postId').val('');
    $('#postInfo').hide();
  });
</script> 
@endsection
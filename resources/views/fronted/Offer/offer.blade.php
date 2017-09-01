@extends('layouts.public')

@section('title', '充值提现')
 
  <div class="wrapper "> 
  @section('content')
   <div class="modal fade" id="deleteCartItem" tabindex="-1" role="dialog" aria-hidden="true"> 
    <div class="modal-dialog" ng-controller="CartCtrl"> 
     <div class="modal-content"> 
      <div class="modal-header"> 
       <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
       <h6 class="modal-title">删除投标</h6> 
      </div> 
      <div class="modal-body"> 
       <h4>确定删除投标：ID？</h4> 
      </div> 
      <div class="modal-footer"> 
       <a class="btn btn-link" data-dismiss="modal">取消</a> 
       <a class="btn btn-action" ng-model="loanId" ng-click="removeNote()">删除</a> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div id="notifications" ng-show="notify.messages.msg.length &gt; 0" class="ng-cloak affix-top" data-spy="affix" data-offset-top="0"> 
    <div class="container"> 
     <div class="msg-fold-up" ng-class="{ 'alert-success' : notify.messages.type == 'success', 'alert-danger' : notify.messages.type == 'error', 'alert-info' : notify.messages.type == 'info' }"> 
     </div> 
     <div class="alert msg-content"> 
      <a type="button" class="close sl-icon-cross" ng-click="notify.dismiss($index)" aria-hidden="true"></a> 
      <p ng-repeat="m in notify.messages.msg track by $index" ng-bind-html="m"></p> 
     </div> 
     <div class="msg-fold-down" ng-class="{ 'alert-success' : notify.messages.type == 'success', 'alert-danger' : notify.messages.type == 'error', 'alert-info' : notify.messages.type == 'info' }"> 
     </div> 
    </div> 
   </div> 
<div id="addCardModal" class="modal fade add-card" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
  <h4 id="myModalLabel" class="modal-title">添加银行卡</h4>
</div>
<div class="modal-body summary-section">
<div class="addCard-container">
<div class="alert alert-info warning-info ng-hide" ng-show="tipShow">
<p class="ng-binding"></p>
</div>
<div class="alert alert-info">
<p>
总贷款总金额为<font color="red">{{$lendInfo['lend_money']}}</font>元，目前剩余<font color="red">{{$lendInfo['lend_money']-$lendInfo['lend_used']}}</font>元，利率为<font color="red">{{$lendInfo['lend_interest']*100}}%</font>，最低借款为：<font color="red">{{$lendInfo['lend_lack']}}</font>元，您的贷款额度最多为<font color="red">{{$userMessage['message_limit']}}</font>元。
<strong class="ng-binding"></strong><span id="lilv" style="display:none;">{{$lendInfo['lend_interest']}}</span>
</p>
</div>
<form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" action="{{ route('debt') }}" method="post">
<input type="hidden" value="{{ Session::token() }}" name="_token"/>
<input type="hidden" value="{{$from_id}}" name="from_id">

<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">借款金额</label>
<div class="col-xs-7">
<span><input class="form-control ng-pristine ng-invalid ng-invalid-required" type="text" id="jisuan" style="display:inline;" name="debt_money">&nbsp;&nbsp;<span id="jieguo"></span></span>
<div class="ng-hide ng-scope" name="" sl-validation-errors="">
</div>
</div>
</div>

<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">借款时间</label>
<div class="col-xs-7">
<input class="form-control ng-pristine ng-invalid ng-invalid-required" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  type="text" name="debt_btime">
<div class="ng-hide ng-scope" name="card_name" sl-validation-errors="">
</div>
</div>
</div>


<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">还款时间</label>
<div class="col-xs-7">
<input class="form-control ng-pristine ng-invalid ng-invalid-required" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" type="text" name="debt_stime">
<div class="ng-hide ng-scope" name="" sl-validation-errors="">
</div>
</div>
</div>

<div class="form-group">
<div class="card-set-as-default col-xs-4 col-xs-offset-4">
<div class="modal-footer">
<input type="reset" class="btn btn-secondary" value="取消">
<input type="submit" class="btn btn-secondary" value="确认借款">
</div>
</div>
</div>
</form>
</div>
</div>
</div>
  <script src="js/common.js" type="text/javascript"></script>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function(){
          $(".change7").addClass('active');            
      })
      $('#jisuan').blur(function(){
        var money=$(this).val();
        var lilv=$('#lilv').text();
        var sum=money/1*(1+lilv/1);
        var aa=(sum.toFixed(3))/1;
        $('#jieguo').html('共需要偿还'+aa+'元，本金:'+money+'+利息:'+(money/1*lilv/1).toFixed(2));
      });
  </script>
@endsection

   <!-- Modal --> 
   <div class="modal fade wechat-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-sm"> 
     <div class="modal-content"> 
      <div class="modal-header"> 
       <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
       <h6 class="modal-title" id="myModalLabel">关注点融网官方微信</h6> 
      </div> 
      <div class="modal-body"> 
       <div class="wechat-subscription"> 
        <h6>点融网订阅号</h6> 
        <p>了解各种点融咨询</p> 
        <img src="images/qrcode-dianrongapi.jpg" alt="点融网订阅号" /> 
        <p>dianrongapi</p> 
       </div> 
       <div class="wechat-service"> 
        <h6>点融网服务号</h6> 
        <p>查询投资情况</p> 
        <img src="images/qrcode-dianrongvip.jpg" alt="点融网服务号" /> 
        <p>dianrongvip</p> 
       </div> 
      </div> 
      <div class="modal-footer">
        添加方式：打开微信，点击″发现″菜单，使用″扫一扫″功能；或者在微信中点击&quot;联系人&quot;，添加以上英文账号名为好友。 
      </div> 
     </div>
     <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
   </div>
   <!-- /.modal --> 
  </div> 
  <script src="js/common.js" type="text/javascript"></script>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function(){
          $(".change7").addClass('active');            
      })
      $('#jisuan').blur(function(){
        alert(1)
      });
  </script>
  <script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>

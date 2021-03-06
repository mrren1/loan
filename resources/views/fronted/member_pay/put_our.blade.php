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
 <!-- 提现页面 -->
 <div id="withdrawMoneyWizard" class="model" aria-hidden="true" aria-labelledby="withdrawMoneyWizardLabel" role="dialog" sl-withdraw-money="">
<div class="modal-dialog">
<div class="modal-content">
<form class="ng-pristine ng-invalid ng-invalid-required" method="post" action="addPut">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="ng-isolate-scope" name="withdrawMoneyWizard" on-dismiss="dismissWizard()" wizard="">
<div class="modal-header">
<button class="close sl-icon-cross" ng-click="dismiss()" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 class="modal-title ng-binding">输入提现金额</h4>
<ul class="steps-indicator steps-2" ng-if="!hideIndicators">
<li class="ng-scope current" ng-repeat="step in steps" ng-class="{default: !step.completed && !step.selected, current: step.selected && !step.completed, done: step.completed && !step.selected, editing: step.selected && step.completed}">
<a class="ng-binding ng-pristine ng-valid" ng-model="step.title" ng-click="goTo(step)">
<span class="step-num ng-binding">1</span>
输入提现金额
</a>
</li>
<li class="ng-scope default" ng-repeat="step in steps" ng-class="{default: !step.completed && !step.selected, current: step.selected && !step.completed, done: step.completed && !step.selected, editing: step.selected && step.completed}">
<a class="ng-binding ng-pristine ng-valid" ng-model="step.title" ng-click="goTo(step)">
<span class="step-num ng-binding">2</span>
等待处理
</a>
</li>
</ul>
</div>
<div class="steps" ng-transclude="">
<section class="step ng-isolate-scope current" ng-transclude="" ng-class="{current: selected, done: completed}" ng-show="selected" title="输入提现金额" wz-step="">
<div class="modal-body ng-scope">
<h6 class="available-to-invest">
可提现金额：
<span class="ng-binding" ng-bind-html="summary.availableWithdrawCash | slMoney">
@if ($purse['purse_balance'] == 0)
    <small>0.00元</small>
@else
  <small>{{$purse['purse_balance']}}元</small> 
@endif
</span>
</h6>
<div class="form-horizontal">
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">持卡人</label>
<div class="col-xs-5">
<p class="form-control-static ng-binding">{{$arr['card_name']}}</p>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">银行卡号</label>
<div class="col-xs-5">
<input class="form-control ng-pristine ng-invalid ng-invalid-required" type="text" value="{{$arr['put_num']}}" required="" ng-model="user.account" name="account" readonly>
<p class="form-control-static ng-binding"></p>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">提现银行</label>
<div class="col-xs-5">
<div class="drop btn-group select select-block mbn ng-isolate-scope" selected-name="selectBank" btn-style="btn-add" options="withdrawBanklist">
<select class="form-control" name="put_name" disabled="disabled" readonly>
@foreach($data as $son)
@if (isset($arr['put_name']))
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="{{$arr['put_name']}}" ng-repeat="option in options" selected="selected">{{$arr['put_name']}}</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="{{$son['card_name']}}" ng-repeat="option in options">{{$son['card_name']}}</option>
@endif
@endforeach
</select>
</div>
</div>
</div>

<div class="form-group withdraw-amount-row">
<label class="col-xs-3 col-xs-offset-1 control-label">提现金额</label>
<div class="col-xs-5">
<input id="purse_sum" class="form-control ng-scope ng-pristine ng-invalid ng-invalid-required" type="text" sl-greater-than="0" value="{{$purse['purse_sum']}}" tooltip-placement="right" tooltip-trigger="focus" placeholder="输入提现金额" tooltip="金额须大于0且小于可提现金额" ng-model="withdrawMoneyForm.amount" name="purse_sum" >
<span id="sum" style="color:red"></span>
</div>
</div>
<div class="warning-tip">
<div class="col-xs-3 col-xs-offset-1"></div>
<div class="col-xs-6">谨慎填写信息，提现才会成功哦！</div>
</div>
</div>
</div>
<div class="modal-footer ng-scope">
<!-- <a class="btn btn-link" ng-click="dismissWizard()" data-dismiss="modal" href="#">取消</a>
<a class="btn btn-secondary" ng-click="confirmWithdraw()">下一步</a> -->
@if ($purse['purse_balance'] == 0)
<a href="memberCharge" class="ng-binding ng-pristine ng-valid">充值</a>
@else
<input type="reset" class="btn btn-secondary" value="取消">
<input type="submit" class="btn btn-secondary" id="sub" value="下一步">
<span id="mit" style="color:red"></span>
@endif
</div>
</section>

<section class="step ng-isolate-scope ng-hide" ng-transclude="" ng-class="{current: selected, done: completed}" ng-show="selected" title="等待处理" wz-step="">
<div class="modal-body ng-scope" style="text-align: center">
<h6>款项将在1-2工作日内转入你的银行账户。</h6>
<p class="">
<a href="mailto:support@dianrong.com">support@dianrong.com</a>
</p>
<p class="">400-921-9218</p>
</div>
<div class="modal-footer ng-scope">
<a class="btn btn-secondary" ng-click="dismissWizard()" data-dismiss="modal" href="#">关闭</a>
</div>
</section>
</div>
</div>
</form>
</div>
</div>
</div> 
<script>
  $("#purse_sum").blur(function(){
   if($.trim($('#purse_sum').val()).length == 0){
     $("#sum").html("请输入提现金额");
     $('#purse_sum').focus();
   }else{
     var purse_sum=$('#purse_sum').val();
     if(!isNaN(purse_sum)==false){
     $("#sum").html("请输入数字金额");
     $('#purse_sum').focus();
    }else{
     $("#sum").html("");
    }
  }
});
$("#sub").click(function(){
   if($.trim($('#purse_sum').val()).length == 0){
      $("#mit").html("请填写信息");
      $('#sub').attr('disabled',"true");
   }
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

    </div>

   </div>

  </div> 
  <script src="js/common.js" type="text/javascript"></script>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function(){
          $(".change7").addClass('active');            
      })
  </script>

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

<!---->
<div id="addCardModal" class="modal fade add-card" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<span class="modal-title" ng-hide="investLoanId">账户充值</span>
<div class="ng-hide" ng-show="investLoanId">
<img class="partner-logo" src="/static/images/market/letv-logo.png">
<img class="dr-logo" src="/static/images/market/letv/dianrong-logo.png">
<span>恭喜！你离获得9%年化利率只差一步咯！大家都在团里等着你呢!</span>
</div>
</div>
<div class="modal-body summary-section">
<form class="loadMoneyForm ng-pristine ng-invalid ng-invalid-required" method="post" action="{{url('memberCharge')}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="row addLightBorder ng-isolate-scope" sl-popover="investAmountError" data-original-title="" title="">
<label class="col-xs-1 inputNumberText ng-binding">充值金额</label>
<div class="col-xs-2 inputNumber">
<input class="form-control textFrame ng-pristine ng-invalid ng-invalid-required" type="text" sl-less-than="1000000000000" sl-greater-than="0" sl-decimal-digits="2" sl-valid-number="" required="" ng-show="!investLoanId" placeholder="充值金额" ng-model="load.amount" name="purse_sum" id="purse_sum">
<span  id="sum" style="color:red"></span>
<div class="ng-scope" ng-class="ng-hide" name="transferAmt" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message=""></span>
<!-- <span class="ng-scope2" for="validNumber" sl-error-message="">金额须为合法的整数或者小数,不能包含字母等字符</span>
<span class="ng-scope3" for="decimalDigits" sl-error-message="">金额最大支持两位小数</span>
<span class="ng-scope4" for="greaterThan" sl-error-message="">金额须大于0</span>
<span class="ng-scope5" for="lessThan" sl-error-message="">金额须小于1万亿</span> -->
</span>
</div>
<input type="hidden" value="NEW_SITE_CLIENT" name="PAYMENT_CLIENT_SOURCE">
</div>
<div class="col-xs-2 col-xs-offset-1 alignLeft textAlign ng-scope" ng-if="!investLoanId">
<label>当前可用余额</label>
</div>
<div class="col-xs-2 textAlign availableCash ng-scope" ng-if="!investLoanId">
<div>
<span class="ng-binding" ng-bind-html="summary.availableCash|slMoney">
@if ($purse['purse_balance'] == 0)
    <small>0.00元</small>
@else
  <small>{{$purse['purse_balance']}}元</small> 
@endif
</span>
</div>
</div>
</div>
<div class="row useCoupon" ng-hide="investLoanId">
<label class="col-xs-1 inputNumberText"></label>
<div class="col-xs-3 inputNumber">
<div class="" ng-show="!isIE8">
<label class="checkbox" ng-click="showCoupon=!showCoupon" for="checkbox1">
<span class="icons">
</span>
</label>
</div>

</div>
</div>

<div class="row">
<div class="col-xs-10 bankLimit" ng-show="bankType">
<table>
<tbody>
<tr>
<th rowspan="3">卡种</th>
<th rowspan="2" colspan="2">U盾客户</th>
<th>柜面注册存量</th>
<th rowspan="2" colspan="2">
已开通手机短信认证
<br>
的电子银行口令卡客户
</th>
<th rowspan="2" colspan="2">
未开通手机短信认证
<br>
的电子银行口令卡客户
</th>
</tr>
<tr>
<th>静态密码客户</th>
</tr>
<tr>
<th>单笔限额</th>
<th>每日限额</th>
<th>总累计限额</th>
<th>单笔限额</th>
<th>每日限额</th>
<th>单笔限额</th>
<th>每日限额</th>
</tr>
<tr>
<td>普通信用卡</td>
<td colspan="7">不支持</td>
</tr>
<tr>
<td>普通借记卡</td>
<td>无限额</td>
<td>无限额</td>
<td>300</td>
<td>2000</td>
<td>5000</td>
<td>500</td>
<td>1000</td>
</tr>
<tr>

</tr>
</tbody>
</table>
</div>
</div>
</center>
<div class="row" style="margin-left:500px;">
<div class="col-xs-10 buttonRecharge">
<input type="submit" value="充值" class="btn btn-secondary" id="submit">
<span id="sub" style="color:red"></span>
</div>
</div>
<center>
<div class="row footer" ng-hide="investLoanId">
<span>充值遇到问题？请点击
<a target="_blank" href="/public/help-center#/faq">帮助中心</a>
</span>
<span class="contact">点融客服：400-921-9218</span>
</div>
<div class="row footer ng-hide" ng-show="investLoanId">
<span>投资遇到问题？请联系点融客服：400-921-9218</span>
</div>
<div>
</div>
<input type="hidden" value="NEW_SITE_CLIENT" name="serviceClientCallback">
</div>
</form>
</div>
</div>
</div>
</div>
<script>
  $("#purse_sum").blur(function(){
   if($.trim($('#purse_sum').val()).length == 0){
     $("#sum").html("金额不能为空");
     $('#purse_sum').focus();
   }else{
     var purse_sum=$('#purse_sum').val();
     if(!isNaN(purse_sum)==false){
     $("#sum").html("金额须为合法的整数或者小数");
     $('#purse_sum').focus();
    }else{
      if(purse_sum == 0 || purse_sum>100000000){
      $("#sum").html("金额须大于0并且小于1亿");
      $('#purse_sum').focus();
     }
  }
}
});

$("#submit").click(function(){
   if($.trim($('#purse_sum').val()).length == 0){
      $("#submit").html("请填写信息");
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
  </script>

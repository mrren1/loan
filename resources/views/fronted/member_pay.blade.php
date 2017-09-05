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
   <!--content--> 
   <!-- This empty div is a placehodler to avoid extra spaces between content area and the affix header --> 
   <div style="height: 1px;"></div> 
   <div id="my-account" class="container my-account" ng-controller="MyAccountCtrl"> 
    <div class="row"> 
     @include('layouts.left')
     <div class="col-xs-9 ng-scope" autoscroll="false" ui-view="" style="">
<div class="account-transfer content-wrapper ng-scope">
<header class="section-header">
<h6 class="section-header-title">充值提现</h6>
</header>
<section class="summary-section">
<div class="row">
<div class="col-xs-8">
<div class="tip-wrapper">
<header class="header">
<h6 class="header-label">温馨提示</h6>
</header>
<div>
<ul class="my-account-tip">
<li>
<p>在你申请提现前，请先在页面下方或"基本信息"账户信息页面绑定银行卡</p>
</li>
<li>
<p>收到你的提现请求后，点融网将在1个工作日（双休日或法定节假日顺延）处理你的提现申请，请你注意查收</p>
</li>
<li>
<p>为保障你的账户资金安全，申请提现时，你选择的银行卡开户名必须与你点融网账户实名认证一致，否则提现申请将不予受理。</p>
</li>
</ul>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="status-wrapper">
<div class="textTop">
<div class="col-xs-6 cashText">可用余额</div>
<div class="col-xs-6 cashNumber ng-binding" ng-bind-html="summary.availableCash|slMoney">
@if ($Purse['purse_balance'] == 0)
    <small>0.00元</small>
@else
  <small>{{$Purse['purse_balance']}}元</small> 
@endif
</div>
<div class="col-xs-6 cashText">可提现金额</div>
<div class="col-xs-6 cashNumber ng-binding" ng-bind-html="summary.availableWithdrawCash |slMoney">
@if ($Purse['purse_balance'] == 0)
    <small>0.00元</small>
@else
  <small>{{$Purse['purse_balance']}}元</small> 
@endif
</div>
</div>
<center>
<div class="buttonBottom" align="left">
<a class="btn btn-action btn-embossed" ng-disabled="disableWithdraw" href="member_mention">
<span class="sl-icon-credit-card" style="align:left"></span>
提现
</a>
<a class="btn btn-primary btn-embossed"  href="memberCharge">
<span class="sl-icon-piggy-bank" style="align:left"></span>
充值
</a>

</center>
</div>
</div>
</div>
</div>
</section>
<section class="summary-section account-transfer-filter">
<div>
<span class="account-transfer-filter-title">交易时间</span>
<a class="btn btn-sm btn-filter active" ng-click="activityParams.range = ''" ng-class="{ active: activityParams.range == '' }">所有 </a>
<a class="btn btn-sm btn-filter" ng-click="activityParams.range = filterOptions.tradeTime.TODAY" ng-class="{ active: activityParams.range == filterOptions.tradeTime.TODAY }">今天 </a>
<a class="btn btn-sm btn-filter" ng-click="activityParams.range = filterOptions.tradeTime.LASTWEEK" ng-class="{ active: activityParams.range == filterOptions.tradeTime.LASTWEEK }">最近一周 </a>
<a class="btn btn-sm btn-filter" ng-click="activityParams.range = filterOptions.tradeTime.LASTMONTH" ng-class="{ active: activityParams.range == filterOptions.tradeTime.LASTMONTH }">一个月 </a>
<a class="btn btn-sm btn-filter" ng-click="activityParams.range = filterOptions.tradeTime.LASTQUARTER" ng-class="{ active: activityParams.range == filterOptions.tradeTime.LASTQUARTER }">三个月 </a>
<a class="btn btn-sm btn-filter" ng-click="activityParams.range = filterOptions.tradeTime.HALFYEAR" ng-class="{ active: activityParams.range == filterOptions.tradeTime.HALFYEAR }">六个月 </a>
</div>
<div>
<span class="account-transfer-filter-title">交易类型</span>
<a class="btn btn-sm btn-filter active" ng-click="activityParams.type = filterOptions.tradeType.ALL" ng-class="{ active: activityParams.type == filterOptions.tradeType.ALL }">全部 </a>
<a class="btn btn-sm btn-filter" ng-click="activityParams.type = filterOptions.tradeType.RECHARGE" ng-class="{ active: activityParams.type == filterOptions.tradeType.RECHARGE}">充值 </a>
<a class="btn btn-sm btn-filter" ng-click="activityParams.type = filterOptions.tradeType.WITHDRAW" ng-class="{ active: activityParams.type == filterOptions.tradeType.WITHDRAW }">提现 </a>
</div>
</section>
<section class="summary-section" ng-hide="showMain">
<div>
<div class="data-table-wrapper ng-isolate-scope" params="activityParams" data="activityData" columns="activityColumns">
<table class="table data-table table-hover table-striped ">
<thead>
<tr>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span class="sortable" ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">交易流水号</span>
<span class="sl-icon-pointer-down-dark" ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span class="sortable" ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">交易类型</span>
<span class="sl-icon-pointer-down-dark" ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope text-right" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span class="sortable" ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">交易金额</span>
<span class="sl-icon-pointer-down-dark" ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope text-right" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span class="sortable" ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">账户余额</span>
<span class="sl-icon-pointer-down-dark" ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span class="sortable" ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">交易状态</span>
<span class="sl-icon-pointer-down-dark" ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span class="active sortable" ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">交易时间</span>
<span class="sl-icon-pointer-down-dark" ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
</tr>
@foreach($Purselog as $log)
<tr align="center">
<td>{{$log['purselog_id']}}</td>
<td>{{$log['purselog_desc']}}</td>
<td>{{$log['purselog_num']}}</td>
<td>{{$Purse['purse_balance']}}</td>
<td>通过</td>
<td>{{date('Y-m-d H:i:s',$log['purselog_time'])}}</td>
</tr>
@endforeach
</thead>
<tbody> </tbody>
</table>
</div>
</div>
<div class="notes-pagination">
<div class="sl-pagination pagination ng-isolate-scope" total-records="totalRecords" page-size="activityParams.pageSize" page="activityParams.page">
<ul>
<li class="previous">
<a ng-click="prev()" href="javascript:;">
<i class="sl-icon-arrow-left"></i>
</a>
</li>
<li class="first ng-hide" ng-show="minPage > 1">
<a ng-click="first()" href="javascript:;">1...</a>
</li>
<li class="last ng-hide" ng-show="maxPage < totalPages - 2">
<a class="ng-binding" ng-click="last()" href="javascript:;">...0</a>
</li>
<li class="jump">
<div class="input-group-sm pull-left">
<input class="form-control input-sm btn-embossed page-number ng-pristine ng-valid" type="text" sl-enter="goTo(displayPage-1)" ng-model="displayPage" maxlength="1">
</div>
</li>
<li class="total">
<span class="ng-binding">0页</span>
</li>
<li class="next">
<a ng-click="next()" href="javascript:;">
<i class="sl-icon-arrow-right"></i>
</a>
</li>
</ul>
</div>
</div>
</section>
<section class="summary-section asset-activity ng-hide" ng-show="showMain">
<div id="confirmAddFundPopup" class="modal fade add-card" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body summary-section">
<div class="modal-header">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 id="myModalLabels" class="modal-title">跳转到网银充值</h4>
</div>
<div style="margin-top: 15px;margin-left:15px">
<div>请在新开网银页面完成充值后选择：</div>
<div>
<b>充值成功</b>
| 查看充值记录
</div>
<div>
<b>充值失败</b>
| 建议你联系我们客服（400-921-9218）
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div sl-add-card="">
<div id="addCardModal" class="modal fade add-card" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 id="myModalLabel" class="modal-title">添加银行卡</h4>
</div>
<div class="modal-body summary-section">
<div class="addCard-container">
<div class="alert alert-info warning-info ng-hide" ng-show="tipShow">
<p class="ng-binding"></p>
</div>
<div class="alert alert-info">
<p>
为保证提现成功，请确认该银行卡开户姓名必须为
<strong class="ng-binding">黄金</strong>
</p>
</div>
<form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" name="addCardForm">
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">持卡人</label>
<div class="col-xs-7">
<p class="form-control-static ng-binding">黄金</p>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">银行账号</label>
<div class="col-xs-7">
<input class="form-control ng-pristine ng-invalid ng-invalid-required" type="text" sl-bank-card="" required="" ng-model="user.account" name="account">
<div class="ng-hide ng-scope" name="account" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">对不起，请输入卡号</span>
<span class="ng-scope" for="bankCard" sl-error-message="">银行卡格式错误，须为数字或卡号位数不符</span>
</span>
</div>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">确认银行账号</label>
<div class="col-xs-7">
<input class="form-control ng-pristine ng-invalid ng-invalid-required" type="text" sl-bank-card="" sl-equal-to="user.account" required="" ng-model="user.accountSure" ng-paste="noPaste($event)" name="accounts">
<div class="ng-hide ng-scope" name="accounts" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">对不起，请确认卡号</span>
<span class="ng-scope" for="bankCard" sl-error-message="">银行卡格式错误，须为数字或卡号位数不符</span>
<span class="ng-scope" for="equalTo" sl-error-message="">卡号两次输入不一致</span>
</span>
</div>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">选择银行</label>
<div class="col-xs-7">
<div class="drop btn-group select select-block mbn ng-isolate-scope" selected-name="selectBank" btn-style="btn-add" options="withdrawBanklist">
<button class="btn dropdown-toggle clearfix btn-add" data-toggle="dropdown">
<span class="filter-option pull-left ng-binding">中国工商银行</span>
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu">
<li class="ng-scope selected" ng-class="{ selected : $index == selected }" rel="0" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">中国工商银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="1" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">中国农业银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="2" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">中国银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="3" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">中国建设银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="4" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">交通银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="5" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">中信银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="6" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">中国光大银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="7" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">华夏银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="8" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">中国民生银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="9" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">广东发展银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="10" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">深圳发展银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="11" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">招商银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="12" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">兴业银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="13" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">上海浦东发展银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="14" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">北京银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="15" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">城市商业银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="16" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">农村信用合作社</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="17" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">盛京银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="18" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">天津银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="19" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">宁波银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="20" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">重庆银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="21" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">温州银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="22" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">南京银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="23" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">江苏银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="24" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">深圳平安银行</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="25" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">中国邮政储蓄银行</a>
</li>
</ul>
<select class="form-control hide" name="">
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="ICBC" ng-repeat="option in options" selected="selected">中国工商银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="ABC" ng-repeat="option in options">中国农业银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="BOC" ng-repeat="option in options">中国银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="CCB" ng-repeat="option in options">中国建设银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="BC" ng-repeat="option in options">交通银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="CB" ng-repeat="option in options">中信银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="CEB" ng-repeat="option in options">中国光大银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="HB" ng-repeat="option in options">华夏银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="CMB" ng-repeat="option in options">中国民生银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="GDB" ng-repeat="option in options">广东发展银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="SDB" ng-repeat="option in options">深圳发展银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="MB" ng-repeat="option in options">招商银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="IB" ng-repeat="option in options">兴业银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="SPDB" ng-repeat="option in options">上海浦东发展银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="BOB" ng-repeat="option in options">北京银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="CCMB" ng-repeat="option in options">城市商业银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="RCC" ng-repeat="option in options">农村信用合作社</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="SB" ng-repeat="option in options">盛京银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="BOT" ng-repeat="option in options">天津银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="BON" ng-repeat="option in options">宁波银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="CHB" ng-repeat="option in options">重庆银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="BOW" ng-repeat="option in options">温州银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="BONA" ng-repeat="option in options">南京银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="BOJ" ng-repeat="option in options">江苏银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="SPB" ng-repeat="option in options">深圳平安银行</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="PSBC" ng-repeat="option in options">中国邮政储蓄银行</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">开户省份</label>
<div class="col-xs-7">
<div class="drop btn-group select select-block mbn ng-isolate-scope" selected-name="selectProvince" btn-style="btn-add pro" options="province">
<button class="btn dropdown-toggle clearfix btn-add pro" data-toggle="dropdown">
<span class="filter-option pull-left ng-binding"></span>
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu"> </ul>
<select class="form-control hide" name=""> </select>
</div>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">开户城市</label>
<div class="col-xs-7">
<div class="drop btn-group select select-block mbn ng-isolate-scope" selected-name="selectCity" btn-style="btn-add pro" options="city[selectProvince]">
<button class="btn dropdown-toggle clearfix btn-add pro" data-toggle="dropdown">
<span class="filter-option pull-left ng-binding"></span>
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu"> </ul>
<select class="form-control hide" name=""> </select>
</div>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">支行名称</label>
<div class="col-xs-7">
<input id="bankBranchName" class="form-control ng-scope ng-pristine ng-invalid ng-invalid-required" type="text" required="" tooltip-placement="right" tooltip-trigger="focus" tooltip="请输入支行名称" autocomplete="off" ng-model="user.bankBranchName" name="bankBranchName">
</div>
</div>
<div class="form-group">
<div class="card-set-as-default col-xs-4 col-xs-offset-4">
<span class="sl-icon-checkbox-checked"></span>
设为默认
</div>
</div>
</form>
</div>
</div>
<div class="modal-footer">
<a class="btn btn-link " data-dismiss="modal">取消</a>
<button id="bankChoose" class="btn btn-secondary" ng-disabled="user.account==''||user.accountSure==''||user.bankBranchName==''||user.account!=user.accountSure||addCardForm.bankBranchName.$invalid || confirming" ng-click="confirmAddCard()" type="submit" disabled="disabled">确定</button>
</div>
</div>
</div>
</div>
</div>
<div id="loadMoneyWizard" class="modal fade ng-isolate-scope" aria-hidden="true" aria-labelledby="loadMoneyWizardLabel" role="dialog" summary="summary" next-modal="#loadMoneyFinish" sl-load-money="">
<div class="modal-dialog modal-lg">
<div class="modal-content loadMoneyModal">
<div class="modal-header">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<span class="modal-title" ng-hide="investLoanId">账户充值</span>
<div class="ng-hide" ng-show="investLoanId">
<img class="partner-logo" src="/static/images/market/letv-logo.png">
<img class="dr-logo" src="/static/images/market/letv/dianrong-logo.png">
<span>恭喜！你离获得9%年化利率只差一步咯！大家都在团里等着你呢!</span>
</div>
</div>
<div class="modal-body summary-section">
<form class="loadMoneyForm ng-pristine ng-invalid ng-invalid-required" novalidate="" target="_blank" name="loadMoneyForm">
<div class="row addLightBorder ng-isolate-scope" sl-popover="investAmountError" data-original-title="" title="">
<label class="col-xs-1 inputNumberText ng-binding">充值金额</label>
<div class="col-xs-2 inputNumber">
<input class="form-control textFrame ng-pristine ng-invalid ng-invalid-required" type="text" sl-less-than="1000000000000" sl-greater-than="0" sl-decimal-digits="2" sl-valid-number="" required="" ng-show="!investLoanId" placeholder="充值金额" ng-model="load.amount" name="transferAmt">
<div class="ng-scope" ng-class="ng-hide" name="transferAmt" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">金额不能为空</span>
<span class="ng-scope" for="validNumber" sl-error-message="">金额须为合法的整数或者小数,不能包含字母等字符</span>
<span class="ng-scope" for="decimalDigits" sl-error-message="">金额最大支持两位小数</span>
<span class="ng-scope" for="greaterThan" sl-error-message="">金额须大于0</span>
<span class="ng-scope" for="lessThan" sl-error-message="">金额须小于1万亿</span>
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
0
<small>.00元</small>
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
<span class="first-icon sl-icon-checkbox-unchecked"></span>
<span class="second-icon sl-icon-checkbox-checked"></span>
</span>
<input id="checkbox1" type="checkbox" data-toggle="checkbox">
使用礼券
</label>
</div>
<div class="ng-hide" ng-show="isIE8">
<input type="checkbox" ng-click="showCoupon=!showCoupon">
使用礼券
</div>
</div>
</div>
<div class="row payType">
<label class="col-xs-1 inputNumberText">充值方式</label>
<div class="ng-scope" ng-if="!isIE8">
<div class="col-xs-2 inputNumber paybank-list" ng-click="load.payType='bank'">
<label class="radio checked">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="load.payType" value="bank" name="payType" checked="checked">
<span>
<a class="btn rechargeType activeType" ng-class="{activeType:load.payType=='bank'}" href="" style=""> 网上银行充值</a>
</span>
</label>
</div>
<div class="col-xs-2 inputNumber paybank-list thirdPartyLeft" ng-click="load.payType='thirdParty'">
<label class="radio">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="load.payType" value="thirdParty" name="payType">
<span>
<a class="btn rechargeType" ng-class="{activeType:load.payType=='thirdParty'}" href=""> 第三方支付平台</a>
</span>
</label>
</div>
</div>
</div>
<div class="row">
<div class="" ng-show="bankType">
<label class="col-xs-1 inputNumberText">选择银行</label>
<div class="ng-scope" ng-if="!isIE8">
<div class="col-xs-11 inputNumber chooseBank">
<div id="paybank-list" class="paybank-list">
<label class="radio paybank-item first paybank-item-style ng-scope checked" ng-repeat="bank in addfundBanklist | limitTo:5">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="ICBC" name="bankType" checked="checked">
<span class="bank-logo bank-icbc"></span>
</label>
<label class="radio paybank-item first paybank-item-style ng-scope" ng-repeat="bank in addfundBanklist | limitTo:5">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="ABC" name="bankType">
<span class="bank-logo bank-abc"></span>
</label>
<label class="radio paybank-item first paybank-item-style ng-scope" ng-repeat="bank in addfundBanklist | limitTo:5">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="BOC" name="bankType">
<span class="bank-logo bank-boc"></span>
</label>
<label class="radio paybank-item first paybank-item-style ng-scope" ng-repeat="bank in addfundBanklist | limitTo:5">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="CCB" name="bankType">
<span class="bank-logo bank-ccb"></span>
</label>
<label class="radio paybank-item first paybank-item-style ng-scope" ng-repeat="bank in addfundBanklist | limitTo:5">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="MB" name="bankType">
<span class="bank-logo bank-mb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="BC" name="bankType">
<span class="bank-logo bank-bc"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="CB" name="bankType">
<span class="bank-logo bank-cb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="CEB" name="bankType">
<span class="bank-logo bank-ceb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="HB" name="bankType">
<span class="bank-logo bank-hb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="CMB" name="bankType">
<span class="bank-logo bank-cmb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="GDB" name="bankType">
<span class="bank-logo bank-gdb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="SDB" name="bankType">
<span class="bank-logo bank-sdb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="IB" name="bankType">
<span class="bank-logo bank-ib"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="SPDB" name="bankType">
<span class="bank-logo bank-spdb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="BOB" name="bankType">
<span class="bank-logo bank-bob"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="SPB" name="bankType">
<span class="bank-logo bank-spb"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="PSBC" name="bankType">
<span class="bank-logo bank-psbc"></span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="ICBCB2B" name="bankType">
<span class="bank-logo bank-icbcb2b"></span>
<span class="paybank-ico-cop ng-scope" ng-if="bank.isB2B">企业</span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="MBB2B" name="bankType">
<span class="bank-logo bank-mbb2b"></span>
<span class="paybank-ico-cop ng-scope" ng-if="bank.isB2B">企业</span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="CCBB2B" name="bankType">
<span class="bank-logo bank-ccbb2b"></span>
<span class="paybank-ico-cop ng-scope" ng-if="bank.isB2B">企业</span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="ABCB2B" name="bankType">
<span class="bank-logo bank-abcb2b"></span>
<span class="paybank-ico-cop ng-scope" ng-if="bank.isB2B">企业</span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="SPDBB2B" name="bankType">
<span class="bank-logo bank-spdbb2b"></span>
<span class="paybank-ico-cop ng-scope" ng-if="bank.isB2B">企业</span>
</label>
<label class="radio paybank-item paybank-item-style ng-scope ng-hide" ng-repeat="bank in banklistOfLast" ng-show="moreBanks">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="$parent.load.bank" value="CEBB2B" name="bankType">
<span class="bank-logo bank-cebb2b"></span>
<span class="paybank-ico-cop ng-scope" ng-if="bank.isB2B">企业</span>
</label>
</div>
</div>
</div>
</div>
<div class="ng-hide" ng-show="!bankType">
<label class="col-xs-1 inputNumberText">支付平台</label>
<div class="col-xs-11 inputNumber chooseBank">
<div class="paybank-list">
<div class="ng-scope" ng-if="!isIE8">
<label class="radio paybank-item">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="load.bank" value="tenpay" name="bankType">
<span class="bank-logo bank-tenpay" title="财付通"></span>
<span class="bank-name hidden">财付通</span>
</label>
<label class="radio paybank-item">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input class="ng-pristine ng-valid ng-valid-required" type="radio" required="" data-toggle="radio" ng-model="load.bank" value="sina_payment" name="bankType">
<span class="bank-logo bank-sinaPayment" title="微钱包"></span>
<span class="bank-name hidden">微钱包</span>
</label>
</div>
</div>
</div>
</div>
</div>
<div class="ng-scope" ng-if="!isIE8">
<div class="col-xs-2 showOtherBank ng-scope" ng-if="bankType && !moreBanks">
<a ng-click="changing()" href="">
选择其他银行
<span class="sl-icon-triangle-down-small"></span>
</a>
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
<td colspan="8">*中国工商银行服务热线 95588</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="row">
<div class="col-xs-10 buttonRecharge">
<a class="btn btn-primary rechargeMoney" ng-click="confirmAddFund()" ng-disabled="loadMoneyForm.transferAmt.$invalid || confirming" disabled="disabled">充 值</a>
</div>
</div>
<div class="row footer" ng-hide="investLoanId">
<span>
充值遇到问题？请点击
<a target="_blank" href="/public/help-center#/faq">帮助中心</a>
</span>
<span class="contact">点融客服：400-921-9218</span>
</div>
<div class="row footer ng-hide" ng-show="investLoanId">
<span>投资遇到问题？请联系点融客服：400-921-9218</span>
</div>
<div>
<input type="hidden" value="NEW_SITE_CLIENT" name="serviceClientCallback">
</div>
</form>
</div>
</div>
</div>
</div>
<div id="loadMoneyFinish" class="modal fade" aria-hidden="true" aria-labelledby="loadMoneyFinishLabel" role="dialog" sl-load-money-finish="">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 id="myModalLabel" class="modal-title">完成充值</h4>
</div>
<div class="modal-body">
<p>请在新开网银页面完成充值后选择：</p>
<h6>充值成功</h6>
<p class="">
查看
<a target="_blank" href="/account/my-account#/transfer">充值记录</a>
</p>
<h6>充值失败</h6>
<p class="">
查看充值
<span>
<a target="_blank" href="/public/help-center#/faq/article/0/11">失败原因</a>
</span>
或联系我们客服（400-921-9218）
</p>
</div>
</div>
</div>
</div>
<div id="withdrawMoneyWizard" class="modal fade" aria-hidden="true" aria-labelledby="withdrawMoneyWizardLabel" role="dialog" sl-withdraw-money="">
<div class="modal-dialog">
<div class="modal-content">
<form class="ng-pristine ng-invalid ng-invalid-required" novalidate="" name="withdrawMoneyForm">
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
0
<small>.00元</small>
</span>
</h6>
<div class="form-horizontal">
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">持卡人</label>
<div class="col-xs-5">
<p class="form-control-static ng-binding">黄金</p>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">银行卡号</label>
<div class="col-xs-5">
<p class="form-control-static ng-binding"></p>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">提现银行</label>
<div class="col-xs-5 ng-scope" required="" tooltip-placement="right" tooltip-trigger="never" tooltip="请添加银行卡">
<div class="form-control">
<select class="select-options ng-pristine ng-valid" ng-model="withdrawMoneyForm.bankName">
<option value="">请选择</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="中国工商银行">中国工商银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="中国农业银行">中国农业银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="中国银行">中国银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="中国建设银行">中国建设银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="交通银行">交通银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="中信银行">中信银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="中国光大银行">中国光大银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="华夏银行">华夏银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="中国民生银行">中国民生银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="广东发展银行">广东发展银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="深圳发展银行">深圳发展银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="招商银行">招商银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="兴业银行">兴业银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="上海浦东发展银行">上海浦东发展银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="北京银行">北京银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="城市商业银行">城市商业银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="农村信用合作社">农村信用合作社</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="盛京银行">盛京银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="天津银行">天津银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="宁波银行">宁波银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="重庆银行">重庆银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="温州银行">温州银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="南京银行">南京银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="江苏银行">江苏银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="深圳平安银行">深圳平安银行</option>
<option class="ng-binding ng-scope" ng-selected="v.label == withdrawMoneyForm.bankName" ng-repeat="v in withdrawBanklist" value="中国邮政储蓄银行">中国邮政储蓄银行</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">开户省</label>
<div class="col-xs-5">
<div class="form-control short-select">
<select class="select-options ng-pristine ng-invalid ng-invalid-required" required="" ng-change="getCities(withdrawMoneyForm.bankProvince, false)" ng-options="p.province as p.province for p in provinces" ng-model="withdrawMoneyForm.bankProvince">
<option class="" value="">请选择</option>
<option value="0">北京</option>
<option value="1">天津</option>
<option value="2">河北</option>
<option value="3">山西</option>
<option value="4">内蒙古</option>
<option value="5">辽宁</option>
<option value="6">吉林</option>
<option value="7">黑龙江</option>
<option value="8">上海</option>
<option value="9">江苏</option>
<option value="10">浙江</option>
<option value="11">安徽</option>
<option value="12">福建</option>
<option value="13">江西</option>
<option value="14">山东</option>
<option value="15">河南</option>
<option value="16">湖北</option>
<option value="17">湖南</option>
<option value="18">广东</option>
<option value="19">广西</option>
<option value="20">海南</option>
<option value="21">重庆</option>
<option value="22">四川</option>
<option value="23">贵州</option>
<option value="24">云南</option>
<option value="25">西藏</option>
<option value="26">陕西</option>
<option value="27">甘肃</option>
<option value="28">青海</option>
<option value="29">宁夏</option>
<option value="30">新疆</option>
</select>
</div>
<label class="control-label">开户市</label>
<div class="form-control short-select">
<select class="select-options ng-pristine ng-invalid ng-invalid-required" required="" ng-options="v for v in cities" ng-model="withdrawMoneyForm.bankCity">
<option class="" value="">请选择</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">开户支行名称</label>
<div class="col-xs-5">
<input class="form-control ng-pristine ng-invalid ng-invalid-required" type="text" required="" placeholder="输入开户支行名称(xxx银行xxx支行)" ng-model="withdrawMoneyForm.bankBranchName">
</div>
</div>
<div class="form-group withdraw-amount-row">
<label class="col-xs-3 col-xs-offset-1 control-label">提现金额</label>
<div class="col-xs-5">
<input id="amount" class="form-control ng-scope ng-pristine ng-invalid ng-invalid-required" type="text" sl-greater-than="0" required="" tooltip-placement="right" tooltip-trigger="focus" placeholder="输入提现金额" tooltip="金额须大于0且小于可提现金额" ng-model="withdrawMoneyForm.amount" name="withdrawAmt">
<span class="yuan">元</span>
</div>
</div>
<div class="warning-tip">
<div class="col-xs-3 col-xs-offset-1"></div>
<div class="col-xs-6">谨慎填写信息，提现才会成功哦！</div>
</div>
</div>
</div>
<div class="modal-footer ng-scope">
<a class="btn btn-link" ng-click="dismissWizard()" data-dismiss="modal" href="#">取消</a>
<a class="btn btn-secondary" ng-click="confirmWithdraw()" ng-disabled="!withdrawMoneyForm.amount || withdrawMoneyForm.amount<=0 || withdrawMoneyForm.$invalid||withdrawMoneyForm.amount>summary.availableWithdrawCash||inputCard==='addCard' || withdrawing" disabled="disabled">下一步</a>
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
<div id="phoneModal" class="modal fade verify-modal" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" ng-click="cancelVerifyPhone()" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 class="modal-title">绑定手机</h4>
</div>
<div class="modal-body">
<p class="verify-tips ng-binding"> 为了你的账户安全，提现请先绑定手机 </p>
<form class="form-horizontal verifyCellphoneForm ng-pristine ng-invalid ng-invalid-required" novalidate="" role="form" name="verifyCellphoneForm">
<div class="row">
<div class="col-xs-3 info-value text-center">绑定手机</div>
<div class="col-xs-8 input-phone-number">
<input class="form-control phone input-sm ng-pristine ng-invalid ng-invalid-required" type="text" sl-mobile-phone="" autocomplete="off" placeholder="输入绑定的手机号码，提升安全等级" maxlength="11" required="" ng-model="verificationInfo.phone" ng-class="{inputError:cellphoneVerification.phoneError}" name="phone">
<div class="ng-hide ng-scope" name="phone" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="mobilePhone" sl-error-message="">手机号码格式不正确</span>
</span>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">验证码</div>
<div class="col-xs-5">
<input class="form-control phone-verify-input input-sm ng-pristine ng-invalid ng-invalid-required" type="text" placeholder="输入验证码" ng-model="verificationInfo.phoneVerifyCode" maxlength="6" required="" ng-class="{inputError:cellphoneVerification.verifyCodeError}" name="phoneVerifyCode">
</div>
<div class="col-xs-3 send-phone-code-btn">
<a class="btn btn-secondary btn-bg-blue verifyPhoneSubmit ng-binding" ng-disabled="verifyCellphoneForm.phone.$invalid|| cellphoneVerification.phoneCodeSent || cellphoneVerification.phoneCodeSending" title="点击发送验证码" ng-click="sendPhoneCode()" disabled="disabled">
发送验证码
<span class="phoneCountDown ng-binding ng-hide" ng-show="cellphoneVerification.phoneCodeSent">（60）</span>
</a>
<small class="phone-code-info ng-binding ng-hide" ng-bind="cellphoneVerification.codemsg" ng-show="cellphoneVerification.phoneCodeSent"></small>
</div>
</div>
<div class="row">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="bind-red display-block ng-binding" ng-bind="cellphoneVerification.msg | addAsterisk"></span>
</div>
</div>
<div class="row">
<div class="col-xs-11">
<span class="btn-group">
<a class="btn btn-secondary btn-confirm big-btn ng-binding" ng-click="submitVerificationCode('topup')" href="">立即验证，进行提现</a>
</span>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div id="identifyModal" class="modal fade verify-modal" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" ng-click="cancelBindIDAndName()" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 class="modal-title">实名认证</h4>
</div>
<div class="modal-body">
<p class="verify-tips ng-binding">
为了你的账户安全，提现前请填写认证信息。
<br>
并请确保所填写的姓名与取现银行卡的开户名一致。
</p>
<div class="row">
<div class="col-xs-3 info-value text-center">真实姓名</div>
<div class="col-xs-8">
<input class="form-control input-sm ng-pristine ng-valid" ng-focus="userIdentity.realNameError = false" placeholder="输入您的真实姓名" ng-model="userIdentity.realName" ng-class="{inputError:userIdentity.realNameError}">
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">身份证号</div>
<div class="col-xs-8">
<input class="form-control input-sm ng-pristine ng-valid" maxlength="18" ng-focus="userIdentity.idNumberError = false" placeholder="输入18位身份证号" ng-model="userIdentity.idNumber" ng-class="{inputError:userIdentity.idNumberError}">
</div>
</div>
<div class="row">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="bind-red display-block ng-binding" ng-bind="userIdentity.msg | addAsterisk"></span>
</div>
</div>
<div class="row">
<div class="col-xs-11">
<span class="btn-group">
<a class="btn btn-secondary btn-confirm big-btn ng-binding" ng-click="bindIDAndName('topup')" href="">立即验证，进行提现</a>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="informationModal" class="modal fade information-modal" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" ng-click="cancelVerifyPhone()" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 class="modal-title">完善个人信息</h4>
</div>
<div class="modal-body">
<div class="row ng-binding"> 用户黄金**************1123： </div>
<div class="row">
您还未验证您的
<span class="" ng-show="basicProfile.profile.realName">身份证号</span>
<span class="ng-hide" ng-show="!basicProfile.profile.realName">真实姓名</span>
，请致电客服电话
</div>
<div class="row telephone"> 400-921-9218 </div>
<div class="row"> 完善个人信息，继续赚钱投资 </div>
</div>
</div>
</div>
</div>
<div id="improveInfo" class="modal fade add-card" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 id="ModalLabe" class="modal-title">完善信息</h4>
</div>
<div class="modal-body summary-section">
<div>
你的个人信息还未完善，请先完善
<a ng-click="jumpToProfile()" href="">基本信息</a>
，保证资金安全。
</div>
</div>
</div>
</div>
</div>
<div id="mobileWithdraw" class="modal fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" style="padding: 5px 19px 30px 24px">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
</div>
<div class="modal-body text-center">
<p style="margin-bottom: 3px;font-size: 16px;">程序员小哥正在努力完成网页认证银行卡提现功能</p>
<p style="margin-bottom: 3px;font-size: 16px;">将在1月7日前完成，抱歉带给您不便！</p>
<p style="margin-bottom: 3px;margin-top: 40px;font-size: 14px; color: gray;">请扫描下面二维码去手机端提现</p>
<img class="partner-logo" src="/static/images/account/qr-to-mobile.png" style="width: 250px;">
<p style="margin-bottom:-10px;margin-top: 70px;font-size: 11px;color: gray;">
有任何疑问请致电客服400-921-9218。或发送邮件至
<a href="mailto:support@dianrong.com">support@dianrong.com</a>
</p>
</div>
</div>
</div>
</div>
<div id="notBindBankcardModal" class="modal fade not-bind-bank-modal" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 class="modal-title">提现</h4>
</div>
<div class="modal-body">
<div class="content-tip">你尚未绑定取现银行卡</div>
<div class="row text-center">
<a class="btn btn-secondary btn-confirm big-btn" ng-click="gotoAddBankCard()">去绑定</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
    </div> 
    <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-hidden="true"> 
     <div class="modal-dialog"> 
      <div class="modal-content"> 
       <div class="modal-body"> 
        <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
        <div class="new-user-title text-center"> 
         <img src="images/new-user-title.png" /> 
        </div> 
        <div class="row new-user-wrapper"> 
         <div class="col-xs-4 col-xs-offset-1 new-user-text text-center"> 
          <h2 ng-show="!fromLC">一手消息</h2> 
          <h2 ng-show="!fromLC">马上掌握</h2> 
          <div class="bg-new-share-wel" ng-show="fromLC"></div> 
          <div class="info-new-share text-center" ng-show="fromLC">
           14%预期年化收益率 只给首次投资的你哦
          </div> 
          <div class="btn-invest" ng-show="fromLC">
           <a class="btn  btn-action" href="index.html" ng-click="linkToRecharge()">立即充值投资</a>
          </div> 
          <div ng-show="!fromLC">
           <a class="btn btn-block btn-action" href="market.html" target="_blank">立即投资</a>
          </div> 
         </div> 
         <div class="col-xs-5 col-xs-offset-1 qr"> 
          <img src="images/qr-sub.png" /> 
          <p>立即扫描或搜索&quot;dianrongapi&quot;</p> 
          <p>关注点融网官方微信</p> 
         </div> 
        </div> 
        <div class="new-user-footer hidden"> 
         <img src="images/new-user-footer.png" /> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
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

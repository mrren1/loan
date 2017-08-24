@extends('layouts.public')

@section('title', '自动投标')
 
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
<div class="auto-invest content-wrapper ng-scope">
<header class="section-header">
<h6 class="section-header-title">自动投标</h6>
</header>
<section class="summary-section">
<div class="row">
<div class="col-xs-8">
<div class="tip-wrapper">
<header class="header">
<h6 class="header-label">自动投标工具说明</h6>
</header>
<div>
<ul class="my-account-tip">
<li>
<p>当符合条件的自动投标金额总额大于当前可投标金额时,系统会自动开启公平的排队系统。</p>
</li>
<li>
<p>为严格保护出资人利益,系统会指定每笔自动投标对于贷款总额的百分比上限,以分散风险,获得更高收益。</p>
</li>
<li>
<p>自动投标为免费业务，点融网不收取任何附加费用。</p>
</li>
</ul>
</div>
</div>
</div>
<div class="col-xs-4">
<div class="status-wrapper">
<div id="auto-switch-wrapper" class="switch switch-square">
<div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-large bootstrap-switch-animate bootstrap-switch-id-auto-switch">
<div class="bootstrap-switch-container">
<span class="bootstrap-switch-handle-on bootstrap-switch-primary">开启状态</span>
<label class="bootstrap-switch-label" for="auto-switch">开启自动投标</label>
<span class="bootstrap-switch-handle-off bootstrap-switch-default">关闭状态</span>
<input id="auto-switch" type="checkbox" data-off-text="关闭状态" data-on-text="开启状态" data-size="large">
</div>
</div>
</div>
<div class="balance-sheet">
<h4 class="highlighted-sum available-cash ng-binding" ng-bind-html="cart.availableToInvest|slMoney">
0
<small>.00元</small>
</h4>
<p class="highlighted-sum-caption">可用余额</p>
<a class="btn btn-secondary btn-embossed" href="member_pay.html">
<span class="sl-icon-piggy-bank"></span>
充值
</a>
</div>
</div>
</div>
</div>
</section>
<section class="summary-section section-block ng-hide" ng-show="form.enabled">
<ul class="nav nav-tabs make-left">
<li class="active">
<a id="invest-tool-a" data-toggle="tab" href="#advanced-invest-tool">自动投标设置</a>
</li>
</ul>
<div class="tab-content">
<div id="advanced-invest-tool" class="tab-pane active">
<div class="auto-invest-option row">
<div class="col-xs-2 text-right">
<label>投资金额区间</label>
</div>
<div class="col-xs-9">
<div id="amount-range" class="amount-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;">
<div class="range-bg"></div>
<div class="slider-tip tip-left hidden"></div>
<div class="slider-tip tip-right hidden"></div>
</div>
<a class="ui-slider-handle ui-state-default ui-corner-all left" href="" style="left: 0%;"></a>
<a class="ui-slider-handle ui-state-default ui-corner-all right" href="" style="left: 100%;"></a>
</div>
</div>
</div>
<div class="auto-invest-option row">
<div class="col-xs-2 text-right">
<label>风险利率</label>
</div>
<div class="col-xs-9">
<div id="rate-range" class="rate-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
<div class="ui-slider-range ui-widget-header ui-corner-all slider-grade-range" style="left: 0%; width: 100%;">
<div class="range-bg"></div>
<div class="slider-tip tip-left hidden"></div>
<div class="slider-tip tip-right hidden"></div>
</div>
<a class="ui-slider-handle ui-state-default ui-corner-all left" href="" style="left: 0%;"></a>
<a class="ui-slider-handle ui-state-default ui-corner-all right" href="" style="left: 100%;"></a>
</div>
<div class="grade-legend">
<ul class="list-inline list-unstyled">
<li class="legend-a">A</li>
<li class="legend-b">B</li>
<li class="legend-c">C</li>
<li class="legend-d">D</li>
<li class="legend-e">E</li>
<li class="legend-f">F</li>
</ul>
</div>
</div>
</div>
<div class="auto-invest-option row">
<div class="col-xs-2 text-right">
<label>借款期限</label>
</div>
<div class="col-xs-9">
<div id="term-range" class="term-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
<div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 100%;"></div>
<a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;">
<span class="left-arrow"></span>
<span class="text">24个月</span>
<span class="right-arrow"></span>
</a>
</div>
</div>
</div>
<div id="loan-type-option" class="auto-invest-option row">
<div class="col-xs-2 text-right">
<label>投资类型</label>
</div>
<div class="col-xs-9">
<div>
<label class="radio checked">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input type="radio" checked="" data-toggle="radio" value="" name="loanType">
所有
</label>
<label class="radio">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input type="radio" data-toggle="radio" value="BUSINESS" name="loanType">
商业
</label>
<label class="radio">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input type="radio" data-toggle="radio" value="PERSONAL" name="loanType">
个人
</label>
</div>
</div>
</div>
<div id="repayment-method-option" class="auto-invest-option row">
<div class="col-xs-2 text-right">
<label>还款方式</label>
</div>
<div class="col-xs-9">
<div>
<label class="radio checked">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input type="radio" checked="" data-toggle="radio" value="" name="paymentMode">
所有
</label>
<label class="radio">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input type="radio" data-toggle="radio" value="AMORTIZED" name="paymentMode">
等额本息
</label>
<label class="radio">
<span class="icons">
<span class="first-icon sl-icon-radio-unchecked"></span>
<span class="second-icon sl-icon-radio-checked"></span>
</span>
<input type="radio" data-toggle="radio" value="NOT_AMORTIZED" name="paymentMode">
每月还息，按期还本
</label>
</div>
</div>
</div>
<div id="pernote-input" class="auto-invest-option row">
<div class="col-xs-2 text-right">
<label>每笔投资金额</label>
</div>
<div class="col-xs-4">
<input class="form-control input-sm ng-pristine ng-valid" type="text" ng-model="advancedForm.maxPerLoan">
<span class="input-icon">元</span>
</div>
<div class="col-xs-6"> </div>
</div>
<div id="min-balance-input" class="auto-invest-option row">
<div class="col-xs-2 text-right">
<label>账户保留金额</label>
</div>
<div class="col-xs-4">
<input class="form-control input-sm ng-pristine ng-valid" type="text" ng-model="advancedForm.minBalance">
<span class="input-icon">元</span>
</div>
<div class="col-xs-6">
<small class="common-color"> 当你账户的可投资金额大于这个金额时，自动投资才会生效 </small>
</div>
</div>
<div class="auto-invest-option row">
<div class="col-xs-11 text-right">
<a class="btn btn-primary" ng-click="advancedSubmit()">保存</a>
</div>
</div>
</div>
</div>
</section>
<div id="auto-invest-switch" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h6 id="myModalLabel" class="modal-title">关闭自动投标</h6>
</div>
<div class="modal-body">
<div class="modal-wrapper">
<div class="summary-section">
<p>自动投标可以帮助你更有效率的进行投资</p>
<h4 class="switch-confirm">确定关闭自动投标功能？</h4>
</div>
</div>
</div>
<div class="modal-footer">
<a class="btn btn-link" ng-click="closeModal()">取消</a>
<a class="btn btn-primary" ng-click="disableTool()">确定</a>
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
          $(".change5").addClass('active');            
      })
  </script>

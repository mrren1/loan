@extends('layouts.public')

@section('title', '好友') 

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
<div class="invest-history content-wrapper ng-scope">
<div class="nav-wrapper">
<ul id="invest-history-tab" class="nav nav-tabs">
<li class="active" ng-click="updateByGroup('MyNotesNew')">
<a data-toggle="tab" href="#ih-myNotes">
</a>
</li>
</ul>
</div>
<section class="summary-sec">
<div class="tab-content">
<div id="ih-myNotes" class="tab-pane active my-notes">
<div class="my-notes-row">
<div class="my-notes-summary">
<div class="row summary-section">
<div class="col-xs-5 divider monthly">

</div>
<div class="col-xs-5 dayly">


</div>
</div>
</div>
</div>
<div class="table-wrapper ng-hide" ng-show="bad">
<h2 class="text-center loading-animation ng-hide" ng-show="myNotesLoading">
<i class="spinner sl-icon-loading"></i>
</h2>
<div>
<div class="notes-table">
<div class="data-table-wrapper ng-isolate-scope" params="myNotesParams" data="myNotesData" columns="notesBadColumns" init="myNotesInit(ele)">
<table class="table data-table table-hover table-striped ">
<thead>
<tr>
<th class="ng-scope tc" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">
<div class="dropdown type" style="padding-top:5px;padding-left: 7px;">
<a class="sortable header-arrow-down" href="#" data-toggle="dropdown">呵呵</a>
<ul class="dropdown-menu" aria-labelledby="dLabsel" role="menu">
<i class="table-dropdown-arrow"></i>
<i class="table-dropdown-arrow2"></i>
<li>
<a data-loan-filter="" role="menuitem">全部</a>
</li>
<li>
<a data-loan-filter="PERSONAL" role="menuitem">个人</a>
</li>
<li>
<a data-loan-filter="BUSINESS" role="menuitem">商业</a>
</li>
</ul>
</div>
</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-

dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span class="sortable" ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">借款利率</span>
<span class="sl-icon-pointer-down-dark" ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 

'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span class="sortable" ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">投资金额</span>
<span class="sl-icon-pointer-down-dark" ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 

'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">剩余本金</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-

dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">剩余利息</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-

dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-

dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)"></span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-

dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
</tr>
</thead>
<tbody> </tbody>
</table>
</div>
</div>
<div class="alert alert-warning clearfix" ng-show="!myNotesLoading && ( !totalRecords || totalRecords<=0)">
无任何记录
<a class="close sl-icon-cross" aria-hidden="true" data-dismiss="alert"></a>
</div>
<div class="notes-pagination ng-hide" ng-show="totalRecords>0">
<div class="sl-pagination pagination ng-isolate-scope" params="myNotesParams" total-records="totalRecords" page-size="myNotesParams.pageSize" page="myNotesParams.page">
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
</div>
</div>
<div class="table-wrapper" ng-show="!bad">
<h2 class="text-center loading-animation ng-hide" ng-show="myNotesLoading">
<i class="spinner sl-icon-loading"></i>
</h2>
<div>
<div class="notes-table">
<div class="data-table-wrapper ng-isolate-scope" params="myNotesParams" data="myNotesData" columns="myNotesColumns" init="myNotesInit(ele)">
<!--这里-->
<table class="table data-table table-hover table-striped ">


</div>
</span>


  <table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
      <tr class="text-c">
        <td width="10">好友id</td>
        <td width="10">好友头像</td>
         <td width="10">好友名称</td>
      </tr>
    </thead>
    <tbody id="box">
    <?php foreach ($res as $key => $value) {?>
      <tr>
        <td><?php echo $value['user_id'] ?></td>
        <td><img src="uploads/<?php echo $value['user_photo'] ?>" height="30" alt=""></td>
        <td><?php echo $value['user_name'] ?></td>
    </tr>
  <?php  } ?>
      </tbody>
  </table>

<div class="notes-pagination ng-hide" ng-show="totalRecords>0">
<div class="sl-pagination pagination ng-isolate-scope" params="myNotesParams" total-records="totalRecords" page-size="myNotesParams.pageSize" page="myNotesParams.page">
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

<div class="sell-note">
<div class="alert alert- ng-hide" ng-show="msg.length > 0" timeout="cancelTimeout" msg="cancelMsg" type="cancelType">
<a class="close sl-icon-cross" aria-hidden="true" ng-click="close()" type="button"></a>
</div>
</div>
</div>
</div>
<div class="row summary-section">
<div id="mynote-sellnote" class="hidden">
<h6 class="loading-animation text-center" ng-show="gettingNoteInfo">
<i class="spinner sl-icon-loading"></i>
</h6>
<div class="ng-hide" ng-show="!gettingNoteInfo">
<header class="section-header">
<a id="back-to-details" class="header-label" ng-click="openSellNote=false" href="">
<span class="glyphicon glyphicon-chevron-left"></span>
返回详情
</a>
</header>
<section class="sell-note-wrapper">
<div class="row">
<div class="col-xs-12">
<div class="alert alert-success ng-hide" ng-show="msg.length > 0" timeout="sellNoteTimeout" msg="sellNoteMsg" type="sellNoteMsgType">
<a class="close sl-icon-cross" aria-hidden="true" ng-click="close()" type="button"></a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-6 calculator">
<div class="sec-add text-right">
<div>
<div class="row prip-wrapper">
<div class="col-xs-3 col-xs-offset-1">
<h5 class="sec-label">剩余本金</h5>
</div>
<div class="col-xs-7 value">
<h5 class="ng-binding" ng-bind-html="sellNoteInfo.remainingPrincipal|slMoney:false:false:2:true">
0
<small>.00</small>
</h5>
</div>
</div>
<div class="row int-wrapper">
<div class="col-xs-1">
<h5 class="plus-sign">+</h5>
</div>
<div class="col-xs-3">
<h5 class="sec-label">剩余利息</h5>
</div>
<div class="col-xs-7 value">
<h5 class="int-value ng-binding" ng-bind-html="sellNoteInfo.remainingInterest|slMoney:false:false:2:true">
0
<small>.00</small>
</h5>
</div>
</div>
</div>
</div>
<div class="sec-total text-right">
<div class="row">
<div class="col-xs-3 col-xs-offset-1">
<h5 class="sec-total-label sec-label">总计</h5>
</div>
<div class="col-xs-7">
<h3 class="sec-total-value ng-binding" ng-bind-html="sellNoteInfo.remainingPrincipal + sellNoteInfo.remainingInterest|slMoney">
0
<small>.00元</small>
</h3>
</div>
</div>
</div>
</div>
<div class="col-xs-6 price-form">
<div class="text-right">
<div class="row">
<label class="col-xs-5"> 转让价 </label>
<div class="col-xs-7">
<input class="form-control pr-input text-right ng-pristine ng-valid" type="text" name="sellPrice" ng-model="sellNoteInfo.sellPrice">
<span class="input-icon pr-icon">元</span>
<div class="alert alert-danger ng-binding ng-hide" ng-show="hasError"></div>
</div>
</div>
<div class="row">
<label class="col-xs-5"> 转让手续费 </label>
<div class="col-xs-7">
<p class="rt-value pr ng-binding" ng-bind="sellNoteInfo.fee | slCurrency">0.00元</p>
</div>
</div>
<div class="row">
<label class="col-xs-5"> 实收转让金额 </label>
<div class="col-xs-7">
<p class="rt-value pr ng-binding" ng-bind="sellNoteInfo.actualPrice | slCurrency">0.00元</p>
</div>
</div>
<div class="row">
<label class="col-xs-5"> 转让挂牌天数 </label>
<div class="col-xs-7">
<div class="day-dropdown">
<div class="btn-group select select-block mbn ng-isolate-scope" btn-style="btn-inverse" selected-name="sellNoteInfo.day" options="sellDays">
<button class="btn dropdown-toggle clearfix btn-inverse" data-toggle="dropdown">
<span class="filter-option pull-left ng-binding"></span>
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu"> </ul>
<select class="form-control hide" name=""> </select>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-7 col-xs-offset-5">
<label>
<span class="sl-icon-check agreeDeal"> </span>
同意
<a target="_blank" href="/public/terms-of-use?protocol=secondary-market-agreement">借款转让协议</a>
</label>
<div class="alert alert-danger ng-hide" ng-show="!sellNoteInfo.agreeAgreement">请同意我们的协议</div>
</div>
</div>
<div class="row text-right">
<div class="col-xs-12">
<span class="loading-animation ng-hide" ng-show="sellingNotes">
<i class="spinner sl-icon-loading"></i>
</span>
<a class="btn btn-link" data-dismiss="modal" ng-click="openSellNote=false" href="">取消</a>
<a class="btn btn-primary" ng-disabled="sellingNotes || sellNoteInfo.sold" ng-click="sellNoteNow()" href="">确认出售债权</a>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
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
          $(".change4").addClass('active');            
      })
  </script>
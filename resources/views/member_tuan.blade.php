@extends('layouts.public')

@section('title', '团团赚')
  
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
<div class="group-buy content-wrapper ng-scope">
<header class="plans-header plans-subsection" ng-show="showPlanList">
<p class="plans-header-title">团团赚总览</p>
</header>
<h2 class="text-center ng-hide" ng-show="pageLoading">
<i class="spinner sl-icon-loading"></i>
</h2>
<div class="tab-content" ng-show="!pageLoading && showPlanList">
<div class="plans-summary clearfix row">
<div class="col-xs-2 summary-subsection">
<img class="tuan-summary-img" src="images/plan-tuan.png">
<p class="tuan-summary-title text-center">团团赚</p>
</div>
<div class="col-xs-2 text-center summary-subsection highlighted-cont">
<h3 class="highlighted-sum ng-binding" ng-bind-html="allInterestReceived | slMoney">
0
<small>.00元</small>
</h3>
<p class="font-gray">累计利息收益</p>
</div>
<div class="col-xs-2 summary-subsection text-center highlighted-cont">
<h4 class="default-sum ng-binding">
0
<small>元</small>
</h4>
<p class="font-gray">加入总金额</p>
</div>
<div class="col-xs-2 summary-subsection text-center highlighted-cont">
<h4 class="default-sum ng-binding">
0
<small>笔</small>
</h4>
<p class="font-gray">持有标数量</p>
</div>
</div>
<div class="bg-content">
<div class="plan-invest-header row">
<div class="col-xs-1 font-gray text-center">名称</div>
<div class="col-xs-2 font-gray text-left interest-info">累计收益(元)</div>
<div class="col-xs-2 font-gray text-left annual-rate">年化收益</div>
<div class="col-xs-2 font-gray text-left">加入本金(元)</div>
<div class="col-xs-2 font-gray text-left">购买笔数</div>
<div class="col-xs-2 font-gray text-left">担保</div>
<div class="col-xs-1 font-gray text-left"></div>
</div>
<div class="plan-invest-info row ng-scope" ng-repeat="w in linkLoansArray">
<div class="col-xs-1 text-left">
<img class="sl-plan-pic" ng-src="images/liquidity.jpg" src="images/liquidity.jpg">
</div>
<div class="col-xs-2 text-left text-words interest-num">当前未投资</div>
<div class="col-xs-2 text-left text-num rate-red annual-rate ng-binding">5.5%</div>
<div class="col-xs-2 text-left text-words">
<a class="go-invest" href="/market/plan?planId=157001">去投资</a>
</div>
<div class="col-xs-2 text-left">
<p class="value number">
<span>0</span>
笔进行中
</p>
</div>
<div class="col-xs-2 text-left text-words ng-binding">本金保障</div>
<div class="col-xs-1 text-left text-words">
<a ng-click="viewDetail(w.loanId)" href=""> 查看 ></a>
</div>
</div>
<div class="plan-invest-info row ng-scope" ng-repeat="w in linkLoansArray">
<div class="col-xs-1 text-left">
<img class="sl-plan-pic" ng-src="images/newer.jpg" src="images/newer.jpg">
</div>
<div class="col-xs-2 text-left text-words interest-num">当前未投资</div>
<div class="col-xs-2 text-left text-num rate-red annual-rate ng-binding">7%</div>
<div class="col-xs-2 text-left text-words">
<a class="go-invest" href="/market/plan?planId=68201">去投资</a>
</div>
<div class="col-xs-2 text-left">
<p class="value number">
<span>0</span>
笔进行中
</p>
</div>
<div class="col-xs-2 text-left text-words ng-binding">本息有保证</div>
<div class="col-xs-1 text-left text-words">
<a ng-click="viewDetail(w.loanId)" href=""> 查看 ></a>
</div>
</div>
<div class="plan-invest-info row ng-scope" ng-repeat="w in linkLoansArray">
<div class="col-xs-1 text-left">
<img class="sl-plan-pic" ng-src="images/steadiness.jpg" src="images/steadiness.jpg">
</div>
<div class="col-xs-2 text-left text-words interest-num">当前未投资</div>
<div class="col-xs-2 text-left text-num rate-red annual-rate ng-binding">9%</div>
<div class="col-xs-2 text-left text-words">
<a class="go-invest" href="/market/plan?planId=145201">去投资</a>
</div>
<div class="col-xs-2 text-left">
<p class="value number">
<span>0</span>
笔进行中
</p>
</div>
<div class="col-xs-2 text-left text-words ng-binding">本金保障</div>
<div class="col-xs-1 text-left text-words">
<a ng-click="viewDetail(w.loanId)" href=""> 查看 ></a>
</div>
</div>
<div class="plan-invest-info row ng-scope" ng-repeat="w in linkLoansArray">
<div class="col-xs-1 text-left">
<img class="sl-plan-pic" ng-src="images/high.jpg" src="images/high.jpg">
</div>
<div class="col-xs-2 text-left text-words interest-num">当前未投资</div>
<div class="col-xs-2 text-left text-num rate-red annual-rate ng-binding">7-16%</div>
<div class="col-xs-2 text-left text-words">
<a class="go-invest" href="/market/plan?planId=82801">去投资</a>
</div>
<div class="col-xs-2 text-left">
<p class="value number">
<span>0</span>
笔进行中
</p>
</div>
<div class="col-xs-2 text-left text-words ng-binding">本金保障</div>
<div class="col-xs-1 text-left text-words">
<a ng-click="viewDetail(w.loanId)" href=""> 查看 ></a>
</div>
</div>
<div class="plan-invest-info row ng-scope" ng-repeat="w in linkLoansArray">
<div class="col-xs-1 text-left">
<img class="sl-plan-pic" ng-src="images/vip.jpg" src="images/vip.jpg">
</div>
<div class="col-xs-2 text-left text-words interest-num">当前未投资</div>
<div class="col-xs-2 text-left text-num rate-red annual-rate ng-binding">11%</div>
<div class="col-xs-2 text-left text-words">
<a class="go-invest" href="/market/plan?planId=189601">去投资</a>
</div>
<div class="col-xs-2 text-left">
<p class="value number">
<span>0</span>
笔进行中
</p>
</div>
<div class="col-xs-2 text-left text-words ng-binding">本金保障</div>
<div class="col-xs-1 text-left text-words">
<a ng-click="viewDetail(w.loanId)" href=""> 查看 ></a>
</div>
</div>
<div class="plan-invest-info row ng-scope" ng-repeat="w in linkLoansArray">
<div class="col-xs-1 text-left">
<img class="sl-plan-pic" ng-src="images/svip.jpg" src="images/svip.jpg">
</div>
<div class="col-xs-2 text-left text-words interest-num">当前未投资</div>
<div class="col-xs-2 text-left text-num rate-red annual-rate ng-binding">12%</div>
<div class="col-xs-2 text-left text-words">
<a class="go-invest" href="/market/plan?planId=83001">去投资</a>
</div>
<div class="col-xs-2 text-left">
<p class="value number">
<span>0</span>
笔进行中
</p>
</div>
<div class="col-xs-2 text-left text-words ng-binding">本金保障</div>
<div class="col-xs-1 text-left text-words">
<a ng-click="viewDetail(w.loanId)" href=""> 查看 ></a>
</div>
</div>
</div>
</div>
<div class="plan-details-header ng-hide" ng-show="!pageLoading && !showPlanList && !showGradeDetail &&!publishedPageLoading">
<a class="back-btn" ng-click="goBack()" href="">团团赚总览</a>
>
<label class="plan-name ng-binding"></label>
</div>
<div class="tab-content virtual-detail ng-hide" ng-show="!pageLoading && !showPlanList && !showGradeDetail &&!publishedPageLoading">
<div class="plans-summary clearfix row">
<div class="col-xs-2 summary-subsection">
<img class="tuan-summary-img" ng-src="">
</div>
<div class="col-xs-2 text-center summary-subsection highlighted-cont">
<h3 class="highlighted-sum ng-binding" ng-bind-html="currentPlan.InterestReceived | slMoney">
<small>元</small>
</h3>
<p class="font-sec">累计利息收益</p>
</div>
<div class="col-xs-2 summary-subsection text-center highlighted-cont">
<p class="row-number">
<span class="red-rate ng-binding"></span>
</p>
<p class="font-sec ">年化收益率</p>
</div>
<div class="col-xs-2 summary-subsection text-center highlighted-cont">
<h4 class="default-sum ng-binding">
<small>笔</small>
</h4>
<p class="font-sec">持有标数量</p>
</div>
</div>
<div class="row bg-invest-detail">
<div class="row percentage-virtual-loans">
<div class="percentage-header">
<span>团标组成</span>
<span class="pull-right">点击风险等级图标可查看所投散标情况。</span>
</div>
<div id="pie-container" class="col-xs-6 pie-container"></div>
<div class="col-xs-6 grade-link">
<div class="row grade-level">
<div class="col-xs-2 grade-hover">
<p class="percent ng-binding">NaN%</p>
<p class="num ng-binding" ng-bind-html="gradeANum | slSimpleMoney:1">
NaN
<small>元</small>
</p>
<p class="grade-color grade-a " ng-click="linkToGradeDetail('a',virtualLoanId)"> A</p>
</div>
<div class="col-xs-2 grade-hover">
<p class="percent ng-binding">NaN%</p>
<p class="num ng-binding" ng-bind-html="gradeBNum | slSimpleMoney:1">
NaN
<small>元</small>
</p>
<p class="grade-color grade-b" ng-click="linkToGradeDetail('b',virtualLoanId)"> B</p>
</div>
<div class="col-xs-2 grade-hover">
<p class="percent ng-binding">NaN%</p>
<p class="num ng-binding" ng-bind-html="gradeCNum | slSimpleMoney:1">
NaN
<small>元</small>
</p>
<p class="grade-color grade-c" ng-click="linkToGradeDetail('c',virtualLoanId)"> C</p>
</div>
<div class="col-xs-2 grade-hover">
<p class="percent ng-binding">NaN%</p>
<p class="num ng-binding" ng-bind-html="gradeDNum |slSimpleMoney:1">
NaN
<small>元</small>
</p>
<p class="grade-color grade-d" ng-click="linkToGradeDetail('d',virtualLoanId)"> D</p>
</div>
<div class="col-xs-2 grade-hover">
<p class="percent ng-binding">NaN%</p>
<p class="num ng-binding" ng-bind-html="gradeENum | slSimpleMoney:1">
NaN
<small>元</small>
</p>
<p class="grade-color grade-e" ng-click="linkToGradeDetail('e',virtualLoanId)"> E</p>
</div>
<div class="col-xs-2 grade-hover">
<p class="percent ng-binding">NaN%</p>
<p class="num ng-binding" ng-bind-html="gradeFNum | slSimpleMoney:1">
NaN
<small>元</small>
</p>
<p class="grade-color grade-f" ng-click="linkToGradeDetail('f',virtualLoanId)"> F</p>
</div>
</div>
<div class="row grade-words">
<div class="col-xs-1 words low">低</div>
<div class="col-xs-10 line">
<img src="images/level-line.png">
<p>风险评级</p>
</div>
<div class="col-xs-1 words high">高</div>
</div>
</div>
</div>
<div class="row invest-info">
<div class="col-xs-6 invest-general invest-strategy">
<div class="header-divider">投资策略 | 近6个月投资成长（元）</div>
<div id="strategy-chart-container" class="strategy-chart-container"></div>
</div>
<div class="col-xs-6 invest-general invest-benefit">
<div class="header-divider">收益变动 | 近6个月年化收益变动</div>
<div class="chart-container"></div>
</div>
</div>
</div>
</div>
<div class="invest-loan-table ng-hide" ng-show="!pageLoading && !showPlanList && !showGradeDetail &&!publishedPageLoading">
<ul id="groupbuy-tab" class="nav nav-tabs">
<li class="active">
<a data-toggle="tab" href="#in-payment-plans">
投团期数
<span class="badge ng-binding" ng-bind="currentPlan.investCount"></span>
</a>
</li>
<li>
<a data-toggle="tab" href="#selling-plans">
转让中
<span class="badge ng-binding" ng-bind="secNoteCount"></span>
</a>
</li>
<li>
<a data-toggle="tab" href="#selled-plans">
已转让
<span class="badge ng-binding" ng-bind="transferedCount"></span>
</a>
</li>
</ul>
<div class="tab-content">
<div id="in-payment-plans" class="tab-pane active">
<div class="alert alert-warning clearfix ng-hide" ng-show="currentPlan.investCount<=0">
无任何记录
<a class="close sl-icon-cross" aria-hidden="true" data-dismiss="alert"></a>
</div>
<div class="plan-invest-header row header-row ng-hide" ng-show="currentPlan.investCount>0">
<div class="col-xs-3 font-gray text-left">累计收益(元)</div>
<div class="col-xs-3 font-gray text-left">购买日期</div>
<div class="col-xs-3 font-gray text-left">加入本金(元)</div>
<div class="col-xs-3 font-gray text-left"></div>
</div>
<div class="text-right note-buy-page ng-hide" ng-show="currentPlan.investCount>0">
<div class="sl-pagination pagination ng-isolate-scope" total-records="myInvestLoans.totalNotesRecords" page-size="myInvestLoans.pageSize" page="myInvestLoans.page">
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
<a class="ng-binding" ng-click="last()" href="javascript:;">...NaN</a>
</li>
<li class="jump">
<div class="input-group-sm pull-left">
<input class="form-control input-sm btn-embossed page-number ng-pristine ng-valid" type="text" sl-enter="goTo(displayPage-1)" ng-model="displayPage" maxlength="3">
</div>
</li>
<li class="total">
<span class="ng-binding">NaN页</span>
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
<div id="selling-plans" class="tab-pane">
<div class="alert alert-warning clearfix ng-hide" ng-show="secNoteCount<=0">
无任何记录
<a class="close sl-icon-cross" aria-hidden="true" data-dismiss="alert"></a>
</div>
<div class="plan-invest-header row ng-hide" ng-show="secNoteCount>0">
<div class="col-xs-2 font-gray text-left">项目名称</div>
<div class="col-xs-2 font-gray text-left">加入本金(元)</div>
<div class="col-xs-2 font-gray text-left">购买日期</div>
<div class="col-xs-2 font-gray text-left">状态</div>
<div class="col-xs-3 font-gray text-left"></div>
</div>
</div>
<div id="selled-plans" class="tab-pane">
<div class="alert alert-warning clearfix ng-hide" ng-show="transferedCount<=0">
无任何记录
<a class="close sl-icon-cross" aria-hidden="true" data-dismiss="alert"></a>
</div>
<div class="plan-invest-header row ng-hide" ng-show="transferedCount>0">
<div class="col-xs-2 font-gray text-left">项目名称</div>
<div class="col-xs-2 font-gray text-left">转让价格</div>
<div class="col-xs-2 font-gray text-left">转让日期</div>
<div class="col-xs-3 font-gray text-left">状态</div>
</div>
<div class="text-right ng-hide" ng-show="transferedCount>0">
<div class="sl-pagination pagination ng-isolate-scope" total-records="transferedLoans.totalNotesRecords" page-size="transferedLoans.pageSize" page="transferedLoans.page">
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
<a class="ng-binding" ng-click="last()" href="javascript:;">...NaN</a>
</li>
<li class="jump">
<div class="input-group-sm pull-left">
<input class="form-control input-sm btn-embossed page-number ng-pristine ng-valid" type="text" sl-enter="goTo(displayPage-1)" ng-model="displayPage" maxlength="3">
</div>
</li>
<li class="total">
<span class="ng-binding">NaN页</span>
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
</div>
<div class="plan-details-header ng-hide" ng-show="!pageLoading && !showPlanList && showGradeDetail">
<a class="back-btn" ng-click="goBack()" href="">
<span class="padding-sign">团团赚总览</span>
>
</a>
<a class="back-btn" ng-click="goBackSec()" href="">
<label class="plan-name">
<span class="padding-sign ng-binding"></span>
>
</label>
</a>
<label class="loan-detail ng-binding">类标详情</label>
</div>
<h2 class="text-center ng-hide" ng-show="gradePageLoading">
<i class="spinner sl-icon-loading"></i>
</h2>
<div class="plan-summary grade-detail-content clearfix row ng-hide" ng-show="!gradePageLoading && !showPlanList && showGradeDetail">
<div class="col-xs-1"></div>
<div class="col-xs-2 summary-subsection">
<h4 class="grade-level grade-"></h4>
<p class="grade-summary-title text-left ng-binding">类标</p>
</div>
<div class="col-xs-2 text-center">
<p class="row-number">
<span class="red-rate ng-binding"></span>
<span class="sign">%</span>
</p>
<p class="font-sec grade-rate">年化收益率</p>
</div>
<div class="col-xs-1"></div>
<div class="col-xs-2 grade-loans text-center ">
<h4 class="default-sum ng-binding">
<small>笔</small>
</h4>
<p class="font-sec ">持有标数量</p>
</div>
</div>
<div class="grade-detail-table ng-hide" ng-show="!gradePageLoading && !showPlanList && showGradeDetail">
<div class="plans-table ng-hide" ng-show="totalNotesRecords>0">
<div class="data-table-wrapper ng-isolate-scope" params="myNoteParams" data="myNoteData" columns="myNoteColumns" init="myNoteInit(ele)">
<table class="table data-table table-hover table-striped ">
<thead>
<tr>
<th class="ng-scope tc" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">名称</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">信用等级</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">借款利率</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">借款金额</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">加入本金</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">状态</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)"></span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
</tr>
</thead>
<tbody> </tbody>
</table>
</div>
</div>
<h2 class="text-center ng-hide" ng-show="gradePageLoading">
<i class="spinner sl-icon-loading"></i>
</h2>
<div class="alert alert-warning clearfix ng-hide" ng-show="totalNotesRecords<=0">
无任何记录
<a class="close sl-icon-cross" aria-hidden="true" data-dismiss="alert"></a>
</div>
<div class="notes-pagination ng-hide" ng-show="totalNotesRecords>0">
<div class="sl-pagination pagination ng-isolate-scope" total-records="totalNotesRecords" page-size="gradeDetailParams.pageSize" page="gradeDetailParams.page">
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
<a class="ng-binding" ng-click="last()" href="javascript:;">...NaN</a>
</li>
<li class="jump">
<div class="input-group-sm pull-left">
<input class="form-control input-sm btn-embossed page-number ng-pristine ng-valid" type="text" sl-enter="goTo(displayPage-1)" ng-model="displayPage" maxlength="3">
</div>
</li>
<li class="total">
<span class="ng-binding">NaN页</span>
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
<div id="sellInfoModal" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header clearfix">
<div class="pull-left">
<p class="modal-title ng-binding">
<label class="owned-length ng-binding">持有期0天</label>
</p>
</div>
<div class="pull-right">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
</div>
</div>
<div class="modal-body">
<h2 class="text-center ng-hide" ng-show="gettingSellInfo">
<i class="spinner sl-icon-loading"></i>
</h2>
<div class="" ng-show="!gettingSellInfo">
<section class="sell-note-wrapper">
<div class="row">
<div class="col-xs-12">
<div class="alert alert-success ng-hide" ng-show="msg.length > 0" timeout="sellNoteTimeout" msg="sellNoteMsg" type="sellNoteMsgType">
<a class="close sl-icon-cross" aria-hidden="true" ng-click="close()" type="button"></a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-6">
<div class="fee-desc">
<div class="ng-binding" ng-bind-html="fee_tooltip"></div>
</div>
</div>
<div class="col-xs-6 price-form">
<div class="text-right">
<div class="row">
<div class="col-xs-5">
<label>累计收益</label>
</div>
<div class="col-xs-7">
<label class="rt-value pr ng-binding" ng-bind="noteSellInfo.interestReceived | slCurrency">0.00元</label>
</div>
</div>
<div class="row">
<div class="col-xs-5">
<label>债权转让金额</label>
</div>
<div class="col-xs-7">
<label class="rt-value pr ng-binding" ng-bind="noteSellInfo.sellPrice | slCurrency">0.00元</label>
</div>
</div>
<div class="row">
<div class="col-xs-5">
<label>转让手续费</label>
</div>
<div class="col-xs-7">
<label class="rt-value pr ng-binding" ng-bind="noteSellInfo.fee | slCurrency">0.00元</label>
</div>
</div>
<div class="row">
<div class="col-xs-5">
<label>实收转让金额</label>
</div>
<div class="col-xs-7">
<label class="rt-value pr ng-binding" ng-bind="noteSellInfo.actualPrice | slCurrency">0.00元</label>
</div>
</div>
<div class="row">
<div class="col-xs-7 col-xs-offset-5">
<p>
<span class="sl-icon-check agreeDeal"> </span>
同意
<a target="_blank" href="/public/secondary-market-agreement?protocol=secondary-market-agreement">债权转让协议</a>
</p>
</div>
</div>
<div class="row text-right">
<div class="col-xs-12">
<span class="ng-hide" ng-show="sellingNotes">
<i class="spinner sl-icon-loading"></i>
</span>
<a class="btn btn-link" aria-hidden="true" data-dismiss="modal" href="">取消</a>
<a class="btn btn-primary" ng-disabled="sellingNotes || noteSellInfo.sold" ng-click="confirmSellNote()" href="">确认出售债权</a>
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
<div class="ng-hide" ng-show="!pageLoading && !showPlanList && showGradeDetail">
<div class="ng-isolate-scope" is-virtual="true" loan="currentNote" mynote-installment="">
<div id="installmentModal" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<div class="installment-title" style="display: inline-block">
<span class="sl-icon-dart auto-icon ng-hide" title="自动投标" data-toggle="tooltip" ng-hide="!currentLoan.autoInvestOrder"> </span>
<span class="ng-binding">借款编号：</span>
<h5 class="highlight ng-binding"></h5>
</div>
<div class="pull-right">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<a class="installment-investment-agreement ng-hide" ng-show="isShowPolicy && showDeal" ng-href="" target="_blank">
<span class="sl-icon-copy"></span>
借款协议
</a>
</div>
</div>
<div class="modal-body">
<div class="installment-wrapper modal-wrapper">
<div class="loading ng-hide" ng-show="singleLoading && singlePage">载入中......</div>
<div class="alert alert- ng-hide" ng-show="msg.length > 0" msg="msg">
<a class="close sl-icon-cross" aria-hidden="true" ng-click="close()" type="button"></a>
</div>
<div class="" ng-hide="singlePage && (singleLoading || alreadySold)">
<div class="row summary-section fields">
<div class="col-xs-8 fields-left">
<ul class="list-inline installment-highlighted">
<li>
<h5 class="highlighted-sum ng-binding">
<small class="small-bold">元</small>
</h5>
<p class="highlighted-sum-caption">借款总额</p>
</li>
<li>
<h5 class="highlighted-sum ng-binding">
0
<small class="small-bold ng-binding">/个月</small>
</h5>
<p class="highlighted-sum-caption">还款进度</p>
</li>
<li>
<h5 class="highlighted-sum text-adjust-chinese ng-binding" ng-bind-html="(currentLoan.paymentMethodLabel?currentLoan.paymentMethodLabel:'')|loanPaymentMethod"></h5>
<p class="highlighted-sum-caption">还款方式</p>
</li>
<li>
<h5 class="highlighted-sum text-adjust-chinese ng-binding"></h5>
<p class="highlighted-sum-caption">还款状态</p>
</li>
</ul>
<ul class="list-inline installment-invest-amount">
<li>投资金额</li>
<li class="ng-binding ng-scope" ng-if="isVirtual">元</li>
</ul>
</div>
<div class="col-xs-4 fields-right">
<div class="int-grade">
<div class="loan-grade-icon grade- pull-left">
<span class="level ng-binding"></span>
</div>
<div class="int-rate">
<h3 class="highlighted-sum ng-binding">
<small>%</small>
</h3>
<p class="highlighted-sum-caption">年化收益率</p>
</div>
</div>
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
          $(".change3").addClass('active');            
      })
  </script>
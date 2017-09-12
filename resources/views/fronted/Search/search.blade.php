@extends('layouts.public')

@section('title', '关于我们')

  <div class="wrapper "> 
   <!--header--> 
   @section('content')
 
   <!--content--> 
   <div id="loan-list" class="container loan-list" ng-controller="BrowseCtrl"> 
    <div class="row"> 
     <div class="tab-content"> 
      <!-- plan market --> 
      <div class="tab-pane active fade in" id="plan-market"> 
       
       <div class="row"> 
        <div class="col-xs-9">
<p class="loading text-center ng-hide" ng-show="loadingPlan">
<i class="spinner sl-icon-loading"></i>
</p>
<div class="" ng-show="!loadingPlan">

<div class="result-item ng-scope" ng-repeat="item in loans" style="">
<div class="sl-loan-card ng-isolate-scope ng-animate" ng-class="{ 'already-invested' : loan.alreadyInvestedIn && (!hover || !isCheckout), 'active' : hover}" ng-mouseleave="hover = false" ng-mouseenter="hover = true" ng-click="toMarket()" on-toggle-details="onToggleDetails()" detail-tabs="primaryLoanDetailTabs" enable-bulk="enableBulk" loan="item" style="">
<div class="row">
<div class="col-xs-8 card-divider" ng-click="toggleDetails($event)">
<div>
<header class="sl-loan-card-header">
<small>
<span class="sl-icon-loan-id loan-id"></span>
<span class="ng-binding">234769</span>
<span class="loan-type ng-hide" ng-show="isBusiness">
<span class="sl-icon-loan-type-business icon"></span>
中小企业贷
</span>
<span class="loan-type" ng-show="!isBusiness">
<span class="sl-icon-loan-type-personal icon"></span>
个人贷
</span>
<div class="tags">
<span class="ng-scope" tooltip-placement="top" tooltip="100% 担保本金, 利息" ng-if="loan.isGuranteed">
<span class="tag sl-icon-loan-tag-guarantee"></span>
担保
</span>
<span class="remaining-time ng-binding ng-hide" ng-show="showRemainingTime">剩余时间14天</span>
</div>
</small>
<div class="sl-loan-card-title" title="本地知名汽车融资租赁公司优质债权转让，100%本息回购保证！">
<div class="ng-binding">本地知名汽车融资租赁公司优质债权转让，100%本息回购保...</div>
<a class="view-details-link ng-scope" title="查看详情" ng-if="!disableClick&&!detailsOpen"> 查看详情 </a>
</div>
</header>
<ul class="list-inline sl-loan-card-highlighted ng-scope" ng-if="!secondaryMarket">
<li class="col-xs-3">
<div class="sl-loan-card-rate">
<div class="loan-grade-icon grade-A">
A
<span class="level ng-binding">1</span>
</div>
<h4 class="highlighted-title ng-binding">
7.80
<small>%</small>
</h4>
</div>
</li>
<li class="col-xs-3">
<span class="sl-icon-b-clock icon"></span>
<h5 class="highlighted-title ng-binding">
9
<small>个月</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-account icon"></span>
<h5 class="highlighted-title ng-binding" title="2,305,400.00元" ng-bind-html="loan.loanAmountRequested | slMoney:true">
230
<small>.54万元</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-repayment icon"></span>
<h5 class="highlighted-title text-adjust-chinese ">
<span class="ng-scope" ng-if="loan.repaymentMethod=='等额本息'">
<abbr class="initialism ng-scope" tooltip-placement="right" tooltip="借款人每月按相等的金额偿还贷款本息，本金比重逐月递增、利息比重逐月递减。" title="">
<span class="ng-binding" ng-bind-html="loan.repaymentMethod | loanPaymentMethod">等额本息</span>
</abbr>
</span>
</h5>
</li>
</ul>
</div>
</div>
<div class="col-xs-4 rightRow">
<div class="ng-scope" ng-if="!secondaryMarket">
<ul class="list-unstyled sl-loan-card-status">
<li>
<span class="sl-icon-account surplus"></span>
剩余金额
<span id="avaliableMoney" class="pull-right ng-binding">0元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="!secondaryMarket && !isCheckout">
<div class="sl-progress ng-isolate-scope" formatted-percentage="100%" percentage="100">
<div class="sl-progress-bar fullInvested" ng-style="{width:formattedPercentage}" ng-class="{narrow:percentage<20,fullInvested:percentage==100}" style="width: 100%;"></div>
<span class="ng-binding" style="position:relative;left: 103%;top: -10px;">100%</span>
</div>
</div>
<div class="ng-hide" ng-show="per<100 && loan.maxInvestAmount">
<ul class="list-unstyled sl-loan-card-status item">
<li>
<span class="sl-icon-money-tag surplus"></span>
可加入上限
<span class="pull-right ng-binding">元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="paying">
<div class="repayment-status">
<span>还款中</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="result-item ng-scope" ng-repeat="item in loans" style="">
<div class="sl-loan-card ng-isolate-scope ng-animate" ng-class="{ 'already-invested' : loan.alreadyInvestedIn && (!hover || !isCheckout), 'active' : hover}" ng-mouseleave="hover = false" ng-mouseenter="hover = true" ng-click="toMarket()" on-toggle-details="onToggleDetails()" detail-tabs="primaryLoanDetailTabs" enable-bulk="enableBulk" loan="item" style="">
<div class="row">
<div class="col-xs-8 card-divider" ng-click="toggleDetails($event)">
<div>
<header class="sl-loan-card-header">
<small>
<span class="sl-icon-loan-id loan-id"></span>
<span class="ng-binding">234764</span>
<span class="loan-type ng-hide" ng-show="isBusiness">
<span class="sl-icon-loan-type-business icon"></span>
中小企业贷
</span>
<span class="loan-type" ng-show="!isBusiness">
<span class="sl-icon-loan-type-personal icon"></span>
个人贷
</span>
<div class="tags">
<span class="ng-scope" tooltip-placement="top" tooltip="100% 担保本金, 利息" ng-if="loan.isGuranteed">
<span class="tag sl-icon-loan-tag-guarantee"></span>
担保
</span>
<span class="remaining-time ng-binding ng-hide" ng-show="showRemainingTime">剩余时间14天</span>
</div>
</small>
<div class="sl-loan-card-title" title="本地知名汽车融资租赁公司优质债权转让，100%本息回购保证！">
<div class="ng-binding">本地知名汽车融资租赁公司优质债权转让，100%本息回购保...</div>
<a class="view-details-link ng-scope" title="查看详情" ng-if="!disableClick&&!detailsOpen"> 查看详情 </a>
</div>
</header>
<ul class="list-inline sl-loan-card-highlighted ng-scope" ng-if="!secondaryMarket">
<li class="col-xs-3">
<div class="sl-loan-card-rate">
<div class="loan-grade-icon grade-A">
A
<span class="level ng-binding">1</span>
</div>
<h4 class="highlighted-title ng-binding">
7.80
<small>%</small>
</h4>
</div>
</li>
<li class="col-xs-3">
<span class="sl-icon-b-clock icon"></span>
<h5 class="highlighted-title ng-binding">
8
<small>个月</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-account icon"></span>
<h5 class="highlighted-title ng-binding" title="1,479,200.00元" ng-bind-html="loan.loanAmountRequested | slMoney:true">
147
<small>.92万元</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-repayment icon"></span>
<h5 class="highlighted-title text-adjust-chinese ">
<span class="ng-scope" ng-if="loan.repaymentMethod=='等额本息'">
<abbr class="initialism ng-scope" tooltip-placement="right" tooltip="借款人每月按相等的金额偿还贷款本息，本金比重逐月递增、利息比重逐月递减。" title="">
<span class="ng-binding" ng-bind-html="loan.repaymentMethod | loanPaymentMethod">等额本息</span>
</abbr>
</span>
</h5>
</li>
</ul>
</div>
</div>
<div class="col-xs-4 rightRow">
<div class="ng-scope" ng-if="!secondaryMarket">
<ul class="list-unstyled sl-loan-card-status">
<li>
<span class="sl-icon-account surplus"></span>
剩余金额
<span id="avaliableMoney" class="pull-right ng-binding">0元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="!secondaryMarket && !isCheckout">
<div class="sl-progress ng-isolate-scope" formatted-percentage="100%" percentage="100">
<div class="sl-progress-bar fullInvested" ng-style="{width:formattedPercentage}" ng-class="{narrow:percentage<20,fullInvested:percentage==100}" style="width: 100%;"></div>
<span class="ng-binding" style="position:relative;left: 103%;top: -10px;">100%</span>
</div>
</div>
<div class="ng-hide" ng-show="per<100 && loan.maxInvestAmount">
<ul class="list-unstyled sl-loan-card-status item">
<li>
<span class="sl-icon-money-tag surplus"></span>
可加入上限
<span class="pull-right ng-binding">元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="paying">
<div class="repayment-status">
<span>还款中</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="result-item ng-scope" ng-repeat="item in loans" style="">
<div class="sl-loan-card ng-isolate-scope ng-animate" ng-class="{ 'already-invested' : loan.alreadyInvestedIn && (!hover || !isCheckout), 'active' : hover}" ng-mouseleave="hover = false" ng-mouseenter="hover = true" ng-click="toMarket()" on-toggle-details="onToggleDetails()" detail-tabs="primaryLoanDetailTabs" enable-bulk="enableBulk" loan="item" style="">
<div class="row">
<div class="col-xs-8 card-divider" ng-click="toggleDetails($event)">
<div>
<header class="sl-loan-card-header">
<small>
<span class="sl-icon-loan-id loan-id"></span>
<span class="ng-binding">238835</span>
<span class="loan-type ng-hide" ng-show="isBusiness">
<span class="sl-icon-loan-type-business icon"></span>
中小企业贷
</span>
<span class="loan-type" ng-show="!isBusiness">
<span class="sl-icon-loan-type-personal icon"></span>
个人贷
</span>
<div class="tags">
<span class="ng-scope" tooltip-placement="top" tooltip="100% 担保本金, 利息" ng-if="loan.isGuranteed">
<span class="tag sl-icon-loan-tag-guarantee"></span>
担保
</span>
<span class="remaining-time ng-binding ng-hide" ng-show="showRemainingTime">剩余时间13天</span>
</div>
</small>
<div class="sl-loan-card-title" title="借款商户经营鸡蛋批发生意，进货借款">
<div class="ng-binding">借款商户经营鸡蛋批发生意，进货借款</div>
<a class="view-details-link ng-scope" title="查看详情" ng-if="!disableClick&&!detailsOpen"> 查看详情 </a>
</div>
</header>
<ul class="list-inline sl-loan-card-highlighted ng-scope" ng-if="!secondaryMarket">
<li class="col-xs-3">
<div class="sl-loan-card-rate">
<div class="loan-grade-icon grade-A">
A
<span class="level ng-binding">1</span>
</div>
<h4 class="highlighted-title ng-binding">
8.30
<small>%</small>
</h4>
</div>
</li>
<li class="col-xs-3">
<span class="sl-icon-b-clock icon"></span>
<h5 class="highlighted-title ng-binding">
3
<small>个月</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-account icon"></span>
<h5 class="highlighted-title ng-binding" title="120,000.00元" ng-bind-html="loan.loanAmountRequested | slMoney:true">
12
<small>万元</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-repayment icon"></span>
<h5 class="highlighted-title text-adjust-chinese ">
<span class="ng-scope" ng-if="(loan.repaymentMethod | loanPaymentMethod)=='每月还息'">
<abbr class="initialism ng-scope" tooltip-placement="right" tooltip="借款人每月仅支付贷款利息，于贷款规定时间偿还部分或全部本金（如每季度或到期日）。" title="">
<span class="ng-binding" ng-bind-html="loan.repaymentMethod | loanPaymentMethod">每月还息</span>
</abbr>
</span>
</h5>
</li>
</ul>
</div>
</div>
<div class="col-xs-4 rightRow">
<div class="ng-scope" ng-if="!secondaryMarket">
<ul class="list-unstyled sl-loan-card-status">
<li>
<span class="sl-icon-account surplus"></span>
剩余金额
<span id="avaliableMoney" class="pull-right ng-binding">0元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="!secondaryMarket && !isCheckout">
<div class="sl-progress ng-isolate-scope" formatted-percentage="100%" percentage="100">
<div class="sl-progress-bar fullInvested" ng-style="{width:formattedPercentage}" ng-class="{narrow:percentage<20,fullInvested:percentage==100}" style="width: 100%;"></div>
<span class="ng-binding" style="position:relative;left: 103%;top: -10px;">100%</span>
</div>
</div>
<div class="ng-hide" ng-show="per<100 && loan.maxInvestAmount">
<ul class="list-unstyled sl-loan-card-status item">
<li>
<span class="sl-icon-money-tag surplus"></span>
可加入上限
<span class="pull-right ng-binding">元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="paying">
<div class="repayment-status">
<span>还款中</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="result-item ng-scope" ng-repeat="item in loans" style="">
<div class="sl-loan-card ng-isolate-scope" ng-class="{ 'already-invested' : loan.alreadyInvestedIn && (!hover || !isCheckout), 'active' : hover}" ng-mouseleave="hover = false" ng-mouseenter="hover = true" ng-click="toMarket()" on-toggle-details="onToggleDetails()" detail-tabs="primaryLoanDetailTabs" enable-bulk="enableBulk" loan="item">
<div class="row">
<div class="col-xs-8 card-divider" ng-click="toggleDetails($event)">
<div>
<header class="sl-loan-card-header">
<small>
<span class="sl-icon-loan-id loan-id"></span>
<span class="ng-binding">238647</span>
<span class="loan-type ng-hide" ng-show="isBusiness">
<span class="sl-icon-loan-type-business icon"></span>
中小企业贷
</span>
<span class="loan-type" ng-show="!isBusiness">
<span class="sl-icon-loan-type-personal icon"></span>
个人贷
</span>
<div class="tags">
<span class="ng-scope" tooltip-placement="top" tooltip="100% 担保本金, 利息" ng-if="loan.isGuranteed">
<span class="tag sl-icon-loan-tag-guarantee"></span>
担保
</span>
<span class="remaining-time ng-binding ng-hide" ng-show="showRemainingTime">剩余时间13天</span>
</div>
</small>
<div class="sl-loan-card-title" title="借款商户经营一家小型饭店，开新店借款">
<div class="ng-binding">借款商户经营一家小型饭店，开新店借款</div>
<a class="view-details-link ng-scope" title="查看详情" ng-if="!disableClick&&!detailsOpen"> 查看详情 </a>
</div>
</header>
<ul class="list-inline sl-loan-card-highlighted ng-scope" ng-if="!secondaryMarket">
<li class="col-xs-3">
<div class="sl-loan-card-rate">
<div class="loan-grade-icon grade-A">
A
<span class="level ng-binding">1</span>
</div>
<h4 class="highlighted-title ng-binding">
8.30
<small>%</small>
</h4>
</div>
</li>
<li class="col-xs-3">
<span class="sl-icon-b-clock icon"></span>
<h5 class="highlighted-title ng-binding">
12
<small>个月</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-account icon"></span>
<h5 class="highlighted-title ng-binding" title="120,000.00元" ng-bind-html="loan.loanAmountRequested | slMoney:true">
12
<small>万元</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-repayment icon"></span>
<h5 class="highlighted-title text-adjust-chinese ">
<span class="ng-scope" ng-if="loan.repaymentMethod=='等额本息'">
<abbr class="initialism ng-scope" tooltip-placement="right" tooltip="借款人每月按相等的金额偿还贷款本息，本金比重逐月递增、利息比重逐月递减。" title="">
<span class="ng-binding" ng-bind-html="loan.repaymentMethod | loanPaymentMethod">等额本息</span>
</abbr>
</span>
</h5>
</li>
</ul>
</div>
</div>
<div class="col-xs-4 rightRow">
<div class="ng-scope" ng-if="!secondaryMarket">
<ul class="list-unstyled sl-loan-card-status">
<li>
<span class="sl-icon-account surplus"></span>
剩余金额
<span id="avaliableMoney" class="pull-right ng-binding">0元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="!secondaryMarket && !isCheckout">
<div class="sl-progress ng-isolate-scope" formatted-percentage="100%" percentage="100">
<div class="sl-progress-bar fullInvested" ng-style="{width:formattedPercentage}" ng-class="{narrow:percentage<20,fullInvested:percentage==100}" style="width: 100%;"></div>
<span class="ng-binding" style="position:relative;left: 103%;top: -10px;">100%</span>
</div>
</div>
<div class="ng-hide" ng-show="per<100 && loan.maxInvestAmount">
<ul class="list-unstyled sl-loan-card-status item">
<li>
<span class="sl-icon-money-tag surplus"></span>
可加入上限
<span class="pull-right ng-binding">元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="paying">
<div class="repayment-status">
<span>还款中</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="result-item ng-scope" ng-repeat="item in loans" style="">
<div class="sl-loan-card ng-isolate-scope" ng-class="{ 'already-invested' : loan.alreadyInvestedIn && (!hover || !isCheckout), 'active' : hover}" ng-mouseleave="hover = false" ng-mouseenter="hover = true" ng-click="toMarket()" on-toggle-details="onToggleDetails()" detail-tabs="primaryLoanDetailTabs" enable-bulk="enableBulk" loan="item">
<div class="row">
<div class="col-xs-8 card-divider" ng-click="toggleDetails($event)">
<div>
<header class="sl-loan-card-header">
<small>
<span class="sl-icon-loan-id loan-id"></span>
<span class="ng-binding">238642</span>
<span class="loan-type ng-hide" ng-show="isBusiness">
<span class="sl-icon-loan-type-business icon"></span>
中小企业贷
</span>
<span class="loan-type" ng-show="!isBusiness">
<span class="sl-icon-loan-type-personal icon"></span>
个人贷
</span>
<div class="tags">
<span class="ng-scope" tooltip-placement="top" tooltip="100% 担保本金, 利息" ng-if="loan.isGuranteed">
<span class="tag sl-icon-loan-tag-guarantee"></span>
担保
</span>
<span class="remaining-time ng-binding ng-hide" ng-show="showRemainingTime">剩余时间13天</span>
</div>
</small>
<div class="sl-loan-card-title" title="借款商户经营洗衣店和内衣店生意，开新店借款">
<div class="ng-binding">借款商户经营洗衣店和内衣店生意，开新店借款</div>
<a class="view-details-link ng-scope" title="查看详情" ng-if="!disableClick&&!detailsOpen"> 查看详情 </a>
</div>
</header>
<ul class="list-inline sl-loan-card-highlighted ng-scope" ng-if="!secondaryMarket">
<li class="col-xs-3">
<div class="sl-loan-card-rate">
<div class="loan-grade-icon grade-A">
A
<span class="level ng-binding">1</span>
</div>
<h4 class="highlighted-title ng-binding">
8.30
<small>%</small>
</h4>
</div>
</li>
<li class="col-xs-3">
<span class="sl-icon-b-clock icon"></span>
<h5 class="highlighted-title ng-binding">
12
<small>个月</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-account icon"></span>
<h5 class="highlighted-title ng-binding" title="50,000.00元" ng-bind-html="loan.loanAmountRequested | slMoney:true">
5
<small>万元</small>
</h5>
</li>
<li class="col-xs-3">
<span class="sl-icon-repayment icon"></span>
<h5 class="highlighted-title text-adjust-chinese ">
<span class="ng-scope" ng-if="loan.repaymentMethod=='等额本息'">
<abbr class="initialism ng-scope" tooltip-placement="right" tooltip="借款人每月按相等的金额偿还贷款本息，本金比重逐月递增、利息比重逐月递减。" title="">
<span class="ng-binding" ng-bind-html="loan.repaymentMethod | loanPaymentMethod">等额本息</span>
</abbr>
</span>
</h5>
</li>
</ul>
</div>
</div>
<div class="col-xs-4 rightRow">
<div class="ng-scope" ng-if="!secondaryMarket">
<ul class="list-unstyled sl-loan-card-status">
<li>
<span class="sl-icon-account surplus"></span>
剩余金额
<span id="avaliableMoney" class="pull-right ng-binding">0元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="!secondaryMarket && !isCheckout">
<div class="sl-progress ng-isolate-scope" formatted-percentage="100%" percentage="100">
<div class="sl-progress-bar fullInvested" ng-style="{width:formattedPercentage}" ng-class="{narrow:percentage<20,fullInvested:percentage==100}" style="width: 100%;"></div>
<span class="ng-binding" style="position:relative;left: 103%;top: -10px;">100%</span>
</div>
</div>
<div class="ng-hide" ng-show="per<100 && loan.maxInvestAmount">
<ul class="list-unstyled sl-loan-card-status item">
<li>
<span class="sl-icon-money-tag surplus"></span>
可加入上限
<span class="pull-right ng-binding">元</span>
</li>
</ul>
</div>
<div class="ng-scope" ng-if="paying">
<div class="repayment-status">
<span>还款中</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="loan-list-footer row">
<div class="text-right">
<div class="sl-pagination pagination ng-isolate-scope" total-records="loansCount" page-size="params.pageSize" page="params.page">
<ul>
<li class="previous">
<a ng-click="prev()" href="javascript:;">
<i class="sl-icon-arrow-left"></i>
</a>
</li>
<li class="first ng-hide" ng-show="minPage > 1">
<a ng-click="first()" href="javascript:;">1...</a>
</li>
<li class="ng-scope active" ng-class="{ active: p == displayPage - 1 }" ng-repeat="p in pages" style="">
<a class="ng-binding" ng-click="goTo(p)" href="javascript:;">1</a>
</li>
<li class="last ng-hide" ng-show="maxPage < totalPages - 2">
<a class="ng-binding" ng-click="last()" href="javascript:;">...1</a>
</li>
<li class="jump">
<div class="input-group-sm pull-left">
<input class="form-control input-sm btn-embossed page-number ng-pristine ng-valid" type="text" sl-enter="goTo(displayPage-1)" ng-model="displayPage" maxlength="1" style="">
</div>
</li>
<li class="total">
<span class="ng-binding">1页</span>
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
<div class="col-xs-3 p-filter">

<div class="filters">
<div class="clearfix search-bar">
<form class="ng-pristine ng-valid" ng-submit="search()">
<div class="input-group input-group-sm">
<input class="form-control ng-pristine ng-valid" type="text" placeholder="搜索贷款编号" ng-model="queryString">
<span class="sl-icon-search" ng-click="search()"></span>
</div>
</form>
</div>
<div class="clearfix">
<h6 class="pull-left">筛选条件</h6>
<label class="pull-right reset-btn btn btn-link" ng-click="reset()">重置</label>
</div>
<div class="ng-hide" ng-show="showSecTab">
<span class="filter-name clearfix">转让价</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['salePrice'] = 'ALL';uniqueOrderBy('salePrice');" ng-class="{ active: filters['salePrice'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['salePrice'] = 'LOW';uniqueOrderBy('salePrice');" ng-class="{ active: filters['salePrice'] == 'LOW'}">从低到高</span>
<span class="option" ng-click="filters['salePrice'] = 'HIGH';uniqueOrderBy('salePrice');" ng-class="{ active: filters['salePrice'] == 'HIGH'}">从高到低</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">类型</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['loanType'] = 'ALL'" ng-class="{ active: filters['loanType'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['loanType'] = 'BUSINESS'" ng-class="{ active: filters['loanType'] == 'BUSINESS'}">中小企业贷</span>
<span class="option" ng-click="filters['loanType'] = 'PERSONAL'" ng-class="{ active: filters['loanType'] == 'PERSONAL'}">个人贷</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">利率</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['riskLevel'] = 'ALL';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['riskLevel'] = 'HIGH';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'HIGH'}">从高到低</span>
<span class="option" ng-click="filters['riskLevel'] = 'LOW';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'LOW'}">从低到高</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">期限</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['maturity'] = 'ALL'" ng-class="{ active: filters['maturity'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['maturity'] = 'LE12'" ng-class="{ active: filters['maturity'] == 'LE12'}">12个月及以下</span>
<span class="option" ng-click="filters['maturity'] = 'GT12'" ng-class="{ active: filters['maturity'] == 'GT12'}">12个月以上</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">剩余时间</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['leftTime'] = 'ALL';uniqueOrderBy('leftTime');" ng-class="{ active: filters['leftTime'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['leftTime'] = 'HIGH';uniqueOrderBy('leftTime');" ng-class="{ active: filters['leftTime'] == 'HIGH'}">从高到低</span>
<span class="option" ng-click="filters['leftTime'] = 'LOW';uniqueOrderBy('leftTime');" ng-class="{ active: filters['leftTime'] == 'LOW'}">从低到高</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">还款方式</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['loanRepayment'] = 'ALL'" ng-class="{ active: filters['loanRepayment'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['loanRepayment'] = 'Amortization'" ng-class="{ active: filters['loanRepayment'] == 'Amortization'}">等额本息</span>
<span class="option" ng-click="filters['loanRepayment'] = 'Session_Period'" ng-class="{ active: filters['loanRepayment'] == 'Session_Period'}">每月还息,按季度还本</span>
<span class="option" ng-click="filters['loanRepayment'] = 'Equal_Principal_Interest'" ng-class="{ active: filters['loanRepayment'] == 'Equal_Principal_Interest'}">等本等息</span>
<span class="option" ng-click="filters['loanRepayment'] = 'Half_Year_Period'" ng-class="{ active: filters['loanRepayment'] == 'Half_Year_Period'}">每月还息,按半年还本</span>
<span class="option" ng-click="filters['loanRepayment'] = 'DAILY'" ng-class="{ active: filters['loanRepayment'] == 'DAILY'}">天天还</span>
<span class="option" ng-click="filters['loanRepayment'] = 'Pay_At_The_End'" ng-class="{ active: filters['loanRepayment'] == 'Pay_At_The_End'}">每月还息,到期一次性还本</span>
</div>
</div>
</div>
<div class="" ng-show="!onlyGuaranteed">
<span class="filter-name clearfix">特色标</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['loanFlag'] = 'ALL'" ng-class="{ active: filters['loanFlag'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['loanFlag'] = 'TRANSFERABLE'" ng-class="{ active: filters['loanFlag'] == 'TRANSFERABLE'}">本息回购</span>
<span class="option" ng-click="filters['loanFlag'] = 'COLLATERALIZED'" ng-class="{ active: filters['loanFlag'] == 'COLLATERALIZED'}">抵押</span>
<span class="option" ng-click="filters['loanFlag'] = 'GURANTEED'" ng-class="{ active: filters['loanFlag'] == 'GURANTEED'}">担保</span>
<span class="option" ng-click="filters['loanFlag'] = 'CASH_GURANTEED'" ng-class="{ active: filters['loanFlag'] == 'CASH_GURANTEED'}">现金担保</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
      <!-- Secondary Market  --> 
     
      <div id="secondary-market" class="tab-pane active" style="display:none">
<div class="row">
<div class="col-xs-9">
<p class="loading text-center ng-hide" ng-show="secloading">
<i class="spinner sl-icon-loading"></i>
</p>
<div class="results" ng-show="!secloading">
<div class="ng-scope" ng-if="showSecondaryForPublic">
<div class="alert alert-warning text-center" ng-show="secLoansCount==0">暂无债权转让</div>
</div>
</div>
<div class="text-right">
<div class="sl-pagination pagination ng-isolate-scope" total-records="secLoansCount" page-size="secParams.pageSize" page="secParams.page">
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
<input class="form-control input-sm btn-embossed page-number ng-pristine ng-valid" type="text" sl-enter="goTo(displayPage-1)" ng-model="displayPage" maxlength="1" style="">
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
<div class="col-xs-3 s-filter">
<div class="browse-filter">
<div class="clearfix">
<div class="col-xs-6 btn-container">
<a class="pull-left btn btn-sm btn-outline-inverse" href="/public/help-center#/faq/article/5/5" target="_blank">信用等级说明</a>
</div>
<div class="col-xs-6 btn-container">
<a class="pull-right btn btn-sm btn-outline-inverse" href="/public/lender?force=true">新手指南</a>
</div>
</div>
<div class="filters">
<div class="clearfix search-bar">
<form class="ng-pristine ng-valid" ng-submit="search()">
<div class="input-group input-group-sm">
<input class="form-control ng-pristine ng-valid" type="text" placeholder="搜索贷款编号" ng-model="queryString">
<span class="sl-icon-search" ng-click="search()"></span>
</div>
</form>
</div>
<div class="clearfix">
<h6 class="pull-left">筛选条件</h6>
<label class="pull-right reset-btn btn btn-link" ng-click="reset()">重置</label>
</div>
<div class="" ng-show="showSecTab">
<span class="filter-name clearfix">转让价</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['salePrice'] = 'ALL';uniqueOrderBy('salePrice');" ng-class="{ active: filters['salePrice'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['salePrice'] = 'LOW';uniqueOrderBy('salePrice');" ng-class="{ active: filters['salePrice'] == 'LOW'}">从低到高</span>
<span class="option" ng-click="filters['salePrice'] = 'HIGH';uniqueOrderBy('salePrice');" ng-class="{ active: filters['salePrice'] == 'HIGH'}">从高到低</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">类型</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['loanType'] = 'ALL'" ng-class="{ active: filters['loanType'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['loanType'] = 'BUSINESS'" ng-class="{ active: filters['loanType'] == 'BUSINESS'}">中小企业贷</span>
<span class="option" ng-click="filters['loanType'] = 'PERSONAL'" ng-class="{ active: filters['loanType'] == 'PERSONAL'}">个人贷</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">利率</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['riskLevel'] = 'ALL';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['riskLevel'] = 'HIGH';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'HIGH'}">从高到低</span>
<span class="option" ng-click="filters['riskLevel'] = 'LOW';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'LOW'}">从低到高</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">期限</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['maturity'] = 'ALL'" ng-class="{ active: filters['maturity'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['maturity'] = 'LE12'" ng-class="{ active: filters['maturity'] == 'LE12'}">12个月及以下</span>
<span class="option" ng-click="filters['maturity'] = 'GT12'" ng-class="{ active: filters['maturity'] == 'GT12'}">12个月以上</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">剩余时间</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['leftTime'] = 'ALL';uniqueOrderBy('leftTime');" ng-class="{ active: filters['leftTime'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['leftTime'] = 'HIGH';uniqueOrderBy('leftTime');" ng-class="{ active: filters['leftTime'] == 'HIGH'}">从高到低</span>
<span class="option" ng-click="filters['leftTime'] = 'LOW';uniqueOrderBy('leftTime');" ng-class="{ active: filters['leftTime'] == 'LOW'}">从低到高</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">还款方式</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['loanRepayment'] = 'ALL'" ng-class="{ active: filters['loanRepayment'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['loanRepayment'] = 'Amortization'" ng-class="{ active: filters['loanRepayment'] == 'Amortization'}">等额本息</span>
<span class="option" ng-click="filters['loanRepayment'] = 'Session_Period'" ng-class="{ active: filters['loanRepayment'] == 'Session_Period'}">每月还息,按季度还本</span>
<span class="option" ng-click="filters['loanRepayment'] = 'Equal_Principal_Interest'" ng-class="{ active: filters['loanRepayment'] == 'Equal_Principal_Interest'}">等本等息</span>
<span class="option" ng-click="filters['loanRepayment'] = 'Half_Year_Period'" ng-class="{ active: filters['loanRepayment'] == 'Half_Year_Period'}">每月还息,按半年还本</span>
<span class="option" ng-click="filters['loanRepayment'] = 'DAILY'" ng-class="{ active: filters['loanRepayment'] == 'DAILY'}">天天还</span>
<span class="option" ng-click="filters['loanRepayment'] = 'Pay_At_The_End'" ng-class="{ active: filters['loanRepayment'] == 'Pay_At_The_End'}">每月还息,到期一次性还本</span>
</div>
</div>
</div>
<div class="" ng-show="!onlyGuaranteed">
<span class="filter-name clearfix">特色标</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['loanFlag'] = 'ALL'" ng-class="{ active: filters['loanFlag'] == 'ALL'}">不限</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['loanFlag'] = 'TRANSFERABLE'" ng-class="{ active: filters['loanFlag'] == 'TRANSFERABLE'}">本息回购</span>
<span class="option" ng-click="filters['loanFlag'] = 'COLLATERALIZED'" ng-class="{ active: filters['loanFlag'] == 'COLLATERALIZED'}">抵押</span>
<span class="option" ng-click="filters['loanFlag'] = 'GURANTEED'" ng-class="{ active: filters['loanFlag'] == 'GURANTEED'}">担保</span>
<span class="option" ng-click="filters['loanFlag'] = 'CASH_GURANTEED'" ng-class="{ active: filters['loanFlag'] == 'CASH_GURANTEED'}">现金担保</span>
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
    <div class="modal fade multiple-order-modal" id="multipleOrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
     <div class="modal-dialog"> 
      <div class="modal-content"> 
       <div class="modal-header"> 
        <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
        <h4 class="modal-title">批量投标</h4> 
       </div> 
       <div class="modal-body"> 
        <div class="before-multiple hidden"> 
         <div class="row"> 
          <div class="col-xs-1 col-xs-offset-2"> 
           <span class="sl-icon-warning lead"></span> 
          </div> 
          <div class="col-xs-9"> 
           <p>你的购物车里已有其他的贷款标， </p> 
           <p>此操作（批量创建订单）将会把购物车已有的标一同提交，</p> 
           <p>你确定要继续？</p> 
          </div> 
         </div> 
        </div> 
        <div class="start-multiple"> 
         <div class="progress"> 
          <div class="progress-bar" id="batch-investment"></div> 
         </div> 
         <p id="batch-loading" class="text-center"><i class="spinner sl-icon-loading"></i>批量投标中......<span class="times-text"></span></p> 
         <div id="batch-success" class="text-center hidden"> 
          <p>投标完成（成功<span class="success-num"></span>，失败<span class="error-num"></span>)<span class="times-text"></span></p> 
          <div class="bulk-option text-center"> 
           <span>再来</span>
           <input type="text" name="bulkTimes" placeholder="最多再来20次" class="times-again" />
           <span>遍</span> 
           <a href="index.html" class="btn btn-action continue-bulk">确定</a> 
          </div> 
         </div> 
        </div> 
       </div> 
       <div class="modal-footer hidden"> 
        <button type="button" class="btn btn-default" data-dismiss="modal">返回</button> 
        <button type="button" class="btn btn-action yes">确认投标</button> 
       </div> 
      </div>
      <!-- /.modal-content --> 
     </div>
     <!-- /.modal-dialog --> 
    </div>
    <!-- /.modal --> 
    <div class="modal fade" id="diversificationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
     <div class="modal-dialog"> 
      <div class="modal-content"> 
       <div class="modal-header"> 
        <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
        <h4 class="modal-title">分散投资提醒</h4> 
       </div> 
       <div class="modal-body"> 
        <p class="text-center"><span class="sl-icon-warning lead"></span>你的投资金额已超过此贷款标的10%，建议分散投标！</p> 
       </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button> 
        <button type="button" class="btn btn-action yes">确认投标</button> 
       </div> 
      </div>
      <!-- /.modal-content --> 
     </div>
     <!-- /.modal-dialog --> 
    </div>
    <!-- /.modal --> 
    <div id="invest-wizard" class="modal fade" role="dialog" aria-labelledby="loadMoneyWizardLabel" aria-hidden="true"> 
     <div class="modal-dialog modal-sm" ng-controller="CartCtrl"> 
      <div class="modal-content"> 
       <div> 
        <div class="modal-header text-center"> 
         <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
         <h5 class="modal-title"><span class="sl-icon-check"></span> 恭喜你投资成功! </h5> 
        </div> 
        <div class="modal-body"> 
         <div class="clearfix investment-result text-center"> 
          <p>本次共投资<span class="signName" ng-if="!tabSwitch">散标项目(</span><span class="signName" ng-if="tabSwitch">债权项目(</span> <span class="signName">ID:)</span><span class="amount">&nbsp;元</span>。 </p> 
          <div class="clearfix other-options"> 
           <div class="col-xs-6"> 
            <a href="/account/my-account#/invest-history" class="btn checkDetail">查看投资详情</a> 
           </div> 
           <div class="col-xs-6"> 
            <a href="market.html" class="btn  btn-secondary btn-embossed continueInvest" data-dismiss="modal">继续投资</a> 
           </div> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
   <!--footer--> 
   @endsection
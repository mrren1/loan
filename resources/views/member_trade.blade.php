@extends('layouts.public')

@section('title', '交易记录')
 
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
<div class="trade-history content-wrapper ng-scope">
<header class="section-header">
<h6 class="section-header-title">交易记录</h6>
</header>
<section class="summary-section">
<div class="trade-header">
<div id="date-choose" class="row date-choose">
<div class="col-xs-2 text-center">
<span class="col-xs-12 col-xs-offset-1 label-choose" ng-click="tradedHistoryParams.range=''" ng-init="dateChoose='date-all'" ng-class="{'label-choose':tradedHistoryParams.range==''}">按月份查询</span>
</div>
<div class="col-xs-2 date-dropdown month-dropdown text-center pdSpace ng-scope" ng-if="tradedHistoryParams.range==''">
<div class="drop btn-group select select-block mbn ng-isolate-scope" selected-name="monthData.year" btn-style="btn-add" options="yearSelectData">
<button class="btn dropdown-toggle clearfix btn-add" data-toggle="dropdown">
<span class="filter-option pull-left ng-binding">2015</span>
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu">
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="0" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">2013</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="1" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">2014</a>
</li>
<li class="ng-scope selected" ng-class="{ selected : $index == selected }" rel="2" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">2015</a>
</li>
</ul>
<select class="form-control hide" name="">
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="2013" ng-repeat="option in options">2013</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="2014" ng-repeat="option in options">2014</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="2015" ng-repeat="option in options" selected="selected">2015</option>
</select>
</div>
</div>
<div class="col-xs-1 text-center pdSpace yearAndMonth ng-scope" ng-if="tradedHistoryParams.range==''">年</div>
<div class="col-xs-1 date-dropdown month-dropdown text-center pdSpace">
<div class="drop btn-group select select-block mbn ng-isolate-scope" selected-name="monthData.month" btn-style="btn-add" options="monthSelectData">
<button class="btn dropdown-toggle clearfix btn-add" data-toggle="dropdown">
<span class="filter-option pull-left ng-binding">3</span>
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu">
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="0" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">1</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="1" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">2</a>
</li>
<li class="ng-scope selected" ng-class="{ selected : $index == selected }" rel="2" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">3</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="3" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">4</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="4" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">5</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="5" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">6</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="6" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">7</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="7" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">8</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="8" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">9</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="9" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">10</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="10" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">11</a>
</li>
<li class="ng-scope" ng-class="{ selected : $index == selected }" rel="11" ng-repeat="option in options">
<a class="ng-binding" ng-click="selectOption($index)" href="">12</a>
</li>
</ul>
<select class="form-control hide" name="">
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="01" ng-repeat="option in options">1</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="02" ng-repeat="option in options">2</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="03" ng-repeat="option in options" selected="selected">3</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="04" ng-repeat="option in options">4</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="05" ng-repeat="option in options">5</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="06" ng-repeat="option in options">6</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="07" ng-repeat="option in options">7</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="08" ng-repeat="option in options">8</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="09" ng-repeat="option in options">9</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="10" ng-repeat="option in options">10</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="11" ng-repeat="option in options">11</option>
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="12" ng-repeat="option in options">12</option>
</select>
</div>
</div>
<div class="col-xs-1 text-center pdSpace yearAndMonth">月</div>
<div class="col-xs-1 text-center ">
<span class="col-xs-15 col-xs-offset-2" ng-click="tradedHistoryParams.range='today'" ng-class="{'label-choose':tradedHistoryParams.range=='today'}">今天</span>
</div>
<div class="col-xs-1 text-center ">
<span class="col-xs-15 col-xs-offset-2" ng-click="tradedHistoryParams.range='past_7_days'" ng-class="{'label-choose':tradedHistoryParams.range=='past_7_days'}">一周</span>
</div>
<div class="col-xs-1 text-center pdSpace">
<span class="col-xs-15 col-xs-offset-2" ng-click="tradedHistoryParams.range='past_month'" ng-class="{'label-choose':tradedHistoryParams.range=='past_month'}">1个月</span>
</div>
<div class="col-xs-1 text-center pdSpace">
<span class="col-xs-15 col-xs-offset-2" ng-click="tradedHistoryParams.range='past_3_month'" ng-class="{'label-choose':tradedHistoryParams.range=='past_3_month'}">3个月</span>
</div>
<div class="col-xs-1 text-center ">
<span class="col-xs-15 col-xs-offset-2" ng-click="tradedHistoryParams.range='past_6_month'" ng-class="{'label-choose':tradedHistoryParams.range=='past_6_month'}">半年</span>
</div>
</div>
</div>
<h2 class="text-center ng-hide" ng-show="tradeHistoryLoading">
<i class="spinner sl-icon-loading"></i>
</h2>
<div id="table-tradeHistoryItems" class="" ng-show="!tradeHistoryLoading">
<div class="notes-table">
<div class="data-table-wrapper ng-isolate-scope" init="intialDetail(ele)" params="tradedHistoryParams" data="tradeHistoryData" columns="tradeHistoryColumns">
<table class="table data-table table-hover table-striped ">
<thead>
<tr>
<th class="ng-scope paddingRight" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">交易日期|</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope paddingLeft" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">流水号</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope paddingRight" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">借款编号|</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope paddingLeft" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">交易描述</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">交易类型</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">金额|明细</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
<th class="ng-scope" ng-repeat="a in columns" ng-class="a.headerCssClass">
<span ng-click="sort(a.sortBy ? a.sortBy : a.field)" ng-class="{'active':params.sortBy==a.sortBy,'sortable':a.sortable}">
<span class="ng-binding" ng-bind-html="escapeHtml(a.name)">
<span title="余额=可用余额+冻结金额">余额</span>
</span>
<span ng-class="{'sl-icon-pointer-down-dark':(a.sortable && ((params.sortBy!=a.sortBy && defaultDesc==true)||(params.sortBy==a.sortBy&&params.sortDir=='desc'))), 'sl-icon-pointer-up-dark':a.sortable &&((params.sortBy!=a.sortBy && defaultDesc==false)|| (params.sortBy==a.sortBy&&params.sortDir == 'asc'))}"></span>
</span>
</th>
</tr>
</thead>
<tbody> </tbody>
</table>
</div>
</div>
<div class="notes-pagination">
<div class="sl-pagination pagination ng-isolate-scope" total-records="tradeHistoryTotalRecords" page-size="tradedHistoryParams.pageSize" page="tradedHistoryParams.page">
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
<div class="history-general" ng-show="!tradeHistoryLoading">
<div class="row">
<div class="col-xs-6 text-center right-gray-border">
<h3 class="col-xs-6 col-xs-offset-3 text-center green-label ng-binding" ng-bind-html="summary.income.total|slMoney">
0
<small>.00元</small>
</h3>
<div class="col-xs-6 col-xs-offset-3 text-center paddingUpDown">
<span>流入</span>
</div>
</div>
<div class="col-xs-6 text-center">
<h3 class="col-xs-6 col-xs-offset-3 text-center dark-blue-label ng-binding" ng-bind-html="summary.outcome.total|slMoney">
0
<small>.00元</small>
</h3>
<div class="col-xs-6 col-xs-offset-3 text-center paddingUpDown">
<span>流出</span>
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
          $(".change6").addClass('active');            
      })
  </script>
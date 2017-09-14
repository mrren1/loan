@extends('layouts.public')

@section('title', '关于我们')
<style>
  .choose{
      cursor: pointer;
      width: 65px;
      height:20px;
     /* background: red;*/
     /* border: 1px solid #ccc;*/
  }

</style>

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

<div id="main_lend">
@foreach($setloanData as $val)
<div class="plan-item ng-scope" ng-repeat="p in plans | orderBy:'orderIndex'" style="">
<div class="sl-plan-card ng-isolate-scope" ng-class="{ openCard: isOpen==true}" ng-mouseleave="hover = false" ng-mouseenter="hover = true" plan="p">
<div class="sl-plan-pic col-xs-2 sl-plan-link" ng-click="toDetail()">
<div>
<img class="sl-plan-pic" ng-src="{{$val['user_photo']}}" src="uploads/{{$val['user_photo']}}">
<span class="new-share-icon ng-hide" ng-show="plan.id == 185001"></span>
</div>
</div>
<div class="sl-plan-basic-info col-xs-7 sl-plan-link" ng-click="toDetail()">
<h4 class="title ng-binding">个人贷款</h4>
<p class="desc ng-binding">
收益秒杀余额宝，资金存取很灵活。
<a class="view-details-link ng-animate ng-hide" title="查看详情" ng-show="hover" style=""> 查看详情</a>
</p>
<div class="sl-plan-pay-info">
<div class="col-xs-4 sl-plan-rate">
<label class="name col-xs-6">收益率：</label>
<label class="value col-xs-6 ng-binding">
{{$val['lend_interest']*100}}
<span>%</span>
</label>
</div>
<div class="col-xs-5 sl-plan-method">
<p class="value ng-binding">贷款人信誉</p>
<p class="name" ng-show="plan.safeguardWay">极好</p>
</div>
<div class="col-xs-3 sl-plan-amount">
<p class="value number ng-binding" ng-show="plan.minInvestAmount">{{$val['lend_lack']}}元</p>
<p class="name" ng-show="plan.minInvestAmount">最低金额</p>
</div>
</div>
</div>
<div class="sl-plan-active-info col-xs-3">
<div>
<span class="sl-icon-account"></span>
<label>
 已投金额   
<span class="amount-text ng-binding">{{$val['lend_money']}}</span>
<span>万元</span>
</label>
</div>
<div>
<span class="sl-icon-personal"></span>
<label>
 加入人数   
<span class="member-num-text ng-binding">0</span>
<span>人</span>
</label>
</div>
<a class="btn btn-block btn-secondary btn-embossed link" data-id="{{$val['lend_id']}}" ng-show="!isOpen && plan.openAmount>0 ">申请贷款</a>
<div class="repayment-status ng-hide" ng-show="isOpen || !plan.openAmount ">
<span>已满额</span>
</div>
</div>
</div>
</div>
@endforeach
</div>

</div>
<input type="hidden" id="now_page" value="{{$arrData['page']}}">
<input type="hidden" id="total_page" value="{{$arrData['total']}}">
<div class="loan-list-footer row">
<div class="text-right">
<div class="sl-pagination pagination ng-isolate-scope" total-records="loansCount" page-size="params.pageSize" page="params.page">
<ul>
<li class="previous">
<a ng-click="prev()" href="javascript:;" class="pages" data-id="p">
<i class="sl-icon-arrow-left"></i>
</a>
</li>
<span id="limit">
<?php 
$p = $arrData['page'];
if($p < 3){
  $p = 3;
}
if($p > $arrData['total']-3){
  $p = $arrData['total']-2;
}
for($i=$p-2;$i<$p+3;$i++){?>
<li class="first ng-hide <?php if($i == $arrData['page']){echo 'active';} ?>" ng-show="minPage > 1">
<a ng-click="first()" href="javascript:;" class="pages" data-id="<?php echo $i;?>"><?php echo $i; ?></a>
</li>
<?php } ?>
</span>

<!-- <li class="ng-scope" ng-class="{ active: p == displayPage - 1 }" ng-repeat="p in pages" style="">
<a class="ng-binding pages" ng-click="goTo(p)" href="javascript:;">2</a>
</li> -->

<li class="total">
<span class="ng-binding"><span id="sumtotal">{{$arrData['total']}}</span>页</span>
</li>
<li class="next">
<a ng-click="next()" href="javascript:;" class="pages" data-id="n">
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
<!-- <div class="clearfix search-bar">
<form class="ng-pristine ng-valid" ng-submit="search()"><div class="input-group input-group-sm">
<input class="form-control ng-pristine ng-valid" type="text" placeholder="搜索贷款利息" ng-model="queryString">
<span class="sl-icon-search buttons" ng-click="search()"></span>
</div>
</form>
</div> -->
<div class="clearfix">
<h6 class="pull-left">筛选条件</h6>
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
<span class="filter-name clearfix">利率</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['loanType'] = 'ALL'" ng-class="{ active: filters['loanType'] == 'ALL'}">不限</span>
</div>
<input type="hidden" id="interest" value="">
<div class="custom-options">
<span class="option choose" ng-click="filters['riskLevel'] = 'HIGH';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'HIGH'}" value="0.05" status="0">5%以下</span>
<span class="option choose" ng-click="filters['riskLevel'] = 'LOW';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'LOW'}" value="0.1" status="0">10%以下</span>
<span class="option choose" ng-click="filters['riskLevel'] = 'HIGH';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'HIGH'}" value="0.15" status="0">15%以下</span>
<span class="option choose" ng-click="filters['riskLevel'] = 'LOW';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'LOW'}" value="0.2" status="0">20%以下</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">最大金额</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['riskLevel'] = 'ALL';uniqueOrderBy('riskLevel');" ng-class="{ active: filters['riskLevel'] == 'ALL'}">不限</span>
</div>
<input type="hidden" id="money" value="">
<div class="custom-options">
<span class="option choose" ng-click="filters['loanType'] = 'BUSINESS'" ng-class="{ active: filters['loanType'] == 'BUSINESS'}" value="5000" status="0">5000以上</span>
<span class="option choose" ng-click="filters['loanType'] = 'PERSONAL'" ng-class="{ active: filters['loanType'] == 'PERSONAL'}" value="10000" status="0">一万以上</span>
<span class="option choose" ng-click="filters['loanType'] = 'PERSONAL'" ng-class="{ active: filters['loanType'] == 'PERSONAL'}" value="20000" status="0">两万以上</span>
<span class="option choose" ng-click="filters['loanType'] = 'BUSINESS'" ng-class="{ active: filters['loanType'] == 'BUSINESS'}" value="0" status="0">全部</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">最低金额</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['maturity'] = 'ALL'" ng-class="{ active: filters['maturity'] == 'ALL'}">不限</span>
</div>
<input type="hidden" id="low_money" value="">
<div class="custom-options">
<span class="option choose" ng-click="filters['maturity'] = 'LE12'" ng-class="{ active: filters['maturity'] == 'LE12'}" value="3000" status="0">3000以上</span>
<span class="option choose" ng-click="filters['maturity'] = 'GT12'" ng-class="{ active: filters['maturity'] == 'GT12'}" value="5000" status="0">5000以上</span>
<span class="option choose" ng-click="filters['maturity'] = 'GT12'" ng-class="{ active: filters['maturity'] == 'GT12'}" value="10000" status="0">1万以上</span>
<span class="option choose" ng-click="filters['maturity'] = 'GT12'" ng-class="{ active: filters['maturity'] == 'GT12'}" value="0" status="0">全部</span>
</div>
</div>
</div>
<div>
<span class="filter-name clearfix">还款方式</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['leftTime'] = 'ALL';uniqueOrderBy('leftTime');" ng-class="{ active: filters['leftTime'] == 'ALL'}">限制</span>
</div>
<div class="custom-options">
<span class="option" ng-click="filters['leftTime'] = 'HIGH';uniqueOrderBy('leftTime');" ng-class="{ active: filters['leftTime'] == 'HIGH'}">到期一次性还本</span>
</div>
</div>
</div>
<!-- <div>
<span class="filter-name clearfix">还款方式</span>
<div class="list-dots">
<div class="default-option">
<span class="option active" ng-click="filters['loanRepayment'] = 'ALL'" ng-class="{ active: filters['loanRepayment'] == 'ALL'}">限制</span>
</div> -->
<!-- <div class="custom-options">
<span class="option" ng-click="filters['loanRepayment'] = 'Pay_At_The_End'" ng-class="{ active: filters['loanRepayment'] == 'Pay_At_The_End'}">到期一次性还本</span>
</div> -->
</div>
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
@endsection
 
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("body").on("click",".pages",function(){
           var page = $(this).attr('data-id');
           var now_page = $("#now_page").val();
           var total = $("#total_page").val();
           if(page == 'p'){
              page = now_page-1;
              if(page <= 0){
                  page = 1;
              }
           }else if(page == 'n'){
              page = now_page/1+1;
              if(page >= total){
                  page = total;
              }
           }else{
              page = page;
           }
           //获取搜索条件
            var interest = $("#interest").val();
            var money = $("#money").val();
            var low_money = $("#low_money").val();
            $(this).siblings().attr('style','none');
            $(this).attr('style','background:#ccc');
           //发送ajax
           $.ajax({
              type: "post",
              url: "search",
              dataType: 'json',
              data: {page:page,total:total,interest:interest,money:money,low_money:low_money},
              success: function(result){
                if(result == 0){
                   alert('查询失败');
                   return false; 
                }else{
                  $("#main_lend").html('');
                  $.each(result.setloanData,function(k,v){
                    str = '<div class="plan-item ng-scope" ng-repeat="p in plans | orderBy:orderIndex" style=""><div class="sl-plan-card ng-isolate-scope" ng-class="{ openCard: isOpen==true}" ng-mouseleave="hover = false" ng-mouseenter="hover = true" plan="p"><div class="sl-plan-pic col-xs-2 sl-plan-link" ng-click="toDetail()"><div><img class="sl-plan-pic" src="uploads/'+v.user_photo+'"><span class="new-share-icon ng-hide" ng-show="plan.id == 185001"></span></div></div><div class="sl-plan-basic-info col-xs-7 sl-plan-link" ng-click="toDetail()"><h4 class="title ng-binding">个人贷款</h4><p class="desc ng-binding">收益秒杀余额宝，资金存取很灵活<a class="view-details-link ng-animate ng-hide" title="查看详情" ng-show="hover" style="">查看详情</a></p><div class="sl-plan-pay-info"><div class="col-xs-4 sl-plan-rate"><label class="name col-xs-6">收益率：</label><label class="value col-xs-6 ng-binding">'+v.lend_interest*100+'<span>%</span></label></div><div class="col-xs-5 sl-plan-method"><p class="value ng-binding">贷款人信誉</p><p class="name" ng-show="plan.safeguardWay">极好</p></div><div class="col-xs-3 sl-plan-amount"><p class="value number ng-binding" ng-show="plan.minInvestAmount">'+v.lend_lack+'元</p><p class="name" ng-show="plan.minInvestAmount">最低金额</p></div></div></div><div class="sl-plan-active-info col-xs-3"><div><span class="sl-icon-account"></span><label> 已投金额 <span class="amount-text ng-binding">'+v.lend_money+'</span><span>万元</span></label></div><div><span class="sl-icon-personal"></span><label> 加入人数 <span class="member-num-text ng-binding">0</span><span>人</span></label></div><a class="btn btn-block btn-secondary btn-embossed link" data-id="'+v.lend_id+'" ng-show="!isOpen && plan.openAmount>0 ">申请贷款</a><div class="repayment-status ng-hide" ng-show="isOpen || !plan.openAmount "><span>已满额</span></div></div></div></div>';
                    $("#main_lend").append(str);
                  });
                  $("#now_page").val(result.page);
                  $("#total_page").val(result.total);
                  var p = result.page;
                  if(p < 3){
                    p = 3;
                  }
                  if(p > result.total-3){
                    p = result.total-2;
                  }
                  $("#limit").html('');
                  for(var i=p/1-2;i<p/1+3;i++){
                    if(i == result.page){
                        leaf = 'active';
                    }else{
                        leaf = 'ab';
                    }
                    arr = '<li class="first ng-hide '+leaf+'" ng-show="minPage > 1"><a ng-click="first()" href="javascript:;" class="pages" data-id="'+i+'">'+i+'</a></li>';
                    $("#limit").append(arr);
                  }
                }
              }
           });
        });
        $("body").on("click",".link",function(){
            var lend_id = $(this).attr('data-id');
            window.location.href="debt?lend_id='"+lend_id+"'";
        });
        $(".choose").click(function(){
            var value = $(this).attr('value');
            var status = $(this).attr('status');
            if(status == 0){
               $(this).parent().prev().val(value);
               $(this).attr('status',1);
               $(this).siblings().attr('style','none');
               $(this).attr('style','background:#ccc');
            }else{
               $(this).parent().prev().val('');
               $(this).attr('status',0);
               $(this).attr('style','none');
            }
            
            //获取条件
            var interest = $("#interest").val();
            var money = $("#money").val();
            var low_money = $("#low_money").val();
            //发送ajax
            $.ajax({
                type: 'post',
                url: 'search_where',
                dataType: 'json',
                data: {interest:interest,money:money,low_money:low_money},
                success: function(result){
                  //alert(result);return false;
                  if(result == 0){
                      alert('没有你想要的数据');
                      $("#main_lend").html('<p style="color:red">没有查到你想要的数据</p>');
                      $("#limit").html('');
                      return false;
                  }else if(result == 1){
                      alert('查询数据失败');
                      return false;
                  }else{
                      $("#main_lend").html('');
                      $.each(result.lendData,function(k,v){
                        str = '<div class="plan-item ng-scope" ng-repeat="p in plans | orderBy:orderIndex" style=""><div class="sl-plan-card ng-isolate-scope" ng-class="{ openCard: isOpen==true}" ng-mouseleave="hover = false" ng-mouseenter="hover = true" plan="p"><div class="sl-plan-pic col-xs-2 sl-plan-link" ng-click="toDetail()"><div><img class="sl-plan-pic" src="uploads/'+v.user_photo+'"><span class="new-share-icon ng-hide" ng-show="plan.id == 185001"></span></div></div><div class="sl-plan-basic-info col-xs-7 sl-plan-link" ng-click="toDetail()"><h4 class="title ng-binding">个人贷款</h4><p class="desc ng-binding">收益秒杀余额宝，资金存取很灵活<a class="view-details-link ng-animate ng-hide" title="查看详情" ng-show="hover" style="">查看详情</a></p><div class="sl-plan-pay-info"><div class="col-xs-4 sl-plan-rate"><label class="name col-xs-6">收益率：</label><label class="value col-xs-6 ng-binding">'+v.lend_interest*100+'<span>%</span></label></div><div class="col-xs-5 sl-plan-method"><p class="value ng-binding">贷款人信誉</p><p class="name" ng-show="plan.safeguardWay">极好</p></div><div class="col-xs-3 sl-plan-amount"><p class="value number ng-binding" ng-show="plan.minInvestAmount">'+v.lend_lack+'元</p><p class="name" ng-show="plan.minInvestAmount">最低金额</p></div></div></div><div class="sl-plan-active-info col-xs-3"><div><span class="sl-icon-account"></span><label> 已投金额 <span class="amount-text ng-binding">'+v.lend_money+'</span><span>万元</span></label></div><div><span class="sl-icon-personal"></span><label> 加入人数 <span class="member-num-text ng-binding">0</span><span>人</span></label></div><a class="btn btn-block btn-secondary btn-embossed link" data-id="'+v.lend_id+'" ng-show="!isOpen && plan.openAmount>0 ">申请贷款</a><div class="repayment-status ng-hide" ng-show="isOpen || !plan.openAmount "><span>已满额</span></div></div></div></div>';
                        $("#main_lend").append(str);
                      });
                      $("#now_page").val(result.page);
                      $("#total_page").val(result.total);
                      var p = result.page;
                      if(p < 3){
                        p = 3;
                      }
                      if(p > result.total-3){
                        p = result.total-2;
                      }
                      $("#limit").html('');
                      for(var i=p/1-2;i<p/1+3;i++){
                        if(i == result.page){
                            leaf = 'active';
                        }else{
                            leaf = 'ab';
                        }
                        arr = '<li class="first ng-hide '+leaf+'" ng-show="minPage > 1"><a ng-click="first()" href="javascript:;" class="pages" data-id="'+i+'">'+i+'</a></li>';
                        $("#limit").append(arr);
                      }
                      $("#sumtotal").html(result.total);
                  }
                }
            });
        });
    })
</script>

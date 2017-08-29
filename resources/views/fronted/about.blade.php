@extends('layouts.public')

@section('title', '关于我们')

<div class="wrapper about-us">
@section('sidebar')
  @parent
<header id="sl-header" class="sl-header leadership-banner" ng-controller="HeaderCtrl"> 
    <nav class="navbar navbar-inverse navbar-static-top site-nav" role="navigation"> 
    </nav> 
    <div id="about-us-menu" class="">
<nav class="navbar navbar-static-top">
<div class="container">
<div class="collapse navbar-collapse ng-scope" ng-controller="AboutUsCtrl">
<ul class="nav navbar-nav">
<li class="company active" ui-sref-active="active" ng-repeat="nav in navs">
<a class="ng-binding" ui-sref="company" href="#/company">公司简介</a>
</li>
<li class="leadership" ui-sref-active="active" ng-repeat="nav in navs">
<a class="ng-binding" ui-sref="leadership" href="#/leadership">管理团队</a>
</li>
<li class="partner" ui-sref-active="active" ng-repeat="nav in navs">
<a class="ng-binding" ui-sref="partner" href="#/partner">合作伙伴</a>
</li>
<li class="media" ui-sref-active="active" ng-repeat="nav in navs">
<a class="ng-binding" ui-sref="media" href="#/media">媒体报道</a>
</li>
<li class="news" ui-sref-active="active" ng-repeat="nav in navs">
<a class="ng-binding" ui-sref="news" href="#/news">最新动态</a>
</li>
<li class="job" ui-sref-active="active" ng-repeat="nav in navs">
<a class="ng-binding" ui-sref="job" href="#/job">招贤纳士</a>
</li>
<li class="contact" ui-sref-active="active" ng-repeat="nav in navs">
<a class="ng-binding" ui-sref="contact" href="#/contact">联系我们</a>
</li>
</ul>
</div>
</div>
</nav>
</div>
     <div class="ng-scope" autoscroll="false" ui-view="aboutJumbotron" style="">
<div class="jumbotron company ng-scope">
<div class="container hero">
<div class="row">
<h2 class="slogan invisible">依托世界领先的网络金融科技</h2>
<h5 class="caption white hidden">点融网致力于健全中国的网络信用体系，打破信息壁垒，拓展普惠金融，打造P2P网络金融平台的杰出品牌。</h5>
</div>
</div>
</div>
</div>
     <!--jumbotron--> 
     <div ui-view="aboutJumbotron" autoscroll="false"></div> 
    </div> 
   </header> 
@endsection 
@section('content') 
<div class="ng-scope" autoscroll="false" ui-view="aboutBody" style="">
<div class="container ng-scope">
<section class="row company-overview">
<div class="col-xs-4 with-icon company-founded">
<h6>成立于</h6>
<h4>2012年</h4>
</div>
<div class="col-xs-4 with-icon company-location">
<h6>总部位于</h6>
<h4>上海</h4>
</div>
<div class="col-xs-4 with-icon company-employees">
<h6>点融人</h6>
<h4>1100+名</h4>
</div>
</section>
<section class="row company-intro">
<div class="col-xs-10 col-xs-offset-1">
<p> 点融网是一家总部位于上海的本土高科技网络金融服务公司。通过国内资深团队的运作和引进全球最大网络借贷平台LendingClub的先进技术和管理经验，点融网构建出一个高效、透明、人性化易操作的网络投融资平台，将出借人和借款人进行自主配对，为国内广大个人和中小企业解决最急需的贷款和融资问题。同时，利用互联网的技术达到最低的审核成本，并把借贷份额进行拆分，实现自助式借贷：使具有闲置资金出借的个人与有贷款需求的个人或企业，能在线上通过我们的平台成功配对。</p>
</div>
</section>
</div>
<div class="team container ng-scope">
<div class="row">
<div class="col-xs-12">
<div class="team-pic">
<img src="images/dianrong-colleagues2.jpg">
</div>
</div>
</div>
</div>
<div class="company-office ng-scope">
<div class="container">
<div class="pull-right idea">
<h5 class="caption">我们的工作理念</h5>
<div>
<span class="description">科技改变金融。实力雄厚的研发团队，让技术一路领先。</span>
<span class="description">竭诚满足你的专属需求，开启金融定制时代。</span>
<span class="description">能够切实感受的公平、透明和优惠，是我们能够一路相伴的理由。</span>
<span class="description">精心设计最优的投资组合，你手边的金融智慧。</span>
</div>
<div class="about-logo"></div>
</div>
</div>
</div>
</div>
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
<!-- <div id="call-to-action" class="ng-scope">
    <div class="container footer-decor">
    <h4>准备好享受高投资回报了吗？</h4>
    <p>
    <a id="register-lender-bottom" class="btn btn-lg btn-secondary btn-embossed ng-scope" ng-if="!isAuthenticated()" href="reg.html">立即注册点融网</a>
    </p>
    </div>
  </div>  -->
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

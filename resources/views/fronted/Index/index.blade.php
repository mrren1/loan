<!DOCTYPE html>
<html dir="ltr" lang="zh-CN" xml:lang="zh-CN">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="description" content="点融网为广大个人和微小企业提供便利的投融资服务。借款产品灵活、大额、费用低、手续快；投资方式人性友好、回报高、百分百本金保护！Dianrong.com provides online efficient investment and financing services for individuals and SMEs. Better rates, lower cost, faster way to borrowers and more flexible investment, higher returns, 100% principal protection to investors." /> 
  <meta name="keywords" content="P2P网贷,P2P网络贷款平台,P2P网络投资平台,P2P投资理财平台,网络贷款平台,团团赚,点融,点融网,点融官网" /> 
  <link rel="shortcut icon" href="images/favicon.ico" /> 
  <title>首页-index.html</title> 
  <link href="css/bootstrap.min.css" rel="stylesheet" /> 
  <link href="css/components.css?ver=142682356" rel="stylesheet" /> 
  <link href="css/main.css?ver=142682356" rel="stylesheet" /> 
  <link href="css/new-home.css?ver=142682356" rel="stylesheet" /> 
  <style type="text/css">
    @media (min-width: 992px) {
      @font-face {
        font-family: 'proxima-nova';
        src: url('fonts/proximanova-regular-webfont.eot');
        src: url('fonts/proximanova-regular-webfont.eot?#iefix') format('embedded-opentype'),
          url('fonts/proximanova-regular-webfont.woff') format('woff'),
          url('fonts/proximanova-regular-webfont.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
      }

      @font-face {
        font-family: 'proxima-nova';
        src: url('fonts/proximanova-bold-webfont.eot');
        src: url('fonts/proximanova-bold-webfont.eot?#iefix') format('embedded-opentype'),
          url('fonts/proximanova-bold-webfont.woff') format('woff'),
          url('fonts/proximanova-bold-webfont.ttf') format('truetype');
        font-weight: bold;
        font-style: normal;
      }
    }
  </style> 
  <!-- Add support for bootstrap in IE8 --> 
  <!--[if lt IE 9]>
  <link href="css/ie8.css?ver=142682356" rel="stylesheet">
  <![endif]--> 
  <!--[if IE 9]>
  <link href="css/ie9.css?ver=142682356" rel="stylesheet">
  <![endif]--> 

 </head> 
 <body> 
  <!--[if lt IE 8]>
<div class="alert alert-warning text-center" style="margin-bottom:0;">
  <p>你的浏览器不支持点融网的一些新特性，请升级你的浏览器至<a href="http://se.360.cn/">360浏览器</a>或<a href="http://browsehappy.com/">Chrome</a>。
  </p>
  <p>正在为你跳转到旧版网站...<a href="index.html">立即跳转</a></p>
  <p>2015年了，IE8老了...</p>
</div>
<![endif]--> 
  <div class="wrapper "> 
   <!--header--> 
   <header class="sl-header new-header ng-scope" ng-controller="HeaderCtrl" id="sl-header"> 
    <nav class="navbar navbar-inverse navbar-static-top site-nav " role="navigation"> 
     <div class="container new-home-container"> 
      <ul class="nav navbar-nav site-nav-sns "> 
       <li> <a href="#" class="icon-sns qq"> 
         <div class="social-content"> 
          <p class="social-title">点融网官方QQ群</p> 
          <p>141444867</p> 
         </div> </a> </li> 
       <li> <a href="http://weibo.com/dianrongwang" target="_blank" class="icon-sns weibo" rel="nofollow"></a> </li> 
       <li> <a href="#" class="icon-sns wechat"> 
         <div class="social-content"> 
          <p class="social-title">扫描关注微信公众号</p> 
          <p><img src="images/qr-code.jpg" /></p> 
         </div> </a> </li> 
      </ul> 
      <ul id="nonLoginBar" class="nav navbar-nav navbar-right navbar-sm site-nav-login"> 
       <li><a id="login-panel" href="login" rel="nofollow">登录</a></li> 
       <li><a id="create-account" href="regist" class="btn btn-sm" rel="nofollow">注册账户</a></li> 
      </ul> 
      <ul class="nav navbar-nav navbar-right navbar-sm site-nav-user"> 
       <li class="dropdown"> <a href="member_info" class="dropdown-toggle hoverHeader"  data-toggle="dropdown" data-hover="dropdown">素材火的账户 <b class="caret"></b></a> 
        <ul class="dropdown-menu"> 
         <li><a href="member_info.html">我的账户</a></li> 
         <li><a href="#">退出</a></li> 
        </ul> </li> 
      </ul> 
     </div> 
    </nav> 
    <div class="site-menu"> 
     <div class="header-navbar-container sl-nav-wrapper header-nav-container"> 
      <nav class="navbar navbar-static-top sl-navbar" role="navigation"> 
       <div class="container"> 
        <div class="navbar-header  col-xs-2"> 
         <a class="navbar-brand" href="index"> <span class="sl-logo">点融网 - DianRong</span> </a> 
        </div> 
        <div class="sl-nav col-xs-10"> 
         <ul class="nav navbar-nav main-menu"> 
          <!--menus--> 
          <li class="main-link-list"> <a class="main-link" href="market"> <span class="sl-icon-bold-trend"></span> <span class="main-link-text">我要借款</span> </a> </li> 
          <li class="main-link-list"> <a class="main-link" href="about"> <span class="sl-icon-bold-linkman"></span> <span class="main-link-text">关于我们</span> </a> </li> 
          <li class="main-link-list" ng-class="{active:isActive('/public/help-center')}"> <a class="main-link" href="/public/about#/contact"> <span class="sl-icon-bold-contact"></span> <span class="main-link-text">联系我们</span> </a> </li> 
          <li class="main-link-list phone-contact"> <span class="sl-icon-bold-phone"></span> <span> 400-921-9218</span> </li> 
          <li class="main-link-list contact-bg"> <span class="contact-img"></span> </li> 
         </ul> 
        </div> 
        <!-- /.navbar-collapse --> 
       </div> 
      </nav> 
     </div> 
     <!--secondaryNav--> 
     <!--jumbotron--> 
    </div> 
   </header> 
   <!--content--> 
   <div class="new-home-wrapper"> 
    <div class="home-page-container ng-scope" ng-controller="HomeCtrl"> 
     <div class="row login-register-row"> 
      <div class="col-xs-8 banner-part"> 
       <div class="top-img"> 
        <span class="tuan-red">团团赚半年报发布了！<a href="http://www.dianrong.com/static/pdf/ttzhalfyearreport.pdf">立即下载</a></span> 
       </div> 
       <div class="banner-img"> 
        <div id="home-banner" class="hero"> 
         <a id="banner1" href="http://www.dianrong.com/blog/tiger" target="_blank" class="every-banner" style="background-image: url(images/new-home-banner.png);display:block;"> </a> 
         <a href="#" class="every-banner" style="background-image: none" data-background="url(images/new-banner2.jpg)"> </a> 
         <a id="banner2" href="#" class="every-banner" style="background-image: none" data-background="url(images/new-home-banner.png)"> </a> 
         <a id="banner3" href="#" class="every-banner" style="background-image: none" data-background="url(images/new-home-banner.png)"> </a> 
        </div> 
       </div> 
      </div> 

      <div class="col-xs-4 register-tab login-shown"> 
       <div class="login-header">
        欢迎回来
       </div> 
       <div class="login-content text-center"> 
        <div class="user-info">
         尊敬的用户：
         <span>素材火</span>
        </div> 
        <div class="wel-info">
         欢迎回来!
        </div> 
        <div class="available-info">
         账户可用余额
        </div> 
        <div class="number-cash">100.00元</div> 
        <div> 
         <a class="btn btn-primary recharge" href="member_pay.html">充值</a>
        </div> 
        <div> 
         <a class="btn btn-primary account-info" href="member_info.html">我的账户</a>
        </div> 
       </div> 
      </div>
 
     <div class="row advertise-words-row"> 
      <h3 class="text-center">明星产品-团团赚</h3> 
      <div class="text-center tech-words">
       真正安全，省心，高收益的组团投资方式
      </div> 
     </div> 
     <div class="row plans-row"> 
      <div class="col-xs-5 plans-info"> 
       <div class="left-part"> 
        <div class="row title-plan"> 
         <div class="col-xs-2"> 
          <img class="picture" src="images/plan-tuan.png" /> 
         </div> 
         <div class="col-xs-9 general-info"> 
          <span class="mark-green">7%,9%或更高灵活净收益</span> 
          <span>百元起投 | 本金保障 | 安全透明</span> 
          <span>安全、省心、高收益的组团投资方式</span> 
         </div> 
         <div class="col-xs-1"></div> 
        </div> 
        <div class="row plan-content"> 
         <span>点融网利用先进技术推出安全、省心、高收益的团团赚。</span> 
         <span>系统自动为您分散投资，100元也能极度分散投上千上万</span> 
         <span>个标并且动态增加，真正将风险分散至近0，团团赚家族</span> 
         <span>有投资团已加入本金保障机制，不同收益的投资团满足</span> 
         <span>更多投资人需求，让您本息无忧，坐享其成！</span> 
        </div> 
        <div class="row">
         <a class="btn btn-secondary btn-embossed link-quarter-report" href="http://www.dianrong.com/landing/ttzreportvol2/">团团赚季报</a>
        </div> 
       </div> 
      </div> 
      <div class="col-xs-7 plans-info-right" style="block"> 
       <!-- ngRepeat: plan in plans -->
       <div class="row right-part ng-scope" ng-repeat="plan in plans">
<div class="col-xs-2 plan-tuan-img">
<img class="tuan-img group-grade-157001" src="images/plan-tuan.png">
<p class="name-plan ng-binding">活期团</p>
</div>
<div class="col-xs-3">
<p class="rate-col">
<span class="rate-red ng-binding">5.5</span>
<span class="sign">%</span>
</p>
<p class="word-rate">预计年化收益率</p>
</div>
<div class="col-xs-2 ">
<p class="top-margin ng-binding">本金保障</p>
<p>保障级别</p>
</div>
<div class="col-xs-2">
<p class="top-margin ng-binding">100元</p>
<p>起投金额</p>
</div>
<div class="col-xs-3 btn-right">
<a class="btn btn-secondary btn-embossed btn-small" href="/market/plan?planId=157001">立即加入</a>
</div>
</div>
       <div class="row right-part ng-scope" ng-repeat="plan in plans">
<div class="col-xs-2 plan-tuan-img">
<img class="tuan-img group-grade-68201" src="images/plan-tuan.png">
<p class="name-plan ng-binding">新手团</p>
</div>
<div class="col-xs-3">
<p class="rate-col">
<span class="rate-red ng-binding">7</span>
<span class="sign">%</span>
</p>
<p class="word-rate">预计年化收益率</p>
</div>
<div class="col-xs-2 ">
<p class="top-margin ng-binding">安享本息</p>
<p>保障级别</p>
</div>
<div class="col-xs-2">
<p class="top-margin ng-binding">100元</p>
<p>起投金额</p>
</div>
<div class="col-xs-3 btn-right">
<a class="btn btn-secondary btn-embossed btn-small" href="/market/plan?planId=68201">立即加入</a>
</div>
</div>
       <div class="row right-part ng-scope" ng-repeat="plan in plans">
<div class="col-xs-2 plan-tuan-img">
<img class="tuan-img group-grade-145201" src="images/plan-tuan.png">
<p class="name-plan ng-binding">稳健团</p>
</div>
<div class="col-xs-3">
<p class="rate-col">
<span class="rate-red ng-binding">9</span>
<span class="sign">%</span>
</p>
<p class="word-rate">预计年化收益率</p>
</div>
<div class="col-xs-2 ">
<p class="top-margin ng-binding">本金保障</p>
<p>保障级别</p>
</div>
<div class="col-xs-2">
<p class="top-margin ng-binding">10000元</p>
<p>起投金额</p>
</div>
<div class="col-xs-3 btn-right">
<a class="btn btn-secondary btn-embossed btn-small" href="/market/plan?planId=145201">立即加入</a>
</div>
</div>
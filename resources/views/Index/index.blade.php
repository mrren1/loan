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
         <a class="navbar-brand" href="index.html"> <span class="sl-logo">点融网 - DianRong</span> </a> 
        </div> 
        <div class="sl-nav col-xs-10"> 
         <ul class="nav navbar-nav main-menu"> 
          <!--menus--> 
          <li class="main-link-list"> <a class="main-link" href="borrow"> <span class="sl-icon-bold-money-bag"></span> <span class="main-link-text">我要借款</span> </a> </li> 
          <li class="main-link-list"> <a class="main-link" href="market"> <span class="sl-icon-bold-trend"></span> <span class="main-link-text">我要投资</span> </a> </li> 
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
       
      <div class="col-xs-4 register-tab" ng-show="!session.loggedIn" ng-cloak=""> 
       <div class="row"> 
        <ul class="nav nav-tabs"> 
         <li role="presentation" class="right-divider active"><a href="http://localhost:8080/#register" aria-controls="home" role="tab" data-toggle="tab">注册</a></li> 
         <li role="presentation" class=""><a href="http://localhost:8080/#logining" aria-controls="home" role="tab" data-toggle="tab">登录</a></li> 
        </ul> 
       </div> 
       <div class="tab-content"> 
        <div class="tab-pane active" id="register"> 
         <sl-create-account-form redirect-url="url" referral-name=""></sl-create-account-form> 
         <!--<div class="text-center weiboLogin" ng-if="!disableTpLogin">--> 
         <!--<p class="social third-party-login-platform">--> 
         <!--你还可以使用合作平台登录--> 
         <!--<a href="#" title="用新浪微博登录" ng-click="weiboLogin()" ><span class="sl-icon-weibo weibo-sina"></span></a>--> 
         <!--<a href="#" title="用腾讯QQ登录" ng-click="qqLogin()"><span  class="sl-icon-qq tencent-qq"></span></a>--> 
         <!--</p>--> 
         <!--</div>--> 
        </div> 
        <div class="tab-pane" id="logining"> 
         <div class="col-xs-12 login-content-form"> 
          <h3 class="login-content-form-title text-center">欢迎回来</h3> 
          <div class="text-center sub-title">
           团团赚本息无忧收益不愁
          </div> 
          <div class="row tab-switch"> 
           <div class="col-xs-5 text-center active" ng-class="{active:tab=='invester'}">
            <a href="index.html" ng-click="tab='invester'">我是投资人</a>
           </div> 
           <div class="col-xs-2"></div> 
           <div class="col-xs-5 text-center tab-borrower" ng-class="{active:tab=='borrower'}">
            <a href="index.html" ng-click="tab='borrower'">我是借款人</a>
           </div> 
          </div> 
          <form name="loginForm" class="loginForm ng-dirty ng-valid ng-valid-required" role="form" ng-submit="submit()" novalidate=""> 
           <div ng-repeat="error in errors" ng-show="errors.length &gt; 0" class="errorInLogin ng-binding ng-scope" style=""> 
           </div> 
           <div class="form-group group-username"> 
            <div class="input-group"> 
             <span class="input-group-addon sl-icon-personal" ng-class="{active:inputFocus}" style=""></span> 
             <input id="usernameSingle" type="text" class="form-control input-with-icon forcePlaceholder ng-animate ng-pristine-remove ng-dirty-add ng-invalid-remove ng-valid-add ng-invalid-required-remove ng-pristine-remove-active ng-dirty ng-dirty-add-active ng-invalid-remove-active ng-valid ng-valid-add-active ng-invalid-required-remove-active ng-valid-required" ng-model="username" ng-focus="inputFocus=true" ng-blur="inputFocus=false" placeholder="请输入注册时的手机号或邮箱" required="" style="-webkit-transition-timing-function: initial, initial, initial; transition-timing-function: initial, initial, initial; -webkit-transition-delay: initial, initial, initial; transition-delay: initial, initial, initial;" /> 
            </div> 
            <span class="errors ng-hide" ng-show="loginForm.username.$dirty &amp;&amp; loginForm.username.$error.required">对不起，请输入正确的用户名</span> 
           </div> 
           <div class="form-group" ng-class="{ 'has-error' : loginForm.password.$dirty &amp;&amp; loginForm.password.$invalid }"> 
            <div class="input-group pwd"> 
             <span class="input-group-addon sl-icon-lock lock ng-animate" ng-class="{active:focus}" style=""></span> 
             <input id="passwordSingle" type="password" class="form-control input-with-icon forcePlaceholder ng-animate ng-pristine-remove ng-dirty-add ng-invalid-remove ng-valid-add ng-invalid-required-remove ng-pristine-remove-active ng-dirty ng-dirty-add-active ng-invalid-remove-active ng-valid ng-valid-add-active ng-invalid-required-remove-active ng-valid-required" ng-model="password" ng-focus="focus=true" ng-blur="focus=false" placeholder="请输入登录密码" required="" style="-webkit-transition-timing-function: initial, initial, initial; transition-timing-function: initial, initial, initial; -webkit-transition-delay: initial, initial, initial; transition-delay: initial, initial, initial;" /> 
            </div> 
            <span class="errors ng-hide" ng-show="loginForm.password.$dirty &amp;&amp; loginForm.password.$error.required">需要输入密码</span> 
           </div> 
           <div class="form-group"> 
            <button type="submit" class="btn btn-block btn-secondary btn-embossed btn-login">立即登录</button> 
           </div> 
           <div class="form-group"> 
            <div class="checkbox-inline"> 
             <label><input type="checkbox" name="rememberMe" ng-model="rememberMe" class="ng-valid ng-dirty" /> <span>记住用户名</span></label> 
            </div> 
            <a class="forget-password-link pull-right" href="/account/password-reset" target="_self">忘记密码？</a> 
           </div> 
           <div class="text-center weiboLogin"> 
            <div class="weiboDivider"> 
             <span class="social"> <p>没有帐号？<a class="register-link" href="reg.html">立即注册</a> <span class="third-party-login-platform">，或使用合作平台登录</span> </p> 
              <div class="third-party-login-platform"> 
               <a href="index.html" title="用新浪微博登录" ng-click="weiboLogin()"><span class="sl-icon-weibo weibo-sina"></span></a> 
               <a href="index.html" title="用腾讯QQ登录" ng-click="qqLogin()"><span class="sl-icon-qq tencent-qq"></span></a> 
              </div> </span> 
            </div> 
           </div> 
          </form> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="row advertise-words-row"> 
      <h3 class="text-center">为什么选择点融网？</h3> 
      <div class="text-center tech-words">
       我们用技术让借贷更简单，借款人更易借到款，投资人获得好收益。
      </div> 
     </div> 
     <div class="row choose-row"> 
      <div class="col-xs-8 choose-left-part"> 
       <div class="choose-info"> 
        <div class="row desc"> 
         <div class="col-xs-4 text-center"> 
          <span class="bg-images simple"></span> 
          <h4>简单</h4> 
          <span class="descprition ">技术自动分散投资</span> 
          <span>您可安心坐享高收益</span> 
         </div> 
         <div class="col-xs-4  text-center"> 
          <span class="bg-images interest"></span> 
          <h4>收益</h4> 
          <span class="descprition">团团赚加入本金保障计划</span> 
          <span class="">5.5%-16%灵活净收益产品任选</span> 
         </div> 
         <div class="col-xs-4 text-center"> 
          <span class="bg-images safe"></span> 
          <h4>安全</h4> 
          <span class="descprition ">银行级严密风控</span> 
          <span>保障投资安全</span> 
         </div> 
        </div> 
        <div class="arrow" ng-click="showDetail=!showDetail" ng-show="!showDetail">
<span class="sl-icon-arrow-down"></span>
</div>
        <div class="row desc ng-hide"> 
         <div class="col-xs-4 text-center"> 
          <span class="bg-images guard"></span> 
          <h4>保障</h4> 
          <span class="descprition ">点融网不介入交易</span> 
          <span>不接触资金不赚利差</span> 
         </div> 
         <div class="col-xs-4 text-center"> 
          <span class="bg-images team"></span> 
          <h4>高管团队</h4> 
          <span class="descprition ">被新浪财经誉为</span> 
          <span>P2P行业最牛黄金管理团队</span> 
         </div> 
         <div class="col-xs-4 text-center"> 
          <span class="bg-images vip"></span> 
          <h4>VIP</h4> 
          <span class="descprition ">VIP客户专享</span> 
          <span>1对1理财专属服务</span> 
         </div> 
        </div> 
        <div class="arrow ng-hide"style="display:none"> 
         <span class="sl-icon-arrow-up"></span> 
        </div> 
       </div> 
      </div> 
      <div class="col-xs-4 video-link" ng-click="linkToYouku()"> 
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
       <div class="more-link">
        <a href="market.html">更多&gt;</a>
       </div> 
      </div> 
     </div> 
     <div class="row advertise-words-row"> 
      <h3 class="text-center">点融,一手&quot;掌&quot;握</h3> 
      <div class="text-center tech-words">
       即刻下载APP，关注点融微信，第一手讯息助您成为投资高手。
      </div> 
     </div> 
     <div class="row app-row"> 
      <div class="col-xs-3 mobile-phone"></div> 
      <div class="col-xs-7 qr-code-part"> 
       <div class="row app-qr-img"> 
        <div class="col-xs-4"> 
         <p class="qr-code download-apple"></p> 
         <p> </p> 
         <div class="inner-con"> 
          <a href="https://itunes.apple.com/us/app/dian-rong-wang/id725186555?mt=8" target="_blank" class="inner-con"> <span class="sl-icon-apple"> 从苹果商店下载</span> </a> 
         </div> 
         <p></p> 
        </div> 
        <div class="col-xs-4 "> 
         <p class="qr-code download-andro"></p> 
         <p> </p>
         <div class="inner-con"> 
          <a href="http://app.mi.com/detail/56106" target="_blank" class="inner-con"> <span class="sl-icon-android"> 下载Android应用</span> </a> 
         </div> 
         <p></p> 
        </div> 
        <div class="col-xs-4"> 
         <p class="qr-code focus-weixin"></p> 
         <p> </p>
         <div class="inner-con"> 
          <span class="sl-icon-wechat"> 扫码关注微信</span> 
         </div> 
         <p></p> 
        </div> 
       </div> 
       <div class="row app-info"> 
        <span>点融网APP，轻松了解投资动向，快速知晓收益信息，及时接收新标上线提</span> 
        <span>醒。即刻下载点融网APP，享用会生钱的手机钱包。万千财讯，一手在握。</span> 
       </div> 
      </div> 
      <div class="col-xs-2"></div> 
     </div> 
     <div class="row advertise-words-row"> 
      <h3 class="text-center">关于我们</h3> 
      <div class="text-center tech-words">
       在这里了解更多点融资讯，我们将帮您解决问题，倾听意见反馈。
      </div> 
     </div> 
     <div class="row about-us-row about-us-first"> 
      <div class="col-xs-4 first"> 
       <div class="dr-info introduce"> 
        <div class="about-us-header">
          点融是谁 
        </div> 
        <div class="leads-img"> 
        </div> 
        <div class="company-introduce"> 
         <span>点融网是一家总部位于上海的本土高科技网</span> 
         <span>络金融服务公司。通过国内资深团队的运作</span> 
         <span>和引进全球最大网络借贷平台的先进技术和</span> 
         <span>管理经验。</span> 
         <div class="text-right introduce-more">
          <a href="/public/about#/company">更多&gt;</a>
         </div> 
        </div> 
       </div> 
      </div> 
      <div class="col-xs-4 second"> 
       <div class="dr-info partner"> 
        <div class="about-us-header header-second">
          合作伙伴 
        </div> 
        <div class="partner-logo north-light"></div> 
        <div class="partner-logo szb"></div> 
        <div class="partner-logo ney"></div> 
        <div class="partner-logo orient"></div> 
        <div class="text-right more-detail partner-more">
         <a href="/public/about#/partner">更多&gt;</a>
        </div> 
       </div> 
      </div> 
      <div class="col-xs-4 third"> 
       <div class="dr-info report"> 
        <div class="about-us-header header-third">
         媒体报道
        </div> 
        <div class="media-wrapper">
<div>
<ul class="list-unstyled news-list">
<li class="row ng-scope" ng-repeat="post in posts">
<div class="news-content col-xs-8">
<h6 class="news-date ng-binding">
2014 10/13
<span class="dot"></span>
</h6>
<h3>
<a class="ng-binding" ng-bind="post.title" href="/blog/szyh">银行和P2P平台首次“结盟”：苏州银行和点融网宣布...</a>
</h3>
</div>
<div class="news-img pull-right">
<img  src="images/bsz.jpg">
</div>
</li>
<li class="row ng-scope" ng-repeat="post in posts">
<div class="news-content col-xs-8">
<h6 class="news-date ng-binding">
2014 10/10
<span class="dot"></span>
</h6>
<h3>
<a class="ng-binding" ng-bind="post.title" href="/blog/ljz">郭宇航：P2P———技术与商业模式的新浪潮</a>
</h3>
</div>
<div class="news-img pull-right">
<img src="images/gyh.jpg">
</div>
</li>
<li class="row ng-scope" ng-repeat="post in posts">
<div class="news-content col-xs-8">
<h6 class="news-date ng-binding">
2014 10/8
<span class="dot"></span>
</h6>
<h3>
<a class="ng-binding" ng-bind="post.title" href="/blog/hcgzf">"红筹之父"梁伯韬先生加入点融网董事会</a>
</h3>
</div>
<div class="news-img pull-right">
<img  src="images/hczf.jpg">
</div>
<i class="li-dot ng-scope" ng-if="$last"></i>
</li>
</ul>
</div>
</div>
        <div class="text-right more-detail">
         <a href="/public/about#/media">更多&gt;</a>
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="row about-us-row"> 
      <div class="col-xs-4 first"> 
       <div class="dr-info introduce honor"> 
        <div class="about-us-header">
         点融荣誉
        </div> 
        <div class="awards-img"></div> 
        <div class="company-introduce"> 
         <span>点融网被美国最大的P2P研究机构Lend</span> 
         <span>Academy评为“中国最重要的P2P网贷公</span> 
         <span>司”之一；先后获得老虎基金投资，新鸿基</span> 
         <span>集团战略投资，以及北极光创投注资。</span> 
         <div class="text-right">
          <a href="/public/about#/news" target="_blank">更多&gt;</a>
         </div> 
        </div> 
       </div> 
      </div> 
      <div class="col-xs-4 second"> 
       <div class="dr-info user-voice"> 
        <div class="about-us-header header-second">
         用户反馈
        </div> 
        <div class="text-center"> 
         <p class="borrower-img"></p> 
         <p class="person-borrower">投资人</p> 
         <p class="borrower-name">胡小姐</p> 
        </div> 
        <div class="quote-container"> 
         <blockquote class="quote"> 
          <p>白领一族的我平时也懒得看如何投资理财，以前主要通过阶梯式储蓄法来抵抗通胀。不过自从有了团团赚，我都不去银行定存了，因为团团赚的新手团利率就比银行高好多，而且流动性也不错... </p> 
          <span class="quote-end"></span> 
         </blockquote> 
        </div> 
        <div class="text-right more-voice">
         <a href="mailto:support@dianrong.com">给我们反馈&gt;</a>
        </div> 
       </div> 
      </div> 
      <div class="col-xs-4 third"> 
       <div class="dr-info help-center"> 
        <div class="about-us-header header-third">
         <span class="question">帮助中心</span>
        </div> 
        <div class="faq">
         <a href="help.html"><span class="sl-icon-bold-column icon"></span><span class="question">什么是点融网</span></a>
        </div> 
        <div class="faq">
         <a href="help.html"><span class="sl-icon-bold-right-arrow icon"></span><span class="question">为什么选择点融网</span></a>
        </div> 
        <div class="faq">
         <a href="help.html"><span class="sl-icon-bold-spark icon"></span><span class="question">点融网投资流程</span></a>
        </div> 
        <div class="faq">
         <a href="help.html"><span class="sl-icon-bold-pen icon"></span><span class="question">使用及操作</span></a>
        </div> 
        <div class="faq">
         <a href="help.html"><span class="sl-icon-bold-lock icon"></span><span class="question">信息和资金安全</span></a>
        </div> 
        <div class="faq">
         <a href="help.html"><span class="sl-icon-bold-paper icon"></span><span class="question">政策法规</span></a>
        </div> 
        <div class="faq">
         <a href="help.html"><span class="sl-icon-bold-star icon"></span><span class="question">常见问题</span></a>
        </div> 
        <div class="text-right more-detail">
         <a href="help.html">更多&gt;</a>
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="row advertise-words-row"> 
      <h3 class="text-center">媒体评价</h3> 
      <div class="text-center tech-words">
       更客观真实的第三方评价，进一步了解点融网。
      </div> 
     </div> 
     <div class="row media-report-row"> 
      <div class="col-xs-4 report"> 
       <a href="http://www.dianrong.com/blog/dian-rong-wang-lian-yi-zhe-jiang-da-xue-zhe-shang-zong-cai-gao-ji-yan-xiu-ban" target="_blank"> 
        <div class="author text-center">
         <span class="logo media-gemag-logo">环球企业网</span>
        </div> 
        <blockquote class="quote"> 
         <p>苏海德是LendingClub的技术总裁以及联合创始人，也曾经是甲骨文的高级管理人员之一。因此，在点融网创立之后，苏亦应邀担任了点融网的联合创始人。<span class="quote-end"></span> </p> 
        </blockquote> </a> 
      </div> 
      <div class="col-xs-4 report report-fc"> 
       <a href="http://www.dianrong.com/blog/dian-rong-wang-chuang-shi-ren-jiang-jiao-yi-quan-jiao-huan-gei-jie-dai-zhe" target="_blank"> 
        <div class="author text-center">
         <span class="logo media-fc-logo">福布斯中国</span>
        </div> 
        <blockquote class="quote"> 
         <p>郭宇航与苏海德想做的是单纯的交易平台，他们认为交易的选择权应该交给资金真正的拥有者和使用者。 点融网的优势在于技术。<span class="quote-end"></span></p> 
        </blockquote> </a> 
      </div> 
      <div class="col-xs-4 report report-cbh"> 
       <a href="http://www.dianrong.com/blog/zhuan-fang-lending-club-dian-rong-wang-lian-he-chuang-shi-ren-su-hai-de-hu-lian-wang-jin-rong-xu-yao-you-xiao-jian-guan" target="_blank"> 
        <div class="author text-center">
         <span class="logo media-21cbh-logo">21世纪经济网</span>
        </div> 
        <blockquote class="quote"> 
         <p>...更重要的是，这位曾经开发出Lending Club平台系统的前CTO，花费两年多的时间，又给中国市场量身定制了一套全新的信审系统。<span class="quote-end"></span></p> 
        </blockquote> </a> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="bottom-register"> 
    <h3 class="text-center">准备好享受高投资回报了吗？</h3> 
    <div class="text-center"> 
     <a class="btn btn-lg btn-secondary btn-embossed" href="#" rel="nofollow" id="scrollToTop">立即注册</a> 
    </div> 
   </div> 
   <!--footer--> 
   <div class="bottom-menu bottom-menu-large bottom-menu-inverse sl-footer open-bottom footer-animate new-footer footer-navbar"> 
    <div class="inside-container"> 
     <div class="row title-row"> 
      <div class="col-xs-4 navbar-logo"> 
       <div class="navbar-brand">
        <a class="logo" href="index.html">点融网</a>
       </div> 
      </div> 
      <div class="col-xs-4 navbar-contact"> 
       <div class="support-phone"> 
        <div class="col-xs-3 phone-img"> 
         <span class="phone"></span> 
        </div> 
        <div class="col-xs-9 phone-num"> 
         <span class="number">400-921-9218</span> 
        </div> 
       </div> 
      </div> 
      <div class="col-xs-4 pull-right"> 
       <ul class="bottom-icons social-icons"> 
        <li><a href="#" data-toggle="modal" data-target="#myModal" rel="nofollow"><span class="sl-icon-wechat"></span></a></li> 
        <li><a href="http://weibo.com/dianrongwang" target="_blank" rel="nofollow"><span class="sl-icon-weibo"></span></a></li> 
       </ul> 
      </div> 
     </div> 
     <div class="row"> 
      <div class="col-xs-12"> 
       <div class="row site-map"> 
        <div class="col-xs-4"> 
         <h6 class="title ">公司信息</h6> 
         <ul class="bottom-links"> 
          <li><a href="/public/about#/company">关于点融网</a></li> 
          <li><a href="/public/about#/news">公司动态</a></li> 
          <li><a href="/public/about#/media">媒体报道</a></li> 
          <li><a href="/public/about#/job">招贤纳士</a></li> 
          <li><a href="/public/about#/contact">联系我们</a></li> 
          <li><a href="/blog/devBlog">点融新享</a></li> 
         </ul> 
        </div> 
        <div class="col-xs-4"> 
         <h6 class="title">相关政策</h6> 
         <ul class="bottom-links"> 
          <li><a href="/public/rates-and-fees" target="_blank">费率说明</a></li> 
          <li><a href="/public/principal-protection" target="_blank">本金保障</a></li> 
          <li><a href="/public/terms-of-use" target="_blank">使用条款</a></li> 
          <li><a href="/public/terms-of-use?protocol=privacy-and-security" target="_blank">隐私保护</a></li> 
         </ul> 
        </div> 
        <div class="col-xs-4"> 
         <h6 class="title">手机应用</h6> 
         <ul class="bottom-links"> 
          <li><a href="https://itunes.apple.com/us/app/dian-rong-wang/id725186555?mt=8" target="_blank" ga-event="" ga-category="iosAppLink" ga-action="click" ga-label="footer" ga-value="trackValue" rel="nofollow" class="ng-isolate-scope">iPhone版下载</a></li> 
          <li><a href="http://app.mi.com/detail/56106" target="_blank" ga-event="" ga-category="androidAppLink" ga-action="click" ga-label="footer" ga-value="trackValue" rel="nofollow" class="ng-isolate-scope">Android版下载（测试版）</a></li> 
         </ul> 
         <div class="wechat"> 
          <span class="qr-code">点融网公众号 - dianrongvip</span> 
          <div class="description"> 
           <span class="name">微信公众号</span> 
           <span>点融网</span> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
    <div class="friend-links"> 
     <div class="container friend-container"> 
      <div class="col-xs-1 sign-link"> 
       <p><span class="sl-icon-branch"></span>友情链接</p> 
      </div> 
      <div class="col-xs-11 friend-link-site"> 
       <a href="http://iof.hexun.com/" target="_blank">和讯互联网金融</a> 
       <a href="http://licai.cofool.com/" target="_blank">叩富理财 </a> 
       <a href="http://www.jinfuzi.com/p2p/" target="_blank">金斧子理财</a> 
       <a href="http://www.trustores.cn/" target="_blank">香港保险</a> 
       <a href="http://www.asiafinance.cn/" target="_blank">金融导航</a> 
       <a href="http://www.fxsol-uk.com/" target="_blank">Fxsol官网</a> 
       <a href="http://www.guijinshu.com/" target="_blank">贵金属</a> 
       <a href="http://www.dingniugu.com/" target="_blank">顶牛股网</a> 
       <a href="http://www.ucai123.com/" target="_blank">航运指数</a> 
       <a href="http://www.szjstz.cn/" target="_blank">金苏财富</a> 
      </div> 
     </div> 
     <div class="container"> 
      <div class="text-center copyright">
        &copy;2014 点融网沪ICP备14028311号上海点荣金融信息服务有限责任公司 
      </div> 
     </div> 
    </div> 
   </div> 
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
 </body>
</html>
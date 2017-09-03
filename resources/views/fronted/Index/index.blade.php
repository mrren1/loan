@extends('layouts.public')

@section('title', '登录账号')
  <div class="wrapper "> 
    @section('content')
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
         <span>{{ Session::get('user_name') }}</span>
        </div> 
        <div class="wel-info">
         欢迎回来!
        </div>  
        @if(Session::get('user_name')!='')
        <div class="available-info">
         账户可用余额
        </div> 
        <div class="number-cash">
          @if($purseInfo!=null)
            {{$purseInfo['purse_balance']}}
          @else
            0.00
          @endif
        元</div>
        @else
         <div class="number-cash">
            您还未登录！
          </div>
        @endif
        <div> 
         <a class="btn btn-primary recharge" href="member_pay">充值</a>
        </div> 
        <div> 
         <a class="btn btn-primary account-info" href="member_info">我的账户</a>
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
      <h3 class="text-center">推荐贷款</h3> 
      <div class="text-center tech-words">
       筛选高信用，高品质的贷款。给您最好的选择。
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
          <span class="mark-green">团队层层筛选</span> 
          <span>贷款速度快 | 信用高 | 安全透明</span> 
          <span>安全、省心、贷款方式</span> 
         </div> 
         <div class="col-xs-1"></div> 
        </div> 
        <div class="row plan-content"> 
         <span>速贷网利用先进技术推出安全、省心、高收益的贷款。</span> 
         <span>系统自动推荐贷款，利率低，安全，极速。</span>  
        </div> 
        <div class="row">
         
        </div> 
       </div> 
      </div> 


<div class="col-xs-7 plans-info-right" style="block"> 
@foreach($adArr as $ad)
<div class="row right-part ng-scope" ng-repeat="plan in plans">
<div class="col-xs-2 plan-tuan-img">
<img class="tuan-img group-grade-68201" src="uploads/{{$ad['userInfo']['user_photo']}}">
<p class="name-plan ng-binding">推荐借款</p>
</div>
<div class="col-xs-3">
<p class="rate-col">
<span class="rate-red ng-binding">{{$ad['lend_interest']*100}}</span>
<span class="sign">%</span>
</p>
<p class="word-rate">年利率</p>
</div>
<div class="col-xs-2 ">
<p class="top-margin ng-binding">{{$ad['lend_money']}}</p>
<p>总金额</p>
</div>
<div class="col-xs-2">
<p class="top-margin ng-binding">{{$ad['lend_lack']}}</p>
<p>起借金额</p>
</div>
<div class="col-xs-3 btn-right">
<a class="btn btn-secondary btn-embossed btn-small" href="debt?lend_id={{$ad['lend_id']}}">立即借款</a>
</div>
</div>
@endforeach



<div class="more-link">
<a href="market">更多&gt;</a>
</div> 

</div> 
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

  @endsection
    @section('footbar')
        <div class="bottom-register"> 
        <h3 class="text-center">准备好享受高投资回报了吗？</h3> 
        <div class="text-center"> 
         <a class="btn btn-lg btn-secondary btn-embossed" href="#" rel="nofollow" id="scrollToTop">立即注册</a> 
        </div> 
       </div> 
    @parent
    @endsection

   
  
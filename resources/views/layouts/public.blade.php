<?php 
use Illuminate\Support\Facades\Session;
$user_id=Session::get('user_id');
$news=DB::table('news')->where(['is_read'=>0,'user_id'=>$user_id])->get();
$newsNum=0;
if($news!=''){
    $news=$news->toArray();
    $newscount=count($news);
}
?>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="images/favicon.ico" /> 
        <link href="css/bootstrap.min.css" rel="stylesheet" /> 
        <link href="css/components.css?ver=142682356" rel="stylesheet" /> 
        <link href="css/main.css?ver=142682356" rel="stylesheet" /> 
        <link href="css/new-home.css?ver=142682356" rel="stylesheet" /> 
        <link rel="stylesheet" href="css/qiandao_style.css">
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/qiandao_js.js"></script>
        
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
    </head>
    <body>
        @section('sidebar')
      <!--header--> 
       <header class="sl-header new-header ng-scope" ng-controller="HeaderCtrl" id="sl-header"> 
    <nav class="navbar navbar-inverse navbar-static-top site-nav " role="navigation"> 
     <div class="container new-home-container"> 
      <ul class="nav navbar-nav site-nav-sns "> 
       <li> <a href="#" class="icon-sns qq"> 
         <div class="social-content"> 
          <p class="social-title">速贷网官方QQ群</p> 
          <p>141444867</p> 
         </div> </a> </li> 
       
      </ul> 
      @if(Session::has('user_name'))
      <ul class="nav navbar-nav navbar-right navbar-sm site-nav-user"> 
       <li class="dropdown"> <a href="member_info" class="dropdown-toggle hoverHeader"  data-toggle="dropdown" data-hover="dropdown">欢迎您：<span style="color:pink">{{ Session::get('user_name') }}！</span></a> 
        </li>
        @if($newscount!=0)
        <li><a href="mynews">未读消息（<font color="red">{{$newscount}}</font>）条！</a></li>
        @endif
        <li><a href="userSignIn" >签到</a></li> 
         <li><a href="out">退出</a></li> 
      </ul>

      @else
      <ul id="nonLoginBar" class="nav navbar-nav navbar-right navbar-sm site-nav-login"> 
       <li><a id="login-panel" href="login" rel="nofollow">登录</a></li> 
       <li><a id="create-account" href="register" class="btn btn-sm" rel="nofollow">注册账户</a></li> 
      </ul> 
      @endif 
     </div> 
    </nav> 
    <div class="site-menu"> 
     <div class="header-navbar-container sl-nav-wrapper header-nav-container"> 
      <nav class="navbar navbar-static-top sl-navbar" role="navigation"> 
       <div class="container"> 
        <div class="navbar-header  col-xs-2"> 
         <a class="navbar-brand" href="index"> <span class="sl-logo"></span> </a> 
        </div> 
        <div class="sl-nav col-xs-10"> 
         <ul class="nav navbar-nav main-menu"> 
          <!--menus--> 
          <li class="main-link-list"> <a class="main-link" href="index"> <span class="sl-icon-bold-trend"></span> <span class="main-link-text">首页</span> </a> </li> 
          <li class="main-link-list"> <a class="main-link" href="market"> <span class="sl-icon-bold-contact"></span> <span class="main-link-text">我要借款</span> </a> </li> 
          <li class="main-link-list"> <a class="main-link" href="large"> <span class="sl-icon-bold-trend"></span> <span class="main-link-text">大额贷款</span> </a> </li> 
          <li class="main-link-list"> <a class="main-link" href="setloan"> <span class="sl-icon-bold-contact"></span> <span class="main-link-text">发布代款</span> </a> </li>
          <li class="main-link-list"> <a class="main-link" href="about"> <span class="sl-icon-bold-linkman"></span> <span class="main-link-text">关于我们</span> </a> </li> 
          <li class="main-link-list"> <a class="main-link" href="search"> <span class="sl-icon-bold-contact"></span> <span class="main-link-text">搜索</span> </a> </li> 
          <li class="main-link-list phone-contact"> <span class="sl-icon-bold-phone"></span> </li> 
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
        @show

        <div class="container">
            @yield('content')
        </div>
        @section('footbar')
        <!--footer--> 
       <div class="bottom-menu bottom-menu-large bottom-menu-inverse sl-footer open-bottom footer-animate  footer-navbar"> 
        <div class="container inside-container"> 
         <div class="row"> 
          <div class="col-xs-4" ng-cloak=""> 
           <div class="navbar-brand">
            <a href="#"><i class="image-sprites logo"></i></a>
           </div> 
           <ul class="bottom-icons social-icons"> 
            <li><a href="#" data-toggle="modal" data-target="#myModal" rel="nofollow"><span class="sl-icon-wechat"></span></a></li> 
            <li><a href="http://weibo.com/dianrongwang" target="_blank" rel="nofollow"><span class="sl-icon-weibo"></span></a></li> 
           </ul> 
           <div class="support-phone"> 
            <span class="phone">咨询电话</span> 
            <h4 class="number">400-921-9218</h4> 
           </div> 
          </div> 
          <div class="col-xs-7 col-xs-offset-1"> 
           <div class="row site-map"> 
            <div class="col-xs-4"> 
             <h6 class="title footer-home">公司信息</h6> 
             <ul class="bottom-links"> 
              <li><a href="/public/about#/company">公司简介</a></li> 
              <li><a href="/public/about#/news">最新动态</a></li> 
              <li><a href="/public/about#/media">媒体报道</a></li> 
              <li><a href="/public/about#/job">招贤纳士</a></li> 
              <li><a href="/public/about#/contact">联系我们</a></li> 
              <li><a href="/blog/devBlog">点融新享</a></li> 
             </ul> 
            </div> 
            <div class="col-xs-4"> 
             <h6 class="title footer-policy">相关政策</h6> 
             <ul class="bottom-links"> 
              <li><a href="/public/rates-and-fees" target="_blank">费率说明</a></li> 
              <li><a href="/public/principal-protection" target="_blank">本金保障</a></li> 
              <li><a href="/public/terms-of-use" target="_blank">使用条款</a></li> 
              <li><a href="/public/terms-of-use?protocol=privacy-and-security" target="_blank">隐私保护</a></li> 
             </ul> 
            </div> 
            <div class="col-xs-4"> 
             <h6 class="title footer-mobile">手机应用</h6> 
             <ul class="bottom-links"> 
              <li><a href="https://itunes.apple.com/us/app/dian-rong-wang/id725186555?mt=8" target="_blank" ga-event="" ga-category="iosAppLink" ga-action="click" ga-label="footer" ga-value="trackValue" rel="nofollow">iPhone版下载</a></li> 
              <li><a href="http://app.mi.com/detail/56106" target="_blank" ga-event="" ga-category="androidAppLink" ga-action="click" ga-label="footer" ga-value="trackValue" rel="nofollow">Android版下载（测试版）</a></li> 
             </ul> 
             <div class="wechat" ng-cloak=""> 
              <i class="image-sprites qr-code"></i> 
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
         <div class="container"> 
          <div class="col-xs-2"> 
           <p><span class="sl-icon-branch"></span>友情链接</p> 
          </div> 
          <div class="col-xs-10"> 
           <a href="http://iof.hexun.com/" target="_blank">和讯互联网金融</a> 
           <a href="http://licai.cofool.com/" target="_blank">叩富理财 </a> 
           <a href="http://www.jinfuzi.com/p2p/" target="_blank">金斧子理财</a> 
           <a href="http://www.trustores.cn" target="_blank">香港保险</a> 
           <a href="http://www.asiafinance.cn" target="_blank">金融导航</a> 
           <a href="http://www.fxsol-uk.com" target="_blank">Fxsol官网</a> 
           <a href="http://www.guijinshu.com" target="_blank">贵金属</a> 
           <a href="http://www.dingniugu.com" target="_blank">顶牛股网</a> 
           <a href="http://www.ucai123.com" target="_blank">航运指数</a> 
           <a href="http://www.szjstz.cn/" target="_blank">金苏财富</a> 
           <a href="http://www.myfund.com/" target="_blank">展恒基金</a> 
           <a href="http://www.dianrong.com/caifu/" target="_blank">P2P理财</a> 
          </div> 
         </div> 
        </div> 
        <div class="container inside-container"> 
         <div class="credit" style="margin-top: 0;padding-top: 20px;"> 
          <div class="navbar copyright"> 
           <ul class="nav navbar-nav"> 
            <li>&copy;2015 点融网</li> 
            <li>沪ICP备14028311号</li> 
            <li>上海点荣金融信息服务有限责任公司</li> 
           </ul> 
          </div> 
          <div class="authentication-info"> 
           <a target="_blank" href="https://trustsealinfo.verisign.com/splash?form_file=fdf/splash.fdf&amp;dn=www.dianrong.com&amp;lang=zh_cn" rel="nofollow"><i class="image-sprites norton-logo"></i></a> 
           <a id="__szfw_logo__" href="https://search.szfw.org/cert/l/CX20150107006323006821" target="_blank"><i class="image-sprites credit-logo"></i></a> 
           <a target="_blank" href="http://www.itrust.org.cn/yz/pjwx.asp?wm=1062547634" rel="nofollow"><i class="image-sprites itrust-logo"></i></a> 
          </div> 
         </div> 
        </div> 
       </div> 
        @show
    </body>
</html>


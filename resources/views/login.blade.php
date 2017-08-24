@extends('layouts.public')

@section('title', '登录账号')

<div class="wrapper login"> 
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
   <div class="container login-container" ng-controller="LoginFormCtrl"> 
    <div class="tabs-container"> 
     <ul id="loginAccountTabs" class="nav nav-tabs one-half-tabs"> 
      <li class="lender active"> <a href="#lender">我是投资人</a> </li> 
      <li class="borrower"> <a href="#borrower">我是借款人</a> </li> 
     </ul> 
    </div> 
    <div class="login-content"> 
     <div class="row"> 
      <!-- Login Banner --> 
      <div class="col-xs-8 login-content-banner"> 
       <img src="images/login-banner.jpg" /> 
      </div> 
      <!-- Login Form --> 
      <div class="col-xs-4 login-content-form"> 
       <h6 class="login-content-form-title">欢迎回来</h6> 
       <form name="loginForm" class="loginForm" role="form" ng-submit="submit()" novalidate=""> 
        <div ng-repeat="error in errors" ng-show="errors.length &gt; 0" ng-cloak="" class="errorInLogin">
        
        </div> 
        <div class="form-group"> 
         <div class="input-group"> 
          <span class="input-group-addon sl-icon-personal"></span> 
          <input id="usernameSingle" type="text" class="form-control input-with-icon forcePlaceholder" ng-model="username" ng-focus="inputFocus=true" ng-blur="inputFocus=false" placeholder="请输入注册时的手机号或邮箱" required="" /> 
         </div> 
         <span class="errors ng-hide">对不起，请输入正确的用户名</span> 
        </div> 
        <div class="form-group "> 
         <div class="input-group pwd"> 
          <span class="input-group-addon sl-icon-lock lock" ng-class="{active:focus}"></span> 
          <input id="passwordSingle" type="password" class="form-control input-with-icon forcePlaceholder" ng-model="password" ng-focus="focus=true" ng-blur="focus=false" placeholder="请输入登录密码" required="" /> 
         </div> 
         <span class="errors ng-hide">需要输入密码</span> 
        </div> 
        <div class="form-group"> 
         <button type="submit" class="btn btn-block btn-secondary btn-embossed">立即登录</button> 
        </div> 
        <div class="form-group"> 
         <div class="checkbox-inline"> 
          <label><input type="checkbox" name="rememberMe" ng-model="rememberMe" /> 记住用户名</label> 
         </div> 
         <a class="forget-password-link" href="forget" target="_self">忘记密码？</a> 
        </div> 
        <div class="text-center weiboLogin"> 
         <div class="weiboDivider"> 
          <span class="social"> <p>没有帐号？<a href="regist">立即注册</a> <span class="third-party-login-platform">，或使用合作平台登录</span> </p> 
           <div class="third-party-login-platform" style="display:block"> 
            <a href="#" title="用新浪微博登录" ng-click="weiboLogin()" class="weibo-sina"></a> 
            <a href="#" title="用腾讯QQ登录" ng-click="qqLogin()" class="qq-lgoin-btn"></a> 
           </div> </span> 
         </div> 
        </div> 
       </form> 
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

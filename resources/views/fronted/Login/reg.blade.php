@extends('layouts.public')

@section('title', '注册') 
  
<style>
    #img{
        cursor: pointer;
    }
</style>
<div class="wrapper create"> 
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
   <div class="container create-account-container" ng-controller="CreateCtrl"> 
    <div class="tabs-container"> 
     <ul id="createAccountTabs" class="nav nav-tabs one-half-tabs"> 
      <li class="lender active"> <a href="javascript:void(0);">我要投资</a> </li> 
      <li class="borrower"> <a href="javascript:void(0);">我要借款</a> </li> 
     </ul> 
    </div> 
    <div class="create-account-content"> 
     <div class="row"> 
      <!-- Reg Form--> 
      <div class="col-xs-4 create-account-content-form">
<div class="tab-content">
<div id="lender" class="tab-pane active">
<div class="create-account-form ng-isolate-scope" referral-name="">
<h5 class="create-account-form-title"> 30秒注册，开始投资 </h5>
<form class="ng-pristine ng-invalid ng-invalid-required" novalidate="" ng-submit="submit()" role="form" name="createAccountForm" action="{{ route('register') }}" method="post">
<input id="referral_name" type="hidden" value="" name="referral_name">
<input type="hidden" value="{{ Session::token() }}" name="_token"/>
<div class="form-group ng-hide" ng-show="formType!=2">
<input id="account-email-phone" class="form-control forcePlaceholder ng-pristine ng-animate ng-valid-remove ng-invalid-add ng-valid-remove-active ng-invalid ng-invalid-add-active ng-invalid-required" type="text" sl-mobile-phone="" sl-email-available="" sl-email-or-phone="" autocomplete="off" placeholder="手机号码或电子邮箱" required="" ng-model="user.emailOrPhone" name="emailOrPhone" style="">
<div class="ng-scope" ng-class="ng-hide" name="emailOrPhone" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="emailOrPhone" sl-error-message="">请输入有效手机号码或电子邮箱地址作为账户名</span>
<span class="ng-scope" for="emailAvailable" sl-error-message="">你输入的邮箱已被注册，请重新输入"</span>
</span>
</div>
</div>
<div class="form-group" ng-show="formType==2">
<span class="input-group-addon tag sl-icon-bold-email" ng-class="{active:inputFocusMail}"></span>
<input id="account-email" class="form-control forcePlaceholder inputRemoveBorder ng-pristine ng-animate ng-valid-remove ng-invalid-add ng-valid-remove-active ng-invalid ng-invalid-add-active ng-invalid-required" type="text" sl-email-available="" sl-email="" ng-blur="inputFocusMail=false" ng-focus="inputFocusMail=true" autocomplete="off" placeholder="用户名" required="" ng-model="user.email" name="user_name" style="">
<div class="ng-scope" ng-class="ng-hide" name="email" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">请输入用户名</span>
<span class="ng-scope" for="email" sl-error-message="">用户名有误</span>
<span class="ng-scope" for="emailAvailable" sl-error-message="">你输入的用户名已被注册，请重新输入"</span>
</span>
</div>
</div>
<div class="form-group ng-scope" ng-if="!isNoCaptcha" style="">
<div class="form-inline">
<span class="input-group-addon tag sl-icon-puzzle" ng-class="{active:inputFocusCaptchaCode}"></span>
<input class="form-control captcha-verify-input forcePlaceholder inputRemoveBorder specifyInput ng-pristine ng-invalid ng-invalid-required" type="text" ng-blur="inputFocusCaptchaCode=false" ng-focus="inputFocusCaptchaCode=true" placeholder="输入校验码" required="" ng-model="user.captchaVerifyCode" maxlength="6" name="captcha">
<span width='200px;'><img src="<?php echo captcha_src()?>" alt="" id="img"></span>
<div class="ng-scope" ng-class="ng-hide" name="captchaVerifyCode" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">请输入图片中的校验码</span>
</span>
</div>
</div>
</div>
<div class="form-group" ng-show="formType==2 || (createAccountForm.emailOrPhone.$dirty && !createAccountForm.emailOrPhone.$error.required && !createAccountForm.emailOrPhone.$error.mobilePhone)">
<div class="form-inline">
<span class="input-group-addon tag sl-icon-bold-verify" ng-class="{active:inputFocusCode}"></span>
<span class="ng-binding ng-hide" ng-show="phoneCodeSent">（60）</span>
</a>
</div>
</div>
<div class="form-group">
<span class="input-group-addon tag sl-icon-bold-pwd" ng-class="{active:inputFocusPwd}"></span>
<input id="account-password" class="form-control forcePlaceholder inputRemoveBorder ng-pristine ng-animate ng-valid-remove ng-invalid-add ng-valid-remove-active ng-invalid ng-invalid-add-active ng-invalid-required" type="password" sl-atmost-forty-chars="" sl-atleast-eight-chars="" sl-contains-digits="" sl-contains-letters="" required="" ng-blur="inputFocusPwd=false" ng-focus="inputFocusPwd=true" placeholder="密码为6个以上字母和数字组合" ng-model="user.password" name="user_pwd" style="">
<div class="ng-scope" ng-class="ng-hide" name="password" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">对不起，请输入密码</span>
<span class="ng-scope" for="containsLetters" sl-error-message="">你的密码必须包括至少一个字母</span>
<span class="ng-scope" for="containsDigits" sl-error-message="">你的密码必须包括至少一个数字</span>
<span class="ng-scope" for="atleastEightChars" sl-error-message="">你的密码必须至少为8个字符长</span>
<span class="ng-scope" for="atmostFortyChars" sl-error-message="">你的密码最多为40个字符长</span>
</span>
</div>
</div>
<div class="accept-agreement form-group">
创建账户，代表我同意并接受点融网
<a class="open-agreement-popup" href="/public/terms-of-use?protocol=terms-of-use">注册协议</a>
,
<div class="business-personal-deal">
<a class="open-agreement-popup" href="/public/terms-of-use?protocol=smb-loan-agreement">商业借款协议</a>
和
<a class="open-agreement-popup" href="/public/terms-of-use?protocol=small-loan-agreement">个人借款协议</a>
</div>
</div>
<div class="form-group exp">
<div ng-click="showTicket=!showTicket">
我要使用礼券
<span class="sl-icon-triangle-down-small ng-scope" ng-if="!showTicket" style=""></span>
</div>
</div>
<div class="form-group pwd ng-hide" ng-show="showTicket">
<div class="form-inline">
<input class="form-control forcePlaceholder pro-input ng-pristine ng-valid" type="text" placeholder="输入礼券号" ng-model="load.promotionCode" name="promotionCode" style="">
<span class="apply">
<a class="btn btn-secondary btn-add-amount sub-btn" ng-click="useTicket()" ng-disabled="load.promotionCode==''" disabled="disabled">使用</a>
</span>
</div>
</div>
<div class="form-group text-left">
<button id="register-lender" class="btn btn-block btn-secondary btn-embossed" ng-disabled="!createAccountForm.password.$dirty ||createAccountForm.password.$invalid ||creating" type="submit"> 立即注册 </button>
</div>
<div class="text-center weiboLogin ng-scope" ng-if="!disableTpLogin" style="">
<p class="social third-party-login-platform">
你还可以使用合作平台登录
<a class="weibo-sina" ng-click="weiboLogin()" title="用新浪微博登录" href="#"></a>
<a class="qq-lgoin-btn" ng-click="qqLogin()" title="用腾讯QQ登录" href="#"></a>
</p>
</div>
</form>
</div>
</div>
<div id="borrower" class="tab-pane">
<div class="text-center">
<h6>申请，审批，放款，迅速有效</h6>
<a class="btn btn-action btn-embossed ng-isolate-scope" target="_blank" url="reg.html"sl-old-href="" href="https://www2.dianrong.com/new-borrower">注册申请贷款</a>
</div>
</div>
</div>
</div>
      <!-- Reg Banner --> 
      <div class="col-xs-8 create-account-content-banner"> 
       <img src="images/create-account-banner.jpg" /> 
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

  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function(){
          $("#img").click(function(){
              var obj = $(this);
              obj.attr('src',"<?php echo captcha_src()?>"+Math.random());
          });     
      })
  </script>

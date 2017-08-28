@extends('layouts.public')

@section('title', '基本信息')
 
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
<div class="account-profile content-wrapper ng-scope">
<header class="section-header">
<h6 class="section-header-title">基本信息</h6>
</header>
<section class="basic summary-section">
<div class="basic-profile clearfix">
<div class="pull-left">
<a class="profile-header" data-toggle="modal" data-target="#upload-profile-image-modal" href="">
<img width="100%" ng-src="images/green-head.jpg" src="images/green-head.jpg">
</a>
</div>
<div class="pull-left">
<div class="field">
<h6 class="username ng-binding" ng-bind="basicProfile.name">Member_11501404</h6>
</div>
<div class="field clearfix">
<span class="pull-left">资料完整度</span>
<div class="pull-left">
<div class="progress">
<div id="security-tooltip" class="progress-bar" ng-style="{width:basicProfile.securityLevel + '%'}" data-original-title="" title="" style="width: 44.4444%;"></div>
</div>
<div class="verify-icons">
<ul class="list-unstyled list-inline">
<li class="ng-scope" ng-repeat="v in basicProfile.securityIcons">
<a class="verify-icon sl-icon-email" ng-class="{active:v.active}" title="" data-toggle="tooltip" href="" data-original-title="邮件认证"></a>
</li>
<li class="ng-scope" ng-repeat="v in basicProfile.securityIcons">
<a class="verify-icon sl-icon-profile" ng-class="{active:v.active}" title="" data-toggle="tooltip" href="" data-original-title="身份认证"></a>
</li>
<li class="ng-scope" ng-repeat="v in basicProfile.securityIcons">
<a class="verify-icon sl-icon-mobile active" ng-class="{active:v.active}" title="" data-toggle="tooltip" href="" data-original-title="手机号码验证"></a>
</li>
</ul>
</div>
</div>
<div class="pull-left">
<span class="security-level ng-binding" ng-bind="basicProfile.securityText">中</span>
</div>
</div>
</div>
</div>
</section>
<section class="summary-section">
<ul id="account-tabs" class="nav nav-tabs section-nav-tabs">
<li class="active">
<a data-toggle="tab" href="#personalInfo">个人信息</a>
</li>
<li>
<a data-toggle="tab" href="#bindAccount">关联账户</a>
</li>
</ul>
<div class="tab-content">
<div id="personalInfo" class="tab-pane active personal-info">
<div class="alert alert- ng-hide" ng-show="msg.length > 0" timeout="msgTimeout" msg="msg" type="msgType">
<a class="close sl-icon-cross" aria-hidden="true" ng-click="close()" type="button"></a>
</div>
<div class="info-content row">
<div class="col-xs-9">
<div class="info-row" ng-class="{editing:username.editing}">
<div class="row">
<div class="col-xs-3 info-value text-center">用户名</div>
<div class="col-xs-5" ng-show="!username.editing">
<span class="ng-binding" ng-bind="basicProfile.profile.userName">Member_11501404</span>
</div>
<div class="col-xs-8 ng-hide" ng-show="username.editing">
<input class="form-control input-sm ng-pristine ng-valid" maxlength="24" placeholder="输入用户名，可用用户名直接登录" ng-model="username.userName" ng-class="{inputError:username.userNameError}">
</div>
<div class="col-xs-4" ng-show="!username.editing && !basicProfile.profile.isUserNameSet">
<div>
<a class="btn btn-secondary bind-blue btn-hollow" href="" ng-click="username.editing=true">修改</a>
</div>
</div>
</div>
<div class="row ng-hide" ng-show="username.editing">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="display-block ng-binding bind-blue" ng-bind="username.msg | addAsterisk" ng-class="{'bind-red': username.userNameError, 'bind-blue': !username.userNameError}">*用户名仅可修改一次</span>
<span class="btn-group">
<a class="btn btn-secondary btn-confirm" href="" ng-click="changeUserName()">确定</a>
</span>
<span class="btn-group">
<a class="btn btn-secondary bind-blue btn-hollow" ng-click="cancelChangeUserName()" href="">取消</a>
</span>
</div>
</div>
</div>
<div class="info-row" ng-show="showId">
<div class="row">
<div class="col-xs-3 info-value text-center">用户ID</div>
<div class="col-xs-9">
<span class="ng-binding" ng-bind="actorId">11501404</span>
</div>
</div>
</div>
<div class="info-row row-line">
<div class="row" ng-show="!pwdChange.editing && !pwdSet.editing">
<div class="col-xs-3 info-value text-center">登录密码</div>
<div class="col-xs-5">
<span class="bind-gray ng-hide" ng-show="!isLandingPwdSet(basicProfile.profile)">未设置</span>
<span class="" ng-show="isLandingPwdSet(basicProfile.profile)">*********</span>
</div>
<div class="col-xs-4">
<div class="ng-hide" ng-show="!isLandingPwdSet(basicProfile.profile)">
<a class="btn btn-secondary bind-blue btn-hollow btn-bg-blue" ng-click="pwdSet.editing = true" href="">设置</a>
</div>
<div class="sl-icons" ng-show="isLandingPwdSet(basicProfile.profile)">
<a class="btn btn-secondary bind-blue btn-hollow" ng-click="pwdChange.editing = true" href="">修改</a>
</div>
</div>
</div>
<div class="row editing ng-hide" ng-show="pwdChange.editing">
<form class="ng-pristine ng-invalid ng-invalid-required" role="form" name="pwdForm">
<div class="row">
<div class="col-xs-3 info-value text-center">修改登录密码</div>
<div class="col-xs-8">
<input class="form-control input-sm ng-pristine ng-invalid ng-invalid-required" type="password" sl-atmost-forty-chars="" sl-atleast-eight-chars="" sl-contains-digits="" sl-contains-letters="" required="" ng-model="pwdChange.oldpwd" placeholder="输入原有登录密码" name="oldpwd" ng-class="{inputError:pwdMsg.oldpwdError}">
<div class="ng-hide ng-scope" name="oldpwd" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">对不起，请输入密码</span>
<span class="ng-scope" for="containsLetters" sl-error-message="">你的密码必须包括至少一个字母</span>
<span class="ng-scope" for="containsDigits" sl-error-message="">你的密码必须包括至少一个数字</span>
<span class="ng-scope" for="atleastEightChars" sl-error-message="">你的密码必须至少为8个字符长</span>
<span class="ng-scope" for="atmostFortyChars" sl-error-message="">你的密码最多为40个字符长</span>
</span>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<input class="form-control input-sm ng-pristine ng-invalid ng-invalid-required" type="password" sl-atmost-forty-chars="" sl-atleast-eight-chars="" sl-contains-digits="" sl-contains-letters="" required="" ng-model="pwdChange.newpwd" placeholder="输入新登录密码（8位以上字母和数字组合）" name="newpwd" ng-class="{inputError:pwdMsg.newpwdError}">
<div class="ng-hide ng-scope" name="newpwd" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">对不起，请输入密码"</span>
<span class="ng-scope" for="containsLetters" sl-error-message="">你的密码必须包括至少一个字母</span>
<span class="ng-scope" for="containsDigits" sl-error-message="">你的密码必须包括至少一个数字</span>
<span class="ng-scope" for="atleastEightChars" sl-error-message="">你的密码必须至少为8个字符长</span>
<span class="ng-scope" for="atmostFortyChars" sl-error-message="">你的密码最多为40个字符长</span>
</span>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<input class="form-control input-sm ng-pristine ng-invalid ng-invalid-required" type="password" sl-atmost-forty-chars="" sl-atleast-eight-chars="" sl-contains-digits="" sl-contains-letters="" required="" ng-model="pwdChange.newpwd2" placeholder="确认新密码" name="newpwd2" ng-class="{inputError:pwdMsg.newpwd2Error}">
<div class="ng-hide ng-scope" name="newpwd2" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">对不起，请输入密码</span>
<span class="ng-scope" for="containsLetters" sl-error-message="">你的密码必须包括至少一个字母</span>
<span class="ng-scope" for="containsDigits" sl-error-message="">你的密码必须包括至少一个数字</span>
<span class="ng-scope" for="atleastEightChars" sl-error-message="">你的密码必须至少为8个字符长</span>
<span class="ng-scope" for="atmostFortyChars" sl-error-message="">你的密码最多为40个字符长</span>
</span>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="display-block bind-red ng-binding" ng-bind="pwdMsg.msg | addAsterisk"></span>
<span class="btn-group">
<a class="btn btn-secondary btn-confirm" href="" ng-click="pwdChangeSubmit()">确定</a>
</span>
<span class="btn-group">
<a class="btn btn-secondary bind-blue btn-hollow" href="" ng-click="cancelChangePwd()">取消</a>
</span>
</div>
</div>
</form>
</div>
<div class="row editing ng-hide" ng-show="pwdSet.editing">
<form class="ng-pristine ng-invalid ng-invalid-required" role="form" name="pwdSetForm">
<div class="row">
<div class="col-xs-3 info-value text-center">修改登录密码</div>
<div class="col-xs-8">
<input class="form-control input-sm ng-pristine ng-invalid ng-invalid-required" type="password" sl-atmost-forty-chars="" sl-atleast-eight-chars="" sl-contains-digits="" sl-contains-letters="" required="" ng-model="pwdSet.newpwd" placeholder="输入新登录密码（8位以上字母和数字组合）" name="newpwdSet" ng-class="{inputError:pwdMsg.newpwdError}">
<div class="ng-hide ng-scope" name="newpwdSet" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">对不起，请输入密码</span>
<span class="ng-scope" for="containsLetters" sl-error-message="">你的密码必须包括至少一个字母</span>
<span class="ng-scope" for="containsDigits" sl-error-message="">你的密码必须包括至少一个数字</span>
<span class="ng-scope" for="atleastEightChars" sl-error-message="">你的密码必须至少为8个字符长</span>
<span class="ng-scope" for="atmostFortyChars" sl-error-message="">你的密码最多为40个字符长</span>
</span>
</div>
</div>
</div>
<div class="row editing">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<input class="form-control input-sm ng-pristine ng-invalid ng-invalid-required" type="password" sl-atmost-forty-chars="" sl-atleast-eight-chars="" sl-contains-digits="" sl-contains-letters="" required="" ng-model="pwdSet.newpwd2" placeholder="确认新密码" name="newpwd2Set" ng-class="{inputError:pwdMsg.newpwd2Error}">
<div class="ng-hide ng-scope" name="newpwd2Set" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="required" sl-error-message="">对不起，请输入密码</span>
<span class="ng-scope" for="containsLetters" sl-error-message="">你的密码必须包括至少一个字母</span>
<span class="ng-scope" for="containsDigits" sl-error-message="">你的密码必须包括至少一个数字</span>
<span class="ng-scope" for="atleastEightChars" sl-error-message="">你的密码必须至少为8个字符长</span>
<span class="ng-scope" for="atmostFortyChars" sl-error-message="">你的密码最多为40个字符长</span>
</span>
</div>
</div>
</div>
<div class="row editing">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="display-block bind-red ng-binding" ng-bind="pwdMsg.msg | addAsterisk"></span>
<span class="btn-group">
<a class="btn btn-secondary btn-confirm" href="" ng-click="pwdSetSubmit()">确定</a>
</span>
<span class="btn-group">
<a class="btn btn-secondary bind-blue btn-hollow" href="" ng-click="cancelChangePwd()">取消</a>
</span>
</div>
</div>
</form>
</div>
</div>
<div class="info-row row-line" ng-class="{editing:userIdentity.editing}">
<div class="ng-scope" ng-if="!basicProfile.profile.isForeigner && !basicProfile.profile.isEnterprise">
<div class="row">
<div class="col-xs-3 info-value text-center">真实姓名</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.realName">未验证</span>
</div>
<div class="col-xs-8 ng-hide" ng-show="userIdentity.editing">
<input class="form-control input-sm ng-pristine ng-valid" ng-focus="userIdentity.realNameError = false" placeholder="输入您的真实姓名" ng-model="userIdentity.realName" ng-class="{inputError:userIdentity.realNameError}">
</div>
<div class="col-xs-4" ng-show="!userIdentity.editing && !basicProfile.securityIcons.idCard.active && !basicProfile.securityIcons.idCard.isNeedVerify">
<div class="sl-icons">
<a class="btn btn-secondary bind-blue btn-hollow btn-bg-blue" href="" ng-click="userIdentity.editing=true">立即验证</a>
</div>
</div>
<div class="col-xs-4 ng-hide" ng-show="!userIdentity.editing && !basicProfile.securityIcons.idCard.active && basicProfile.securityIcons.idCard.isNeedVerify">
<div class="sl-icons">
<a class="btn btn-secondary bind-blue btn-hollow btn-bg-blue" href="" data-target="#informationModal" data-toggle="modal">完善信息</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">身份证号</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">未验证</span>
</div>
<div class="col-xs-8 ng-hide" ng-show="userIdentity.editing">
<input class="form-control input-sm ng-pristine ng-valid" maxlength="18" ng-focus="userIdentity.idNumberError = false" placeholder="输入18位身份证号" ng-model="userIdentity.idNumber" ng-class="{inputError:userIdentity.idNumberError}">
</div>
</div>
<div class="row ng-hide" ng-show="userIdentity.editing">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="bind-red display-block ng-binding" ng-bind="userIdentity.msg | addAsterisk"></span>
<span class="btn-group">
<a class="btn btn-secondary btn-confirm" href="" ng-click="bindIDAndName()">立即验证</a>
</span>
<span class="btn-group">
<a class="btn btn-secondary bind-blue btn-hollow" href="" ng-click="cancelBindIDAndName()">取消</a>
</span>
</div>
</div>
</div>
</div>
<div class="info-row">
<form class="ng-pristine ng-valid ng-valid-required" name="verifyEmailForm">
<div class="row" ng-class="{editing:(userEmail.editing),'close-edit':userEmail.emailSent}">
<div class="col-xs-3 info-value text-center">绑定邮箱</div>
<div class="col-xs-5">
<div class="" ng-show="!userEmail.editing">
<span class="ng-binding ng-scope" ng-bind="userEmail.email" ng-if="!userEmail.isVerified && userEmail.email">416148489@qq.com</span>
</div>
</div>
<div class="col-xs-8 ng-hide" ng-show="userEmail.editing">
<input id="account-email" class="form-control email input-sm ng-pristine ng-valid ng-valid-required" type="text" sl-email="" autocomplete="off" placeholder="输入绑定的邮箱地址，提升安全等级" required="" ng-model="userEmail.email" ng-class="{inputError:userEmail.emailError}" name="email">
<div class="ng-hide ng-scope" name="email" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="email" sl-error-message="">请输入有效的邮箱地址</span>
</span>
</div>
</div>
<div class="col-xs-4" ng-show="!userEmail.emailSent">
<div class="sl-icons" ng-show="!userEmail.isVerified && !userEmail.editing">
<a class="btn btn-secondary bind-blue btn-hollow btn-bg-blue ng-scope" ng-click="sendVerifyEmail()" ng-if="userEmail.email" ng-href="http://mail.qq.com" target="_blank" href="http://mail.qq.com">登录邮箱绑定</a>
</div>
<div class="sl-icons ng-hide" ng-show="userEmail.isVerified && !userEmail.editing">
<a class="btn btn-secondary bind-blue btn-hollow" ng-click="userEmail.editing = true" href="">修改</a>
</div>
</div>
</div>
<div class="row editing ng-hide" ng-show="userEmail.editing">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="bind-red display-block ng-binding" ng-bind="userEmail.msg | addAsterisk"></span>
<span class="ng-hide" ng-show="userEmail.emailSent">
验证邮件已发送，立即
<a target="_blank" ng-href="http://mail.qq.com" href="http://mail.qq.com">登录邮箱</a>
进行绑定
</span>
<span class="btn-group" ng-show="!userEmail.emailSent">
<a class="btn btn-secondary btn-confirm" ng-click="sendVerifyEmail()" href="">立即绑定</a>
</span>
<span class="btn-group" ng-show="!userEmail.emailSent">
<a class="btn btn-secondary bind-blue btn-hollow" ng-click="cancelSendVerifyEmail()" href="">取消</a>
</span>
</div>
</div>
</form>
</div>
<div class="info-row">
<div class="row" ng-show="!cellphoneVerification.phoneEditing">
<div class="col-xs-3 info-value text-center">绑定手机</div>
<div class="col-xs-5">
<span class="ng-binding ng-scope" ng-if="cellphoneVerification.isVerified">180****1538</span>
</div>
<div class="col-xs-3">
<div class="sl-icons bind-green ng-scope" ng-if="cellphoneVerification.isVerified">
<a class="btn btn-secondary bind-blue btn-hollow" href="" ng-click="cellphoneVerification.phoneEditing=true">修改</a>
</div>
</div>
</div>
<div class="row editing ng-hide" ng-show="cellphoneVerification.phoneEditing">
<form class="form-horizontal verifyCellphoneForm ng-pristine ng-invalid ng-invalid-required" novalidate="" role="form" name="verifyCellphoneForm">
<div class="row">
<div class="col-xs-3 info-value text-center">绑定手机</div>
<div class="col-xs-8">
<input class="form-control phone input-sm ng-pristine ng-invalid ng-invalid-required" type="text" sl-mobile-phone="" autocomplete="off" placeholder="输入新的手机号码" maxlength="11" required="" ng-model="verificationInfo.phone" ng-class="{inputError:cellphoneVerification.phoneError}" name="phone">
<div class="ng-hide ng-scope" name="phone" sl-validation-errors="">
<span class="hide" ng-transclude="">
<span class="ng-scope" for="mobilePhone" sl-error-message="">手机号码格式不正确</span>
</span>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center"></div>
<div class="col-xs-5">
<input class="form-control phone-verify-input input-sm ng-pristine ng-invalid ng-invalid-required" type="text" placeholder="输入验证码" ng-model="verificationInfo.phoneVerifyCode" maxlength="6" required="" ng-class="{inputError:cellphoneVerification.verifyCodeError}" name="phoneVerifyCode">
</div>
<div class="col-xs-3">
<a class="btn btn-secondary btn-bg-blue verifyPhoneSubmit ng-binding" ng-disabled="verifyCellphoneForm.phone.$invalid|| cellphoneVerification.phoneCodeSent || cellphoneVerification.phoneCodeSending" title="点击发送验证码" ng-click="sendPhoneCode()" disabled="disabled">
发送验证码
<span class="phoneCountDown ng-binding ng-hide" ng-show="cellphoneVerification.phoneCodeSent">（60）</span>
</a>
<small class="phone-code-info ng-binding ng-hide" ng-bind="cellphoneVerification.codemsg" ng-show="cellphoneVerification.phoneCodeSent"></small>
</div>
</div>
<div class="row">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="bind-red display-block ng-binding" ng-bind="cellphoneVerification.msg | addAsterisk"></span>
<span class="btn-group">
<a class="btn btn-secondary btn-confirm" ng-click="submitVerificationCode()" href="">立即绑定</a>
</span>
<span class="btn-group">
<a class="btn btn-secondary bind-blue btn-hollow" ng-click="cancelVerifyPhone()" href="">取消</a>
</span>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div id="bindAccount" class="tab-pane social-account-panel">
<span class="field">关联第三方账号，快速登录点融网，获取第一手新鲜资讯！</span>
<div class="social-account clearfix">
<div class="social-account-col pull-left">
<div class="social-icon-div">
<img class="img-rounded binding-img" ng-class="{active: isWechatBound(basicProfile.profile)}" src="/static/images/account/bind-wechat.png">
</div>
</div>
<div class="social-account-col erweima-content pull-left ng-scope" ng-if="!isWechatBound(basicProfile.profile)">
<img src="/static/images/account/erweima-small.png">
</div>
<div class="social-account-col pull-left ng-scope" ng-if="!isWechatBound(basicProfile.profile)">
<div class="wechat-desc">
<h6>微信</h6>
<ul class="wechat-bind-step">
<li>关注点融网微信服务号：dianrongvip</li>
<li>根据微信提示，用点融网账户与微信号关联</li>
</ul>
</div>
</div>
</div>
<div class="social-account clearfix">
<div class="social-account-col pull-left">
<div class="social-icon-div">
<img class="img-rounded binding-img" ng-class="{active: isWeiboBound(basicProfile.profile)}" src="/static/images/account/bind-weibo.png">
</div>
</div>
<div class="social-account-col weibo-content pull-left">
<h6>新浪微博</h6>
<p>http://weibo.com</p>
<a class="btn btn-sm btn-secondary btn-embossed btn-smaller ng-scope" ng-click="weiboBind()" ng-if="!isWeiboBound(basicProfile.profile)" href="">马上关联</a>
</div>
</div>
<div class="social-account clearfix">
<div class="social-account-col pull-left">
<div class="social-icon-div">
<img class="img-rounded binding-img" ng-class="{active: isQQBound(basicProfile.profile)}" src="/static/images/account/bind-qq.png">
</div>
</div>
<div class="social-account-col weibo-content pull-left">
<h6>QQ</h6>
<p>http://www.qq.com</p>
<a class="btn btn-sm btn-secondary btn-embossed btn-smaller ng-scope" ng-click="qqBind()" ng-if="!isQQBound(basicProfile.profile)" href="">马上关联</a>
</div>
</div>
</div>
</div>
</section>
<div id="upload-profile-image-modal" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<span style="font-size: 20px;">修改头像</span>
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
</div>
<div class="modal-body">
<div class="modal-wrapper">
<div class="row summary-section fields">
<div class="col-xs-10 col-xs-offset-1 uploadfile-wrapper">
<div>
<span id="fileinput-button" class="btn btn-success fileinput-button">
<i class="glyphicon glyphicon-plus"></i>
<span>选择文件...</span>
<input id="fileupload" type="file" name="pictureFile">
</span>
<a id="reselect-image" class="" href="" style="margin-left: 20px">取消</a>
<p class="bg-success">你可以上传JPG，GIF或PNG文件（文件大小限制为4 MB）</p>
<div id="files" class="files"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="informationModal" class="modal fade information-modal ng-scope" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" ng-click="cancelVerifyPhone()" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h4 class="modal-title">完善个人信息</h4>
</div>
<div class="modal-body">
<div class="row ng-binding"> 用户： </div>
<div class="row">
您还未验证您的
<span class="ng-hide" ng-show="basicProfile.profile.realName">身份证号</span>
<span class="" ng-show="!basicProfile.profile.realName">真实姓名</span>
，请致电客服电话
</div>
<div class="row telephone"> 400-921-9218 </div>
<div class="row"> 完善个人信息，继续赚钱投资 </div>
</div>
</div>
</div>
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
          $(".change2").addClass('active');            
      })
  </script>
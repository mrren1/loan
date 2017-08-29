@extends('layouts.public')

@section('title', '忘记密码')
 
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
   <div id="notifications" ng-show="notify.messages.msg.length &amp; gt; 0" class="ng-cloak affix-top" data-spy="affix" data-offset-top="0"> 
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
   <div class="container find-pwd-container"> 
    <div class="findPwd-content"> 
     <div class="password-reset-wrapper dialog dialog-default" ng-controller="PasswordResetFormCtrl"> 
      <h4 class="find-pwd">找回密码</h4> 
      <div ng-repeat="error in errors" ng-show="errors.length &amp; gt; 0" class="alert-msg ng-cloak">
        
      </div> 
      <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" ng-show="firstStep" novalidate="" name="passwordResetForm" role="form"> 
       <div class="form-group description-line">
         请输入您绑定点融账号的手机号码/邮箱 
       </div> 
       <div class="form-group input-row"> 
        <div class="input-group"> 
         <span class="input-group-addon sl-icon-personal personal" ng-class="{active:inputFocus} "></span> 
         <input id="account-email-phone" class="form-control input-phone-email ng-pristine ng-invalid ng-invalid-required" type="text" required="" ng-blur="inputFocus = false" ng-focus="inputFocus = true" placeholder="请输入注册时的手机号或邮箱" ng-model="user.emailOrPhone" name="emailOrPhone" /> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <span class="input-group-addon sl-icon-puzzle" ng-class="{active:inputCode} "></span> 
         <input class="form-control input-code ng-pristine ng-invalid ng-invalid-required" type="text" required="" ng-blur="inputCode = false" ng-focus="inputCode = true" placeholder="输入校验码" ng-model="user.captchaVerifyCode" name="captchaCode" /> 
        </div> 
        <span class="captcha-line"> <img class="captcha-img" ng-src="https://www.dianrong.com/images/captcha.jpg" src="https://www.dianrong.com/images/captcha.jpg" /> <a class="btn btn-primary btn-embossed refresh-captcha" ng-click="refreshCaptcha()"> <span class="sl-icon-repayment"></span> </a> </span> 
       </div> 
       <div class="form-group "> 
        <button class="btn btn-wide btn-primary btn-embossed first-step" ng-click="toNextStep()" ng-disabled="passwordResetForm.emailOrPhone.$invalid || passwordResetForm.captchaCode.$invalid || verifying" disabled="disabled">下一步</button> 
       </div> 
      </form> 
      <form class="form-horizontal ng-cloak" role="form" name="verifyCodeForm" ng-submit="verifyCode()" novalidate="" ng-show="secondStep"> 
       <div class="form-group"> 
        <span class="through-type" ng-show="sendByPhone">系统已经发送一条短信到</span> 
        <div ng-show="sendByPhone" class="desc-msg-line">
          请输入短信的验证码 
        </div> 
        <span class="through-type through-type-mail" ng-show="sendByEmail">系统已经发送邮件到</span> 
        <div ng-show="sendByEmail" class="desc-msg-line-mail">
          请输入邮件中的验证码重置您的密码 
        </div> 
       </div> 
       <div class="form-group hidden"> 
        <input type="text" class="form-control" id="account-email-phone2" name="emailOrPhone" ng-model="user.emailOrPhone" placeholder="请输入注册时的手机号或邮箱" required="" /> 
       </div> 
       <div class="form-group input-line"> 
        <div class="input-group"> 
         <span class="input-group-addon sl-icon-eye" ng-class="{active:inputFocus} "></span> 
         <input type="text" class="form-control input-verifyCode" id="confCode" name="confCode" ng-model="user.confCode" placeholder="输入验证码" ng-focus="inputFocus = true" ng-blur="inputFocus = false" required="" /> 
         <button ng-click="submit()" class="btn btn-primary sent-msg" ng-disabled="codeSented || codeSending"></button> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div ng-repeat="msg in msgs" ng-show="msgs.length &amp; gt; 0" class="notify-msg ng-cloak">
        
        </div> 
       </div> 
       <div class="form-group first-last-step"> 
        <button type="submit" class="btn  btn-primary btn-embossed" ng-disabled="verifyCodeForm.$invalid || verifyConf">下一步</button> 
       </div> 
      </form> 
      <div ng-show="secondStep" class="choose-other-type" ng-cloak=""> 
       <a href="forget.html" ng-click="toFirstStep()">选择其他方式找回密码 &gt;</a> 
      </div> 
      <form class="form-horizontal ng-cloak" role="form" novalidate="" name="passwordResetCodeForm" ng-show="thirdStep" ng-submit="submitCode()"> 
       <div class="form-group desc-reset-pwd">
         请重设您的账号密码 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <span class="input-group-addon sl-icon-lock" ng-class="{active:focus} "></span> 
         <input type="password" class="form-control input-phone-email" id="password" name="password" ng-model="user.password" placeholder="请设置新密码（8位以上字母和数字的组合）" ng-focus="focus = true" ng-blur="focus = false" required="" /> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <span class="input-group-addon sl-icon-lock" ng-class="{active:focusing} "></span> 
         <input type="password" class="form-control input-phone-email" id="passwordConfirmation" name="passwordConfirmation" ng-model="user.passwordConfirmation" placeholder="请确认新密码" ng-focus="focusing = true" ng-blur="focusing = false" required="" /> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div ng-repeat="msg in messages" ng-show="messages.length &amp; gt; 0" class="reset-msg ng-cloak">
         
        </div> 
       </div> 
       <div class="form-group"> 
        <button type="submit" class="btn  btn-primary btn-embossed reset-button" ng-disabled="passwordResetCodeForm.$invalid || submitResetPwd">提交</button> 
       </div> 
      </form> 
      <form class="form-horizontal ng-cloak" ng-show="showLast" ng-cloak=""> 
       <div class="reset-successful">
         密码重置成功! 
       </div> 
       <div class="auto-link-home">
         0s后跳转至点融网主页 
       </div> 
       <div class="manual-link-home"> 
        <a href="index.html">立即进入点融网首页</a> 
       </div> 
      </form> 
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
 </body>
</html>
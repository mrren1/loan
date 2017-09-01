@extends('layouts.public')

@section('title', '基本信息')
 
  <div class="wrapper ">  
  @section('content')
  <style>
    #photo,#img,#idcard,#fangcard,#jiacard{
      display:block;
      display: inline;
    }
  </style>
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

<img width="100%" ng-src="images/green-head.jpg" id="head_img" src="uploads/{{$user['user_photo']}}">
</a>
<button id="head-btn" onclick="$('#head').click()">上传头像</button>
<input type="file" id="head" style="display:none">
</div>

<div class="pull-left">
<div class="field">
<h6 class="username ng-binding" ng-bind="basicProfile.name">{{Session::get('user_name')}}</h6>
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
<span class="ng-binding" ng-bind="basicProfile.profile.userName">{{$user['user_name']}}</span>
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
<span class="ng-binding" ng-bind="actorId">{{$user['user_id']}}</span>
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

<form action="{{url('member_info')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
<input type="hidden" name="message_id" value="{{$message['message_id']}}">
<div class="row">
<div class="col-xs-3"></div>
<div class="col-xs-8">
<span class="display-block bind-red ng-binding" ng-bind="pwdMsg.msg | addAsterisk"></span>
<span class="btn-group">
@if($message==null)
<a class="btn btn-secondary btn-confirm" id="block">添加</a>
@else
<a class="btn btn-secondary bind-blue btn-hollow" id="update">修改</a>
@endif
</span>
</div>
</div>

<div class="row">
<div class="col-xs-3 info-value text-center">真实姓名</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.realName">
  <span style="display:none" id="hide"><input class="form-control input-sm ng-pristine ng-valid" name="name" placeholder="输入您的真实姓名"></span>
  <span style="display:none" id="up"><input class="form-control input-sm ng-pristine ng-valid" name="message_name" value="{{$message['message_name']}}"></span>
  <span id="show">{{$message['message_name']}}</span>
</span>
</div>
<div class="col-xs-4" ng-show="!userIdentity.editing && !basicProfile.securityIcons.idCard.active && !basicProfile.securityIcons.idCard.isNeedVerify">
<div class="sl-icons">
</div>
</div>
<div class="col-xs-4 ng-hide" ng-show="!userIdentity.editing && !basicProfile.securityIcons.idCard.active && basicProfile.securityIcons.idCard.isNeedVerify">
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">手机号</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
  <span style="display:none" id="hide"><input class="form-control input-sm ng-pristine ng-valid" name="phone" placeholder="输入手机号"></span>
  <span style="display:none" id="up"><input class="form-control input-sm ng-pristine ng-valid" name="message_phone" value="{{$message['message_phone']}}"></span>
  <span id="show">{{$message['message_phone']}}</span>
</span>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">邮箱</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
  <span style="display:none" id="hide"><input class="form-control input-sm ng-pristine ng-valid" name="email" placeholder="输入邮箱"></span>
  <span style="display:none" id="up"><input class="form-control input-sm ng-pristine ng-valid" name="message_email" value="{{$message['message_email']}}"></span>
  <span id="show">{{$message['message_email']}}</span>
</span>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">年龄</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
  <span style="display:none" id="hide"><input class="form-control input-sm ng-pristine ng-valid" name="age" placeholder="输入年龄"></span>
  <span style="display:none" id="up"><input class="form-control input-sm ng-pristine ng-valid" name="message_age" value="{{$message['message_age']}}"></span>
  <span id="show">{{$message['message_age']}}</span>
</span>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">性别</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
  <span style="display:none" id="hide">
  <input type="radio" name="sex" value="1"><span>男</span>
  <input type="radio" name="sex" value="0"><span>女</span>
 </span>
 <span style="display:none" id="up">
  <input type="radio" name="message_sex" value="1" @if($message['message_sex']==1)checked="checked"@endif><span>男</span>
  <input type="radio" name="message_sex" value="0" @if($message['message_sex']==0)checked="checked"@endif><span>女</span>
 </span>
  @if($message['message_sex']===1)
  <span id="show">男</span>
  @elseif($message['message_sex']===0)
  <span id="show">女</span>
  @else
  <span id="show"></span>
  @endif
</span>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">职业</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
<span style="display:none" id="hide">
  <select name="job">
    <option value="">选择职位</option>
     @foreach ($data as $key => $val)
     <dl>
       <dt><option value="{{$val['job_name']}}">{{$val['job_name']}}</option></dt>
       <dd>
        @foreach ($val['child'] as $kk => $vv)
        <ul>
            <span><option value="{{$vv['job_name']}}">{{$vv['dd']}}{{$vv['job_name']}}</option></span>
        </ul>
        @endforeach
        </dd>
      </dl>
     @endforeach
  </select>
  </span>
  <span style="display:none" id="up">
  <select name="message_job">
    <option value="">选择职位</option>
     @foreach ($data as $key => $val)
     <dl>
       <dt><option value="{{$val['job_name']}}" @if($message['message_job']==$val['job_name'])selected="selected"@endif>{{$val['job_name']}}</option></dt>
       <dd>
        @foreach ($val['child'] as $kk => $vv)
        <ul>
            <span><option value="{{$vv['job_name']}}" @if($message['message_job']==$vv['job_name'])selected="selected"@endif>{{$vv['dd']}}{{$vv['job_name']}}</option></span>
        </ul>
        @endforeach
        </dd>
      </dl>
     @endforeach
  </select>
  </span>
  <span id="show">{{$message['message_job']}}</span>
</span>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">地址</div>
<div ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
<span style="display:none" id="hide">
    <select num="0" class="sel" name="country1">
      <option value="">请选择</option>
      @foreach ($address as $key => $val)
        <option value="{{$val['address_id']}}">{{$val['address_name']}}</option>
      @endforeach
    </select>
    <select class="sel" num="1" name="province1">
      <option value="0" selected="selected">请选择</option>
    </select>
    <select class="sel" num="2" name="city1">
      <option value="0" selected="selected">请选择</option>
    </select>
    <select class="sel" num="3" name="area1">
      <option value="0" selected="selected">请选择</option>
    </select>
</span>
<span style="display:none" id="up">
    <input type="hidden" id="province" value="{{$message['province']}}">
    <input type="hidden" id="city" value="{{$message['city']}}">
    <input type="hidden" id="area" value="{{$message['area']}}">
    <select num="0" class="sel" name="country">
      <option value="">请选择</option>
      @foreach ($address as $key => $val)
        <option value="{{$val['address_id']}}" @if($message['country']==$val['address_id'])selected="selected"@endif>{{$val['address_name']}}</option>
      @endforeach
    </select>
    <select class="sel" num="1" name="province">
      <option value="0" selected="selected">请选择</option>
    </select>
    <select class="sel" num="2" name="city">
      <option value="0" selected="selected">请选择</option>
    </select>
    <select class="sel" num="3" name="area">
      <option value="0" selected="selected">请选择</option>
    </select>
</span>
</span>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">详细地址</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
  <span style="display:none" id="hide"><input class="form-control input-sm ng-pristine ng-valid" name="address" placeholder="输入详细地址"></span>
   <span style="display:none" id="up"><input class="form-control input-sm ng-pristine ng-valid" name="message_address" value="{{$message['message_address']}}"></span>
  <span id="show">{{$message['message_address']}}</span>
</span>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">月收入</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
<span style="display:none" id="hide">
  <select name="revenue">
    <option value="0">请选择</option>
   @foreach ($salary as $key => $val)
    <option value="{{$val}}">{{$val}}</option>
  @endforeach
  </select>
  </span>
  <span style="display:none" id="up">
  <select name="message_revenue">
    <option value="0">请选择</option>
   @foreach ($salary as $key => $val)
    <option value="{{$val}}" @if($message['message_revenue']==$val)selected="selected"@endif>{{$val}}</option>
  @endforeach
  </select>
  </span>
  <span id="show">{{$message['message_revenue']}}</span>
</span>
</div>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">贷款最大额度</div>
<div class="col-xs-5" ng-show="!userIdentity.editing">
<span class="bind-gray ng-scope" ng-if="!basicProfile.profile.idCard">
  <span>{{$message['message_limit']}}</span>
</span>
</div>
</div>

<div style="display:none" id="up_img">
@if($message['message_photo']==null)
<div class="row">
<div class="col-xs-3 info-value text-center">上传个人照片</div>
<input id="photo" type="file">
<span id="img1"></span>
<input type="hidden" name="message_photo" value="" id="message_photo">
</div>
@else
<input type="hidden" name="message_photo" value="{{$message['message_photo']}}">
@endif
@if($message['private_photo']==null)
<div class="row">
<div class="col-xs-3 info-value text-center">上传隐私照片</div>
<input id="img" type="file">
<input type="hidden" name="private_photo" value="" id="private_photo">
<span id="img2"></span>
</span>
</div>
@else
<input type="hidden" name="private_photo" value="{{$message['private_photo']}}">
@endif
@if($message['message_idcard']==null)
<div class="row">
<div class="col-xs-3 info-value text-center">上传身份证</div>
<input id="idcard" type="file">
<input type="hidden" name="message_idcard" value="" id="message_idcard">
<span id="img3"></span>
</span>
</div>
@else
<input type="hidden" name="message_idcard" value="{{$message['message_idcard']}}">
@endif
@if($message['message_fangcard']==null)
<div class="row">
<div class="col-xs-3 info-value text-center">上传房产证</div>
<input id="fangcard" type="file">
<input type="hidden" name="message_fangcard" value="" id="message_fangcard">
<span id="img4"></span>
</span>
</div>
@else
<input type="hidden" name="message_fangcard" value="{{$message['message_fangcard']}}">
@endif
@if($message['message_jiacard']==null)
<div class="row">
<div class="col-xs-3 info-value text-center">上传驾驶证</div>
<input id="jiacard" type="file">
<input type="hidden" name="message_jiacard" value="" id="message_jiacard">
<span id="img5"></span>
</span>
</div>
@else
<input type="hidden" name="message_jiacard" value="{{$message['message_jiacard']}}">
@endif
</div>
<div style="display:none" id="hide">
<div class="row">
<div class="col-xs-3 info-value text-center">上传个人照片</div>
<input id="photo" type="file"><span id="img1"></span>
<input type="hidden" name="photo" value="" id="message_photo">
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">上传隐私照片</div>
<input id="img" type="file">
<input type="hidden" name="img" value="" id="private_photo">
<span id="img2"></span>
</span>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">上传身份证</div>
<input id="idcard" type="file">
<input type="hidden" name="idcard" value="" id="message_idcard">
<span id="img3"></span>
</span>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">上传房产证</div>
<input id="fangcard" type="file">
<input type="hidden" name="fangcard" value="" id="message_fangcard">
<span id="img4"></span>
</span>
</div>
<div class="row">
<div class="col-xs-3 info-value text-center">上传驾驶证</div>
<input id="jiacard" type="file">
<input type="hidden" name="jiacard" value="" id="message_jiacard">
<span id="img5"></span>
</span>
</div>
</div>



<div class="row">
<table>
<tr>
<td>

<img src="{{ URL::asset('/') }}uploads/{{$message['message_photo']}}" @if($message['message_photo']==null)style="width:0px"@elsestyle="width:70px"@endif />

</td>
<td>

<img src="{{ URL::asset('/') }}uploads/{{$message['private_photo']}}" @if($message['private_photo']==null)style="width:0px"@elsestyle="width:70px"@endif />

</td>
<td>

<img src="{{ URL::asset('/') }}uploads/{{$message['message_idcard']}}" @if($message['message_idcard']==null)style="width:0px"@elsestyle="width:70px"@endif />

</td>
<td>

<img src="{{ URL::asset('/') }}uploads/{{$message['message_fangcard']}}" @if($message['message_fangcard']==null)style="width:0px"@elsestyle="width:70px"@endif />

</td>
<td>

<img src="{{ URL::asset('/') }}uploads/{{$message['message_jiacard']}}" @if($message['message_jiacard']==null)style="width:0px"@elsestyle="width:70px"@endif />

</td>
</tr>
<tr>
  
  <td>@if($message['message_photo']!=null)个人照片@endif</td>

  <td>@if($message['private_photo']!=null)隐私照片@endif</td>

  <td>@if($message['message_idcard']!=null)身份证照片@endif</td>

  <td>@if($message['message_fangcard']!=null)房产证照片@endif</td>

  <td>@if($message['message_jiacard']!=null)驾驶证照片@endif</td>
</tr>
</table>
</div>
<div class="row">

<input type="submit" style="display:none" id="btn" class="btn btn-secondary btn-confirm" value="提交">
</div>

</form>
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
  <script src="{{ URL::asset('/') }}js/jquery.js"></script>
  <script type="text/javascript">
     $(".sel").change(function(){
        //获取当前value值
        var address_id=$(this).val();
        //获取自定义属性
        var num=$(this).attr('num');
        //获取当前对象
        var obj=$(this);
        $.ajax({
          type:'get',
          url:'address',
          data:{address_id:address_id},
          dataType:'json',
          success:function(e){
              str='<option value="0" selected="selected">请选择</option>';
              $.each(e,function(k,v){
                  str=str+'<option value="'+v.address_id+'">'+v.address_name+'</option>'
              });
              obj.next().html(str);
              obj.next().nextAll().html('<option value="0" selected="selected">请选择</option>');
          }
        });
     });
      //上传头像
     $("#head").change(function(){
      var form = new FormData();
      var file = $(this);
      form.append('user_photo',file[0].files[0]);
      $.ajax({
        type: "post",
        url: "user_upload",
        data: form,     
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
          if(result == 0){
            alert("文件上传失败");
            return false;
          }else{
            $("#head_img").attr('src','uploads/'+result);
            return true;
          }
        }
     });
    });
     //文件上传个人照片
     $("#photo").change(function(){
      var form = new FormData();
      var file = $(this);
      form.append('message_photo',file[0].files[0]);
      $.ajax({
        type: "post",
        url: "upload",
        data: form,     
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
          if(result == 0){
            alert("文件上传失败");
            return false;
          }else{
            $("#message_photo").val(result);
            $("#img1").html("<img src='uploads/"+result+"' style='width:40px'>");
            //$("#img1").attr('src','uploads/'+result);
            return true;
          }
        }
     });
    });
     //上传隐私照片
     $("#img").change(function(){
      var form = new FormData();
      var file = $(this);
      form.append('private_photo',file[0].files[0]);
      //console.log(form);headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
      $.ajax({
        type: "post",
        url: "img_upload",
        data: form,     
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
          //alert(result);
         // console.log(result)
          if(result == 0){
            alert("文件上传失败");
            return false;
          }else{
            $("#private_photo").val(result);
            $("#img2").html("<img src='uploads/"+result+"' style='width:40px'>");
            return true;
          }
        }
     });
    });
      //文件上传身份证
     $("#idcard").change(function(){
      var form = new FormData();
      var file = $(this);
      form.append('message_idcard',file[0].files[0]);
      //console.log(form);headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
      $.ajax({
        type: "post",
        url: "id_upload",
        data: form,     
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
          //alert(result);
         // console.log(result)
          if(result == 0){
            alert("文件上传失败");
            return false;
          }else{
            $("#message_idcard").val(result);
            $("#img3").html("<img src='uploads/"+result+"' style='width:40px'>");
            return true;
          }
        }
     });
    });
      //文件上传房产证
     $("#fangcard").change(function(){
      var form = new FormData();
      var file = $(this);
      form.append('message_fangcard',file[0].files[0]);
      //console.log(form);headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
      $.ajax({
        type: "post",
        url: "fang_upload",
        data: form,     
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
          //alert(result);
         // console.log(result)
          if(result == 0){
            alert("文件上传失败");
            return false;
          }else{
            $("#message_fangcard").val(result);
            $("#img4").html("<img src='uploads/"+result+"' style='width:40px'>");
            return true;
          }
        }
     });
    });
      //文件上传驾驶证
     $("#jiacard").change(function(){
      var form = new FormData();
      var file = $(this);
      form.append('message_jiacard',file[0].files[0]);
      //console.log(form);headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
      $.ajax({
        type: "post",
        url: "jia_upload",
        data: form,     
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
          //alert(result);
         // console.log(result)
          if(result == 0){
            alert("文件上传失败");
            return false;
          }else{
            $("#message_jiacard").val(result);
            $("#img5").html("<img src='uploads/"+result+"' style='width:40px'>");
            return true;
          }
        }
     });
    });
     $("#block").click(function(){
        $("span #hide").css('display','block');
        $("span #show").css('display','none');
        $("#btn").css('display','block');
        $("div #hide").css('display','block');
        $("tr").css('display','none')
     });
     $("#update").click(function(){
        $("span #up").css('display','block');
        $("div #up_img").css('display','block');
        $("span #hide").css('display','none');
        $("span #show").css('display','none');
        $("tr").css('display','none')
        $("#btn").css('display','block');
     });
  </script>
<!--结束-->
@endsection
   <!-- Modal--> 
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
  

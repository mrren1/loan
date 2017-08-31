@extends('layouts.admin_user')

@section('title', '个人主页')
@section('content') 

    <div class="row">

        <div class="u-main">            
            <div class="u-tab-wrap">
                <ul class="u-tab clearfix">
                    <li class="current"><a>三方托管</a></li></ul>
            </div>
            <div class="u-form-wrap" style="padding: 20px;">
                <div class="uf-tips">
                    <p class="red">
                        1、开通支付宝账户必须绑定有效的手机号和真实姓名。</p>
                    <p class="red">
                        2、已经绑定的用户，系统会在你使用支付宝在线充值时自动开户。</p>
                    <p class="red">
                        3、从支付宝取现，必须进行实名认证。</p>
                </div>
                <div class="m-form-box mt10">
                    <div class="m-form-til">
                        <b>我的支付宝账户</b></div>
                    <div class="i-item i-long-item">
                        <label class="i-til">
                            支付宝账号：</label><div class="i-txt">
                                <span style="color: green;">njro_123@163.com</span></div>
                    </div>
                    <div class="i-item i-long-item">
                        <label class="i-til">
                            资金同步状态：</label><div class="i-txt">
                                <span style="color: green;">已同步</span></div>
                    </div>
                    <div class="i-item-btn" style="text-align: center;">
                        请输入支付密码：
                        <input id="user_paypwd" class="i-inp" type="password" name="paypwd" value="" style="width: 100px;
                            height: 21px;" /><a id="pnr_login" class="i-btn-txt1" style="margin-left: 10px; overflow: visible;">登录支付宝</a><span
                                class="green">（ 输完支付密码后，可直接按回车键登录！）</span></div>
                </div>
            </div>
        </div>
    </div>


@endsection

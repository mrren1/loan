@extends('layouts.admin_user')

@section('title', '个人主页')
@section('content')

    <div class="row" style="margin-top: 10px;">

        <div class="u-main">
            <div class="ucenter">
                <div class="ucenter-info mt10">
                    <div class="info-title">
                        <h5>
                            我的个人主页</h5>
                    </div>
                    <div class="info">
                        <ul class="info-img">
                            <li>
                                <img src="images/tx_img.gif" class="avatar" /></li></ul>
                        <div class="info-main">
                            <div class="row">
                                <label>
                                    用户名：</label>张三</div>
                            <div class="row">
                                <label>
                                    注册时间：</label>2013-07-13</div>
                            <div class="row">
                                <label>
                                    所在地：</label>重庆</div>
                            <div class="row">
                                <label>
                                    角色：</label><span class="orange">普通会员 &nbsp;&nbsp; 借入者</span></div>
                            <div class="row">
                                <label>
                                    个人统计：</label><span class="orange">0</span>&nbsp;条贷款记录 ， 共计&nbsp;<span class="orange">0</span>&nbsp;元
                                ； <span class="orange">0</span>&nbsp;条投标记录 ， 共计&nbsp;<span class="orange">0.00</span>&nbsp;元
                                。
                            </div>
                        </div>
                        <div class="clear">
                        </div>
                    </div>
                </div> 
                <div class="ucenter-info mt10">
                <div class="ucenter-tab-box">
                        <ul class="u-tab clearfix">
                            <li class="current"><a>我关注的用户</a></li>
                            <li><a>关注我的用户</a></li>
                            <li><a>投标记录</a></li>
                            <li><a>贷款记录</a></li>
                        </ul>
                </div>
                <div id="tab_box">
                    <div class="u-form-wrap">
                        <div>
                            这是我关注的用户</div>
                    </div>
                    <div class="u-form-wrap" style="display: none;">
                        <div>
                            这是关注我的用户</div>
                    </div>
                    <div class="u-form-wrap" style="display: none;">
                        <div>
                            这是我的投标记录</div>
                    </div>
                    <div class="u-form-wrap" style="display: none;">
                        <div>
                            这是我的贷款记录</div>
                    </div>
                </div>                
            </div>
            <script type="text/javascript">

                var $div_li = $(".ucenter-tab-box ul li");

                $div_li.click(function () {

                    $(this).addClass("current").siblings().removeClass("current");

                    var div_index = $div_li.index(this);

                    $("#tab_box>div").eq(div_index).show().siblings().hide();

                }).hover(function () {

                    $(this).addClass("hover");

                }, function () {

                    $(this).removeClass("hover");

                });

        </script>
        </div>
        <!-- /.u-main -->
    </div>
    <div style="text-align:center;">
</div>
@endsection


@extends('layouts.admin_user')

@section('title', '密码设置')
@section('content')

    
    <div class="row">
 
        <div class="u-main">
            <div id="tab_menu">
                <ul class="u-tab clearfix">
                    <li class="current"><a>登陆密码</a></li>
                    <li><a>支付密码</a></li>
                </ul>
            </div>
            <div id="tab_box">
                <div class="u-form-wrap">                 
                    <div>
                        这是登陆密码设置</div>
                </div>
                <div class="u-form-wrap" style="display: none;">                    
                    <div>
                        这是支付密码设置</div>
                </div>                
            </div>
        </div>
        <script type="text/javascript">

            var $div_li = $("#tab_menu ul li");

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


@endsection 
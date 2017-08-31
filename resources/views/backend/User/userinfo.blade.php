@extends('layouts.admin_user')

@section('title', '个人信息')
@section('content')
 
    <div class="row">
        <div class="u-main">
            <div id="tab_menu">
                <ul class="u-tab clearfix">
                    <li class="current"><a>个人详细信息</a></li>
                    <li><a>工作认证信息</a></li>
                    <li><a>联系人信息</a></li>
                </ul>
            </div>
            <div id="tab_box">
                <div class="u-form-wrap">
                    <div class="uf-tips">
                        <span class="red">*</span> 为必填项，所有资料均会严格保密。
                    </div>
                    <div>
                        这是个人详细信息</div>
                </div>
                <div class="u-form-wrap" style="display: none;">
                    <!-- uf-tips -->
                    <div class="uf-tips">
                        <span class="red">*</span> 为必填项，所有资料均会严格保密。
                    </div>
                    <div>
                        这是工作认证信息</div>
                </div>
                <div class="u-form-wrap" style="display: none;">
                    <div class="uf-tips">
                        <span class="red">*</span> 为必填项，所有资料均会严格保密。
                    </div>
                    <div>
                        这是联系人信息</div>
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


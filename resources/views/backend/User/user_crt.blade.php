@extends('layouts.admin_user')

@section('title', '债权转让')
@section('content')
    <div class="row">
   
        <div class="u-main">
            <div id="tab_menu">
                <ul class="u-tab clearfix">
                    <li class="current"><a>关于债权的转让</a></li>
                    <li><a>转让的债权</a></li>
                    <li><a>承接的债权</a></li>
                    <li><a>回收中的贷款</a></li>
                </ul>
            </div>
            <div id="tab_box">
                <div class="u-form-wrap">
                    <div class="uf-tips">
                        <span class="red">*</span> 关于债权的 转让</div>
                </div>
                <div class="u-form-wrap" style="display: none;">
                    <!-- uf-tips -->
                    <div class="uf-tips">
                        <span class="red">*</span> 转让的债权
                    </div>
                </div>
                <div class="u-form-wrap" style="display: none;">
                    <div class="uf-tips">
                        <span class="red">*</span> 承接的债权
                    </div>
                </div>
                <div class="u-form-wrap" style="display: none;">
                    <div class="uf-tips">
                        <span class="red">*</span> 会中中的贷款
                    </div>
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
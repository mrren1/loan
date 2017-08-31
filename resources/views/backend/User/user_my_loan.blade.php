@extends('layouts.admin_user')

@section('title', '我的贷款')
@section('content')
       
        <div class="u-main">
            <script src="/public/hao/js/user/loan.js"></script>
            <div class="u-tab-wrap">
                <ul class="u-tab clearfix">
                    <li class="current"><a>我的贷款</a></li><!--
                <li class="current"><a href="#">全部贷款</a></li><li><a href="#">招标中的贷款</a></li><li><a href="#">还款中的贷款</a></li><li><a href="#">已完成的贷款</a></li>
                --></ul>
            </div>
            <div class="u-form-wrap" style="padding: 20px;">
                <div class="page-wrap">
                    这里是贷款列表
                </div>
                <div class="i-item-btn" style="height: 28px;">
                    <a href="#"  class="i-btn-txt1 repay-back">还 款</a></div>
            </div>
            <!-- /.u-form-wrap -->
        </div>
        <!-- /.u-main -->
    </div>


@endsection
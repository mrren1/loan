@extends('layouts.admin_user')

@section('title', '个人主页')
@section('content')

    <div class="row">
   
        <div class="u-main">
            <div class="ucenter-info mt10">
                <div class="u-tab-wrap">
                    <ul class="u-tab clearfix">
                        <li><a>理财统计</a></li>
                        <li class="current"><a>资金统计</a></li>
                    </ul>
                    <!-- /.u-tab -->
                </div>
                <div id="tab-box">
                    <div class="u-form-wrap" style="padding: 50px; display: none;">
                        <div>
                            <table class="u-table">
                                <tr>
                                    <th colspan="4">
                                        回报统计
                                    </th>
                                </tr>
                                <tr>
                                    <td width="25%">
                                        净赚利息
                                    </td>
                                    <td width="25%">
                                        <i class="red">￥</i>
                                    </td>
                                    <td width="25%">
                                        待赚利息
                                    </td>
                                    <td width="25%">
                                        <i class="red">￥</i>
                                    </td>
                                </tr>
                                <td>
                                    已收本金
                                </td>
                                <td>
                                    <i class="red">￥ </i>
                                </td>
                                <td>
                                    待收本金
                                </td>
                                <td>
                                    <i class="red">￥</i>
                                </td>
                            </table>
                        </div>
                        <div style="margin-top: 20px;">
                            <table class="u-table">
                                <tr>
                                    <th colspan="4">
                                        理财统计
                                    </th>
                                </tr>
                                <tr>
                                    <td width="25%">
                                        总借出金额
                                    </td>
                                    <td width="25%">
                                        <i class="red">￥</i>
                                    </td>
                                    <td width="25%">
                                        总借出笔数
                                    </td>
                                    <td width="25%">
                                        <i class="red"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        已回收本息
                                    </td>
                                    <td>
                                        <i class="red">￥ </i>
                                    </td>
                                    <td>
                                        已回收笔数
                                    </td>
                                    <td>
                                        <i class="red"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        待回收本息
                                    </td>
                                    <td>
                                        <i class="red">￥ </i>
                                    </td>
                                    <td>
                                        待回收笔数
                                    </td>
                                    <td>
                                        <i class="red"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        利息管理费
                                    </td>
                                    <td>
                                        <i class="red">￥</i>
                                    </td>
                                    <td colspan="2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="position: relative; top: -2px; margin-left: 20px;">上月日均待收</span><span
                                            class="etips" style="left: 4px; top: 4px; _top: 1px;" tips="是指您在上个月中，平均每天的待收总额。"></span>
                                    </td>
                                    <td>
                                        <i class="red">￥</i>
                                    </td>
                                    <td>
                                        <span style="position: relative; top: -2px; margin-left: 20px;">本月日均待收</span><span
                                            class="etips" style="left: 4px; top: 4px; _top: 1px;" tips="是指您在本月中，平均每天的待收总额。"></span>
                                    </td>
                                    <td>
                                        <i class="red">￥</i>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="u-form-wrap">
                        <div class="m-sub-til" style="padding: 0;">
                            资金统计历史</div>
                        <div class="search-box" style="margin-bottom: 15px;">
                            <table class="u-table">
                                <tr>
                                    <td colspan="3">
                                        <div class="tab-search" style="padding-top: 5px;">
                                            <div class="i-item" style="padding-left: 100px;">
                                                <label class="i-til" style="width: 100px;">
                                                    开始日期：</label><input type="text" class="i-inp i-date search-sdate" style="width: 80px;
                                                        height: 17px;" /></div>
                                            <!-- /.i-item -->
                                            <div class="i-item" style="padding-left: 100px;">
                                                <label class="i-til" style="width: 100px;">
                                                    结束日期：</label><input type="text" class="i-inp i-date search-edate" style="width: 80px;
                                                        height: 17px;" /></div>
                                            <!-- /.i-item -->
                                            <div class="i-item-btn">
                                                <button id="do_search" class="i-btn-txt3">
                                                    查询</button></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <table class="u-table">
                            <tr>
                                <th width="20%">
                                    日期
                                </th>
                                <th width="20%">
                                    待收总额
                                </th>
                                <th width="20%">
                                    可用余额
                                </th>
                                <th width="20%">
                                    资金余额
                                </th>
                                <th width="20%">
                                    资金总额
                                </th>
                            </tr>
                            <tr>
                                <td style="color: green;">
                                </td>
                                <td style="color: red;">
                                </td>
                                <td style="color: red;">
                                </td>
                                <td style="color: red;">
                                </td>
                                <td style="color: red;">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <script type="text/javascript">

                var $div_li = $(".u-tab-wrap ul li");

                $div_li.click(function () {

                    $(this).addClass("current").siblings().removeClass("current");

                    var div_index = $div_li.index(this);

                    $("#tab-box>div").eq(div_index).show().siblings().hide();

                }).hover(function () {

                    $(this).addClass("hover");

                }, function () {

                    $(this).removeClass("hover");

                });
            </script>
        </div>
        <!-- /.u-main -->
    </div>
    <!-- /.row -->


@endsection

@extends('layouts.admin_user')

@section('title', '偿还贷款')
@section('content')
    <div class="row">
    
        <div class="u-main">
            <div class="u-tab-wrap">
                <ul class="u-tab clearfix">
                    <li class="current"><a>待偿还贷款</a></li><li><a>已还清贷款</a></li><li style="display: none;">
                        <a>还款详情</a></li><li style="display: none;"><a>提前还款</a></li></ul>
            </div>
            <div id="tab-box">
                <div id="repay_list_box" class="u-form-wrap" style="padding: 15px;">
                    <div style="margin-bottom: 20px;">
                        <table class="u-table th12 td12">
                            <tr>
                                <th width="10%">
                                    编号
                                </th>
                                <th width="25%">
                                    标题
                                </th>
                                <th width="10%">
                                    金额
                                </th>
                                <th width="8%">
                                    期限
                                </th>
                                <th width="8%">
                                    利率
                                </th>
                                <th width="10%">
                                    状态
                                </th>
                                <th width="10%">
                                    完成时间
                                </th>
                                <th width="10%">
                                    操作
                                </th>
                                <th width="10%">
                                    操作
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <a target="_blank" href="#" class="imp f14">1</a>
                                </td>
                                <td>
                                    <a target="_blank" href="#" class="imp f14">12</a>
                                </td>
                                <td>
                                    <i class="red">￥12</i>
                                </td>
                                <td>
                                    <i class="red">12天</i>
                                </td>
                                <td>
                                    <i class="red">13%</i>
                                </td>
                                <td>
                                    <i class="red">12</i>
                                </td>
                                <td>
                                </td>
                                <td class="i-item-btn">
                                    <a href="#" class="i-btn-txt1 repay-back">还 款</a>
                                </td>
                                <td class="i-item-btn">
                                    <a href="#" class="i-btn-txt1 repay-early">提前还款</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div id="repay_ok_box" class="u-form-wrap" style="padding: 15px; display: none;">
                    <table class="u-table th12 td12">
                        <tr>
                            <th width="10%">
                                编号
                            </th>
                            <th width="25%">
                                标题
                            </th>
                            <th width="10%">
                                金额
                            </th>
                            <th width="8%">
                                期限
                            </th>
                            <th width="8%">
                                利率
                            </th>
                            <th width="10%">
                                状态
                            </th>
                            <th width="10%">
                                完成时间
                            </th>
                            <th width="10%">
                                合同
                            </th>
                            <th width="10%">
                                操作
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <a target="_blank" href="#" class="imp f14">1</a>
                            </td>
                            <td>
                                <a target="_blank" href="#" class="imp f14">12</a>
                            </td>
                            <td>
                                <i class="red">￥12</i>
                            </td>
                            <td>
                                <i class="red">12天</i>
                            </td>
                            <td>
                                <i class="red">13%</i>
                            </td>
                            <td>
                                <i class="red">12</i>
                            </td>
                            <td>
                            </td>
                            <td>
                                <a alt="电子合同" title="电子合同" href="#"><span class="ico ico-ht"></span></a>
                            </td>
                            <td>
                                <a href="#" class="i-btn-txt1 repay-back">还款详情</a>
                            </td>
                        </tr>
                    </table>
                    <div class="page-wrap">
                    </div>
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
        <!-- /.u-main -->
    </div>
    <!-- /.row -->



@endsection
@extends('layouts.admin_user')

@section('title', '我的投资')
@section('content')

    <div class="row">
      
        <div class="u-main">
            <div class="u-tab-wrap">
                <ul class="u-tab clearfix">
                    <li val="invest_loan_box" class="current"><a>我投标的贷款</a></li><li val="invest_loan_tendering_box">
                        <a>投标中的贷款</a></li><li val="invest_loan_waiting_box"><a>等待放款的投资</a></li><li val="invest_repay_box">
                            <a>回收中的贷款</a></li><li val="invest_return_box"><a>已回收的贷款</a></li></ul>
                <!-- /.u-tab -->
            </div>
            <div id="tab_box">
                <div id="invest_loan_box" class="u-form-wrap" style="padding: 0;">
                    <div class="list-raq" style="padding-left: 6px;">
                        <div class="item item1">
                            <span class="img">图片</span>标题 | 贷款人 | 所在地区
                        </div>
                        <div class="item item2">
                            投标金额</div>
                        <div class="item item2">
                            期限</div>
                        <div class="item item2">
                            利率</div>
                        <div class="item item3">
                            信用等级</div>
                        <div class="item item2">
                            进度</div>
                        <div class="item item2">
                            剩余时间</div>
                    </div>                   
                    <!-- /.main-list -->                   
                    <div class="page-wrap">
                    </div>
                </div>
                <!-- /.u-form-wrap -->
                <div id="invest_repay_box" class="u-form-wrap" style="padding: 20px; display: none;">
                    <div class="search-box" style="margin-bottom: 15px;">
                        <table class="u-table">                           
                                <tr>
                                    <td colspan="3">
                                        <div class="tab-search" style="padding-top: 5px;">
                                            <div class="i-item" style="padding-left: 50px;">
                                                <label class="i-til" style="width: 50px;">
                                                    从：</label><input type="text" class="i-inp i-date" id="search_sdate" style="width: 80px;
                                                        height: 17px;" /></div>
                                            <!-- /.i-item -->
                                            <div class="i-item" style="padding-left: 50px;">
                                                <label class="i-til" style="width: 50px;">
                                                    到：</label><input type="text" class="i-inp i-date" id="search_edate" style="width: 80px;
                                                        height: 17px;" /></div>
                                            <!-- /.i-item -->
                                            <div class="i-item" style="padding-left: 90px;">
                                                <label class="i-til" style="width: 90px;">
                                                    贷款编号：</label><input type="text" class="i-inp" id="search_lid" style="width: 80px;
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
                    <table class="u-table th12 td12">                       
                            <tr>
                                <th>
                                    待收本息总额
                                </th>
                                <th>
                                    待赚利息总额
                                </th>
                                <th>
                                    待收本金总额
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <i class="red">￥</i>
                                </td>
                                <td>
                                    <i class="red">￥</i>
                                </td>
                                <td>
                                    <i class="red">￥</i>
                                </td>
                            </tr>
                        
                    </table>
                    <table class="u-table th12 td12" style="margin-top: 15px;">                       
                            <tr>
                                <th>
                                    借款编号
                                </th>
                                <th>
                                    借款人
                                </th>
                                <th>
                                    第几期
                                </th>
                                <th>
                                    还款日
                                </th>
                                <th>
                                    回收本息
                                </th>
                                <th>
                                    剩余本息
                                </th>
                                <th>
                                    逾期天数
                                </th>
                                <th>
                                    电子合同
                                </th>
                                <th>
                                    操&nbsp;作
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="imp f14"></a>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <i class="red"></i>
                                </td>
                                <td>
                                    <i class="red"></i>
                                </td>
                                <td>
                                    <i class="red">￥</i>
                                </td>
                                <td>
                                    <i class="red">￥</i>
                                </td>
                                <td>
                                    {repay.out_days}
                                </td>
                                <td>
                                    <a style="color: green;" href="#"><span class="ico ico-ht"></span></a>
                                </td>
                                <td>
                                    <div class="i-item-btn" style="height: 25px;">
                                        <a href="#" class="i-btn-txt1 transfer-post">转让</a></div>
                                </td>
                            </tr>                       
                    </table>
                    <div class="page-wrap">
                    </div>
                </div>
                <!-- /.u-form-wrap -->
                <div id="invest_return_box" class="u-form-wrap" style="padding: 10px; display: none;">                   
                    <table class="u-table th12 td12">                      
                            <tr>
                                <th>
                                    借款编号
                                </th>
                                <th>
                                    借款人
                                </th>
                                <th>
                                    借出日期
                                </th>
                                <th>
                                    借出金额
                                </th>
                                <th>
                                    年利率
                                </th>
                                <th>
                                    回收金额
                                </th>
                                <th>
                                    电子合同
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="imp f14"></a>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <i class="red"></i>
                                </td>
                                <td>
                                    <i class="red">￥</i>
                                </td>
                                <td>
                                    <i class="red"></i>
                                </td>
                                <td>
                                    <i class="red">￥</i>
                                </td>
                                <td>
                                    <a style="color: green;" href="#"><span class="ico ico-ht"></span></a>
                                </td>
                            </tr>                       
                    </table>                   
                    <div class="page-wrap">
                    </div>
                </div>
            </div>
            <script type="text/javascript">

                var $div_li = $(".u-tab-wrap ul li");

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
    </div>
@endsection

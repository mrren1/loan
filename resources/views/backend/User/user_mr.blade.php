@extends('layouts.admin_user')

@section('title', '资金记录')
@section('content')

    <div class="row">

        <div class="u-main">
            <div class="u-tab-wrap">
                <ul class="u-tab clearfix">
                    <li class="current"><a>资金记录</a></li></ul>
            </div>
            <div class="u-form-wrap">
                <table class="u-table">
                    <tbody>
                        <tr>
                            <th>
                                资金总额<span class="etips" tips="资金总额=可用余额+冻结金额+待收总额"></span>
                            </th>
                            <th>
                                资金余额<span class="etips" tips="资金余额=可用余额+冻结金额"></span>
                            </th>
                            <th>
                                可用余额<span class="etips" tips="可用余额=资金总额-冻结总额-待收总额，账户余额可用于投标或者提现"></span>
                            </th>
                            <th>
                                冻结金额<span class="etips" tips="冻结总额是您当前暂时不能使用的金额，冻结总额包括投标冻结、借款保证金冻结、提现冻结"></span>
                            </th>
                            <th>
                                待收总额<span class="etips" tips="待收总额是您借款给别人但是还没收回的本息总额"></span>
                            </th>
                            <th>
                                充值总额<span class="etips" tips="充值总额是您在网站充值成功后收入总额"></span>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                0.00
                            </td>
                            <td>
                                0.00
                            </td>
                            <td>
                                0.00
                            </td>
                            <td>
                                0.00
                            </td>
                            <td>
                                0.00
                            </td>
                            <td>
                                0.00
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="m-sub-til" style="padding: 0;">
                    资金记录查询</div>
                <table class="u-table">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <div class="tab-search">
                                    <div class="i-item">
                                        <label class="i-til">
                                            类型：</label><div class="i-select" id="search_type">
                                                <input type="hidden" value="0" /><span class="sel-til">所有</span>
                                                <ul class="sel-list">
                                                    <li val="0"><a>所有</a></li>
                                                    <li val="1"><a>充值</a></li>
                                                    <li val="2"><a>提现</a></li>
                                                    <li val="30"><a> 充值</a></li>
                                                    <li val="31"><a> 提现</a></li>
                                                    <li val="25"><a>提现冻结</a></li>
                                                    <li val="26"><a>提现失败</a></li>
                                                    <li val="3"><a>人工充值</a></li>
                                                    <li val="4"><a>人工扣款</a></li>
                                                    <li val="5"><a>投标冻结</a></li>
                                                    <li val="6"><a>投标成功</a></li>
                                                    <li val="7"><a>投标失败</a></li>
                                                    <li val="8"><a>招标成功</a></li>
                                                    <li val="9"><a>债权转让支出</a></li>
                                                    <li val="10"><a>债权转让收入</a></li>
                                                    <li val="32"><a>回收利息</a></li>
                                                    <li val="38"><a>回收本金</a></li>
                                                    <li val="14"><a>提前回收</a></li>
                                                    <li val="12"><a>回收本息</a></li>
                                                    <li val="17"><a>利息管理费</a></li>
                                                    <li val="36"><a>积分返现</a></li>
                                                    <li val="29"><a>推荐奖励</a></li>
                                                    <li val="24"><a>返还服务费</a></li>
                                                    <li val="35"><a>服务费</a></li>
                                                    <li val="34"><a>充值奖励</a></li>
                                                    <li val="28"><a>投标奖励</a></li>
                                                    <li val="37"><a> 提现失败</a></li>
                                                    <li val="41"><a> 提现成功</a></li>
                                                    <li val="40"><a>罚息收入</a></li>
                                                    <li val="11"><a>偿还本息</a></li>
                                                    <li val="33"><a>偿还利息</a></li>
                                                    <li val="13"><a>提前还款</a></li>
                                                    <li val="15"><a>身份验证手续费</a></li>
                                                    <li val="16"><a>提现手续费</a></li>
                                                    <li val="18"><a>借款服务费</a></li>
                                                    <li val="19"><a>借款管理费</a></li>
                                                    <li val="20"><a>逾期罚息</a></li>
                                                    <li val="21"><a>担保费用</a></li>
                                                    <li val="22"><a>实地考核费</a></li>
                                                    <li val="27"><a>委托代查费</a></li>
                                                </ul>
                                            </div>
                                    </div>
                                    <div class="i-item" style="padding-left: 30px;">
                                        <label class="i-til" style="width: 30px;">
                                            从：</label><input type="text" class="i-inp i-date" id="search_sdate" style="width: 80px;
                                                height: 17px;" /></div>
                                    <div class="i-item" style="padding-left: 30px;">
                                        <label class="i-til" style="width: 30px;">
                                            到：</label><input type="text" class="i-inp i-date" id="search_edate" style="width: 80px;
                                                height: 17px;" /></div>
                                    <div class="i-item-btn">
                                        <button id="do_search" class="i-btn-txt3">
                                            查询</button></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="m-sub-til" style="padding: 0;">
                    资金历史记录</div>
                <table class="u-table">
                    <tr>
                        <th width="16%">
                            时间
                        </th>
                        <th width="20%">
                            类型
                        </th>
                        <th width="11%">
                            存入
                        </th>
                        <th width="11%">
                            支出
                        </th>
                        <th width="12%">
                            可用余额
                        </th>
                        <th width="12%">
                            冻结金额
                        </th>
                        <th width="13%">
                            备注
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <a target="_blank" href="#" class="blue2"></a>
                        </td>
                        <td>
                        </td>
                        <td style="color: red;">
                        </td>
                        <td style="color: green;">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
                <span class="none">共0条记录</span> <span class="none">共0条记录</span> <span class="btn">首页</span>
                <a href="#" class="btn">首页</a> <a href="#" class="btn">上一页</a> <span class="btn">上一页</span>
                <span class="current"></span><a href="#"></a><a href="#" class="btn">下一页</a> <span
                    class="btn">下一页</span>&nbsp; <a href="#" class="btn">尾页</a> <span class="btn">尾页</span>
                <span class="pageinp" title="回车跳转">直达
                    <input type="text" id="pageinp" />
                    页 </span><span class="none">共0页</span> <span class="none">共{0}页</span>
            </div>
        </div>
    </div>
@endsection  
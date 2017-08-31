@extends('layouts.admin_user')

@section('title', '个人主页')
@section('content')

    <div class="row">
    
        <div class="u-main">
            <div class="u-tab-wrap">
                <ul class="u-tab clearfix">
                    <li class="current"><a>贷款统计</a></li></ul>
                <!-- /.u-tab -->
            </div>
            <div class="u-form-wrap" style="padding: 50px;">
                <div>
                    <table class="u-table">
                        <tbody>
                            <tr>
                                <th colspan="4">
                                    贷款统计
                                </th>
                            </tr>
                            <tr>
                                <td width="25%">
                                    总借款额
                                </td>
                                <td width="25%">
                                    <i class="red">￥0.00</i>
                                </td>
                                <td width="25%">
                                    成功借款笔数
                                </td>
                                <td width="25%">
                                    <i class="red">0 / 0</i>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    已还本息(含奖励)
                                </td>
                                <td>
                                    <i class="red">￥0.00</i>
                                </td>
                                <td>
                                    正常还清笔数
                                </td>
                                <td>
                                    <i class="red">0</i>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    待还本息(含奖励)
                                </td>
                                <td>
                                    <i class="red">￥0.00</i>
                                </td>
                                <td>
                                    正在还款笔数
                                </td>
                                <td>
                                    <i class="red">0</i>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    待还管理费
                                </td>
                                <td>
                                    <i class="red">￥0.00</i>
                                </td>
                                <td>
                                    平台代还笔数
                                </td>
                                <td>
                                    <i class="red">0</i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.u-form-wrap -->
        </div>
        <!-- /.u-main -->
    </div>
    <!-- /.row -->
@endsection


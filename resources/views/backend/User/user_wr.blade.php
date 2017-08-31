@extends('layouts.admin_user')

@section('title', '提现中心')
@section('content')

    <div class="row">
 
        <div class="u-main">
            <div class="u-tab-wrap">
                <ul class="u-tab">
                    <li class="current"><a>申请提现</a></li>
                    <li><a>提现记录</a></li>
                    <li><a>提现设置</a></li>
                </ul>
            </div>
            <div id="tab_box">
                <div class="u-form-wrap">
                    <!--style="display: none;"-->
                    <div id="drawcash_apply_box" class="u-form-wrap">
                        <div class="uf-tips">
                            <p style="color: red;">
                                 提现说明：<br />
                                &nbsp;&nbsp;&nbsp;&nbsp; 1、在正常工作日（00:00—22:00）操作的 提现，均为次日12—17点之间到账（周五及周末操作的提现，均在下周一到账）；<br />
                                &nbsp;&nbsp;&nbsp;&nbsp; 2、充值未投标客户，充值24小时后即可进行 提现操作，完成操作后需收取未投标提现金额的1%为服务费。<br />
                            </p>
                        </div>
                        <div>
                            <div id="drawcash_apply_div" class="m-form-box mt20 newbg noborderleft" style="overflow: visible;">
                                <div class="m-form-til">
                                    <strong>请输入提现信息</strong></div>
                                <div class="i-item i-long-item nobordertop">
                                    <label class="i-til">
                                        账户可用余额：</label><div class="i-right">
                                            <div class="i-txt">
                                                <i id="user_money_now">0.00</i>元</div>
                                        </div>
                                </div>
                                <!-- /.i-item -->
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        可提现金额：</label><div class="i-right">
                                            <div class="i-txt">
                                                <i id="user_okdraw">0.00</i>元 <span class="red" style="font-size: 12px;">(需收取服务费部分：<i
                                                    id="user_feedraw">0.00</i>元，无需收取服务费部分：0.00元。) </span>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.i-item -->
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        <span class="red">*</span>提&nbsp;现&nbsp;方&nbsp;式：</label><div class="i-right">
                                            <div class="i-txt">
                                                <span class="applymethod">
                                                    <input name="method" type="radio" value="1" checked="checked" />
                                                    银行卡提现 </span><span class="applymethod">
                                                        <input name="method" type="radio" value="1" checked="checked" />
                                                        支付宝提现 </span>&nbsp;&nbsp;&nbsp;<span class="i-item-btn" style="width: 78px; height: 20px;
                                                            border: none;"><a id="pnr_login" href="#" class="i-btn-txt1">进入钱管家</a></span><br />
                                                <p id="pnr_bank_msg" class="tips">
                                                    <span class="red f12">(需先至大融小贷钱管家进行身份认证和自动取现银行卡设置。)</span></p>
                                                <p id="quick_bank_msg" class="tips" style="display: none;">
                                                    <span class="red f12">(此方式为快速到账方式，必须先绑定手机号，暂时只支持：中国建设银行、中国工商银行。)</span></p>
                                            </div>
                                        </div>
                                </div>
                                <div class="i-item i-long-item noborder">
                                    <label class="i-til">
                                        <span class="red">*</span>提&nbsp;现&nbsp;金&nbsp;额：</label><div class="i-right">
                                            <input id="drawcash_money" name="money" type="text" class="i-inp" style="width: 90px;" />
                                            元
                                        </div>
                                </div>
                                <div class="i-item i-long-item noborder">
                                    <label class="i-til">
                                        <span class="red">*</span>支&nbsp;付&nbsp;密&nbsp;码：</label><div class="i-right">
                                            <input id="drawcash_paypwd" name="paypwd" type="password" class="i-inp" value=""
                                                style="width: 90px;" /></div>
                                </div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        <span class="red"></span>使&nbsp;用&nbsp;积&nbsp;分：</label><div class="i-right">
                                            <label class="i-choose">
                                                <input name="usescore" value="1" id="drawcash_use_score" type="checkbox">
                                                &nbsp;&nbsp; (可用积分：0.0，需要：<i id="drawcash_need_score">0</i> 积分)
                                            </label>
                                        </div>
                                </div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        提现手续费：</label><div class="i-right">
                                            <div class="i-txt">
                                                <i class="red" id="drawcash_fee_show">0.00</i>元
                                            </div>
                                        </div>
                                </div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        服&nbsp;&nbsp;&nbsp;务&nbsp;&nbsp;&nbsp;费：</label><div class="i-right">
                                            <div class="i-txt">
                                                <i class="red" id="drawcash_sfee_show">0.00</i>元 <span class="red f12">(收取服务费部分：<i
                                                    id="drawcash_sfee_money">0.00</i>元。)</span></div>
                                        </div>
                                </div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        实际到账金额：</label><div class="i-right">
                                            <div class="i-txt">
                                                <i class="red" id="drawcash_money_show">0.00</i>元
                                            </div>
                                        </div>
                                </div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        提现后账户可用余额：</label><div class="i-right">
                                            <div class="i-txt">
                                                <i class="red" id="user_money_show">0.00</i>元</div>
                                        </div>
                                </div>
                                <!-- /.i-item -->
                                <div class="i-item i-long-item hasborderbot">
                                    <label class="i-til">
                                        开&nbsp;&nbsp;&nbsp;户&nbsp;&nbsp;&nbsp;名：</label><div class="i-right">
                                            <div class="i-txt">
                                                <i id="I1">张三</i>&nbsp;</div>
                                        </div>
                                </div>
                                <!-- /.i-item -->
                                <div id="drawcash_bank_div" style="display: none;">
                                    <div class="i-item i-long-item nobordertop" style="position: static;">
                                        <label class="i-til">
                                            <span class="red">*</span>开&nbsp;&nbsp;&nbsp;户&nbsp;&nbsp;&nbsp;行：</label><div class="i-right">
                                                <div class="i-select" style="width: 130px;">
                                                    <input id="drawcash_banktype" type="hidden" name="banktype" value="icbc" /><span
                                                        class="sel-til">请选择</span><ul class="sel-list">
                                                            <li val="icbc"><a>中国工商银行</a></li><li val="ccb"><a>中国建设银行</a></li></ul>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="i-item i-long-item noborder">
                                        <label class="i-til">
                                            支&nbsp;行&nbsp;名&nbsp;称：</label><div class="i-right">
                                                <input id="drawcash_bank" name="bank" type="text" class="i-inp" value="" /></div>
                                    </div>
                                    <div class="i-item i-long-item noborder">
                                        <label class="i-til">
                                            <span class="red">*</span>银&nbsp;行&nbsp;卡&nbsp;号：</label><div class="i-right">
                                                <input id="drawcash_card" name="card" type="text" class="i-inp" value="" /></div>
                                    </div>
                                    <div class="i-item i-long-item hasborderbot noborder">
                                        <label class="i-til">
                                            <span class="red">*</span>确认银行卡号：</label><div class="i-right">
                                                <input id="drawcash_card2" name="card2" type="text" class="i-inp" value="" /></div>
                                    </div>
                                </div>
                                <div class="i-item" style="text-align: center;">
                                    <p class="tips" id="drawcash_apply_msg">
                                    </p>
                                </div>
                                <!-- /.i-item -->
                                <div class="i-item-btn">
                                    <span class="red">实际到账金额：<i id="drawcash_money_show2">0.00</i>元</span><br />
                                    <button type="submit" id="drawcash_apply_submit" class="i-btn-txt1">
                                        申请提现</button></div>
                            </div>
                            <!-- /.m-form-box -->
                            <div id="drawcash_confirm_div" class="m-form-box mt10 newbg noborderleft" style="overflow: visible;
                                display: none;">
                                <div class="m-form-til">
                                    <strong>请确认提现信息</strong></div>
                                <div class="i-item i-long-item nobordertop">
                                    <label class="i-til">
                                    </label>
                                    <div class="i-right" style="border-left: none;">
                                        <div class="i-txt red">
                                            一起好已向您的手机发送了提现短信校验码，请注意查收！</div>
                                    </div>
                                </div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        本次提现金额：</label><div class="i-right">
                                            <div class="i-txt">
                                                <i id="drawcash_confirm_money_show">0.00</i>元
                                            </div>
                                        </div>
                                </div>
                                <!-- /.i-item -->
                                <div class="i-item i-long-item hasborderbot">
                                    <label class="i-til">
                                        请输入短信校验码：</label><div class="i-right">
                                            <input name="smscode" type="text" class="i-inp" value="" style="width: 60px;" /></div>
                                </div>
                                <!-- /.i-item -->
                                <div class="i-item-btn">
                                    <button type="submit" id="drawcash_apply_confirm" class="i-btn-txt1">
                                        确认提现</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="u-form-wrap" style="display: none;">
                    <div id="drawcash_record_box" class="u-form-wrap">
                        <div class="m-sub-til" style="padding: 0;">
                            提现记录</div>
                        <div class="search-box" style="margin-bottom: 15px;">
                            <table class="u-table">
                                <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <div class="tab-search" style="padding-top: 5px;">
                                                <div class="i-item" style="padding-left: 60px;">
                                                    <label class="i-til" style="width: 60px;">
                                                        状态：</label><div class="i-select" id="search_status" style="width: 90px;">
                                                            <input type="hidden" value="0" /><span class="sel-til">所有</span><ul class="sel-list">
                                                                <li val="0"><a>所有</a></li><li val="1"><a>失败</a></li><li val="2"><a>无效</a></li><li
                                                                    val="3"><a>已取消</a></li><li val="4"><a> 提现失败</a></li><li val="11"><a>等待处理</a></li><li
                                                                        val="21"><a>提现处理中</a></li><li val="22"><a> 提现成功</a></li><li val="31"><a>提现成功</a></li></ul>
                                                        </div>
                                                </div>
                                                <!-- /.i-item -->
                                                <div class="i-item" style="padding-left: 30px;">
                                                    <label class="i-til" style="width: 30px;">
                                                        从：</label><input type="text" class="i-inp i-date" id="search_sdate" style="width: 80px;
                                                            height: 17px;" /></div>
                                                <!-- /.i-item -->
                                                <div class="i-item" style="padding-left: 30px;">
                                                    <label class="i-til" style="width: 30px;">
                                                        到：</label><input type="text" class="i-inp i-date" id="search_edate" style="width: 80px;
                                                            height: 17px;" /></div>
                                                <!-- /.i-item -->
                                                <div class="i-item-btn">
                                                    <button id="do_search" class="i-btn-txt3">
                                                        查询</button></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <table class="u-table">
                            <tbody>
                                <tr>
                                    <th width="20%">
                                        时间
                                    </th>
                                    <th width="10%">
                                        金额
                                    </th>
                                    <th width="15%">
                                        卡号
                                    </th>
                                    <th width="15%">
                                        银行
                                    </th>
                                    <th width="10%">
                                        状态
                                    </th>
                                    <th width="10%">
                                        说明
                                    </th>
                                    <th width="10%">
                                        备注
                                    </th>
                                    <th width="8%">
                                        操作
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
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
                                </tr>
                            </tbody>
                        </table>
                        <div class="page-wrap">
                            <span class="none">共0条记录</span> <span class="none">共0条记录</span> <span class="btn">首页</span>
                            <a href="#" class="btn">首页</a> <a href="#" class="btn">上一页</a> <span class="btn">上一页</span>
                        </div>
                    </div>
                </div>
                <div class="u-form-wrap" style="display: none;">
                    <div id="drawcash_bank_box" class="u-form-wrap">
                        <div class="uf-tips">
                            <p style="color: red;">
                                注：银行账户填写后，如需要更改，请联系客服。</p>
                        </div>
                        <div>
                            <div class="m-form-box mt10" style="overflow: visible;">
                                <div class="m-form-til">
                                    <b>银行账户信息</b></div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        开户名：</label><div class="i-txt">
                                            <i id="user_realname">张三</i></div>
                                </div>
                                <!-- /.i-item -->
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        开户行：</label><div class="i-select" style="width: 130px;">
                                            <input type="hidden" name="banktype" value="" /><span class="sel-til">请选择</span><ul
                                                class="sel-list">
                                                <li val="icbc"><a>中国工商银行</a></li><li val="ccb"><a>中国建设银行</a></li><li val="cmb"><a>招商银行</a></li><li
                                                    val="boc"><a>中国银行</a></li><li val="abc"><a>中国农业银行</a></li><li val="bocom"><a>交通银行</a></li><li
                                                        val="cmbc"><a>中国民生银行</a></li><li val="hxbc"><a>华夏银行</a></li><li val="cib"><a>兴业银行</a></li><li
                                                            val="spdb"><a>上海浦东发展银行</a></li><li val="gdb"><a>广东发展银行</a></li><li val="citic"><a>中信银行</a></li><li
                                                                val="ceb"><a>光大银行</a></li><li val="psbc"><a>中国邮政储蓄银行</a></li><li val="sdb"><a>深圳发展银行</a></li><li
                                                                    val="other"><a>其它银行</a></li></ul>
                                        </div>
                                </div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        支行名称：</label><input id="drawcash_bank_bank" name="bank" value="" type="text" class="i-inp" /></div>
                                <div class="i-item i-long-item">
                                    <label class="i-til">
                                        银行卡号：</label><input id="drawcash_bank_card" name="card" value="" type="text" class="i-inp" /></div>
                                <div class="i-item">
                                    <p class="tips" id="drawcash_bank_msg">
                                    </p>
                                </div>
                                <!-- /.i-item -->
                                <div class="i-item-btn">
                                    <button id="drawcash_bank_submit" class="i-btn-save">
                                    </button>
                                </div>
                            </div>
                            <!-- /.m-form-box -->
                        </div>
                    </div>
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


@endsection
 @extends('layouts.admin_user')

@section('title', '个人主页')
@section('content')



    <div class="row">

        <div class="u-main">
            <div class="u-tab-wrap">
                <ul class="u-tab clearfix">
                    <li val="user_invite_box" class="current"><a>推荐有奖</a></li></ul>
            </div>
            <div id="user_invite_box" class="u-form-wrap" style="padding: 20px 50px 50px 30px;">
                <div class="hasbg" style="margin-bottom: 15px;">
                    <div class="i-item" style="color: red; font-size: 14px;">
                        复制下面的推荐注册链接，<br />
                        如果被推荐人累计净充值金额(减去提现总额)和有效投资均达5万元，
                        <br />
                        一次性奖励100元，该奖励将在下一个工作日内直接充入您的账户。
                        <br />
                        <span class="green">(注：目前只有金牌会员具有推荐资格)</span></div>
                    <div class="i-item-btn i-item-btn2">
                        <label class="i-til" style="font-size: 14px; font-weight: blod;">
                            推荐链接：</label><input id="invite_url" name="url" type="text" value="https://www.baidu.com"
                                class="i-inp" style="width: 310px;" />
                        &nbsp;&nbsp;
                        <button id="user_invite_copy" type="button" class="i-btn-txt1">
                            复制链接</button></div>
                </div>
                <div id="main_list">
                    这是已经推荐的人的列表                     
                </div>
                <div class="page-wrap">

                </div>                
            </div>
        </div>
        <!-- /.u-main -->
    </div>
@endsection

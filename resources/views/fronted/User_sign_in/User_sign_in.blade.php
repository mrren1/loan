 @extends('layouts.public')
<?php error_reporting( E_ALL&~E_NOTICE );  ?>
@section('title', '每日签到')
    @section('content')
   <!--content--> 
 <div class="qiandao-warp">
  <div class="qiandap-box">
    <div class="qiandao-banner">
      <img src="images/qiandao_banner.jpg" height="551" width="1120" alt="">
    </div>
    <div class="qiandao-con clear">
      <div class="qiandao-left">
        <div class="qiandao-left-top clear">
          <div class="current-date">2016年1月6日</div>
      @if(Session::has('user_name'))
          <div class="qiandao-history qiandao-tran qiandao-radius" id="js-qiandao-history">我的签到</div>
 
        </div>
        <div class="qiandao-main" id="js-qiandao-main">
          <ul class="qiandao-list" id="js-qiandao-list">
          </ul>
        </div>
      </div>
      <div class="qiandao-right">
        <div class="qiandao-top">
          <div class="just-qiandao qiandao-sprits" id="js-just-qiandao" data-username="{{Session::get('user_name')}}">
          </div>
          <p class="qiandao-notic" style="display:none;">今日已领<span>0.1</span>元，请明日继续签到</p>
        </div>
        <div class="qiandao-bottom">
          <div class="qiandao-rule-list">
            <h4>签到规则</h4>
            <p>首次签到获得0.05元现金奖励</p>
            <p>连续签到每天增加0.01元现金奖励</p>
            <p>连续签到16天及以上每天获得0.2元现金奖励</p>
          </div>
          <div class="qiandao-rule-list">
            <h4>其他说明</h4>
            <p>如果中间有一天间断未签到的，重先开始计算连续签到时间。</p>
            <p>连续签到获得奖励后分享到QQ空间、微信朋友圈后再获得一次奖励，每天只限分享一次。</p>
            <p>获得的奖励不能直接提现，只能投资后转让变现。</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 我的 。。。 签到 记录 。。。 layer start -->
<div class="qiandao-layer qiandao-history-layer">
  <div class="qiandao-layer-con qiandao-radius">
    <a href="javascript:;" class="close-qiandao-layer qiandao-sprits"></a>
    <ul class="qiandao-history-inf clear">
      <li>
        <p>连续签到</p>
        <h4>{{ $qiandao_data_list['continuous'] }}</h4>
      </li>
      <li>
        <p>总共签到数</p>
        <h4>{{ $qiandao_data_list['count'] }}</h4>
      </li>
      <li>
        <p>签到累计奖励</p>
        <h4>{{ $qiandao_data_list['money'] }}</h4>
      </li>
    </ul>
    <div class="qiandao-history-table">
      <table>
        <thead>
          <tr>
            <th>签到日期</th>
            <th>奖励</th>
            <th>说明</th>
          </tr>
        </thead>
        <table class="qiandao_msg_list" qiandaoday="<?php echo $qiandao_data_list['qiandao_day']; ?>">
        @if( !empty( qiandao_data ) )
          @foreach ($qiandao_data as $val)
            <tr>
              <td>{{date("Y/m/d H:i:s",$val['sign_in_time'])}}</td>
              <td>{{$val['integral']}}</td>
              <td>连续签到 {{$val['continuous']}} 天奖励</td>
            </tr>
          @endforeach
        @endif
        </table>
      </table>
    </div>
  </div>
  <div class="qiandao-layer-bg"></div>
</div>
<!-- 我的签到 layer end -->
<!--      。。。 签到 提示框 。。。 layer start -->
<div class="qiandao-layer qiandao-active">
  <div class="qiandao-layer-con qiandao-radius">
    <a href="javascript:;" class="close-qiandao-layer qiandao-sprits"></a>
    <div class="yiqiandao clear">
      <div class="yijust-qiandao qiandao-sprits actived qiandao-sprits"></div>您已连续签到<span class="succession">n</span>天
    </div>
    <div class="qiandao-jiangli qiandao-sprits">
      <span class="qiandao-jiangli-num">0.55<em class="yuan">元</em></span
    </div>
    <a href="#" class="qiandao-share qiandao-tran">分享获取双倍收益</a>
  </div>
  <div class="qiandao-layer-bg"></div>
</div>
<!-- 签到 layer end -->
<!-- 我的签到 layer end -->

@else
<script>alert("请登录！");window.location.href="./login"; </script> 
@endif 
  @endsection
    @section('footbar')
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用浏览器：IE8、360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗.</p>
</div>

@parent
@endsection
  
@extends('layouts.public')

@section('title', '自动投标')
 
  <div class="wrapper "> 
   @section('content')
   <div class="modal fade" id="deleteCartItem" tabindex="-1" role="dialog" aria-hidden="true"> 
    <div class="modal-dialog" ng-controller="CartCtrl"> 
     <div class="modal-content"> 
      <div class="modal-header"> 
       <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
       <h6 class="modal-title">删除投标</h6> 
      </div> 
      <div class="modal-body"> 
       <h4>确定删除投标：ID？</h4> 
      </div> 
      <div class="modal-footer"> 
       <a class="btn btn-link" data-dismiss="modal">取消</a> 
       <a class="btn btn-action" ng-model="loanId" ng-click="removeNote()">删除</a> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div id="notifications" ng-show="notify.messages.msg.length &gt; 0" class="ng-cloak affix-top" data-spy="affix" data-offset-top="0"> 
    <div class="container"> 
     <div class="msg-fold-up" ng-class="{ 'alert-success' : notify.messages.type == 'success', 'alert-danger' : notify.messages.type == 'error', 'alert-info' : notify.messages.type == 'info' }"> 
     </div> 
     <div class="alert msg-content"> 
      <a type="button" class="close sl-icon-cross" ng-click="notify.dismiss($index)" aria-hidden="true"></a> 
      <p ng-repeat="m in notify.messages.msg track by $index" ng-bind-html="m"></p> 
     </div> 
     <div class="msg-fold-down" ng-class="{ 'alert-success' : notify.messages.type == 'success', 'alert-danger' : notify.messages.type == 'error', 'alert-info' : notify.messages.type == 'info' }"> 
     </div> 
    </div> 
   </div> 
   <!--content--> 
   <!-- This empty div is a placehodler to avoid extra spaces between content area and the affix header --> 
   <div style="height: 1px;"></div> 
   <div id="my-account" class="container my-account" ng-controller="MyAccountCtrl"> 
    <div class="row"> 
      @include('layouts.left')
     <div class="col-xs-9 ng-scope" autoscroll="false" ui-view="" style="">
<div class="auto-invest content-wrapper ng-scope">
<header class="section-header">
<h6 class="section-header-title">我的大额贷款</h6>
</header>
<section class="summary-section">
<!--展示数据-->
  <table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
      <tr class="text-c">
        <th width="60">用户</th>
        <th width="50">借款金额</th>
        <th width="40">评估额度</th>
        <th width="80">借款时间</th>
        <th width="80">还款时间</th>
        <th width="70">联系电话</th>
        <th width="70">邮寄状态</th>
        <th width="70">审核状态</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody id="box">
      @foreach($arr as $k => $v)
      <tr class="text-c">
        <td>{{$v->user_name}}</td>
        <td>{{$v->large_money}}</td>
        <td>{{$v->large_limit}}</td>
        <td><?=date('Y-m-d',$v->begin_time)?></td>
        <td><?=date('Y-m-d',$v->end_time)?></td>
        <td>{{$v->large_phone}}</td>
        <td>
          @if($v->post_status==0)
          未邮寄
          @else
          已邮寄
          @endif
        </td>
        <td class="dd{{$v->large_id}}">
          @if($v->status==0)
          待评估
          @elseif($v->status==1)
          待买家确认
          @else
          交易完成
          @endif
        </td>
        <td class="td-manage{{$v->large_id}}">
          @if($v->status==0)
            待评估
          @elseif($v->status==1)
            <a href="javascript:" class="sure" data-id="{{$v->large_id}}"><font color="red">确认交易</font></a>
          @elseif($v->status==2)
            <font color="green">交易完成</font>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
{{ $arr->links() }}
</section>
<div id="auto-invest-switch" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close sl-icon-cross" aria-hidden="true" data-dismiss="modal" type="button"></button>
<h6 id="myModalLabel" class="modal-title">关闭自动投标</h6>
</div>
<div class="modal-body">
<div class="modal-wrapper">
<div class="summary-section">
<p>自动投标可以帮助你更有效率的进行投资</p>
<h4 class="switch-confirm">确定关闭自动投标功能？</h4>
</div>
</div>
</div>
<div class="modal-footer">
<a class="btn btn-link" ng-click="closeModal()">取消</a>
<a class="btn btn-primary" ng-click="disableTool()">确定</a>
</div>
</div>
</div>
</div>
</div>
</div>
    </div> 
    <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-hidden="true"> 
     <div class="modal-dialog"> 
      <div class="modal-content"> 
       <div class="modal-body"> 
        <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
        <div class="new-user-title text-center"> 
         <img src="images/new-user-title.png" /> 
        </div> 
        <div class="row new-user-wrapper"> 
         <div class="col-xs-4 col-xs-offset-1 new-user-text text-center"> 
          <h2 ng-show="!fromLC">一手消息</h2> 
          <h2 ng-show="!fromLC">马上掌握</h2> 
          <div class="bg-new-share-wel" ng-show="fromLC"></div> 
          <div class="info-new-share text-center" ng-show="fromLC">
           14%预期年化收益率 只给首次投资的你哦
          </div> 
          <div class="btn-invest" ng-show="fromLC">
           <a class="btn  btn-action" href="index.html" ng-click="linkToRecharge()">立即充值投资</a>
          </div> 
          <div ng-show="!fromLC">
           <a class="btn btn-block btn-action" href="market.html" target="_blank">立即投资</a>
          </div> 
         </div> 
         <div class="col-xs-5 col-xs-offset-1 qr"> 
          <img src="images/qr-sub.png" /> 
          <p>立即扫描或搜索&quot;dianrongapi&quot;</p> 
          <p>关注点融网官方微信</p> 
         </div> 
        </div> 
        <div class="new-user-footer hidden"> 
         <img src="images/new-user-footer.png" /> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  <script type="text/javascript">
      $('.sure').click(function(){
        if(!confirm('您确认完成交易？')){
          return false;
        }
        //获取数据
        var large_id=$(this).data('id');
        //ajax完成本次大额贷款的交易
        $.ajax({
          type:'get',
          url:'sureLarge',
          data:{large_id:large_id},
          success:function(result){
            if(result==1){
              $('.td-manage'+large_id).html('<font color="green">交易完成</font>');
              $('.dd'+large_id).html('交易完成');
            }else{
              alert('确认失败！')
              return false;
            }
          }
        });
      });
  </script>
  @endsection
   <!-- Modal --> 
   <div class="modal fade wechat-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-sm"> 
     <div class="modal-content"> 
      <div class="modal-header"> 
       <button type="button" class="close sl-icon-cross" data-dismiss="modal" aria-hidden="true"></button> 
       <h6 class="modal-title" id="myModalLabel">关注点融网官方微信</h6> 
      </div> 
      <div class="modal-body"> 
       <div class="wechat-subscription"> 
        <h6>点融网订阅号</h6> 
        <p>了解各种点融咨询</p> 
        <img src="images/qrcode-dianrongapi.jpg" alt="点融网订阅号" /> 
        <p>dianrongapi</p> 
       </div> 
       <div class="wechat-service"> 
        <h6>点融网服务号</h6> 
        <p>查询投资情况</p> 
        <img src="images/qrcode-dianrongvip.jpg" alt="点融网服务号" /> 
        <p>dianrongvip</p> 
       </div> 
      </div> 
      <div class="modal-footer">
        添加方式：打开微信，点击″发现″菜单，使用″扫一扫″功能；或者在微信中点击&quot;联系人&quot;，添加以上英文账号名为好友。 
      </div> 
     </div>
     <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
   </div>
   <!-- /.modal --> 
  </div> 
  <script src="js/common.js" type="text/javascript"></script>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function(){
          $(".change5").addClass('active');            
      })

      $('.sure').click(function(){
        alert(1)
      });
  </script>

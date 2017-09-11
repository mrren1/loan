@extends('layouts.public')

@section('title', '充值提现')
 
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
<div id="addCardModal" class="modal fade add-card" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
  <h4 id="myModalLabel" class="modal-title">添加银行卡</h4>
</div>
<div class="modal-body summary-section">
<div class="addCard-container">
<div class="alert alert-info warning-info ng-hide" ng-show="tipShow">
<p class="ng-binding"></p>
</div>
<div class="alert alert-info">
<p>
为保证提现成功，请填写银行卡信息信息
<strong class="ng-binding"></strong>
</p>
</div>
<form class="" method="post" action="Add_bank">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">持卡人</label>
<div class="col-xs-5">
<input id="card_name"class="form-control ng-pristine ng-invalid ng-invalid-required" type="text" name="card_name" placeholder="输入您的真实姓名" ><span id="name" style="color:red"></span>
<div class="ng-hide ng-scope" name="" sl-validation-errors="">
</div>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">银行账号</label>
<div class="col-xs-5">
<input id="put_num" class="form-control ng-pristine ng-invalid ng-invalid-required" type="text" sl-bank-card="" required=""  name="put_num"placeholder="输入银行卡号" ><span id="num" style="color:red"></span>
<div class="ng-hide ng-scope" name="" sl-validation-errors="">
</div>
</div>
</div>

<div class="form-group">
<label class="col-xs-3 col-xs-offset-1 control-label">选择银行</label>
<div class="col-xs-5">
<div class="drop btn-group select select-block mbn ng-isolate-scope" selected-name="selectBank" btn-style="btn-add" options="withdrawBanklist">
<select class="form-control" name="put_name" id="put_name">
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="" ng-repeat="option in options" selected="selected">请选择银行</option>
@foreach($data as $son)
<option class="ng-binding ng-scope" ng-selected="$index == selected" value="{{$son['card_name']}}" ng-repeat="option in options">{{$son['card_name']}}</option>
@endforeach
</select>
<span id="put" style="color:red"></span>
</div>
</div>
</div>
<div class="form-group">
<div class="card-set-as-default col-xs-4 col-xs-offset-4">
<div class="modal-footer">

<input type="reset" class="btn btn-secondary" value="取消">
<input type="submit" class="btn btn-secondary" id="submit" value="确认">
<span id="sub" style="color:red"></span>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<script>
// 验证中文名称
function isChinaName(card_name) {
 var pattern = /^[\u4E00-\u9FA5]{1,6}$/;
 return pattern.test(card_name);
}
// 验证银行卡号
function isCardNo(put_num) { 
 var pattern = /^\d{19}$/; 
 return pattern.test(put_num); 
} 
$("#card_name").blur(function(){
// 判断名称
  if($.trim($('#card_name').val()).length == 0) {
  $("#name").html('请输入真实姓名');
  $('#card_name').focus();
  } else {
   if(isChinaName($.trim($('#card_name').val())) == false) {
   $("#name").html('名称格式不对。例如:张三');
   $('#card_name').focus();
   }
  }
});
$("#put_num").blur(function(){
  // 验证银行卡号
 if($.trim($('#put_num').val()).length == 0) { 
  $("#num").html('请输入真实的银行卡号');
  $('#put_num').focus();
   } else {
  if(isCardNo($.trim($('#put_num').val())) == false) {
   $("#num").html('银行卡号格式不正确');
   $('#put_num').focus();
    }
  }
});
$("#put_name").change(function(){
  if($.trim($('#put_name').val()).length == 0) { 
  $("#put").html('请选择银行');
   }
});

$("#submit").click(function(){
   if($.trim($('#card_name').val()).length == 0 ||$.trim($('#put_num').val()).length == 0||$.trim($('#put_name').val()).length == 0){
      $("#sub").html("请填写信息");
      $('#submit').attr('disabled',"true");
   }
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

<!-- <script src="{{ URL::asset('/') }}js/common.js"></script> -->
<script src="{{ URL::asset('/') }}js/jquery.js"></script>
<script type="text/javascript">
$(".change7").addClass('active');            
  </script>
<script type="text/javascript">

</script>
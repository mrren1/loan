@extends('layouts.public')

@section('title', '贷款')
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <link rel="stylesheet/less" type="text/css" href="css/style.less" /> -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/all.js"></script>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>

<!-- end banner -->
@section('content') 
<div class="bor_con_wper">
    <div class="bor_con px1000">
          <div class="bor_detail">
               <div class="bor_detail_box">
                    <div class="bor_det_one clearfix pt30 pb30">
                        <div class="bor_det_onel fl">
                                 <p class="bor_p1">
                    <ul class="bor_onel_ul">
                    </ul>
                    <ul class="bor_onel_ul">
                      
                       
                    </ul>
                        </div>  
                        <!-- end l -->
                        <div class="bor_det_oner fl">
                               <form method="post" action="{{ route('setloan') }}">
                                  <input type="hidden" value="{{ Session::token() }}" name="_token">
                                  <fieldset>
                                       <div class="mt15">
                                           <label>*贷款金额</label>
                                           <input type="text" class="bor_inputbg01" name="lend_money" id="lend_money">
                                           <span style="color:red" id="money"></span>
                                       </div>
                                               <div class="mt15">
                                           <label>*截止期限</label>
                                           <input class="Wdate" type="text" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" name="lend_time">
                                           <span style="color:red" id="time"></span>
                                       </div>
                                       <div class="mt15">
                                           <label>*贷款类型</label>
                                           <select name="lend_type" id="setloan_type">
                                              <option value="">选择贷款类型</option>
                                              <option value="抵押贷款">抵押贷款</option>
                                              <option value="信用贷款">信用贷款</option>
                                              <option value="正常贷款">正常贷款</option>
                                           </select>
                                       </div>
                                       <div class="mt15">
                                           <label>联系人</label>
                                           <input type="text" name="lend_person" id="person">
                                           <span style="color:red" id="man"></span>
                                       </div>
                                       <div class="mt15">
                                           <label>*联系电话</label>
                                           <input type="text" name="lend_phone" id="phone">
                                           <span style="color:red" id="telephone"></span>
                                       </div>
                                        <div class="mt15">
                                           <label>*贷款描述</label> 
                                           <textarea name="lend_desc" id="desc"></textarea>
                                       </div>
                                       <div class="mt15">
                                           <label>*最低借款金额</label>
                                           <input type="text" class="bor_inputbg01" name="lend_lack" id="lack">
                                           <span style="color:red" id="lowlack"></span>
                                       </div>
                                        <div class="mt15">
                                           <label>*利息比例</label>
                                           <input type="text" name="lend_interest" id="interest"><span style="color:red;">（%）</span><span style="color:green;">例：15</span>
                                       </div>
                                       <div class="mt30">
                                           <label></label>
                                           <button type="submit" class="bor_btn" style="border:none;">提交材料</button>
                                       </div>
                                  </fieldset>
                               </form>
                        </div>
                    </div>
               </div>
          </div>
    </div>
</div>
 @endsection

 <script src="jquery.min.js"></script>
 <script type="text/javascript">
    $(function(){
      var status = 1;
      //判断金额
      $("#lend_money").blur(function(){
          var money = $(this).val();
          var type = $("#setloan_type").val();
          var patrn = /^([0-9]*)([.]?)([0-9]*)$/;
          if(!patrn.test(money)){
            $("#money").html('请输入正确的金额');
            status = 1;
            return false;
          }else if(money == ''){
            $("#money").html('请输入金额');
            status = 1;
            return false;
          }else{
            $("#money").html('');
            status = 0;
            return true;
          }
      });
      //判断截止日期
      $(".Wdate").blur(function(){
        var time = $(this).val();
        if(time == ''){
          $("#time").html('请输入截止日期');
          status = 1;
          return false;
        }else{
          $("#time").html('');
          status = 0;
          return true;
        }
      });
      //判断类型
      $("#setloan_type").change(function(){
          var type = $(this).val();
          if(type == ''){
            alert('请选择贷款类型');
            status = 1;
            return false;
          }else{
            status = 0;
            return true;
          }
      });
      //判断联系人
      $("#person").blur(function(){
        var person = $(this).val();
        if(person == ''){
          $("#man").html('请输入联系人');
          status = 1;
          return false;
        }else{
          $("#man").html('');
          status = 0;
          return true;
        }
      });
      //判断联系电话
      $("#phone").blur(function(){
        var phone = $(this).val();
        var regs = /^1([3|4|5|7|8]{1})(\d{9})$/;
        if(!regs.test(phone)){
          $("#telephone").html('请输入正确的电话');
          status = 1;
          return false;
        }else{
          $("#telephone").html('');
          status = 0;
          return true;
        }
      });
      //判断贷款描述
      $("#desc").blur(function(){
        var desc = $(this).val();
        if(desc == ''){
          alert('请输入贷款描述');
          status = 1;
          return false;
        }else{
          status = 0;
          return true;
        }
      });
      //判断最低贷款金额
      $("#lack").blur(function(){
        var lack = $(this).val();
        var patrn = /^([0-9]*)([.]?)([0-9]*)$/;
          if(!patrn.test(lack)){
            $("#lowlack").html('请输入正确的金额');
            status = 1;
            return false;
          }else if(lack == ''){
            $("#lowlack").html('请输入金额');
            status = 1;
            return false;
          }else{
            $("#lowlack").html('');
            status = 0;
            return true;
          }
      });
      //var status = 1;
      //利息比例
      $("#interest").blur(function(){
        var interest = $(this).val();
        if(interest == ''){
          alert('请输入利息比例');
          status = 1;
          return false;
        }else{
          status = 0;
          return true;
        }
      });

      //submit判断提交
      $("form").submit(function(){
        if(status == 1){
          alert("请完善信息");
          return false;
        }else{
          return true;
        } 
      });
    })
 </script>
@extends('layouts.public')

@section('title', '贷款')
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <link rel="stylesheet/less" type="text/css" href="css/style.less" /> -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/all.js"></script>

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
                               <form>
                                  <fieldset>
                                       <div class="mt15">
                                           <label>*贷款金额</label>
                                           <input type="" class="bor_inputbg01">
                                       </div>
                                               <div class="mt15">
                                           <label>*贷款期限</label>
                                           <input type="" class="bor_inputbg02">
                                       </div>
                                       <div class="mt15">
                                           <label>*贷款类型</label>
                                           <select>
                                              <option>选择贷款类型</option>
                                              <option>1</option>
                                           </select>
                                       </div>
                                       <div class="mt15">
                                           <label>联系人</label>
                                           <input type="" >
                                       </div>
                                       <div class="mt15">
                                           <label>*联系电话</label>
                                           <input type="" >
                                       </div>
                                        <div class="mt15">
                                           <label>*贷款描述</label> 
                                           <textarea></textarea>
                                         
                                       </div>
                                       <div class="mt30">
                                           <label></label>
                                           <a href="#" class="bor_btn">提交材料</a>
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
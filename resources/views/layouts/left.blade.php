            <nav class="summary-nav col-xs-3 &lt;!--hidden-sm hidden-xs--&gt;" id="summary-nav"> 
          <header class="summary-nav-header"> 
           <div class="header-content-wrapper"> 
            <div class="avatar-row"> 
             <a href="index.html" class="profile-avatar"> 
                <img width="100%" ng-src="images/green-head.jpg" ng-clock="" src="images/green-head.jpg">
             </a> 
             <!--<sl-avatar size="70" class="avatar"></sl-avatar>--> 
             <div class="profile"> 
              <h6 class="user-name ng-binding">
    <?php 
      $H=date('H')/1;
      if(6<=$H&&$H<12){
        echo "上午好！";
      }else if(12<=$H&&$H<=14){
        echo "中午好！";
      }else if(14<$H&&$H<18){
        echo "下午好！";
      }else{
        echo "晚上好！";
      }
    ?>
    <p class="say-hi ng-binding">{{Session::get('user_name')}}</p>
    </h6>
             </div> 
            </div> 
            <div class="header-row"> 
             <label>安全等级</label> 
             <span class="white" ng-bind="basicProfile.securityText">中</span> 
             <a href="member_info.html" class="manage-security">管理</a> 
            </div> 
           </div> 
          </header> 
          <section class="summary-nav-body"> 
           <!-- My Account Nav --> 
           <ul class="nav nav-list"> 
            <li class="divider"></li> 
            <li class="nav-header">我的账户</li> 
            <li class="change1"> <a href="member_index"><span class="sl-icon-account"></span>账户总览</a> </li> 
            <li class="change2"><a href='member_info'><span class="sl-icon-profile"></span>基本信息</a> </li> 
            <li class="divider"></li> 
            <li class="nav-header">我的投资</li> 
            <li class="change3"><a href='member_tuan'><span class="sl-icon-agreement"></span>我的贷款</a> </li> 
            <li class="change4" ng-class="{active:isTabActive('invest-history')}"> <a href='member_bid_record'><span class="sl-icon-details-more"></span>我的借款</a> </li> 
            <li class="change5" ng-class="{active:isTabActive('auto-invest')}"> <a href='member_bid_auto'><span class="sl-icon-dart"></span>自动投标</a> </li> 
            <li class="change6" ng-class="{active:isTabActive('trade-history')}"> <a href='member_trade'><span class="sl-icon-tutorial"></span>交易记录</a> </li> 
            <li class="divider"></li> 
            <li class="nav-header">账户管理</li> 
            <li class="change7" ng-class="{active:isTabActive('transfer')}"> <a href='member_pay'><span class="sl-icon-piggy-bank"></span>充值提现</a> </li> 
            <li class="change8" ng-class="{active:isTabActive('bank-cards')}"> <a href='member_bank'><span class="sl-icon-credit-card"></span>银行卡管理</a> </li> 
            <li class="divider"></li> 
            <li class="nav-header">资讯中心</li>
            <li class="change9"> <a href='member_invite'><span class="sl-icon-branch"></span>友情邀请</a> </li> 
           </ul> 
          </section> 
         </nav> 
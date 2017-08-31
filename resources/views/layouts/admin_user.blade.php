<html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>@yield('title')</title>
          <!-- <meta name="Keywords" content="大融小贷 个人主页" /> -->
          <!-- <meta name="Description" content="大融小贷 个人主页" /> -->
          <link href="css/UserCSS.css" rel="stylesheet" type="text/css" />
          <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
          <script src="js/ops.js" type="text/javascript"></script>
          <script src="js/UserJS.js" type="text/javascript"></script>
    </head>
    <body>
        @section('sidebar')
        <div class="u-menu">
            <ul class="u-nav" id="user_menu">
                <li class="item" id="user_menu_my" name="user_menu_my">
                    <h3 class="t1">
                        我的大融小贷<span title="折叠"></span></h3>
                    <ul class="sub">
                        <li><a class="current" href="adminuser">个人主页</a></li><li><a href="adminuser_info">个人资料</a></li><li>
                            <a href="adminuser_uaac">认证管理</a></li><li><a href="adminuser_pwd">密码设置</a></li><li><a href="adminuser_ra">推荐有奖</a></li></ul>
                </li>
                <li class="item" id="user_menu_funds" name="user_menu_funds">
                    <h3 class="t2">
                        资金管理<span title="折叠"></span></h3>
                    <ul class="sub">
                         <li><a href="adminuser_mr">资金记录</a></li><li><a href="adminuser_pay_rank">充值记录</a></li><li><a href="adminuser_wr">提现记录</a></li><li><a href="adminuser_tph">三方托管</a></li></ul>
                </li>
                <li class="item" id="user_menu_invest" name="user_menu_invest">
                    <h3 class="t4">
                        理财管理<span title="折叠"></span></h3>
                    <ul class="sub">
                       <li><a href="adminuser_mi">我的投资</a></li><li><a href="adminuser_crt">债权转让</a></li><li><a href="adminuser_ab">自动投标</a></li><li>
                            <a href="adminuser_fs">理财统计</a></li></ul>
                </li>
                <li class="item" id="user_menu_loan" name="user_menu_loan">
                    <h3 class="t3">
                        贷款管理<a name="user_login"></a><span title="折叠"></span></h3>
                    <ul class="sub">
                        <li><a  href="adminuser_my_loan">我的贷款</a></li><li><a href="adminuser_trtl">偿还贷款</a></li><li><a href="adminuser_ls">贷款统计</a></li></ul>
                </li>
            </ul>
            <script type="text/javascript">
                var menuClosed = Ops.getCookie('menuClosed');

                $(".item h3 span").click(function () {

                    menuClosed = Ops.getCookie('menuClosed');
                    if (menuClosed == undefined || menuClosed == null) {
                        menuClosed = '';
                        Ops.setCookie('menuClosed', menuClosed);
                    }
                    //console.log(menuClosed+',click;;;');  
                    $(this).parent().parent().toggleClass('bg-slide');
                    $(this).parent().parent().find(".sub").slideToggle('fast');

                    if ($(this).attr('title') == '折叠') {
                        $(this).attr('title', '展开');
                    } else {
                        $(this).attr('title', '折叠');
                    }

                    var pid = $(this).parent().parent().attr('id');

                    if ($(this).parent().parent().hasClass('bg-slide') && menuClosed.indexOf("#" + pid + "#") == -1) {
                        var cookies = menuClosed + '#' + pid + '#';
                    } else {
                        var cookies = menuClosed.replace("#" + pid + "#", '');
                    }
                    Ops.setCookie('menuClosed', cookies);
                });

                if (menuClosed != null) {
                    var closedMatch = menuClosed.match(/([a-z_]+)/g);
                    for (var i in closedMatch) {
                        var idObj = $('#' + closedMatch[i]);
                        idObj.toggleClass('bg-slide');
                        idObj.find(".sub").hide();
                        idObj.find('h3 span').attr('title', '展开');
                    }
                } else {
                    $("#user_menu_loan h3 span").click();
                }
            </script>
        </div>
        <!-- /.u-menu -->
        @show
        <div class="container">
            @yield('content')
        </div>
       <!--  -->
    </body>
</html>

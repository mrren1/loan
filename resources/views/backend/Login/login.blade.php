<style>
    .aaa {
        margin-top: 100px;
    }
</style>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>后台登录</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>Login</h1>
            <form action="{{url('admin_login')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="text" name="admin_name" class="username" placeholder="Username">
                <input type="password" name="admin_pwd" class="password" placeholder="Password">
              
                <span class="aaa"><img src='<?php echo captcha_src()?>' alt='' class='yan' style="" /></span>
                <input type="text" name="captcha" placeholder="验证码" style="width:130px;height:49px;">
               
                <button type="submit">Sign me in</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p> Happy Learning</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>
        <div align="center">有颜有钱就是任性</a></div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>
<script type="text/javascript">
    $('.yan').click(function(){
        var obj=$(this);
        obj.attr("src","<?php echo captcha_src()?>"+Math.random());
    });
</script>


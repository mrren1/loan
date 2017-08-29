<body>
<center>
        <div class="wrapper-page">
            <div class="panel panel-color {{ $data['status']?'panel-inverse':'panel-danger' }}">

                <div class="panel-heading">
                   <h3 class="text-center m-t-10">{{ $data['message'] }}</h3>
                </div>

                <div class="panel-body">
                    <div class="text-center">
                        <div class="alert {{ $data['status']?'alert-info':'alert-danger' }} alert-dismissable">
                            浏览器页面将在<b id="loginTime">{{ $data['jumpTime'] }}</b>秒后跳转......
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </center>
        <script src="js/jquery.js"></script>
        <script type="text/javascript">
            $(function(){
                //循环倒计时，并跳转
                var url = "{{ $data['url'] }}";
                var loginTime = parseInt($('#loginTime').text());
                console.log(loginTime);
                var time = setInterval(function(){
                    loginTime = loginTime-1;
                    $('#loginTime').text(loginTime);
                    if(loginTime==0){
                        clearInterval(time);
                        window.location.href=url;
                    }
                },1000);
            })
            //点击跳转
            // $('.btn-success').click(function () {
            //     var url = "{{ $data['url'] }}";
            //     window.location.href=url;
            // })
        </script>

    </body>
$(function() {
    var signFun = function() {

        var dateArray = $(".signIn_msg_list").attr("signInday") // 假设已经签到的
        // 
        if ( dateArray == null ) {
            dateArray = [];
        }else{
            dateArray = dateArray.split(',');
        }
        // alert(dateArray)
        // return false;
        // add
        var Continuous_sign_in_arr = dateArray; //记录连续签到日期数组 用于符合规则 判断是否连续签到及连续签到次数
        var integral = 0.05; //默认奖励积分

        var $dateBox = $("#js-signIn-list"),
            $currentDate = $(".current-date"),
            $signInBnt = $("#js-just-signIn"),
            _html = '',
            _handle = true,
            myDate = new Date();
        $currentDate.text(myDate.getFullYear() + '年' + parseInt(myDate.getMonth() + 1) + '月' + myDate.getDate() + '日');

        var monthFirst = new Date(myDate.getFullYear(), parseInt(myDate.getMonth()), 1).getDay();

        var d = new Date(myDate.getFullYear(), parseInt(myDate.getMonth() + 1), 0);
        var totalDay = d.getDate(); //获取当前月的天数

        for (var i = 0; i < 42; i++) {
            _html += ' <li><div class="signIn-icon" data-nowday="'+i+'"></div></li>'
        }
        $dateBox.html(_html) //生成日历网格

        var $dateLi = $dateBox.find("li");
        for (var i = 0; i < totalDay; i++) {
            $dateLi.eq(i + monthFirst).addClass("date" + parseInt(i + 1));
            if ( dateArray != '' ) {
                for (var j = 0; j < dateArray.length; j++) {
             
                    if (i == dateArray[j]) {
                        $dateLi.eq(i + monthFirst).addClass("signIn");
                    }
                }
            };
            
        } //生成当月的日历且含已签到

        $(".date" + myDate.getDate()).addClass('able-signIn');
        //222222 点击 日历上 今天日期 触发 点击签到事件
        $dateBox.on("click", "li", function() {

                if ( $(this).hasClass('able-signIn') && _handle ) {
                    /**/
                    data1 = signInUmsg();
                    var str = "" + myDate.getFullYear() + "/";
                               str += (myDate.getMonth()+1) + "/";//获取系统月份，由于月份是从0开始</a>计算，所以要加1
                               str +=   myDate.getDate() + "/ "; // 获取系统日，
                               str +=    + " "+myDate.getHours() + ":"; //获取系统时，
                               str +=   myDate.getMinutes() + ":"; //分
                               str +=   myDate.getSeconds(); //秒
                    $(".signIn_msg_List").append("<tr><td>"+str+"</td><td>"+data1['integral']+"</td><td>连续签到 "+data1['Continuous_sign_in_arr_length']+" 天奖励</td></tr>");  
                           
                    // console.log( data1 );
                    // return false;
                    $.ajax({
                        data:"uname="+data1['username']+"&integral="+data1['integral']+"&nowday="+data1['nowday']+"&Continuous_sign_in_arr_length="+data1['Continuous_sign_in_arr_length'],
                        url:"frontedIntegral",
                        type:"POST",
                        dateType:"json",
                        success:function( msg ){
                        //非POST提交
                        if ( msg == 2 ) {alert("遭到攻击或代码被修改"); return false;}
                        // //检测到已签到 提示
                        if ( msg == 3 ) {alert("已经签到了哟,记得明天再来哦！！"); return false;}
                        if ( msg ) {
                            $(".succession").html( data1['Continuous_sign_in_arr_length'] );
                            $(".signIn-jiangli-num").html( data1['intrgral'] );  
                              signInFun();
                            $(this).addClass('signIn');
                        };
                    }
                    });
                    /**/
                }
            }) 
        //签到
        $signInBnt.on("click", function() {
                    /**/
                    var data1 = signInUmsg();
                    $.ajax({
                        data:"uname="+data1['username']+"&integral="+data1['integral']+"&nowday="+data1['nowday']+"&Continuous_sign_in_arr_length="+data1['Continuous_sign_in_arr_length'],
                        url:"frontedIntegral",
                        type:"POST",
                        dateType:"json",
                    success:function(msg){

                        //非POST
                        if ( msg == 2 ) {alert("遭到攻击或代码被修改"); return false;}
                        //检测到已签到 提示
                        if ( msg == 3 ) {alert("已经签到了哟,记得明天再来哦！！"); return false;}
                        if ( msg ) {
                            $(".succession").html( data1['Continuous_sign_in_arr_length'] );
                            $(".signIn-jiangli-num").html( data1['intrgral'] ); 
                            var str = "" + myDate.getFullYear() + "/";
                               str += (myDate.getMonth()+1) + "/";//获取系统月份，由于月份是从0开始</a>计算，所以要加1
                               str +=   myDate.getDate() + "/ "; // 获取系统日，
                               str +=   myDate.getHours()+":"; //获取系统时，
                               str +=   myDate.getMinutes()+":"; //分
                               str +=   myDate.getSeconds(); //秒
                            $(".signIn_msg_List").html("<tr><td>"+str+"</td><td>"+data1['integral']+"</td><td>连续签到 "+data1['Continuous_sign_in_arr_length']+" 天奖励</td></tr>");  
                             signInFun();
                            $(this).addClass('signIn');
                        };
                    }
                    });
                    /**/
        });
        //点击获取当前用户的连续签到时间 今日积分  连续签到日期
        function signInUmsg(){
            /**/    
                    var data = new Array();
                    //当前用户名
                    data['username'] =  username = $signInBnt.data("username");
                    //当前签到日期
                    var nowday = new Date();
                    nowday.setTime(nowday.getTime());
                    data['nowday'] = nowday = nowday.getDate();
                    //获取到的积分
                    //设定规则 
                    //首次签到获得0.05元现金奖励
                    //连续签到每天增加0.01元现金奖励
                    //连续签到16天及以上每天获得0.2元现金奖励
                    //如果中间有一天间断未签到的，重先开始计算连续签到时间。
                    //获得的奖励不能直接提现，只能投资后转让变现。
                    if ( $(".date"+(nowday-1)+"").hasClass("signIn") ) {
                           //连续签到时间 存入数组 并排序
                           for (var i = 1; i < Continuous_sign_in_arr.length;  i++) {
                           Continuous_sign_in_arr[ i-1 ] = nowday-i;
                           };

                           Continuous_sign_in_arr[ Continuous_sign_in_arr.length ] = nowday;
                           function sortNumber(a,b)
                            {
                            return a - b
                            }
                           Continuous_sign_in_arr = Continuous_sign_in_arr.sort(sortNumber);

                        if ( Continuous_sign_in_arr.length<16 && Continuous_sign_in_arr.length>=1 ) {
                           integral = integral + 1 * 0.01;
                        }
                        if( Continuous_sign_in_arr.length>=16 ){

                           integral = integral + 1 * 0.2;

                        }
                    }else{
                           Continuous_sign_in_arr = nowday-5;
                    }
                    data['integral'] = integral;
                    data['Continuous_sign_in_arr'] = Continuous_sign_in_arr;
                    data['Continuous_sign_in_arr_length'] = Continuous_sign_in_arr.length == undefined ? 1 :Continuous_sign_in_arr.length;
                    return data;
                    /**/
        }
        // 11111  点击显示 已签到 图样 和 显示签到天数
        function signInFun() {
            $signInBnt.addClass('actived');
            openLayer("signIn-active", signIn);
            _handle = false;
        }
        // 添加签到 图样
        function signIn() {
            $(".date" + myDate.getDate()).addClass('signIn');
        }
    }();
    //打开弹窗
    function openLayer(a, Fun) {
        $('.' + a).fadeIn(Fun)
    } 

    var closeLayer = function() {
            $("body").on("click", ".close-signIn-layer", function() {
                $(this).parents(".signIn-layer").fadeOut()
            })
        }() //关闭弹窗

    $("#js-signIn-history").on("click", function() {
        openLayer("signIn-history-layer", myFun);

        function myFun() {
            console.log(1)
        } //打开弹窗返回函数
    })

})

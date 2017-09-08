<center><h3>用户详细信息</h3>

<div style="width:500px;text-align:left;">
真实姓名：{{$userinfo['message_name']}}<br>
用户性别：{{$userinfo['message_sex']==0?'女':'男'}}<br>	
用户年龄：{{$userinfo['message_age']}}<br>
家庭住址：{{$userinfo['message_address']}}<br>
职业：{{$userinfo['message_job']}}<br>
收入：{{$userinfo['message_revenue']}}<br>
用户手机号：{{$userinfo['message_phone']}}(以申请的手机号为准)<br>
用户照片：<img height="80" src="./uploads/{{$userinfo['message_photo']}}" alt=""><br>
用户邮箱：{{$userinfo['message_email']}}<br>
用户可用信用额度：{{$userinfo['message_limit']}}<br>
共借款笔数：{{$debtNum}}<br>
总借款金额：{{$moneySum}}<br>
总还款金额：{{$alread}}<br>
未还款笔数：{{$nalread}}<br>
未还款金额：{{$moneySum-$alread}}
</div>

</center>
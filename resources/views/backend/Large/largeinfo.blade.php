<center>
<h3>抵押物品详情</h3>
<div style="width:500px;text-align:left;">
申请借款：{{$largeInfo['large_money']}}<br><br>
借款时间：{{date('Y-m-d H:i:s',$largeInfo['begin_time'])}}<br><br>
还款时间：{{date('Y-m-d H:i:s',$largeInfo['end_time'])}}<br><br>
抵押物品及描述：{{$largeInfo['pawn_goods']}}<br><br>
@if($largeInfo['post_status']==1)
快递信息：{{$largeInfo['post_num']}}
@endif
</div>
</center>
<?php
require_once'../include.php';
if(!userStatu($link)){
	header("Location:index.php");
	exit;
}
$lid=$_GET['lid'];
$sql="SELECT ldetail,rname,rtel,lstate FROM list,repairer WHERE lid=$lid AND lrid=rid;";
$res=fetchOne($link,$sql);
if($res['lstate']!='2'){
  header("Location:history.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="./style/common.css">
  <meta charset="UTF-8">
  <title>assess</title>
	<style>
    .assess-content {
		  margin: 40px 0 0;
			overflow: hidden;
			width: 100%;
		}
		.atitle{
			border-bottom: 1px solid #eee;
			color: #444;
			font-size: 14px;
			height: 30px;
			text-indent: 1em;
			line-height: 30px;
			overflow: hidden;
		  width: 100%;
		}
		textarea{
		  border: none;
			border-bottom: 1px solid #eee;
			display: block;
		  height: 80px;
			margin: 0 auto;
			outline: none;
			overflow: hidden;
			padding: 5px;
			resize: none;
			width: 96%;
	  }
		.rinfo {
		  color: #666;
			font-size: 12px;
			height: 20px;
			line-height: 30px;
			padding: 0 10px;
		}
		#doAssess{
		  background: #40afd2;
			border: none;
			border-radius: 5px;
			color: #fff;
			display: block;
			font-size: 14px;
			height: 40px;
			margin: 40px auto;
			width: 90%;
	  }
	</style>
</head>
<body>
  <div class="header">
    <div class="back-btn" id="backBtn">
      <i class="fa fa-angle-left"></i>
    </div>
		发表评价
  </div>
	<div class="assess-content">
	  <div class="atitle"><?php echo $res['ldetail'];?></div>
		<textarea id="aText" maxlength="100" placeholder="发表一下评价吧"></textarea>
		<div class="rinfo">
			维修人:<?php echo $res['rname'];?> 电话:<?php echo $res['rtel'];?>
		</div>
	  <button id="doAssess" <?php echo "lid=\"$lid\"";?>>提交</button>
	</div>	
	<ul id="nav" class="nav">
		<li><i class="fa fa-th-large"></i><br/>首页</li>
		<li><a href="order.php"><i class="fa fa-pencil-square"></i><br/>预约</a></li>
		<li><a href="history.php"><i class="fa fa-history"></i><br/>历史</a></li>
		<li><i class="fa fa-user-o"></i><br/>我的</li>
	</ul>
</body>
<script src="./script/common.js"></script>
<script>
window.onload=function(){
	hiddenNav();
  $('backBtn').onclick=function(){
   history.go(-1);
	}
	$('doAssess').onclick=function(){
	  if($('aText').value==''){
	    noticeDialogFn('未填写评价内容');
		  return;
	  }
	//提交数据
	  sData="lid="+this.getAttribute('lid')+"&assess="+$('aText').value;
	  asynSubmit(sData,"./resource/doAssess.php","POST",function(rData){
		  if(rData.statu==1){
			  loadingDialogFn(true,'评价成功，跳转中');
				window.location="history.php";
		  }else{
		    noticeDialogFn('服务单状态异常，请刷新页面');
			}});
  }
}
</script>
</html>
